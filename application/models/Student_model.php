<?php

class Student_model extends CI_Model {

    public function insertStudent($stu_info, $stu_add, $member, $stu_master) {

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
        $result = $this->db->insert('stu_info', $stu_info);
        $emp_info_id = $this->db->insert_id();
        $result = $this->db->insert('stu_address', $stu_add);
        $emp_add_id = $this->db->insert_id();

        $emp_master_details = array('stu_master_stu_info_id' => $emp_info_id,
            'stu_master_stu_address_id' => $emp_add_id
        );
        $emp_master_details = array_merge($stu_master, $emp_master_details);
        $result = $this->db->insert('stu_master', $emp_master_details);
        $emp_master_id = $this->db->insert_id();
        $members = array('stu_master_id' => $emp_master_id);
        $allmembers = array_merge($member, $members);
        if ($result == true)
            $result = $this->db->insert('members', $allmembers);
        $this->db->trans_complete(); # Completing transaction
        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        } else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function listviewStudent($id) {
        $sql = "SELECT * FROM members m INNER JOIN stu_master as stu on m.stu_master_id=stu.stu_master_id 
INNER JOIN stu_info as info on stu.stu_master_stu_info_id=info.stu_info_id 
INNER JOIN courses as c on stu.stu_master_course_id=c.id
INNER JOIN batches as b on stu.stu_master_batch_id = b.id
where m.created_by=$id";

        $result = $this->db->query($sql);
        return $result->result();
    }
        public function singleviewStudent($id,$stid) {
        $sql = "SELECT * FROM members m INNER JOIN stu_master as stu on m.stu_master_id=stu.stu_master_id 
INNER JOIN stu_info as info on stu.stu_master_stu_info_id=info.stu_info_id 
INNER JOIN courses as c on stu.stu_master_course_id=c.id
INNER JOIN batches as b on stu.stu_master_batch_id = b.id
where m.created_by=$id AND  m.mid=$stid";

        $result = $this->db->query($sql);
        return $result->result();
    }

}

?>
