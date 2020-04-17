<?php
class Dropbox_model extends CI_Model {
	public

	function __construct() {
		parent::__construct();
	}
	public

	function getformat( $strpos ) {
		if ( $strpos == "folder" ) {
			return "folder";
		}
		if ( $strpos == "application/msword" || $strpos == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || strpos( $strpos, "powerpoint" ) ) {
			return "word";
		} elseif ( $strpos == "application/pdf" ) {
			return "pdf";
		}
		elseif ( strpos( $strpos, "powerpoint" ) !== false || strpos( $strpos, "presentation" ) !== false ) {
			return "ppt";
		}
		elseif ( strpos( $strpos, "ms-excel" ) !== false || strpos( $strpos, "presentation" ) !== false ) {
			return "excel";
		}
		elseif ( strpos( $strpos, "application/zip" ) !== false || strpos( $strpos, "application/x-rar-compressed" ) !== false ) {
			return "zip";
		}
		elseif ( strpos( $strpos, "image" ) !== false ) {
			return "image";
		}
		elseif ( strpos( $strpos, "video" ) !== false ) {
			return "video";
		}
		elseif ( strpos( $strpos, "audio" ) !== false ) {
			return "music";
		} else {
			return "file";
		}
	}
	public

	function check_name( $name, $parent ) {
		$res = $this->db->where( 'parent', $parent )->where( 'name', $name )->get( 'file_system' )->row_array();
		return ( empty( $res ) ? $name : $name );
	}
	public

	function add_folder() {
		$data[ 'name' ] = $this->input->post( 'name' );
		$data[ 'type' ] = "folder";
		$data[ 'timestamp' ] = time();
		$data[ 'parent' ] = $this->input->post( 'parent' ) == "" ? 0 : secure::decrypt( $this->input->post( 'parent' ) );
		if ( $this->input->post( 'id' ) != "" ) {
			$id = secure::decrypt( $this->input->post( 'id' ) );
			$this->db->where( 'id', $id );
			$this->db->update( 'file_system', $data );
		} else {
			$data[ 'name' ] = $this->check_name( $this->input->post( 'name' ), $data[ 'parent' ] );
			$this->db->insert( 'file_system', $data );
			$id = $this->db->insert_id();
		}
		$data[ 'id' ] = secure::encrypt( $id );
		return array( 'error' => 1, 'msg' => "Folder Created", 'data' => $data );
	}
	public

