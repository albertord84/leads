<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Robot extends CI_Controller {
    
    //------------ADMIN desenvolvido para DUMBU-LEADS-------------------   
    public function load_language($language = NULL){
        if (!$this->session->userdata('id')){
            
            $this->load->model('class/system_config');
            $GLOBALS['sistem_config'] = $this->system_config->load();
            if($language != "PT" && $language != "EN" && $language != "ES")
                $language = NULL;
            if(!$language)
                $GLOBALS['language'] = $GLOBALS['sistem_config']->LANGUAGE;            
            else
                $GLOBALS['language'] = $language;
        }
        else
        {
            $GLOBALS['language'] = $this->session->userdata('language');
        }
    }
    
    
    public function index() {    
        $this->load->model('class/user_role');        
        if ($this->session->userdata('role_id')==user_role::ADMIN){
            $this->load->view('robot_view', $param);
        }
    }
       
    public function T($token, $array_params=NULL, $lang=NULL) {
        if(!$lang){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
            $GLOBALS['sistem_config'] = new dumbu\cls\system_config();
            if(isset($language['language']))
                $param['language']=$language['language'];
            else
                $param['language'] = $GLOBALS['sistem_config']->LANGUAGE;
            $param['SERVER_NAME'] = $GLOBALS['sistem_config']->SERVER_NAME;        
            $GLOBALS['language']=$param['language'];
            $lang=$param['language'];
        }
        $this->load->model('class/translation_model');
        $text = $this->translation_model->get_text_by_token($token,$lang);
        $N = count($array_params);
        for ($i = 0; $i < $N; $i++) {
            $text = str_replace('@' . ($i + 1), $array_params[$i], $text);
        }
        return $text;
    }
     
    
}

