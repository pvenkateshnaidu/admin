<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import extends CI_Controller {
  public $userid;
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata("adminlogintrue")) {
            redirect(base_url() . "login");
        }
        if ($this->session->userdata("role_id") != 2) {
            redirect('Dashboard', 'refresh');
        }
        $this->load->library('form_validation');
        $this->userid = $this->session->userdata("adminlogintrue");
        $this->load->library('excel');
        $this->load->model('Import_model', 'import');
    }

    // upload xlsx|xls file
    public function index() {
        $data = '';
        $success = '';
        $error = '';
        $data['page'] = 'import';
        $data['title'] = 'Import XLSX | TechArise';
        $html = $this->load->view('import/index', $data, TRUE);
        $this->templet('home', $html, '', $error, $success);
    }

    // import excel data
    public function save() {

        if ($this->input->post('importfile')) {

            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {

                $error = array('error' => $this->upload->display_errors());
            } else {

                $data = array('upload_data' => $this->upload->data());
            }
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    //  var_dump($allDataInSheet); exit;
                    $arrayCount = count($allDataInSheet);
                    $flag = 0;
                    $createArray = array(
                        "Acadamic_Year",
                        "Student_Code",
                        "Roll_No",
                        "First_Name",
                        'Last_Name',
                        'Email',
                        "Join_Date",
                        'DOB',
                        'Mobile_No',
                        "Gender",
                        "Blood_Group",
                        "Current_Address",
                        "Perminent_Address"
                    );
                    $makeArray = array(
                        "Acadamic_Year" => "Acadamic_Year",
                        "Student_Code" => "Student_Code",
                        "Roll_No" => "Roll_No",
                        "First_Name" => "First_Name",
                        'Last_Name' => 'Last_Name',
                        'Email' => 'Email',
                        "Join_Date" => "Join_Date",
                        'DOB' => 'DOB',
                        'Mobile_No' => 'Mobile_No',
                        "Gender" => "Gender",
                        "Blood_Group" => "Blood_Group",
                        "Current_Address" => "Current_Address",
                        "Perminent_Address" => "Perminent_Address"
                    );
                    $SheetDataKey = array();
                    //var_dump($allDataInSheet); exit;
                    foreach ($allDataInSheet as $dataInSheet) {
                        foreach ($dataInSheet as $key => $value) {
                            if (in_array(trim($value), $createArray)) {
                                $value = preg_replace('/\s+/', '', $value);
                                $SheetDataKey[trim($value)] = $key;
                            } else {
                                
                            }
                        }
                    }
                    $data = array_diff_key($makeArray, $SheetDataKey);
                    //var_dump($data); exit;
                    if (empty($data)) {
                        $flag = 1;
                    }
                    if ($flag == 1) {
                        for ($i = 2; $i <= $arrayCount; $i++) {
                            $addresses = array();
                            $acadamic = $SheetDataKey['Acadamic_Year'];
                            $firstName = $SheetDataKey['First_Name'];
                            $lastName = $SheetDataKey['Last_Name'];
                            $email = $SheetDataKey['Email'];
                            $dob = $SheetDataKey['DOB'];
                            $contactNo = $SheetDataKey['Mobile_No'];
                            $stucode = $SheetDataKey['Student_Code'];
                            $roll_no = $SheetDataKey['Roll_No'];
                            $join_date = $SheetDataKey['Join_Date'];
                            $gender = $SheetDataKey['Gender'];
                            $blood_group = $SheetDataKey['Blood_Group'];
                            $Current_Address = $SheetDataKey['Current_Address'];
                            $Perminent_address = $SheetDataKey['Perminent_Address'];

                            $acadamic = filter_var(trim($allDataInSheet[$i][$acadamic]), FILTER_SANITIZE_STRING);
                            $firstName = filter_var(trim($allDataInSheet[$i][$firstName]), FILTER_SANITIZE_STRING);
                            $lastName = filter_var(trim($allDataInSheet[$i][$lastName]), FILTER_SANITIZE_STRING);
                            $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
                            $dob = filter_var(trim($allDataInSheet[$i][$dob]), FILTER_SANITIZE_STRING);
                            $contactNo = filter_var(trim($allDataInSheet[$i][$contactNo]), FILTER_SANITIZE_STRING);
                            $stucode = filter_var(trim($allDataInSheet[$i][$stucode]), FILTER_SANITIZE_STRING);
                            $roll_no = filter_var(trim($allDataInSheet[$i][$roll_no]), FILTER_SANITIZE_STRING);
                            $gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);
                            $join_date = filter_var(trim($allDataInSheet[$i][$join_date]), FILTER_SANITIZE_STRING);
                            $blood_group = filter_var(trim($allDataInSheet[$i][$blood_group]), FILTER_SANITIZE_STRING);
                            $Current_Address = filter_var(trim($allDataInSheet[$i][$Current_Address]), FILTER_SANITIZE_STRING);
                            $Perminent_address = filter_var(trim($allDataInSheet[$i][$Perminent_address]), FILTER_SANITIZE_STRING);

                            $param = array(
                                "acadamic_year" => $acadamic,
                                "created_by" => $this->userid,
                                'stu_unique_id' => $stucode,
                                "stu_roll_number" => $roll_no,
                                "stu_first_name" => $firstName,
                                "stu_middle_name" => $lastName,
                                "stu_last_name" => $lastName,
                                "stu_dob" => $dob,
                                "stu_admission_date" => $join_date,
                                "stu_gender" => $gender,
                                "stu_bloodgroup" => $blood_group,
                                "stu_birthplace" => '',
                            );
                            $param2 = array(
                                "stu_padd" => $Current_Address,
                                "stu_cadd" => $Perminent_address,
                            );
                            $param3 = array(
                                "email" => $email,
                                "mobile" => $contactNo,
                                "role_id" => 5,
                                'college_id' => $this->get_current_user_collegeId(),
                                'created_by' => $this->userid,
                                'status' => 1
                            );
                            $param4 = array(
                                "stu_master_course_id" => 1,
                                'created_by' => $this->userid,
                                "stu_master_batch_id" => 1,
                            );
                            if (!empty($stucode)) {
                                 
                                $this->load->model("Student_model");
                                $resultValue = $this->Student_model->insertStudent($param, $param2, $param3, $param4);
                            }
                        }
                        $this->session->set_tempdata("message", "Well done! Imported Students .", 2);
                    } else {
                        echo "Please import correct file";
                    }
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' . $e->getMessage());
                }
            } else {
                echo $error['error'];
            }
        }
        $data = '';
        $success = '';
        $error = '';
        $data['page'] = 'import';
        $data['title'] = 'Import XLSX | TechArise';
        $html = $this->load->view('import/index', $data, TRUE);
        $this->templet('home', $html, '', $error, $success);
        //$this->load->view('Import/display');
    }

    public function get_current_user_collegeId() {

        $where = array('mid' => $this->userid,);
        $result = $this->BaseModel->featchRow("members", 'college_id', $where);
        return $result->college_id;
    }

    public function downloadFile() {
        $this->load->helper('download');
        $data = 'Here is some text!';
        $name = 'mytext.txt';
        $data = file_get_contents("uploads/Students.xlsx"); // Read the file's contents
        $name = 'Students.xlsx';
        force_download($name, $data);
        force_download($name, $data);
    }

}


