<?php 
class Location_model extends CI_Model
{
	public function getlocation($cityId)
	{



		 $sql = "SELECT st.name state,cont.name country,cit.name city,cit.id cityid,st.id stateid
FROM countries cont 
INNER JOIN states st ON  cont.id = st.country_id 
INNER JOIN cities cit ON st.id = cit.state_id where cit.id=$cityId"; 
//var_dump($sql); exit;
		$result=$this->db->query($sql); 
		return $result->result();
	}
}
?>