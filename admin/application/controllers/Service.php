<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {


	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('service_model');
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		else {
			$menu = $this->session->userdata('admin');
			 if( $menu!=1  ) {
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access service page.",'class' => 'danger'));
				 redirect(base_url().'dashboard');
			 }
		}
 	}
	
	public function index() {
		$template['page'] = 'Shops/services';
		$template['page_title'] = "Services";
		if($_POST) {
				$data = $_POST;
				unset($data['submit']);
				
				$result = $this->service_model->save_service($data);
				$this->session->set_flashdata('message', array('message' => 'Service Saved successfully','class' => 'success'));
				redirect(base_url().'service');
			}
			else {
				$template['categories']= $this->service_model->get_service_parents_categories(array('parent_category'=>0));
				// print_r($template['categories']); die;
				$template['data'] = $this->service_model->get_service();
				$this->load->view('template', $template);
			}
	}

	public function add_category() {
		$template['page'] = 'Shops/add-category';
		$template['page_title'] = "Add Service category";
		if($_POST) {
			$data = $_POST;
			unset($data['submit']);
			
			$result = $this->service_model->save_service_category($data);
			if($result == "Error") {
     			$this->session->set_flashdata('message', array('message' => 'Sorry, something went to wrong. Please try again','class' => 'danger'));
    		}
    		elseif($result == "imgError") {
     			$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files. png,jpg,jpeg,gif file types only allowed and image size shold be less than or equal to 1mb','class' => 'danger'));
    		}
    		else {
     			$this->session->set_flashdata('message', array('message' => 'Service Category Saved successfully','class' => 'success'));
   			}
			
			redirect(base_url().'service/add_category');
		}
		else {
			$template['parent_ctegories'] = $this->service_model->get_service_parents_categories(array('parent_category'=>0));
			$this->load->view('template', $template);
		}
	}
	public function view_category(){

		$template['page'] = 'Shops/view-category';
		$template['page_title'] = "View Service Category";
		
		$template['parent_ctegories'] = $this->service_model->get_service_parents_categories(NULL);

		//print_r($template['data']); die;
		$this->load->view('template',$template);

	}

	public function add_subcategory() {
		$template['page'] = 'Shops/add-subcategory';
		$template['page_title'] = "Add Service category";
		if($_POST) {
				$data = $_POST;
				unset($data['submit']);
				
				$result = $this->service_model->save_subservice($data);
				$this->session->set_flashdata('message', array('message' => 'Service Saved successfully','class' => 'success'));
				redirect(base_url().'service/add_subcategory');
			}
			else {
				$template['data'] = $this->service_model->get_service();
				$this->load->view('template', $template);
			}
	}

	public function view_subcategory(){
		$template['page'] = 'Shops/view-subcategory';
		$template['page_title'] = "View Service Category";
		
		$template['data'] = $this->service_model->get_subservice(null);
		//print_r($template['data']); die;
		$this->load->view('template',$template);

	}

	public function view_subcategory_ajax(){
		
		
			$sub_service_id = $this->service_model->get_subservice(array('service_id'=>$this->input->post('id')));
			if($sub_service_id){
				$template['msg']= 'success';
				$template['subservices'] =$sub_service_id;
			}
			else{
				$template['msg'] = 'fail';
			}
		header('Content-Type: application/json');
        echo json_encode($template);
	}
	
	public function edit_service() {
		
		$template['page'] = 'Shops/edit-service';
		$template['page_title'] = "Edit Service";
		
		$id = $this->uri->segment(3);
		$template['data'] = $this->service_model->get_single_service($id);;
		if($_POST) {
			$data = $_POST;
			unset($data['submit']);
			
			$result = $this->service_model->update_service($data, $id);
			$this->session->set_flashdata('message', array('message' => 'Service Updated successfully','class' => 'success'));
     		redirect(base_url().'service');
		}
		else {
   			$this->load->view('template', $template);
		}
	}
	
	public function delete_service() {
		$id = $this->uri->segment(3);
		$result = $this->service_model->delete_service($id);
		$this->session->set_flashdata('message', array('message' => 'Service Deleted Successfully','class' => 'success'));
     	redirect(base_url().'service');
	}
}
