<?php 
class Login_model extends CI_Model
{
	public function checkCredentials($email)
	{
		$this->db->where("email",$email);
		$result=$this->db->get("members");
		if($result->num_rows()==1)
		{
			return $result->row();
		}
		else
		{
			return false;
		}
	}
}
?>