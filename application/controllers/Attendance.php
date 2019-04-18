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
        $where = array(
            "status" => 1,
            "created_by" => $this->userid
        );
        $result['courses'] = $this->BaseModel->featchData("courses", '*', $where);
        $result['batches'] = $this->BaseModel->featchData("batches", '*', $where);
        $result['subjects'] = $this->BaseModel->featchData("subjects", '*', $where);
        //  var_dump($result); exit;
        $html = $this->load->view('admin/studentAttendance', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    public function Viewdropdown() {
        $result = '';
        $cid = $this->input->post('courseid');
        if (isset($cid)) {
            $where = array(
                "status" => 1,
                "created_by" => $this->userid,
                "course_id" => $cid
            );
            $result['batches'] = $this->BaseModel->featchData("batches", '*', $where);
            $html = $this->load->view('extra/dropdown', $result, TRUE);
            echo $html;
            die;
        }
    }

    public function Attendencelist_sub() {
        $result = '';
        $courseId = $this->input->post('courseid');
        $batchId = $this->input->post('batchid');
        $subjectId = $this->input->post('subjectid');
        $this->load->model("Student_model");
        $result['studentList'] = $this->Student_model->listviewStudentAttendance($this->userid, $courseId, $batchId, $subjectId);

        $html = $this->load->view('extra/studentList', $result, TRUE);
        echo $html;
        die();
    }

    public function Conformationfordeletingattendance()
   {
        $subjectid = $this->input->post('subjectid');
        $student = $this->input->post('studentids');
        $date = $this->input->post('date');
        $attendanceby =  $this->userid;
        $studentPresents=array_values(array_filter(json_decode(stripslashes($student))));
        
       
        echo "hi";
        exit;
    }

    public function Saveattendence() {
        
        $courseId = $this->input->post('courseid');
        $batchId = $this->input->post('batchid');
        $subjectId = $this->input->post('subjectid');
        $studentPresents = $this->input->post('sendarray');
        $studentAbsents = $this->input->post('studentabsentarray');
        $date = $this->input->post('date');
        $attendanceby =  $this->userid;
        $studentPresents=array_values(array_filter(json_decode(stripslashes($studentPresents))));
        $studentAbsents=array_values(array_filter(json_decode(stripslashes($studentAbsents))));
       //var_dump($studentPresents);exit;
        for($i=0;$i<sizeof($studentPresents);$i++)
        {
            $result[]=array("member_id"=>$studentPresents[$i],
                "course_id"=>$courseId,
                "batch_id"=>$batchId,
                "subject_id"=>$subjectId,
                "remarks"=>"",
                "date"=>$date,
                "attendance_by"=>$attendanceby,
                "mark"=>"P",
               );
        }
        for($i=0;$i<sizeof($studentAbsents);$i++)
        {
            $result[]=array("member_id"=>$studentAbsents[$i],
                "course_id"=>$courseId,
                "batch_id"=>$batchId,
                "subject_id"=>$subjectId,
                "remarks"=>"",
                "date"=>$date,
                "attendance_by"=>$attendanceby,
                "mark"=>"A",
               );
        }
        
            $this->load->model("Attendance_model");
            $this->Attendance_model->setBatchImport($result);
            $this->Attendance_model->importData();
        
        echo "hi";
        exit;
    }

}
