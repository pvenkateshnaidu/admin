<?php

class Attendance extends CI_Controller {

    public $userid;

    public function __construct() {
        parent::__construct();
        /* check user login and roles */
        if (!$this->session->has_userdata("adminlogintrue")) {
            redirect(base_url() . "login");
        }
        if ($this->session->userdata("role_id") != 2) {
            redirect('Dashboard', 'refresh');
        }
        $this->load->library('form_validation');
        $this->userid = $this->session->userdata("adminlogintrue");
        // to protect the controller to be accessed only by registered users
        //end
    }

    public function index() {
        $result = '';
        $success = '';
        $error = '';
        $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
        //  var_dump($result); exit;
        $html = $this->load->view('admin/collegelist', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }


}
