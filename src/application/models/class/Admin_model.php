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
    public function get_users($filter = NULL){
         $user_rows = NULL;
         $this->load->model('class/user_status');            
         try{
            $this->db->select('*');
            $this->db->from('users');
            if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
            }
            $user_rows =  $this->db->get()->result_array();           
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante la verificacion de usario';
        } finally {
            return $user_rows;
        }
    }
    
        public function get_robots($filter = NULL){
         $robot_rows = NULL;
         $this->load->model('class/user_status');            
         try{
            $this->db->select('*');
            $this->db->from('robots_profiles');
            if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
            }
                if($filter['date_from']!='' && $filter['date_to']!=''){
                   $this->db->where('init >=',strtotime($filter['date_from'].' 00:00:00'));
                   $this->db->where('end <=',strtotime($filter['date_to'].' 23:59:59'));
                }
                
            
            $robot_rows =  $this->db->get()->result_array();           
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante la verificacion de usario';
        } finally {
            return $robot_rows;
        }
    }

         

}

?>