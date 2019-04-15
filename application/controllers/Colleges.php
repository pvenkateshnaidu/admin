<?php
class Colleges extends CI_Controller
{
    public $userid;
    public function __construct() {
        parent::__construct();
       /* check user login and roles */
        if(!$this->session->has_userdata("adminlogintrue"))
        {
            redirect(base_url()."login");
        }
        if($this->session->userdata("role_id")!=1)
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
        public function addNewCollege() {
        $result = '';
        $success ='';
        $error ='';
        $html = $this->load->view('admin/addNewCollege', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);

    }   
    /**
            Add College 
    */
    public function addCollege() {
        $result["success_message"]='';
         $result["error_message"]='';
        
          if ($this->form_validation->run('addCollege') == TRUE) {
                   $param = array(
                "college_name" => $this->input->post('college_name'),
                  "college_code" => $this->input->post('college_code'),
                'priniciple_name' => $this->input->post('priniciple_name'),
                "college_email" => $this->input->post('college_email'),
                "address" => $this->input->post('address'),
                 "mobile" => $this->input->post('mobile'),
                "city_id" =>  $this->input->post('city'),    
                "state_id" =>  $this->input->post('state'),             
                "created_date" => date('Y/m/d H:i:s'),
                'status' => 1
            );
             $insertResult = $this->BaseModel->inserData("colleges", $param);
             $insert_id = $this->db->insert_id();
             
             if($insertResult)
             {
              $param  = array(
                'email' => $this->input->post('college_email'), 
                'role_id' => 2,   
                'mobile' =>  $this->input->post('mobile'),
                'college_id' =>  $insert_id            

              );
               $iResult = $this->BaseModel->inserData("members", $param);
             }
              $this->session->set_tempdata("message","Well done! Successfully added new college.",2);
            //  $this->session->set_flashdata('message', 'Well done! Successfully added new college.');
             $result["success_message"]="Well done! Successfully added new college.";
             redirect(current_url());
          } 
        $html = $this->load->view('admin/addNewCollege', $result, TRUE);          
        $this->templet('home', $html, '', $result["error_message"], $result["success_message"]);
          

    }
        public function collegelist() {
        $result = '';
        $success ='';
        $error ='';
         $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
         //  var_dump($result); exit;
        $html = $this->load->view('admin/collegeList', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);

    }
public function editCollege($id){
    $where = array('cid' => $id );

     $result['college'] = $this->BaseModel->featchRow("colleges", '*', $where);
      $result['location']=$this->getLocationName($result['college']->city_id);
            // var_dump($result); exit;
        $html = $this->load->view('admin/editCollege', $result, TRUE);
        $this->templet('home', $html, '', '', '');
}
public function updateCollege($id)
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
        $html = $this->load->view('admin/editCollege', $result, TRUE);
        $this->templet('home', $html, '', '', '');

}

public function deleteCollege($id){
    $this->load->model("DeleteModel");
  $result = $this->DeleteModel->did_delete_row($id, 'colleges','cid');
  if($result==true)
  {
   $this->session->set_tempdata("message","Successfully Deleted  college.",2);
 }
       $result = '';
        $success ='';
        $error ='';
         $result['colleges'] = $this->BaseModel->featchData("colleges", '*');
         //  var_dump($result); exit;
        $html = $this->load->view('admin/collegelist', $result, TRUE);
        $this->templet('home', $html, '', $error, $success);
  
  
}
  public function getLocationName($cityId)
   {
    $this->load->model("Location_model");
    $result=$this->Location_model->getlocation($cityId);
return $result;
   }

   
    
}

