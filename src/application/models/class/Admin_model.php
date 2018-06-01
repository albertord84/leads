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
            if($filter['status_id']!=$this->user_status::BEGINNER && $filter['status_id']!=0)
                $this->db->join('clients', 'clients.user_id = users.id');
            if($filter['card_name']!='')
            {
             $this->db->join('credit_cards', 'clients.user_id = credit_cards.client_id');
               
            }
          if($filter['prf_client1']==''&&$filter['eml_client1']==''&&$filter['card_name']==''){  
            if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
            }
            
            if($filter['date_from']!='' && $filter['date_to']!=''){
               $this->db->where('status_date >=',strtotime($filter['date_from'].' 00:00:00'));
               $this->db->where('status_date <=',strtotime($filter['date_to'].' 23:59:59'));
            }
            if($filter['asn_date_from']!='' && $filter['asn_date_to']!=''){
               $this->db->where('init_date >=',strtotime($filter['asn_date_from'].' 00:00:00'));
               $this->db->where('end_date <=',strtotime($filter['asn_date_to'].' 23:59:59'));
            }
            if($filter['lst_access1']!=''){
               $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
               $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
            }
            
          }
          else{
            if($filter['prf_client1']=='')
            {
                if($filter['eml_client1']=='')
                {
                        $card_name = $filter['card_name'];
                        $this->db->where(array('credit_card_name' => "$card_name"));
                }
                else
                {
                    $eml_client1 = $filter['eml_client1'];
                    $this->db->where(array('email' => "$eml_client1"));
                }
                
            }
            else
            {
                $prf_client1 = $filter['prf_client1'];
                $this->db->where(array('login' => "$prf_client1"));
            }
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