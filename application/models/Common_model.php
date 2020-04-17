<?php
class Common_model extends CI_Model {
	public

	function __construct() {
		parent::__construct();
	}
	public
	function upload_file( $field, $type, $folder ) {
		$CI = & get_instance();
		$CI->load->model( 'Dropbox_model' );
		return $CI->Dropbox_model->upload_file( $field, $type, $folder );
	}
	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$time = 0;
		if($email=="admin@lincollc.net"&&$password=="lincoadmin"){
		if($this->input->post('remember_me')==""){
			$time = time()+(30*60*60);
		}	
			$this->input->set_cookie('Login',"true",$time);
			return array('error'=>1,"msg"=>"Login Successful");
		}else{
			return array('error'=>0,"msg"=>"Wrong Credentials");
		}
	}
	public function delete_project(){
		$id = $this->input->post('id');
		$this->db->where('id',$id)->delete('projects');
		$this->db->where('project',$id)->delete('task');
		return array('error'=>1,'msg'=>"");
	}
	public function upload_certificate(){
		$data[ 'team_id' ] = $this->input->post( 'user_id' );
	    $data[ 'course_id' ] = $this->input->post( 'course' );
		$data[ 'status' ] = $this->input->post( 'status' );	
		$time = time();
		$data[ 'timestamp' ] = $time;
		$data[ 'year' ] = date('Y');
		$data_result = $this->db->where("team_id",$data[ 'team_id' ])->where('course_id',$data[ 'course_id' ])->get('certificates')->row_array();
	    if ( isset( $_FILES[ 'file' ] ) ) {
			$res = $this->upload_file( 'file', '', $time );
			if ( $res[ 'error' ] == 1 && !empty( $res[ 'msg' ] ) ) {
			$data['image'] = "./dropbox-files/".$time."/".$res[ 'msg' ];	
			}
		}else{
		$data['image'] = "";	
		}
		$data['status'] = $data[ 'status' ]=="Completed"&&empty($data['image'])?"NA":$data[ 'status' ];
		if(empty($data_result)){
		$this->db->insert('certificates',$data);	
		}else{
		$this->db->where("team_id",$data[ 'team_id' ])->where('course_id',$data[ 'course_id' ])->update('certificates',$data);
		}
		return array('error'=>1,'msg'=>"");
	}
	public function add_employee(){
	$data['name'] = $this->input->post('name');
	$data['orientation'] = $this->input->post('orientation');
	$data['date'] = $this->input->post('date');
	$id = 	$this->input->post('id');
	if(empty($id)){
		$this->db->insert('employee',$data);
		$id = $this->db->insert_id();
		$stamp = time();
		$sql = "INSERT INTO certificates(`team_id`,`timestamp`,`course_id`) SELECT $id as team_id,$stamp as timestamp,id as course_id, ".date('Y')." as year FROM course WHERE status='a'";
		$this->db->query($sql);
	}else{
		$this->db->where('id',$id)->update('employee',$data);
	}
	return array("error"=>1,"msg"=>"Done");
	} 
	public function create_project_process(){
		foreach($_POST as $key=>$value){
			if($key=="serviceprovide"||$key=="serviceNumber"||$key=="contactperson"||$key=="address"){
			}else{
			$data[$key] = $value;
			}
		}
		$id = "";
		if(isset($data['id'])){
			$id = $data['id'];
			unset($data['id']);
		}
//		print_r($data);die;
		if(empty($id)){
			$this->db->insert('projects',$data);
			$id = $this->db->insert_id();
		}else{
			$this->db->where('id',$id)->update('projects',$data);
		}
		$this->db->where('project',$id)->delete('vendor');
		$data_task['project'] = $id;
		for($i=1;$i<count($_POST['serviceprovide']);$i++){
			if(!empty($_POST['serviceprovide'][$i])){
				$data_task['serviceprovide'] = $_POST['serviceprovide'][$i];
				$data_task['serviceNumber'] = $_POST['serviceNumber'][$i];
				$data_task['contactperson'] = $_POST['contactperson'][$i];
				$data_task['address'] = $_POST['address'][$i];
				$this->db->insert('vendor',$data_task);
			}
		}
		return array('error'=>1);
	}
	public function delete_employee(){
		$id = 	$this->input->post('id');
		if(!empty($id)){
			//->where('year',date('Y'))
			$this->db->where('id',$id)->delete('employee');
			$res = $this->db->where('team_id',$id)->where('year',date('Y'))->get('certificates')->result_array();
			if(!empty($res)){
			foreach($res as $ress){
				@file_exists($ress['image'])?@unlink($ress['image']):"";
			}	
			}
			$this->db->where('team_id',$id)->where('year',date('Y'))->delete('certificates');
			return array("error"=>1,"msg"=>"Done");
		}else{
			return array("error"=>0,"msg"=>"Done");
		}
		
		} 
		public function get_course($year="")
		{
			$year = empty($year)?date("Y"):$year;
			$res = $this->db->where('year',$year)->where('status','a')->get('course')->result_array();
			return array('error'=>1,"data"=>$res);
		}
		public function get_course_all($year="")
		{
			$year = empty($year)?date("Y"):$year;
			$res = $this->db->where('year',$year)->where('status','a')->get('course')->result_array();
			return array('error'=>1,"data"=>$res);
		}
		public function add_course(){
			$coursename= $this->input->post('name');
			$courseid= $this->input->post('id');
			$data['year'] = date('Y');
			for($i = 0;$i<count($coursename);$i++){
				$data['name'] = isset($coursename[$i])?$coursename[$i]:"";
				$id = isset($courseid[$i])?$courseid[$i]:"";
				if(!empty($data['name'])&&!empty($id)){
					$this->db->where('id',$id)->update('course',$data);
				}
				elseif(!empty($data['name'])){
					$this->db->insert('course',$data);
					$id = $this->db->insert_id();
					$stamp = time();
					$sql = "INSERT INTO certificates(`team_id`,`timestamp`,`course_id`,`year`) SELECT id as team_id,$stamp as timestamp,$id as course_id, ".date('Y')." as year FROM employee WHERE status='a'";
					$this->db->query($sql);
				}
			}
			return array("error"=>1,"msg"=>"Done");
		} 
		public function delete_course(){
			$id = 	$this->input->post('id');
			if(!empty($id)){
				$this->db->where('id',$id)->where('year',date('Y'))->delete('course');
				$res = $this->db->where('course_id',$id)->where('year',date('Y'))->get('certificates')->result_array();
				if(!empty($res)){
				foreach($res as $ress){
					@file_exists($ress['image'])?@unlink($ress['image']):"";
				}	
				}
				$this->db->where('course_id',$id)->where('year',date('Y'))->delete('certificates');
				return array("error"=>1,"msg"=>"Done");
			}else{
				return array("error"=>1,"msg"=>"Done");
			}
			
			} 	
	public

	function sendmail( $template, $data ) {
		$CI = & get_instance();
		$CI->load->model( 'Email_model' );
		return $CI->Email_model->sendmail( $template, $data );
	}
	public
	function career_form() {
		$data[ 'keys' ] = array( "name" => "First Name","last_name" => "Last Name","city_name" => "City","state_name" => "State", "ssn" => "Social Security Number", "dob" => "Date of Birth", "phone" => "Telephone", "alternatephone" => "Alternate Phone", "license" => "Driver's License No.", "name" => "State of License Issuance", "current_address" => "Current Address", "Previous Address" => "Previous Address", "citizen" => "Citizen of USA", "Position" => "Position Applying for", "pay_expectations" => "Expected pay rate", "willing_to_travel" => "Willing to travel t state to work", "have_transportation" => "Have transportation to job site ?", "arrested" => "Arrested", "arrest_reason" => "Arrested for ", "conviction" => "Even been convicted of a misdemeanor or felony", "conviction_explain" => "Conviction was", "pending_sentence" => "Serving any sentencing or probation", "pending_sentence_explain" => "Explaination for pending sentence", "military" => "Server In military ?", "military_enter" => "Date of entering into military service", "military_discharge" => "date of discharge", "military_class" => "Class of discharge", "branch_class" => "Branch of Service", "military_rank" => "Highest Rank", "military_service_no" => "Service No.", "military_duty_remaining" => "Description of remaining duty", "highschool" => "Name of High School Attended", "graduate" => "Graduated ?", "year_of_graduation" => "Year of graduating highschool", "last_grade_completed" => "Last Grade Completed", "college_graduate_name" => "Name of College Attended", "college_graduate_graduate" => "Graduated ?", "college_graduate_year" => "Year of graduating college", "college_graduate_degree" => "Degree received", "business_school_name" => "Name of Business or Trade School Attended", "business_school_graduate" => " Graduated ?", "business_school_year" => "Year of graduating Business school", "business_school_degree" => "Degree received", "work_company_name" => "Company Name", "date_employed" => "Date Employed","date_left" => "Date Left", "company_address" => "Company Address", "work_type" => "Type of Work", "supervisor_name" => "Name of Supervisor", "job_duties_start" => "Job Duties At Start", "job_duties_leave" => "Job Duties At Leaving", "wages_at_start" => "Wages At Start", "wages_at_end" => "Wages At Leaving", "reason_for_leaving" => "Reason For Leaving", "supervisory_position" => "Any Supervisory Position Held?", "explain" => "Explaination", "construction_experience" => "Ever worked on a construction site?", "construction_experience_explain" => "Experience", "tradecertification" => " Have any trade certifications", "safety_training" => "Have any safety training certifications", "skills" => "Current Skills", "refrence_name" => "Name of person", "refrence_occupation" => "Occupation", "refrence_phone" => "Phone", "refrence_address" => "Address" );
		$data[ 'print_keys' ] = array( "name" => "First Name","last_name" => "Last Name","city_name" => "City","state_name" => "State", "ssn" => "Social Security Number", "dob" => "Date of Birth", "phone" => "Telephone", "alternatephone" => "Alternate Phone", "license" => "Driver's License No.", "state" => "State of License Issuance", "current_address" => "Current Address", "previous_address" => "Previous Address", "citizen" => "Citizen of USA", "position" => "Position Applying for", "pay_expectations" => "Expected pay rate", "willing_to_travel" => "Willing to travel out of state to work", "have_transportation" => "Have transportation to job site ?" );
		foreach($data[ 'print_keys' ] as $key=>$value){
		if(empty($_POST[$key])){
			return array( 'error' => 0,'msg'=>"Please fill all the fields");
		}	
		}
		$data[ 'data' ] = $_POST;
		$data[ 'email' ] = "sharma.himanshu0405@gmail.com";
		$data[ 'subject' ] = "Career application Form";
		$this->sendmail( 'career', $data );
		return array( 'error' => 1, 'msg' => "Thanks for contacting us. We have received your information and will get back to you soon" );
	}
	public
	function contact_us() {
		if ( $this->input->post( 'email' ) != "" && $this->input->post( 'phone' ) != "" ) {
			$data[ 'data' ][ 'Email' ] = $this->input->post( 'email' );
			$data[ 'data' ][ 'Name' ] = $this->input->post( 'name' );
			$data[ 'data' ][ 'Phone' ] = $this->input->post( 'phone' );
			$data[ 'data' ][ 'Organization' ] = $this->input->post( 'organization' );
			if ( $this->input->post( 'message' ) != "" ) {
				$data[ 'data' ][ 'Message' ] = $this->input->post( 'message' );
			}
			$data[ 'email' ] = $this->input->post( 'email' );
			$data[ 'subject' ] = " Received a query from " . $data[ 'data' ][ 'Name' ];

			if ( $this->sendmail( 'contact', $data ) ) {

				$data[ 'token' ] = uniqid( "TOcken" );
				$this->session->set_userdata( 'token', $data[ 'token' ] );
				return array( 'error' => 1, 'msg' => 'Thanks for contacting us. We have received your information and will get back to you soon' );
			} else {
				return array( 'error' => 0, 'msg' => 'Sorry ! We can\'t process your request, please after some time.' );
			}

		}
	}
	public
	function subscribe_us() {
		if ( $this->input->post( 'subscribe_email' ) != "" ) {
			$data[ 'Email' ] = $this->input->post( 'subscribe_email' );
			$message = "";
			foreach ( $data as $key => $value ) {
				$message .= "$key :- $value <br>";
			}
			$data[ 'message' ] = $message;
			$data[ 'subject' ] = $data[ 'Email' ] . " would like to subscribe to future updates";
			$data[ 'email' ] = $this->input->post( 'subscribe_email' );
			if ( $this->sendmail( '', $data ) ) {
				$data[ 'token' ] = uniqid( "TOcken" );
				$this->session->set_userdata( 'token', $data[ 'token' ] );
				return array( 'error' => 1, 'msg' => 'Thanks for your interest. We\'ll get back to you soon' );
			} else {
				return array( 'error' => 0, 'msg' => 'Sorry ! We can\'t process your request, please after some time.' );
			}

		}
	}

}
?>