<?php 

class Offers_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
function save_offers($data) {
 
 
  $shop_id = $data['shop_id'];
  $this->db->where('shop_id', $shop_id);
  $this->db->from('offers');
 
  $count = $this->db->count_all_results();
  
  if($count > 0) {
   return "Exist";
  }
  else {
   $config['upload_path'] = 'assets/uploads/offers';
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
  $config['max_size'] = '1024';
  //$config['max_width']  = '1024';
  //$config['max_height']  = '768';

   $this->load->library('upload');
   $this->upload->initialize($config);
   if ( ! $this->upload->do_upload('offerspicture')) {
    //$result = array('error' => $this->upload->display_errors());
    
    return "imgError";
   }
   else {
    $upload_data = $this->upload->data();
    $insert['offer_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
    //array_walk($data, "remove_html");
    

    $insert['shop_id'] = $data['shop_id'];
     $insert['offers'] = $data['offers'];
     $insert['service_id'] = $data['service_name'];
     $result = $this->db->insert('offers', $insert); 
    
     if($result) {
      return "Success";
     }
     else {
      return "Error";
     }

    //$result = array('upload_data' => $this->upload->data());
   }
  }

  
 }
	
	function update_offers($data, $id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->update('offers', $data); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}
	
	function delete_offers($id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->delete('offers'); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	      }
	}
	
  function get_offers() {

         $this->db->select('ss.shop_name,  ms.id,ms.offers');
		$this->db->from('shop_details as ss');
		$this->db->join('offers as ms', 'ms.shop_id = ss.id'); 
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('ss.created_user', $user);
		}
		//$this->db->where('ss.id', $id);
         $query = $this->db->get();
		$result = $query->result();
		return $result;
          }  
	
	function get_single_offers($id) {
		$query = $this->db->where('offers.id', $id);
		$menu = $this->session->userdata('admin');
		if($menu!='1'){
			$user = $this->session->userdata('id');
			$this->db->where('shop_details.created_user', $user);
			$this->db->join('shop_details', 'shop_details.id = offers.shop_id','left');
		}
		$query = $this->db->get('offers');
		$result = $query->row();
		return $result;
	                     }	
}