<?php
class Teacher extends CI_Controller
{
    public $userid;
    public function __construct() {
        parent::__construct();
       /* check user login and roles */
        if(!$this->session->has_userdata("adminlogintrue"))
        {
            redirect(base_url()."login");
        }
        if($this->session->userdata("role_id")!=2)
        {
           redirect('Dashboard', 'refresh');
        }
        $this->load->library('form_validation');       
        $this->userid=$this->session->userdata("adminlogintrue");
 // to protect the controller to be accessed only by registered users


      //end


    }
    public function index()
    {
       $result = '';
        $success ='';
        $error ='';
         $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
         //  var_dump($result); exit;
        $html = $this->load->view('admin/collegelist', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
       
    }
  
    /**
            Add Teacher 
    */
    public function get_current_user_collegeId()
    {
     
     $where = array('mid' =>  $this->userid, );
     $result = $this->BaseModel->featchRow("members", 'college_id', $where);
      return $result->college_id;

    }
    public function addTeacher() {
         ob_start();
      $result= array();
        $result["success_message"]='';
         $result["error_message"]='';
        
          if ($this->form_validation->run('addStaff') == TRUE) {
                   $param = array(
                "emp_name" => $this->input->post('employee_name'),
                'emp_unique_id' => $this->input->post('employee_code'),
                "emp_mobile_no" => $this->input->post('mobile'),
                "emp_gender" => $this->input->post('gender'),               
                "emp_joining_date" =>  $this->input->post('join_date'),    
                "emp_dob" =>  $this->input->post('date_of_birth'),
                 "emp_experience_year" =>  $this->input->post('total_exp'),   
                  "emp_qualification" =>  $this->input->post('qualification'),   
               
            );
                   $param2 = array(
              "emp_padd" => $this->input->post('paddress'),
            "emp_cadd" => $this->input->post('caddress'),           
                  );
                $param3 = array(
              "email" => $this->input->post('email'),
              "mobile" => $this->input->post('mobile'),  
              "role_id" =>  $this->input->post('employee_type'),  
              'college_id' =>$this->get_current_user_collegeId(),
              'created_by' => $this->userid,
              'status' =>"Active"
                  );
                $param4 = array(
                  "emp_master_department_id" =>  $this->input->post('department'),
                    "emp_master_designation_id" =>  $this->input->post('designation'),
                );
             $this->load->model("Teacher_model");
             $resultValue = $this->Teacher_model->insertStaff( $param, $param2, $param3,$param4);
             if($resultValue==true)
             {
              $this->session->set_tempdata("message","Well done! Successfully added .",2);
              redirect(current_url());

            }
            }
           /* Display data */
             $whereRoles = array('parent_id' =>2 );
             $result['roles'] = $this->BaseModel->featchData("roles", '*',$whereRoles);
             $result['departments'] = $this->BaseModel->featchData("emp_department");
             $result['designations'] = $this->BaseModel->featchData("emp_designation");
             $html = $this->load->view('admin/addStaff', $result, TRUE);          
             $this->templet('home', $html, '', $result["error_message"], $result["success_message"]);
          

    }
        public function TeachersList() {
        $result = '';
        $success ='';
        $error ='';
        $this->load->model("Teacher_model");
        $result['staffList']=$this->Teacher_model->listviewStaff($this->userid);
   
        $html = $this->load->view('admin/liststaff', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);

    }
public function editTeacher($id){
    $where = array('cid' => $id );

     $result['college'] = $this->BaseModel->featchRow("colleges", '*', $where);
      $result['location']=$this->getLocationName($result['college']->city_id);
            // var_dump($result); exit;
        $html = $this->load->view('admin/editStaff', $result, TRUE);
        $this->templet('home', $html, '', '', '');
}
public function updateTeacher($id)
{
    $where = array('cid' => $id );
  if (!empty($id)) {
    $param  = array(
      "college_name" => $this->input->post('college_name'),
                  "college_code" => $this->input->post('college_code'),
                'priniciple_name' => $this->input->post('priniciple_name'),
                "college_email" => $this->input->post('college_email'),
                "address" => $this->input->post('address'),
                 "mobile" => $this->input->post('mobile'),
                "city_id" =>  $this->input->post('city'),
                  "state_id" =>  $this->input->post('state'), 
    );
 $result['college'] = $this->BaseModel->updateData("colleges", $param, $where);
   $this->session->set_tempdata("message","Successfully Updated  college.",2);

  }
     $result['college'] = $this->BaseModel->featchRow("colleges", '*', $where);
         //  var_dump($result); exit;
        $html = $this->load->view('admin/editStaff', $result, TRUE);
        $this->templet('home', $html, '', '', '');

}

public function deleteTeacher($id){
    $this->load->model("DeleteModel");
  $result = $this->DeleteModel->did_delete_row($id, 'members','mid');
  if($result==true)
  {
   $this->session->set_tempdata("message","Successfully Deleted  college.",2);
 }
       $result = '';
        $success ='';
        $error ='';
          $this->load->model("Teacher_model");
        $result['staffList']=$this->Teacher_model->listviewStaff();
         //  var_dump($result); exit;
        $html = $this->load->view('admin/listStaff', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
  
  
}
  public function getLocationName($cityId)
   {
    $this->load->model("Location_model");
    $result=$this->Location_model->getlocation($cityId);
return $result;
   }

   
    
}

