<?php

class Admin_model extends CI_Model {
    
   
    public $id;

    public function id($value = NULL) {
        if (isset($value)) {
            $this->id = $value;
        } else {
            return $this->id;
        }
    }

        
    function __construct() {
        
    }
    
    //------------desenvolvido para DUMBU-LEADS------------------- 
         

}

?>