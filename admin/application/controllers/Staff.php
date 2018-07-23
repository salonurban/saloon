<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


	public function __construct() {

		parent::__construct();
	
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('staff_model');
		$this->load->model('shop_model');
		$this->load->model('service_model');

		
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		// else {
		// 	$menu = $this->session->userdata('admin');
		// 	 if( $menu!=1  ) {
		// 		 $this->session->set_flashdata('message', array('message' => "You don't have permission to access customer page.",'class' => 'danger'));
		// 		 redirect(base_url().'dashboard');
		// 	 }
		// }
 	}
	
	public function add_staff() {
		
		$template['page'] = 'Staff/add-staff';
		$template['page_title'] = "Add Staff";
	   	$template['shops'] = $this->shop_model->get_shops();
  		$template['service'] = $this->service_model->get_service();  

	    if($_POST) {
			$data = $_POST;
			unset($data['submit']);
			
			$notify = '';
			if(isset($data['nofity'])) {
				$notify = $data['nofity'];
				unset($data['notify']);
			}
			
			$config = $this->set_upload_options();
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( !empty($_FILES['profile_pic']['name']) && ! $this->upload->do_upload('profile_pic')) {
				
				$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));

				$this->load->view('template', $template);
			}
			else {		

				if(!empty($_FILES['profile_pic']['name'])){

					$upload_data = $this->upload->data();
					$insert_staff['profile_pic'] = $upload_data['file_name']; //base_url().$config['upload_path']."/".
				}

				$get_staff_admin_id = $this->shop_model->get_shop_owner_det($data['shop_id']);

				$insert_staff['owner_id'] = $get_staff_admin_id->created_user;
				$insert_staff['shop_id'] = $data['shop_id'];
				$insert_staff['first_name'] = $data['first_name'];
				$insert_staff['last_name'] = $data['last_name'];
				$insert_staff['cpr'] = $data['cpr'];
				$insert_staff['phone'] = $data['phone'];
				$insert_staff['email'] = $data['address'];

				$last_insert_id = $this->staff_model->save_staff($insert_staff);
			
				if($last_insert_id == "Exist") {
					$this->session->set_flashdata('message', array('message' => 'Staff already exist','class' => 'danger'));
				}
				elseif($last_insert_id == "Fail") {
					$this->session->set_flashdata('message', array('message' => 'Sorry something went to wrong. Try again.','class' => 'danger'));
				}
				else {
					if(!empty($last_insert_id)){
						foreach ($data['service_id'] as $service) {
							$insert['staff_id'] = $last_insert_id;
							$insert['service_id'] = $service;
							$result = $this->staff_model->save_staff_service($insert);
						}
					}
					array_walk($data, "remove_html");
					$this->session->set_flashdata('message', array('message' => 'Staff Saved successfully','class' => 'success'));
				}
			
     			redirect(base_url().'Staff/view_staff');
			}

		}
		else {
   			$this->load->view('template', $template);
		}
	}

  	public function view_staff() {
		$template['page'] = 'Staff/view-staff';
		$template['page_title'] = "View Staff";
		// echo "user_type".$this->session->userdata('admin')."<br/>"; 
		// echo "user id".$this->session->userdata('id')."<br/>"; 
		// echo "user name".$this->session->userdata('id')."<br/>"; 
		// die;
		if($this->session->userdata('admin')==1){
			$template['data'] = $this->staff_model->get_joint_staff(NULL);
		}
		else{
			$userId = $this->session->userdata('id');
			$template['data'] = $this->staff_model->get_joint_staff(array('staffs.owner_id'=>$userId));
		}
		
		$this->load->view('template',$template);
	}

	public function view_single_staff() {
		$id = $_POST['id'];
		$template['data'] = $this->customer_model->get_single_customer($id);
		$this->load->view('Customer/view-customer-popup',$template);
	}
 
 public function delete_staff() {
		$id = $this->uri->segment(3);
		$result = $this->customer_model->delete_customer($id);
		$this->session->set_flashdata('message', array('message' => 'customer Deleted Successfully','class' => 'success'));
     	redirect(base_url().'customer/view_customer');
	}
 
 public function edit_staff() {
		
		$template['page'] = 'Customer/edit-customer';
		$template['page_title'] = "Edit customer";
		
		$id = $this->uri->segment(3);
		$template['data'] = $this->customer_model->get_single_customer($id);
		if($_POST) {
			$data = $_POST;
			
			unset($data['submit']);
			$notify = '';
			if(isset($data['nofity'])) {
			$notify = $data['nofity'];
			unset($data['notify']);
			}
			if(isset($_FILES['profile_pic'])) {
				$config = $this->set_upload_options();
			
				$this->load->library('upload');
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('profile_pic')) {
					unset($data['profile_pic']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['profile_pic'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
					//$data['profile_pic'] = base_url().$config['upload_path']."/".$_FILES['profile_pic']['name'];
				}
			}
			
			$result = $this->customer_model->update_customer($data, $id);
			
			if($result == "Exist") {
				$this->session->set_flashdata('message', array('message' => 'Customer already exist','class' => 'danger'));
			   }
			else if($result == "Already Exist") {
				$this->session->set_flashdata('message', array('message' => 'Email id already exist','class' => 'danger'));
			   }
				
			else {
				if($notify != '') {
					// Send Mail
					$this->load->library('email');
					// prepare email
					$this->email
						->from("no-reply@bookmysalons.com", "BookMySalons")
						->to($data['email_id'])
						->subject('Welcome to BookMySalons')
						->message($this->load->view('customer-email-template', $data, true))
						->set_mailtype('html');
					
					// send email
					$result = $this->email->send();
				}
				array_walk($data, "remove_html");
				$this->session->set_flashdata('message', array('message' => 'Customer Updated Successfully','class' => 'success'));
			   }
			
		
     		redirect(base_url().'customer/view_customer');
		}
		else {
   			$this->load->view('template', $template);
		}
	}

 private function set_upload_options() {   
		//upload an image options
		$config = array();
		$config['upload_path'] = 'assets/uploads/profile_pic';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;
	
		return $config;
	}
 
}

