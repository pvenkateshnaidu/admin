<?php 
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("form");
		$this->load->library("form_validation");
		$this->load->database();
		$this->load->model("login_model");
	}
	public function index(){
            
            $this->form_validation->set_rules("email","email","required");
            $this->form_validation->set_rules("pass","Password","required");

            if($this->form_validation->run()==true)
            {
                    $email=$this->input->post("email");
                   // $pwd=md5($this->input->post("pass"));
                    $pwd=($this->input->post("pass"));

                    $data=$this->login_model->checkCredentials($email);
                    if($data)
                    {
                            if($data->password==$pwd)
                            {
                                    $this->session->set_userdata("adminlogintrue",$data->mid);
                                    $this->session->set_userdata("role_id",$data->role_id);
                                     $this->session->set_userdata("userid",$data->email);
                                    redirect(base_url()."dashboard");
                            }
                            else
                            {
                                    $this->session->set_tempdata("error","Sorry! Password does not matched",2);
                                    redirect(current_url());
                            }
                    }
                    else
                    {
                            $this->session->set_tempdata("error","Sorry! Email does not exists",2);
                            redirect(current_url());
                    }

            }
            else
            {
                    $this->load->view("login_view");
            }
		
		
	}
}