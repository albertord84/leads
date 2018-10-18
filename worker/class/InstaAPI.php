<?php



namespace leads\cls {
    
    
    class InstaAPI {

        public $Cookies = null;

        public function login($username, $password, $ip='207.188.155.18', $port='21316', $proxyuser='albertreye9917', $proxypass='3r4rcz0b1v') {
            \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;            
            $debug = false;
            $truncatedDebug = true;
            try {             
                $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug); 
                
                //$ig->setProxy("http://$proxyuser:$proxypass@$ip:$port");
                
                $loginResponse = $ig->login($username, $password);
                                
                $ig->client->loadCookieJar();
                $Cookies = array();
                $loginResponse = array();
                $Cookies['sessionid'] =  $ig->client->getCookie('sessionid')->getValue();              
                $Cookies['csrftoken'] =  $ig->client->getCookie('csrftoken')->getValue();
                $Cookies['ds_user_id'] = $ig->client->getCookie('ds_user_id')->getValue();
                $Cookies['mid'] =  $ig->client->getCookie('mid')->getValue();
                $loginResponse['Cookies'] =(object)$Cookies;                
                $this->Cookies = $loginResponse['Cookies'];
                return $ig;
            } catch (\Exception $e) {
                throw $e;
            }
        }

    }

}