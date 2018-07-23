<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//$this->load->library('database');
		$this->load->model('offers_model');
		$data['offers_list'] = $this->offers_model->get_offers();	
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('home',$data);
		$this->load->view('home_js');
		$this->load->view('common/footer');
	}
}
