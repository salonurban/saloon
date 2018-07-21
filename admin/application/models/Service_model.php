<?php 

class Service_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	function save_service($data) {

   		$config['upload_path'] = 'assets/uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1024';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

   		$this->load->library('upload');
   		$this->upload->initialize($config);
   		if ( !empty($_FILES['service_icon']['name']) && ! $this->upload->do_upload('service_icon')) {
    		//$result = array('error' => $this->upload->display_errors());
    		return "imgError";
	   	}
	   	else {
	   		if(!empty($_FILES['service_icon']['name'])){
				$upload_data = $this->upload->data();
				$insert['service_icon'] = $upload_data['file_name'];
			}
			// $insert['service_icon'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
			//array_walk($data, "remove_html");

			$insert['service_name'] = $data['service_name'];
			$insert['category'] = $data['category'];
     		$result = $this->db->insert('main_services', $insert); 
			if($result) {
				return "Success";
			}
			else {
				return "Error";
			}
    		//$result = array('upload_data' => $this->upload->data());
   		}	
    	
	}
	function save_subservice($data) {
		 $insert['service_id'] = $data['service_name'];
		 $insert['sub_service_name'] = $data['sub_cat_name'];
     
     $result = $this->db->insert('service_sub_category', $insert); 
    
     if($result) {
      return "Success";
     }
     else {
      return "Error";
     }
	}
	// ===================================start get,save service categories
	function get_parent_child_categories($parent = 0, $spacing = '', $user_tree_array = ''){
		if (!is_array($user_tree_array)){
			$user_tree_array = array();
		}  
		$this->db->order_by('id','ASC');
		$this->db->where(array('parent_category'=>$parent));  
	    $query = $this->db->get('service_category');
		$result = $query->result();

		//$sql = "SELECT `cid`, `name`, `parent` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cid ASC";
		//$query = mysql_query($sql);
		if ($query->num_rows() > 0) {
			foreach($result as $row) {
			  $user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->category_name);
			  $user_tree_array = $this->get_parent_child_categories($row->id, $spacing . '&nbsp;&nbsp;', $user_tree_array);
			}
		}
		return $user_tree_array;
	}
	function get_service_parents_categories($where) {

		if($where){
			$this->db->where($where);
		}
		$this->db->order_by('parent_category','ASC');
		$query = $this->db->get('service_category');
		$result = $query->result();
		return $result;
	}

	function get_parent_category_detail($where) {
		if($where){
			$this->db->where($where);
		}
		$query = $this->db->get('service_category');
		$result = $query->row();
		return $result;
	}
	// function get_service_all_categories($where) {
	// 	if($where){
	// 		$this->db->where($where);
	// 	}
	// 	// $query = $this->db->query("select p.id as id, p.title as title, c.title as category, c.id as catid
	// 	// 							from products p JOIN
	// 	// 							(select * from category where id = 1 OR parent = 1) c
	// 	// 							on p.cat = c.id");
	// 	$result = $query->result();
	// 	return $result;
	// }

	function save_service_category($data) {
		$insert['category_name'] = $data['category_name'];
		$insert['parent_category'] = $data['parent_category'];
     	$insert['status'] = 1;
     	$result = $this->db->insert('service_category', $insert); 
     	if($result) {
     		return "Success";
     	}
     	else {
      		return "Error";
     	}
	}
	// ========================= /end get,save service categories

	function get_service() {
		$query = $this->db->get('main_services');
		$result = $query->result();
		return $result;
	}
	function get_subservice($where) {
		if($where){
			$this->db->where($where);
		}
		$this->db->select('service_sub_category.*,main_services.service_name');
		$this->db->from('service_sub_category');
		$this->db->join('main_services','main_services.id = service_sub_category.service_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function get_single_service($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('main_services');

		$result = $query->row();

		return $result;
	}
	
	function update_service($data, $id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->update('main_services', $data); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}
	
	function delete_service($id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->delete('main_services'); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}
	
	function get_service_price($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('shop_services');
		$result = $query->row();
		return $result;
	}
	
	//my quries
	function get_service_new() {
		$query = $this->db->get('main_services');
		$result = $query->result();
		return $result;
	}
	
}