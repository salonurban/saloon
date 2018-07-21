<?php 

class Locations_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
		
 	}
	
	
	function get_locations($field) {

		$this->db->group_by($field);
        $this->db->select('
                            COUNT(id) as tot, 
                            '.$field.'
                        ');        
        $this->db->from('shop_details');
        $query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
}