<?php

class Dashboard extends CI_Controller {

    public $userid;
    public $roleid;

    public function __construct() {
        parent::__construct();

        if (!$this->session->has_userdata("adminlogintrue")) {
            redirect(base_url() . "login");
        }
        $this->load->library('form_validation');
        $this->load->model("dashboard_model");
        $this->userid = $this->session->userdata("adminlogintrue");
        $this->userid = $this->session->userdata("adminlogintrue");
        $this->role_id = $this->session->userdata("role_id");
    }

    public function index() {
        $data['user'] = $this->dashboard_model->getLoggedInUserData($this->userid);
        $result = '';
        $error = '';
        $success = '';
        
        
        if ($this->role_id == 2) {            
            $where = array("role_id" => 3,"created_by"=>$this->userid);
            $data['employeess'] = $this->BaseModel->featchCountOfRows("members", $where);
             $where = array("role_id" => 5,"created_by"=>$this->userid);
            $data['students'] = $this->BaseModel->featchCountOfRows("members", $where);
            $this->load->model("Student_model");
            $data['studentList'] = $this->Student_model->listviewStudent($this->userid);
             $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $data['courses'] = $this->BaseModel->featchCountOfRows("courses",$where);
         $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $data['classes'] = $this->BaseModel->featchCountOfRows("batches",$where);
            $html = $this->load->view('dashboard_p_view', $data, TRUE);
        } else if ($this->role_id == 1) {
           
            $data['total_college_count'] = $this->BaseModel->featchCountOfRows("colleges");
            $where = array('status' => 1,);
            $data['active_colleges'] = $this->BaseModel->featchCountOfRows("colleges", $where);
            $html = $this->load->view('dashboard_view', $data, TRUE);
        }else{
           
            $html = $this->load->view('dashboard_other_view', $data, TRUE);
        }
        $this->templet('home', $html, '', $error, $success);
    }

    public function addNewCollege() {
        $result = '';
        $success = '';
        $error = '';
        $html = $this->load->view('admin/addNewCollege', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    /**
      Add College
     */
    public function addCollege() {
        $result["success_message"] = '';
        $result["error_message"] = '';

        if ($this->form_validation->run('addCollege') == TRUE) {
            $param = array(
                "college_name" => $this->input->post('college_name'),
                "college_code" => $this->input->post('college_code'),
                'priniciple_name' => $this->input->post('priniciple_name'),
                "college_email" => $this->input->post('college_email'),
                "address" => $this->input->post('address'),
                "city_id" => $this->input->post('city'),
                "created_date" => date('Y/m/d H:i:s'),
                'status' => 1
            );
            $this->BaseModel->inserData("colleges", $param);
            $this->session->set_tempdata("<?php echo anchor('controller/function/parameter', 'Delete'); ?>", "Well done! Successfully added new college.", 2);
            //  $this->session->set_flashdata('message', 'Well done! Successfully added new college.');
            $result["success_message"] = "Well done! Successfully added new college.";
            redirect(current_url());
        }
        $html = $this->load->view('admin/addNewCollege', $result, TRUE);
        $this->templet('home', $html, '', $result["error_message"], $result["success_message"]);
    }

    public function collegelist() {
        $result = '';
        $success = '';
        $error = '';
        $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
        //  var_dump($result); exit;
        $html = $this->load->view('admin/collegelist', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function logout() {
        $this->session->unset_userdata("adminlogintrue");
        redirect(base_url() . "login");
    }

}
