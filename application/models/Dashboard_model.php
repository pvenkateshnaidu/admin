<?php

class Dashboard_model extends CI_Model
{
    public function getLoggedInUserData($uid)
    {
        $this->db->where("mid",$uid);
        $res=$this->db->get("members");
        if($res->num_rows()>0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
    }
}
