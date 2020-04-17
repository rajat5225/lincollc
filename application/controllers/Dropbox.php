<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
include( 'lang.php' );
require_once( 'secure.php' );
class Dropbox extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model( 'Dropbox_model' );
		$this->session->set_userdata( 'page', "index" );	
	}
	public function check_login(){
	if ( $this->input->cookie( 'Login' ) != "true" ) {
			redirect( base_url());
		}	
	}
	public
	function index($parent = '') {
		$this->session->set_userdata('page',"dropbox");
		$data['parent'] = $parent;
		$this->load->view('dropbox',$data);
	}
	public
	function create_folder() {
		$this->check_login();
		$res = $this->Dropbox_model->add_folder();
		echo json_encode($res);
	}
	public
	function delete_file() {
		$this->check_login();
		$res = $this->Dropbox_model->delete_file($this->input->post('id'));
		echo json_encode($res);
	}

	public
	function delete_folder() {
		$this->check_login();
		$res = $this->Dropbox_model->delete_folder($this->input->post('id'));
		echo json_encode($res);
	}
	public
	function upload_data() {
		$this->check_login();
		$res = $this->Dropbox_model->upload_data();
		echo json_encode($res);
	}
	public
	function get_files() {
		$res = $this->Dropbox_model->get_files();
		echo json_encode($res);
	}
}