<?php

class DeleteModel extends CI_Model {
    
    
public function did_delete_row($id,$table,$where){
  $this -> db -> where($where, $id);
  $this -> db -> delete($table);
  return true;
}
}