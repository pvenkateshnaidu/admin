<?php
class Location extends CI_Controller
{
      public  $data;

   public function __construct() {
        parent::__construct();
      }
 // Fetch all countries list
   public  function fgetCountries() {

     try {
          $wparam =array(
                          'id' => 101
                      );    

       $res = array();
       $result =$this->BaseModel->featchData("countries", '*',$wparam);
         if(!$result) {
         throw new exception("Country not found.");
       }
       foreach($result as $resultSet )
       {
        $res[$resultSet->id] = $resultSet->name;
      
       }
    
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Countries fetched successfully.", 'result'=>$res);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
    //  var_dump($data);
     }
    
   }

  // Fetch all states list by country id
  public  function fgetStates($countryId) {

     try {
            $wparam =array(
                'country_id' => $countryId
            );
       $result =$this->BaseModel->featchData("states", '*',$wparam,'','','40');
      
       if(!$result) {
         throw new exception("State not found.");
       }
       $res = array();
         foreach($result as $resultSet )
       {
        $res[$resultSet->id] = $resultSet->name;
      
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"States fetched successfully.", 'result'=>$res);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
         //  var_dump($data);
     }
   }
  function getStates() {
        $param = $this->input->post();
        $updateresult['result'] = $this->BaseModel->featchData("states", '*', $param, '', '', '30');
        $html = $this->load->view('extra/states', $updateresult, TRUE);
        echo $html;
        die();
    }

    function getCountries() {
        $param = $this->input->post();
     //  echo "dsfc"; exit;
        $updateresult['result'] = $this->BaseModel->featchData("cities", '*', $param, '', '', '300');
        $html = $this->load->view('extra/cities', $updateresult, TRUE);
        echo $html;
        die();
    }
 // Fetch all cities list by state id
  public  function fgetCities($stateId) {
    
           try {
                      $wparam =array(
                          'state_id' => $stateId
                      );
                 $result =$this->BaseModel->featchData("cities", '*',$wparam,'','','300');
                
                 if(!$result) {
                   throw new exception("City not found.");
                 }
                 $res = array();
                   foreach($result as $resultSet )
                 {
                  $res[$resultSet->id] = $resultSet->name;
                
                 }
                 $data = array('status'=>'success', 'tp'=>1, 'msg'=>"City fetched successfully.", 'result'=>$res);
               } catch (Exception $e) {
                 $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
               } finally {
                  return $data;
               }

   }   

   public function getApi()
   {

     

          try {
            if(!isset($_GET['type']) || empty($_GET['type'])) {
              throw new exception("Type is not set.");
            }
            $type = $_GET['type'];
            if($type=='fgetCountries') {
              $data = $this->fgetCountries();
            } 

            if($type=='fgetStates') {
               if(!isset($_GET['countryId']) || empty($_GET['countryId'])) {
                throw new exception("Country Id is not set.");
               }
               $countryId = $_GET['countryId'];
               $data = $this->fgetStates($countryId);
            }

             if($type=='fgetCities') {
               if(!isset($_GET['stateId']) || empty($_GET['stateId'])) {
                throw new exception("State Id is not set.");
               }
               $stateId = $_GET['stateId'];
               $data = $this->fgetCities($stateId);
            }

          } catch (Exception $e) {
             $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
          } finally {
            echo json_encode($data);
          }
   }
   public function getLocationName($cityId)
   {
    $this->load->model("Location_model");
    $result=$this->Location_model->getlocation($cityId);

   }

}

