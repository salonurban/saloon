<?php 

class Shop_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	function save_shop($data) {
		$result = $this->db->insert('shop_details', $data); 
		if($result) {
		 return "Success";
		}
		else {
		 return "Error";
		}
	}
	
	function get_shops() {
		$menu = $this->session->userdata('id');
		
		$menu1 = $this->session->userdata('admin');
		if($menu1!='1'){
		$this->db->where('created_user', $menu);
		}
		$query = $this->db->get('shop_details');
		 
		// $q = $this->db->get('created_user');
		$result = $query->result();
		return $result;
   	}
	
	function get_single_shop($id) {
		$query = $this->db->where('id', $id);
		
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('shop_details.created_user', $user);
		}
		$query = $this->db->get('shop_details');
		$result = $query->row();
		return $result;
	}

	function get_shop_owner_det($shopid) {
		
		$this->db->where('shop_details.id', $shopid);
		$this->db->select('shop_details.*, saloon_users.firstname,saloon_users.lastname,saloon_users.phone_no,saloon_users.email_id');
		$this->db->from('shop_details');
		$this->db->join('saloon_users', 'saloon_users.id = shop_details.created_user','left');
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function get_shop_services($id) {
		$this->db->select('ss.id, ss.price, ms.service_name, ssc.sub_service_name');
		$this->db->from('shop_services as ss');
		$this->db->join('main_services as ms', 'ms.id = ss.service_id','left');
		$this->db->join('service_sub_category as ssc', 'ssc.id = ss.service_sub_cat_id','left');
		$this->db->where('ss.shop_id', $id);
		$this->db->group_by("ss.id");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	
 	}
 	function get_shop_services_with_subcategory($id) {
		$this->db->select('service_sub_category.*, main_services.service_name, shop_details.service_name');
		$this->db->from('shop_services as ss');
		$this->db->join('main_services as ms', 'ms.id = ss.service_id','left');
		$this->db->where('ss.shop_id', $id);
		$this->db->group_by("ss.id");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
 	}
	
	function update_shop($data, $id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->update('shop_details', $data); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}
	
	function delete_shop($id) {
		
	 $this->db->where('id', $id);
	 $menu = $this->session->userdata('admin');
	 if($menu!='1'){
		 $user = $this->session->userdata('id');
		 $this->db->where('shop_details.created_user', $user);
	 }
	 $result = $this->db->delete('shop_details'); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	      }
	}
	
	function save_gallery($data) {
	 $result = $this->db->insert('shop_gallery', $data); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}
	
	function get_gallery() {
		
		$this->db->select('shop_gallery.shop_id, shop_details.shop_name, count(shop_gallery.id) as total_images');
		$this->db->from('shop_gallery');
		$this->db->join('shop_details', 'shop_details.id = shop_gallery.shop_id','left');
		$this->db->group_by("shop_gallery.shop_id"); 
		$menu = $this->session->userdata('admin');
	 	if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('shop_details.created_user', $user);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function get_shop_gallery($id) {
		
		$this->db->select('shop_gallery.id, shop_gallery.image_path, shop_details.shop_name');
		$this->db->from('shop_gallery');
		$this->db->join('shop_details', 'shop_details.id = shop_gallery.shop_id');
		$this->db->where('shop_gallery.shop_id', $id);
		
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('shop_details.created_user', $user);
		}
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function delete_gallery_image($id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->delete('shop_gallery'); 

	 
	 if($result) {
		 return "Success";
	 }
	 else {

		 return "Error";
	 }
	}


   function assign_service($data) {
	 $shop_id = $data['shop_id'];
	 $service_id = $data['service_id'];
	 // $service_sub_cat_id = $data['service_sub_cat_id'];
	 
	 $this->db->where('shop_id', $shop_id);
	 $this->db->where('service_id', $service_id);
	 // $this->db->where('service_sub_cat_id', $service_sub_cat_id);
	 //$this->db->where('price', $price);
	 $this->db->from('shop_services');
	 $count = $this->db->count_all_results();
	 
	 if($count > 0) {
		 return "Exist";
	 }
	 else {
	 $result = $this->db->insert('shop_services', $data); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	 }
	}
	
	function remove_shop_service($id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->delete('shop_services'); 

	 
	 if($result) {
		 return "Success";
	 }
	 else {

		 return "Error";
	 }
	}

}