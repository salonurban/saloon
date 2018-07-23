<?php 

class Offers_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	
  	function get_offers() {
        $this->db->select('ss.shop_name,  ms.id,ms.offers,ms.offer_image');
		$this->db->from('shop_details as ss');
		$this->db->join('offers as ms', 'ms.shop_id = ss.id'); 
		
		//$this->db->where('ss.id', $id);
         $query = $this->db->get();
		$result = $query->result();
		return $result;
          }  
	
}