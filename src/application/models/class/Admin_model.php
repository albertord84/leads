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
         $this->load->model('class/user_role');
         $this->load->model('class/payment_type');
         $identify=false;
         try{
            $this->db->select('users.id as id_usr, login, email, telf, status_id, amount_in_cents, status_date, payments.id as idpay, user_status.name as st_name');
            $this->db->from('users');
            $this->db->join('user_status','users.status_id = user_status.id');
            if(/*$filter['req_cam']||*/$filter['card_name'])
              $this->db->join('credit_cards', 'users.id = credit_cards.client_id','left');
            //$this->db->join('payments','users.id=payments.client_id','left');
            //if($filter['req_cam'])
                //$this->db->join('campaings','users.id=campaings.client_id');
            //$this->db->join('clients','users.id=clients.user_id','left');
          $this->db->where('role_id <>',$this->user_role::ADMIN);
             if(/*$filter['status_id']>0 &&*/ $filter['status_id']!= user_status::BEGINNER)
             {    
                $cnf=1;             
                 if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
                //$cnf=0;
              }
            
              if($filter['date_from']!=''){
                $this->db->where('status_date >=',strtotime($filter['date_from'].' 00:00:00'));
                $cnf=0;
              }
              if($filter['date_to']!=''){
                $this->db->where('status_date <=',strtotime($filter['date_to'].' 23:59:59'));
                //$cnf=0;
              }
             
              if( $filter['asn_date_to']!=''){
               $this->db->where('init_date <=',strtotime($filter['asn_date_to'].' 23:59:59'));
               //$cnf=0;
              }

              if($filter['asn_date_from']!=''){
               $this->db->where('init_date >=',strtotime($filter['asn_date_from'].' 00:00:00'));
                //$cnf=0;
              }
              
              
              /*if($filter['lst_access1']!=''){
               $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
               $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
            }*/
              if($filter['req_card'])
              {
              
                //$this->db->where(array('payments_type' => $this->payment_type::CREDIT_CARD));
                $frq= $filter['req_card']; 
                $this->db->where(array('payment_type' => "$frq"));
                $cnf=0;
              }
            
              if($filter['lst_access1']!=''){
               //if($filter['req_card'])
               //{
                $cnf=0;
                $this->db->where('date >=',strtotime($filter['lst_access1'].' 00:00:00'));
               //}  
              if($filter['req_cam'])
              {
               $this->db->where('created_date >=',strtotime($filter['campaigns_from'].' 00:00:00'));
                $cnf=0;
              } 
             //if(!$filter['req_card']&&!$filter['req_cam'])
             //{
             //  $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
             //  $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
             //}
               }   

              if($filter['lst_access3']!=''){
               //if($filter['req_card'])
               //{
                $cnf=0;
                $this->db->where('date <=',strtotime($filter['lst_access3'].' 23:59:59'));
               //}  
              if($filter['req_cam'])
              {
               $this->db->where('created_date <=',strtotime($filter['campaigns_to'].' 23:59:59'));
               $cnf=0;
              } 
             //if(!$filter['req_card']&&!$filter['req_cam'])
             //{
             //  $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
             //  $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
             //}
               }   
               
               if($filter['lst_access2']!=''|| $filter['lst_access4']!=''){
                  //$this->db->where('clients.last_accesed =null'); 
               
                 $this->db->join('clients','users.id=clients.user_id');    
                   // $cnf=0;
               }
               
               if($filter['lst_access2']!=''){
                 $this->db->where('last_accesed >=',strtotime($filter['lst_access2'].' 00:00:00'));
            //if(!$filter['req_card']&&!$filter['req_cam'])
             //{
             //  $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
             //  $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
             //}
                //$cnf=0;
               }   
               if($filter['lst_access4']!=''){
                 $this->db->where('last_accesed <=',strtotime($filter['lst_access4'].' 23:59:59'));
            //if(!$filter['req_card']&&!$filter['req_cam'])
             //{
             //  $this->db->where('clients.last_accesed >=',strtotime($filter['lst_access1'].' 00:00:00'));
             //  $this->db->where('clients.last_accesed <=',strtotime($filter['lst_access1'].' 23:59:59'));
             //}
                //$cnf=0;
               }
            
            //if($filter['req_cam'])
            //  $this->db->join('campaings','clients.user_id=campaings.client_id');
              if($filter['prf_client1']==''&& $filter['eml_client1']==''&&$filter['card_name']==''&&$filter['client_id']=='')
              {  
               $cnf=$cnf;
               
              }
              else 
              {
                  $cnf=1;
            if($filter['prf_client1']=='')
            {
                if($filter['eml_client1']=='')
                {
                    if($filter['client_id']=='')
                    {    
                        $card_name = $filter['card_name'];
                        $this->db->where(array('credit_card_name' => "$card_name"));
                    }
                    else {
                        $client1 = $filter['client_id'];
                        $this->db->where(array('users.id' => "$client1"));
                       
                    }
                    
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
                    
              if($cnf)
              { 
                $this->db->join('payments','users.id=payments.client_id','left');
              } 
              else 
              {
                $this->db->join('payments','users.id=payments.client_id');
              }
              if($filter['req_cam'])
                $this->db->join('campaings','users.id=campaings.client_id');

             }
             else
             {
              /*if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
              }*/
              $this->db->join('payments','users.id=payments.client_id','left');
              if($filter['status_id']){
                $status_id = $filter['status_id'];
                $this->db->where(array('status_id' => "$status_id"));
              }
            
              if($filter['date_from']!=''){
                $this->db->where('status_date >=',strtotime($filter['date_from'].' 00:00:00'));
              }
              if($filter['date_to']!=''){
                $this->db->where('status_date <=',strtotime($filter['date_to'].' 23:59:59'));
              }
             
              if( $filter['asn_date_to']!=''){
               $this->db->where('init_date <=',strtotime($filter['asn_date_to'].' 23:59:59'));
              }

              if($filter['asn_date_from']!=''){
               $this->db->where('init_date >=',strtotime($filter['asn_date_from'].' 00:00:00'));
              }

              
             }
         
            $user_rows =  $this->db->get()->result_array(); 
            /*$a=array();
            foreach ($user_rows as $usr) {
                foreach ($usr as $key => $value) {
                    $ide=$key;
                    
                } 
                if($usr['login']=='a')
                {
                    $a[$usr['id']]=1;
                }
            }
            $l= count($a);*/
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante la verificacion de usario';
        } finally {
            return $user_rows;
        }
    }
    
        public function insert_robot($datas){
                       
        $robot_row=NULL;
        try{

            $this->db->insert('robots_profiles',$datas);
            $robot_row = $this->db->insert_id();
    
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos';
        } finally {
            return $robot_row;
        }
        
    }

    
    public function update_robot($datas){
                       
        $id_robot=$datas['id'];
        $update_result;
        try{            
            foreach ($datas as $k => $dat) 
            {
             if($k!='id')
             {   
               $this->db->where('id',$id_robot);
               $this->db->update('robots_profiles', array($k => $dat));
               $update_result +=  $this->db->affected_rows();
             }
            }   
/*               $this->db->where('id',$id_robot);                        
               $this->db->update('robots_profiles', array(
                                'id' => $datas['id'],
                                'login' => $datas['login'],
                                'pass' => $datas['pass'],
                                'status_id' => $datas['status_id'],
                                'profile_theme' => $datas['profile_theme'],
                                'recuperation_email_account' => $datas['recuperation_email_account'],
                                'recuperation_email_pass' => $datas['recuperation_email_pass'],
                                'creator_email' => $datas['creator_email'],
                                'recuperation_phone' => $datas['recuperation_phone'],
                                'init' => $datas['init'],
                                'end' => $datas['end']
                                ));                                    
            */
            //$this->session->set_userdata('language', $language);                
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante el cancelamiento';
        } finally {
            return $update_result;
        }       
        
    }

    public function get_robot_by_id($filter = NULL){
         $robot_rows = NULL;
         $this->load->model('class/user_status');            
         try{
            $this->db->select('*');
            $this->db->from('robots_profiles');
            $id = $filter['id'];
            $this->db->where(array('id' => "$id"));
            $robot_rows =  $this->db->get()->result_array();           
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante la verificacion de usario';
        } finally {
            return $robot_rows;
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

    public function verify_account_user($id_user){
         $user_row = NULL;                     
         try{
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where( array('id' => $id_user) );    
            $user_row =  $this->db->get()->row_array();          
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante la verificacion de usario';
        } finally {
            return $user_row;
        }
    }  
    
    public function set_session_as_client($user_row, $session, $datas=NULL) {
        try {
            $this->load->model('class/user_role');
            $this->load->model('class/client_model');

            if ($user_row) {                
                $session->set_userdata('id', $user_row['id']);
                //$session->set_userdata('name', $user_row['name']);
                $session->set_userdata('login', $user_row['login']);                
                $session->set_userdata('brazilian', $user_row['brazilian']);
                //$session->set_userdata('email', $user_data['email']);
                //$session->set_userdata('telf', $user_data['telf']);
                $session->set_userdata('role_id', $user_row['role_id']);
                $session->set_userdata('status_id', $user_data['status_id']);
                $session->set_userdata('init_date', $user_data['init_date']);
                $session->set_userdata('language', $user_data['language']);                
                $session->set_userdata('module', "LEADS");                
                $session->set_userdata('admin', 1);                
                if($user_row['brazilian']==1){
                    $session->set_userdata('currency_symbol', "R$");               
                }
                else {
                    $session->set_userdata('currency_symbol', "US$");                
                }
                
                $session->set_userdata('is_admin', FALSE);
                
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante el login';
        }
    }

}

?>