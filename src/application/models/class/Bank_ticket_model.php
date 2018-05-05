<?php

class bank_ticket_model extends CI_Model {
    
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
    
    public function insert_bank_ticket($datas){        
        $ticket_row = NULL;
        try{            
            $data_ticket['client_id'] = $datas['client_id'];            
            $data_ticket['emission_money_value'] = $datas['emission_money_value'];
            $data_ticket['amount_payed_value'] = 0;
            $data_ticket['amount_used_value'] = 0;
            $data_ticket['generated_date'] = time();
            $data_ticket['payed'] = 0;
            $data_ticket['payed_date'] = NULL;
            $data_ticket['cpf'] = $datas['cpf'];
            $data_ticket['name_in_ticket'] = $datas['name_in_ticket'];
            $data_ticket['ticket_link'] = $datas['ticket_link'];
            $data_ticket['document_number'] = $datas['document_number'];
            $data_ticket['ticket_order_key'] = $datas['ticket_order_key'];
            $data_ticket['ticket_bank_option'] = NULL;
            $data_ticket['cep'] = $datas['cep'];
            $data_ticket['street_address'] = $datas['street_address'];
            $data_ticket['house_number'] = $datas['house_number'];
            $data_ticket['neighborhood_address'] = $datas['neighborhood_address'];
            $data_ticket['municipality_address'] = $datas['municipality_address'];
            $data_ticket['state_address'] = $datas['state_address'];
            
            $this->db->insert('bank_ticket',$data_ticket);
            $ticket_row = $this->db->insert_id();
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos';
        } finally {
            return $ticket_row;
        }
    }

    public function update_bank_ticket($datas){        
        $ticket_row = NULL;
        try{
            $data_ticket['amount_used_value'] = $datas['amount_used_value'];
            $this->db->where('client_id', $datas['client_id']);
            $this->db->where('id', $datas['id']);
            $this->db->update('bank_ticket',$data_ticket);
            $ticket_row = $this->db->affected_rows();
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos';
        } finally {
            return $ticket_row;
        }
    }
    
    public function get_charged_bank_ticket($id_client){        
        $ticket_row = NULL;
        try{
            $this->db->select('*');
            $this->db->from('bank_ticket');
            $this->db->where( array('client_id' => $id_client) );                       
            $ticket_row =  $this->db->get()->result_array();
            
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos';
        } finally {
            return $ticket_row;
        }
    }
 
    public function get_number_order(){        
        $number_row = NULL;
        try{
            $this->db->select('value');
            $this->db->from('dumbu_emails_system_config');
            $this->db->where( array('name' => 'ORDER_NUMBER') );                       
            $number_row =  $this->db->get()->row_array();

            $this->db->set('value', 'value+1', FALSE);       
            $this->db->where( array('name' => 'ORDER_NUMBER') );                       
            $this->db->update('dumbu_emails_system_config');

            $this->db->select('value');
            $this->db->from('dumbu_emails_system_config');
            $this->db->where( array('name' => 'ORDER_NUMBER') );                               
            $new_number_row =  $this->db->get()->row_array();
            
            if($new_number_row['value'] != $number_row['value']+1){
                $number_row = NULL;
            }    
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos';
        } finally {
            return $number_row;
        }
        
    }
    
}

?>