<?php

class Student extends CI_Controller {

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

    public function addBatch() {
        $result = '';
        $success = '';
        $error = '';

        if ($this->form_validation->run('addBatch') == TRUE) {
            $param = array(
                "batch_name" => $this->input->post('batch_name'),
                "course_id" => $this->input->post('courseid'),
                "max_students" => $this->input->post('maxnoofstudents'),
                "created_by" => $this->userid,
                "start_date" => $this->input->post('batch_startdate'),
                "end_date" => $this->input->post('batch_enddate'),
            );
            $insertResult = $this->BaseModel->inserData("batches", $param);
            $this->session->set_tempdata("message", "Well done! Successfully added Batch.", 2);
        }

        $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $result['courses'] = $this->BaseModel->featchData("courses", '*', $where);
        //  var_dump($result); exit;
        $html = $this->load->view('admin/addBatch', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function addCourse() {
        $result = '';
        $success = '';
        $error = '';
        if ($this->form_validation->run('addCourse') == TRUE) {
            $param = array(
                "course_name" => $this->input->post('course_name'),
                "course_code" => $this->input->post('course_code'),
                "total_work_days" => $this->input->post('total_work_days'),
                "created_by" => $this->userid,
                "course_description" => $this->input->post('course_description'),
                "syllabus_name" => $this->input->post('syllabus_name'),
            );
            $insertResult = $this->BaseModel->inserData("courses", $param);
            $this->session->set_tempdata("message", "Well done! Successfully added Course.", 2);
        }
        // $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
        //  var_dump($result); exit;
        $html = $this->load->view('admin/addCourse', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function addSubject() {
        $result = '';
        $success = '';
        $error = '';
        // $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
        if ($this->form_validation->run('addSubject') == TRUE) {
            $param = array(
                "subject_name" => $this->input->post('subject_name'),
                "subject_code" => $this->input->post('subject_code'),
                "description" => $this->input->post('subject_description'),
                "created_by" => $this->userid,
            );
            $insertResult = $this->BaseModel->inserData("subjects", $param);
            $this->session->set_tempdata("message", "Well done! Successfully added Subject.", 2);
        }
        //  var_dump($result); exit;
        $html = $this->load->view('admin/addSubject', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    /**
      Add Teacher
     */
    public function get_current_user_collegeId() {

        $where = array('mid' => $this->userid,);
        $result = $this->BaseModel->featchRow("members", 'college_id', $where);
        return $result->college_id;
    }

    public function addStudent() {
        $result = array();
        $result["success_message"] = '';
        $result["error_message"] = '';


        if ($this->form_validation->run('addStudent') == TRUE) {
            $param = array(
                "acadamic_year" => $this->input->post('academicid'),
                "created_by"=>  $this->userid,
                'stu_unique_id' => $this->input->post('student_admissionno'),
                "stu_roll_number" => $this->input->post('student_rollno'),
                "stu_first_name" => $this->input->post('student_firstname'),
                "stu_middle_name" => $this->input->post('student_middlename'),
                "stu_last_name" => $this->input->post('student_lastname'),
                "stu_dob" => $this->input->post('student_dob'),
                "stu_admission_date" => $this->input->post('student_admissiondate'),
                "stu_gender" => $this->input->post('student_gender'),
                "stu_bloodgroup" => $this->input->post('student_bloodgroup'),
                "stu_birthplace" => $this->input->post('student_birthplace'),
            );
            $param2 = array(
                "stu_padd" => $this->input->post('student_p_address'),
                "stu_cadd" => $this->input->post('student_c_address1'),
            );
            $param3 = array(
                "email" => $this->input->post('student_email'),
                "mobile" => $this->input->post('mobile'),
                "role_id" => 5,
                'college_id' => $this->get_current_user_collegeId(),
                'created_by' => $this->userid,
                'status' => 1
            );
            $param4 = array(
                "stu_master_course_id" => $this->input->post('courseid'),
                 'created_by' => $this->userid,
                "stu_master_batch_id" => $this->input->post('batchid'),
              
            );
            $this->load->model("Student_model");
            $resultValue = $this->Student_model->insertStudent($param, $param2, $param3, $param4);
            if ($resultValue == true) {
                $this->session->set_tempdata("message", "Well done! Successfully added .", 2);
                redirect(current_url());
            }
        }
        /* Display data */
        $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $result['batches'] = $this->BaseModel->featchData("batches", '*', $where);
        $result['courses'] = $this->BaseModel->featchData("courses", '*', $where);
        $html = $this->load->view('admin/addStudent', $result, TRUE);
        $this->templet('home', $html, '', $result["error_message"], $result["success_message"]);
    }

    public function studentList() {
        $result = '';
        $success = '';
        $error = '';
        $this->load->model("Student_model");
        $result['studentList'] = $this->Student_model->listviewStudent($this->userid);

        $html = $this->load->view('admin/listStudents', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }
    public function viewStudent($id) {
        $result = '';
        $success = '';
        $error = '';
        $this->load->model("Student_model");
         $result['studentList'] = $this->Student_model->singleviewStudent($this->userid,$id);
    
         $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $result['batches'] = $this->BaseModel->featchData("batches", '*', $where);
        $result['courses'] = $this->BaseModel->featchData("courses", '*', $where);
        $html = $this->load->view('admin/viewStudent', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function listCourses() {
        $result = '';
        $success = '';
        $error = '';
        $where = array('status' => 1, "created_by" => $this->userid);
        $result['courses'] = $this->BaseModel->featchData("courses", '*', $where);

        $html = $this->load->view('admin/listCourses', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function listBatches() {
        $result = '';
        $success = '';
        $error = '';
        $where = array('status' => 1, "created_by" => $this->userid);
        $result['batches'] = $this->BaseModel->featchData("batches", '*', $where);

        $html = $this->load->view('admin/listBatches', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function listSubjects() {
        $result = '';
        $success = '';
        $error = '';
        $where = array('status' => 1, "created_by" => $this->userid);
        $result['subjects'] = $this->BaseModel->featchData("subjects", '*', $where);

        $html = $this->load->view('admin/listSubjects', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function editStudent($id) {
        $where = array('cid' => $id);

        $result['college'] = $this->BaseModel->featchRow("colleges", '*', $where);
        $result['location'] = $this->getLocationName($result['college']->city_id);
        // var_dump($result); exit;
        $html = $this->load->view('admin/editStaff', $result, TRUE);
        $this->templet('home', $html, '', '', '');
    }

    public function updateStudent($id) {
        $where = array('cid' => $id);
        if (!empty($id)) {
            $param = array(
                "college_name" => $this->input->post('college_name'),
                "college_code" => $this->input->post('college_code'),
                'priniciple_name' => $this->input->post('priniciple_name'),
                "college_email" => $this->input->post('college_email'),
                "address" => $this->input->post('address'),
                "mobile" => $this->input->post('mobile'),
                "city_id" => $this->input->post('city'),
                "state_id" => $this->input->post('state'),
            );
            $result['college'] = $this->BaseModel->updateData("colleges", $param, $where);
            $this->session->set_tempdata("message", "Successfully Updated  college.", 2);
        }
        $result['college'] = $this->BaseModel->featchRow("colleges", '*', $where);
        //  var_dump($result); exit;
        $html = $this->load->view('admin/editStaff', $result, TRUE);
        $this->templet('home', $html, '', '', '');
    }

    public function deleteStudent($id) {
        $this->load->model("DeleteModel");
        $result = $this->DeleteModel->did_delete_row($id, 'members', 'mid');
        if ($result == true) {
            $this->session->set_tempdata("message", "Successfully Deleted  college.", 2);
        }
        $result = '';
        $success = '';
        $error = '';
        $this->load->model("Teacher_model");
        $result['staffList'] = $this->Teacher_model->listviewStaff();
        //  var_dump($result); exit;
        $html = $this->load->view('admin/listStaff', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

}
