<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('shop_model');
		$this->load->model('offers_model');
		$this->load->model('Service_model');
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
 	}
	
	public function index() {
		$template['page'] = 'Offers/offers';
  		$template['page_title'] = "Offers";
  		$template['shops'] = $this->shop_model->get_shops();
  
  		// $template['service'] = $this->Service_model->get_service();
  		// $template['service'] = $this->shop_model->get_shop_services();
  		if($_POST) {
    		$data = $_POST;
    		unset($data['submit']);
    		$result = $this->offers_model->save_offers($data);
    
    		if($result == "Exist") {
     			$this->session->set_flashdata('message', array('message' => 'Offers already assigned for selected shop','class' => 'danger'));
    		}
    		elseif($result == "imgError") {
     			$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
    		}
    		else {
     			$this->session->set_flashdata('message', array('message' => 'Offers assigned successfully','class' => 'success'));
   			}
    		redirect(base_url().'offers');
   		}
   		else {
    		$template['data'] = $this->offers_model->get_offers();
    		$this->load->view('template', $template);
   		}
 	}


public function edit_offers() {
	
	$template['page'] = 'Offers/edit-offers';
	$template['page_title'] = "Add Offers";
	$template['shops'] = $this->shop_model->get_shops();
	$id = $this->uri->segment(3);
	$template['data'] = $this->offers_model->get_single_offers($id);
	if(!empty($template['data'])) {
	if($_POST) {
			$data = $_POST;
			unset($data['submit']);
			$result = $this->offers_model->update_offers($data, $id);
			
			
			if($result == "Exist") {
				$this->session->set_flashdata('message', array('message' => 'Offers already assigned for selected shop','class' => 'danger'));
			}
			else {
				$this->session->set_flashdata('message', array('message' => 'Offers assigned  successfully','class' => 'success'));
		
			}
     		redirect(base_url().'offers');
		}
		else {
   			$this->load->view('template', $template);
		}
		}
		else {
			$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				 redirect(base_url().'offers/view_offers');
		}
	}

public function delete_offers() {
		$id = $this->uri->segment(3);
		$result = $this->offers_model->delete_offers($id);
		$this->session->set_flashdata('message', array('message' => 'Shop Deleted Successfully','class' => 'success'));
     	redirect(base_url().'offers');
	}
	
public function view_single_offers() {
		$id = $_POST['id'];
		$template['data'] = $this->offers_model->get_single_offers($id);
		$this->load->view('Offers/view-offers-popup',$template);
	}






}