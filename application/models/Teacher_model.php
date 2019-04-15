	<?php 
	class Teacher_model extends CI_Model
	{
		public function insertStaff($emp_info,$emp_add,$member,$emp_master)
		{

			$this->db->trans_start(); # Starting Transaction
			$this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
			$result=$this->db->insert('emp_info', $emp_info); 
			$emp_info_id = $this->db->insert_id();
			$result = $this->db->insert('emp_address', $emp_add); 
			$emp_add_id=$this->db->insert_id();

			$emp_master_details = array('emp_master_emp_info_id' =>  $emp_info_id,
				'emp_master_emp_address_id' =>$emp_add_id
			);
			$emp_master_details= array_merge($emp_master,$emp_master_details);
			$result=$this->db->insert('emp_master', $emp_master_details); 
			$emp_master_id =$this->db->insert_id();
			$members = array('emp_master_id' =>$emp_master_id  );
			$allmembers=array_merge($member,$members);
			if($result==true)
			$result=$this->db->insert('members', $allmembers); 	
			$this->db->trans_complete(); # Completing transaction
			if ($this->db->trans_status() === FALSE) {
	   				 # Something went wrong.
					    $this->db->trans_rollback();
					    return FALSE;
					} 
					else {
					    # Everything is Perfect. 
					    # Committing data to the database.
					    $this->db->trans_commit();
					    return TRUE;
					}
			
		}

		public function listviewStaff($id)
		{
				$sql="SELECT m.mid,m.email,info.emp_unique_id,info.emp_name,info.emp_qualification,dept.emp_department_name,design.emp_designation_name FROM members m 
				INNER JOIN emp_master as emp on m.emp_master_id=emp.emp_master_id 
				INNER JOIN emp_info as info on emp.emp_master_emp_info_id=info.emp_info_id
				INNER JOIN emp_department as dept on emp.emp_master_department_id= dept.emp_department_id 
				INNER join emp_designation as design on emp.emp_master_designation_id = design.emp_designation_id
				where m.created_by=$id";

					$result=$this->db->query($sql); 
					return $result->result();
		}
	}
	?>
