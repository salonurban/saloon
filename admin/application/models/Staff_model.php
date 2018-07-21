<?php 

class Staff_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	function save_staff($data) {
	    //$id = $data['shop_id'];
		
	   	//$this->db->where('shop_id', $shop_id);
	   	//$query= $this->db->get('staffs');	   
	   	//if ($query->num_rows() > 0){
	   		//return "Exist";
        //}
		//else {
			$this->db->where('shop_id', $shop_id);
			$query1= $this->db->get('staffs');
			if(($query1->num_rows() > 0)) {
				return "Exist";
			}
	 		else {
				$insert = $this->db->insert('staffs', $data); 
				$insert_id = $this->db->insert_id();
				if($insert){
					return $insert_id;
				}
				else{
					return "Fail";
				}
		 		// return "Success";
	 		}
		//}
	}

	public function save_staff_service($data){
		$result = $this->db->insert('staffs_specialist', $data); 
		if($result){
			return "Success";
		}
		else{
			return "Fail";
		}
	}
	
	

	function get_staff() {
		$query = $this->db->get('staffs');
		$result = $query->result();
		return $result;
	}
	
	function get_joint_staff($where)
	{
	  $cont = 'staffs.id = staffs_specialist.staff_id';
	  $cont2 = 'staffs.shop_id = shop_details.id';
	  if($where){
	   $this->db->where($where);
	  }
	  $this->db->select('staffs.*,shop_details.shop_name,staffs_specialist.staff_id,staffs_specialist.service_id');
	  $this->db->from('staffs');
	  $this->db->join('staffs_specialist',$cont,'left' );
	  $this->db->join('shop_details',$cont2,'left' );

	  $query = $this->db->get();

	  return $query->result();

	}
	
function get_single_staff($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('staffs');
		$result = $query->row();
		return $result;
	                     }	




function update_staff($data, $id) {
      $id = $data['id'];
		
	 $this->db->where("id !=",$id);
	 
	 $this->db->where("(username = '$username' OR email_id = '$email_id' )");
	 //$this->db->where('username', $username);
	// $this->db->or_where('email_id', $email_id);
	 $query= $this->db->get('staffs');
	 
	   
	    if($query -> num_rows() >0 ) {
	    
		 return "Exist";
	           }
	 else {
	 $this->db->where('id', $id);
	 $result = $this->db->update('staffs', $data); 
		 return "Success";
	 
	 }
	}


	function delete_staff($id) {
		
	 $this->db->where('id', $id);
	 $result = $this->db->delete('staffs'); 
	 
	 if($result) {
		 return "Success";
	 }
	 else {
		 return "Error";
	 }
	}	
}