<?php

class AutModel extends CI_Model {

    function userCheck($user) {
        $this->db->select('*');
        $this->db->where('email', $user);
        $this->db->or_where('mobile', $user);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function checkUserCredentials($param) {
        $pas = $this->BaseModel->featchRow('members', 'mid,email,password,mobile,created_date', 'email:' . $param['email']);
      
        if ($pas !== FALSE) { 
	//	 if (hash_equals($pas->password, crypt($param['password'], $pas->password))) {
            if ($pas->password == $param['password']) {
				
				
                $lastLogin = $this->BaseModel->featchSingleField('userlog', 'logIn', 'userId:'.$pas->mid, '', 'id:desc', '1');
                $sessionArray = array(
                    'uId' => $pas->mid,
                    
                    'uWebStatus' => TRUE,
                    'uName' => ucwords($pas->email),
                    'regDate' => $pas->created_date,
                    'lastLogIn' => $lastLogin
                );
                $this->session->set_userdata($sessionArray);
                $data = array(
                    'userId' => $pas->mid,
                    'sessionId' => session_id(),
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'userAgent' => $this->input->user_agent(),
                    'logIn' => date('Y-m-d H:i:s')
                );
                $this->BaseModel->inserData('userlog', $data);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function changePassword($curPassword) {
        $pas = $this->BaseModel->featchSingleField('admin', 'password', 'id:' . $this->session->userdata('uId'));
        if ($pas !== FALSE) {
            if (hash_equals($pas, crypt($curPassword, $pas))) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
