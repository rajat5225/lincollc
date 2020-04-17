<?php
require_once( 'secure.php' );
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
include( 'lang.php' );
class Site extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model( 'Common_model' );
        $this->session->set_userdata('page',"index");
	}
	public
	function index() {
		$this->session->set_userdata('page',"index");
		$this->load->view('index');
	}
	public
	function privacy_policy() {
		$this->session->set_userdata('page',"privacy_policy");
		$this->load->view('privacy-policy');
	}
	public
	function project_tracker($id="") {
		$data['page']= "";
		if(!empty($id)){
		$data['data'] = $this->db->where('id',$id)->get('projects')->row_array();
		}
		$this->session->set_userdata('page',"privacy_policy");
		$this->load->view('project-tracker',$data);
	}
	public
	function about_us() {
		$this->session->set_userdata('page',"about");
		$this->load->view('about');
	}
	public
	function projects() {
		$this->session->set_userdata('page',"projects");
		$this->load->view('projects');
	}
	public
	function employee_portal() {
		$this->session->set_userdata('page',"employee_portal");
		$this->load->view('employee-portal');
	}
	public
	function safety() {
		$this->session->set_userdata('page',"safety");
		$this->load->view('safety');
	}
	public
	function careers() {
		$this->session->set_userdata('page',"careers");
		$this->load->view('careers');
	}
	public
	function guiding_principles() {
		$this->session->set_userdata('page',"guiding_principles");
		$this->load->view('guiding-principles');
	}
	public
	function destinations($page="") {
		$this->session->set_userdata('page',"destination");
		if(empty($page)||@file_exists('../views/'.$page.".php")){
		$this->load->view('destinations');
		}else{
		$this->load->view($page);	
		}	
	}
	public
	function blog($id= "") {
		$data['id'] = $id;
		$this->session->set_userdata('page',"blog");
		$this->load->view('blog',$data);
	}
	public
	function post($id= "") {
		$data['id'] = $id;
		$this->session->set_userdata('page',"blog");
		$this->load->view('single-blog',$data);
	}
	public
	function contact_us() {
		$this->session->set_userdata('page',"blog");
		$res = $this->Common_model->contact_us();
		echo json_encode($res);
	}
	public
	function carrer() {
		$res = $this->Common_model->career_form();
		echo json_encode($res);
	}
	public
	function delete_project() {
		$res = $this->Common_model->delete_project();
		echo json_encode($res);
	}
	public
	function create_project_process() {
		$res = $this->Common_model->create_project_process();
		echo json_encode($res);
	}
	public function login(){
		$this->session->set_userdata('page',"blog");
		$this->load->view('login');
	}
	public function login_process(){
		$res = $this->Common_model->login();
		echo json_encode($res);
	}
	public
	function subscribe_us() {
		$this->session->set_userdata('page',"blog");
		$res = $this->Common_model->subscribe_us();
		echo json_encode($res);
	}
	public
	function add_employee() {
		$this->session->set_userdata('page',"training");
		$res = $this->Common_model->add_employee();
		echo json_encode($res);
	}
	public
	function gallery() {
		$this->session->set_userdata('page',"gallery");
		$this->load->view('gallery');
	}
	public
	function contact($dest="",$place="") {
		$this->session->set_userdata('page',"contact");
		$data['dest'] = $dest;
		$data['place'] = $place;
		$this->load->view('contact',$data);
	}
	public function delete_employee(){
		$res = $this->Common_model->delete_employee();
		echo json_encode($res);
	}
	public function delete_course(){
		$res = $this->Common_model->delete_course();
		echo json_encode($res);
	}
	public function add_course()
	{
		$res = $this->Common_model->add_course();
		echo json_encode($res);
	}
	public function upload_certificate()
	{
		$res = $this->Common_model->upload_certificate();
		echo json_encode($res);
	}
	public
	function training_tracker($dest="",$place="") {
		$this->session->set_userdata('page',"employee_portal");
		$data['dest'] = $dest;
		$data['place'] = $place;
		$this->load->view('training',$data);
	}
	public
	function project_single($dest="",$place="") {
		$this->session->set_userdata('page',"employee_portal");
		$data['dest'] = $dest;
		$data['place'] = $place;
		$this->load->view('projects-single',$data);
	}
	public
	function manage_course($dest="",$place="") {
		$this->session->set_userdata('page',"employee_portal");
		$data = $this->Common_model->get_course();
		$this->load->view('courses',$data);
	}
	public
	function logout() {
		$this->session->set_userdata('page',"index");
		$this->session->unset_userdata('Login');
		$this->input->set_cookie( 'Login',"" );
		redirect(base_url());
	}
	public
	function edit_training($id="") {
		$this->session->set_userdata('page',"employee_portal");
		if(!empty($id)){
		$data['data'] = $this->db->WHERE('id',$id)->get('employee')->row_array();
	    }else{
		$data = "";	
		}
//		print_r($data);die;
		$this->load->view('edit-training',$data);
	}
}