	function delete_file( $id ) {
		$id = secure::decrypt( $id );
		$this->db->select( '*' );
		$this->db->from( 'file_system' );
		$res = $this->db->where( 'id', $id )->get()->result_array();
		foreach ( $res as $files ) {
			if ( $files[ 'type' ] != "folder" && file_exists( 'dropbox/' . $files[ 'timestamp' ] . "/" . $files[ 'name' ] ) ) {
				unlink( 'dropbox/' . $files[ 'timestamp' ] . "/" . $files[ 'name' ] );
				rmdir( 'dropbox/' . $files[ 'timestamp' ] );
			} elseif ( $files[ 'type' ] == 'folder' ) {
				$this->delete_folder( $files[ 'id' ] );
			}
		}
		$this->db->where( 'id', $id );
		$this->db->delete( 'file_system' );
		return array( 'error' => 1, 'msg' => "File removed", 'data' => "" );
	}
	public
	function delete_folder( $id ) {
		$id = secure::decrypt( $id );
		$this->db->select( '*' );
		$this->db->from( 'file_system' );
		$res = $this->db->where( 'parent', $id )->where( 'type', "folder" )->get()->result_array();
		if(!empty($res)){
		foreach ( $res as $files ) {
			if ( $files[ 'type' ] != "folder" && file_exists( 'dropbox/' . $files[ 'timestamp' ] . "/" . $files[ 'name' ] ) ) {
				unlink( 'dropbox/' . $files[ 'timestamp' ] . "/" . $files[ 'name' ] );
				rmdir( 'dropbox/' . $files[ 'timestamp' ] );
			} elseif ( $files[ 'type' ] == 'folder' ) {
				$this->delete_folder( secure::encrypt($files[ 'id' ]) );
			}
		}
		}	
		$this->db->where( 'id', $id );
		$this->db->delete( 'file_system' );
		$this->db->where( 'parent', $id )->delete( 'file_system' );
		return array( 'error' => 1, 'msg' => "Folder removed", 'data' => "" );
	}
	public
	function upload_data() {
		if ( isset( $_FILES[ 'file' ] ) ) {
			$time = time();
			$res = $this->upload_file( 'file', '', $time );
			if ( $res[ 'error' ] == 1 && !empty( $res[ 'msg' ] ) ) {
				$data[ 'parent' ] = $this->input->post( 'parent' ) == "" ? 0 : secure::decrypt( $this->input->post( 'parent' ) );
				$name = $this->check_name( $res[ 'msg' ], $data[ 'parent' ] );
				$data[ 'name' ] = $name;
				if ( $name != $res[ 'msg' ] ) {
					rename( 'dropbox-files/' . $time . "/" . $res[ 'msg' ], './dropbox-files/' . $time . "/" . $name );
				}
				$data[ 'type' ] = file_exists( 'dropbox-files/' . $time . "/" . $name ) ? $this->getformat( mime_content_type( 'dropbox-files/' . $time . "/" . $name ) ) : "file";
				$data[ 'timestamp' ] = $time;
				$this->db->insert( 'file_system', $data );
				$data[ 'id' ] = secure::encrypt( $this->db->insert_id() );
				$result[] = $data;
				return array( 'error' => '1', 'msg' => "File created", 'data' => $result );
			} else {
				return $res;
			}
		}
	}
	public
	function upload_file( $field, $type, $folder ) {
		$field = empty( $field ) ? "file" : $field;
		$path = 'dropbox-files/' . $folder;
		if ( !is_dir( $path ) ) {
			mkdir( $path, 0777 );
		}
		$config[ 'upload_path' ] = $path;
		$config[ 'allowed_types' ] = "*";
		$cfile = $_FILES[ $field ][ 'name' ];
		$cfile = $cfile;
		$config[ 'file_name' ] = preg_replace( '/\s+/', '_', $cfile );
		$this->load->library( 'upload', $config );
		if ( !$this->upload->do_upload( $field ) ) {
			$result = array( 'error' => 0, 'msg' => $this->upload->display_errors() );
			return $result;
		} else {
			$result = array( 'error' => 1, 'msg' => $config[ 'file_name' ] );
			return $result;
		}
	}
	public

	function get_files() {
		$parent = $this->input->post( 'parent' ) == "" ? 0 : secure::decrypt( $this->input->post( 'parent' ) );
		$this->db->select( '*' )->from( 'file_system' );
		$this->db->where( 'parent', $parent );
		if ( $this->input->post( 'search' ) != "" ) {
			$this->db->where( 'name LIKE "%' . $this->input->post( 'search' ) . '%"' );
		}
		$res = $this->db->order_by( 'type' )->get()->result_array();
		if ( $parent != 0 ) {
			$back = $this->db->where( 'id', $parent )->get( 'file_system' )->row_array();
			$back = isset( $back[ 'parent' ] ) && $back[ 'parent' ] != 0 ? secure::encrypt( $back[ 'parent' ] ) : secure::encrypt( 0 );
		} else {
			$back = "";
		}
		if ( !empty( $res ) ) {

			for ( $i = 0; $i <= count( $res ) - 1; $i++ ) {
				$res[ $i ][ "id_enc" ] = secure::encrypt( $res[ $i ][ "id" ] );
				if ( $res[ $i ][ "type" ] != "folder" ) {
					//				$res[ $i ][ "type" ] = $this->getformat( mime_content_type( './dropbox-files/' . $res[$i]['timestamp'] . "/" .$res[$i]['name'] ) );
				}
				unset( $res[ $i ][ "id" ] );
			}
			return array( 'error' => 1, 'msg' => "Check data", 'data' => $res, 'back' => $back );
		} else {
			return array( 'error' => 0, 'msg' => "No folder/files available", 'data' => "" );
		}
	}
}
?>