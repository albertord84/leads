<!DOCTYPE html>
<html lang="pt-BR">
    <head>            <?php  $CI =& get_instance();?>
            <script type="text/javascript">var base_url ='<?php echo base_url()?>';</script>
            <script type="text/javascript">var language ='<?php echo $this->session->userdata('language');?>';</script>
                       
            <meta charset="UTF-8">
            <title>Dumbu-Leads</title>
            <meta name="viewport" content="width=device-width">
            <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/icon.png'?>">

            <!-- Font Awesome -->
            <!--<link rel="stylesheet" href="<?php // echo base_url().'assets/fonts/font-awesome.min.css'?>">-->            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">            
            
            <!-- Tooltip -->
            <link rel="stylesheet" href="<?php echo base_url().'assets/js/popper.min.js'?>">
            
            <!-- Bootstrap -->
            <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
            <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap-multiselect.css'?>">
            <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap-datepicker.min.css'?>">

            <!-- CSS -->
            <link rel="stylesheet" href="<?php echo base_url().'assets/css/estilo.css'?>"/>
            <link rel="stylesheet" href="<?php echo base_url().'assets/css/definicoes.css'?>"/>
            <link rel="stylesheet" href="<?php echo base_url().'assets/css/media.css'?>"/>
            <link rel="stylesheet" href="<?php echo base_url().'assets/css/ladda-themeless.min.css'?>">
                        
            <!-- jQuery -->
            <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
            
            <script type="text/javascript" src="<?php echo base_url().'assets/js/front.js'?>"></script>                
            <script type="text/javascript" src="<?php echo base_url().'assets/js/robot_page.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'assets/js/translation.js'?>"></script> 
            
            <script src="<?php echo base_url().'assets/js/spin.min.js'?>"></script>
            <script src="<?php echo base_url().'assets/js/ladda.min.js'?>"></script>           
    </head>
    <body style="background-color:#fff">
            <section class="topo-home fleft100 bk-black">
                    <header class="fleft100 pd-tb20">
                            <div class="container">
                                    <div class="col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
                                        <a href=""><img src="<?php echo base_url().'assets/img/logo.png'?>" alt=""></a>
                                    </div>
                            </div>
                    </header>
            </section>
            <!--Admin Painel-->
            <!--<select name="" id="status_select">-->
                <?php
                   // echo '<option value="1">'.$CI->T("ATIVO", array(),$language).'</option>';                                        
                   // echo '<option value="2">'.$CI->T("BLOQUEADO POR PAGAMENTO", array(),$language).'</option>';                                        
                   // echo '<option value="4">'.$CI->T("ELIMINADO", array(),$language).'</option>';                                        
                   // echo '<option value="6">'.$CI->T("PENDENTE POR PAGAMENTO", array(),$language).'</option>';                                        
                   // echo '<option value="8">'.$CI->T("INICIANTE", array(),$language).'</option>';                                        
                   // echo '<option value="11">'.$CI->T("NÃO MOLESTAR", array(),$language).'</option>';                                        
                ?>
            <!--</select>
            <button type="button" id="do_show_users" class="btn btn-success">-->
                <?php 
                //echo $CI->T("MOSTRAR USUÁRIOS", array(),$language);
                ?>
            <div id="faq">
                <b>DÚVIDAS FREQUENTES LEADS</b><br>
                <b>Como escolho o meu público alvo?</b><br>
  <div id="r1">Nossa ferramenta de leads é 100% segmentada. Você pode escolher captar Leads através de perfis, locais ou hashtags. Ou seja, você irá escolher perfis, locais e hashtags do Instagram que possivelmente tenham seguidores que irão adquirir seu serviço, produto ou conteúdo. 
  Foque em escolher uma estratégia onde os usuários ligados a sua campanha tenha algo a ver com o serviço que você oferece. por exemplo: Se você trabalha com moda, utilize hashtags ligadas a moda e beleza. Uma dica boa é: Escolha perfis, locais e hashtags que possuem muitos seguidores e interação.
  </div><br>
  <b>Como posso utilizar meus Leads?</b><br>
  <div id="r2">Com os Leads exportados, você poderá criar campanhas direcionadas através de ferramentas de marketing como Google, Facebook e Instagram, para os usuários que possivelmente se interessam pelo seu conteúdo. 
  </div><br>
  <b>Quantos Leads posso captar por dia?</b>
  <div id="r3">?????</div><br>

  <b>Quanto custa cada lead?</b>
  <div id="r4">O valor por Lead é de R$0,25 (Vinte e cinco centavos por Lead)</div><br>

  <b>Como o serviço é cobrado?</b>
  <div id="r5">A cobrança é feita diariamente de acordo com a captação feita durante o dia. Lembre-se que você pode controlar o orçamento diário de cada campanha, tendo assim, o controle de gasto diariamente.</div><br> 

            <b>Qual o método de pagamento?</b>
  <div id="r5">Cartão de crédito - Você pode cadastrar seu cartão de crédito, a cobrança é feita automaticamente durante os dias.
  Boleto bancário - Você irá escolher o valor que deseja investir e esse valor entra como crédito em sua conta após o boleto ser compensado.
</div>
<b>Como criar uma campanha?</b>
  Para criar uma campanha, primeiro você definirá o orçamento diário da campanha, depois você irá selecionar se deseja captar os leads utilizando um perfis (Ex.: @neymar), uma hashtags (Ex. #moda) ou localizações. 

<b>Como vou exportar meus Leads?</b>
<div id="r5">Para exportar seus Leads você só precisa escolher a campanha que deseja obter os leads captados e clicar em ‘Extrair leads’. Você poderá exportar apenas um período específico ou todo o período da campanha. Você também pode exportar informações específicas, como apenas os nomes de usuário, ou apenas o e-mails dos usuários.
</div>

</div>
</body>
            <footer class="fleft100 pd-tb50 bk-fff text-center">
                    <div class="container">
                            <div class="fleft100 m-top40">
                                    <img src="<?php echo base_url().'assets/img/copy.png'?>" alt="">
                                    <span class="fleft100 cp m-top15">DUMBU - 2016 - <?php echo $CI->T("TODOS OS DIREITOS RESERVADOS", array(),$language);?></span>
                            </div>
                    </div>
            </footer>
    
    <!--modal_container_alert_message-->
    <div class="modal fade" style="top:30%" id="modal_alert_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div id="modal_container_alert_message" class="modal-dialog modal-sm" role="document">                                                          
            <div class="modal-content">
                <div class="modal-header">
                    <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="<?php echo base_url().'assets/img/FECHAR.png'?>" alt="cancel"> <!--<spam aria-hidden="true">&times;</spam>-->
                    </button>
                    <h5 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("Mensagem", array(),$language) ?></b></h5>                        
                </div>
                <div class="modal-body">                                            
                    <p id="message_text"></p>                        
                </div>
                <div class="modal-footer text-center">
                    <button id="accept_modal_alert_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                        <spam class="ladda-label"><div style="color:white; font-weight:bold">OK</div></spam>
                    </button>                    
                </div>
            </div>
        </div>                                                        
    </div>
    
    </body>
    
    
    <!--[if lt IE 9]>
    <script src="js/jquery-1.9.1.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
<!--    <script src="<?php //echo base_url().'assets/js/jquery-3.1.1.min.js'?>"></script>-->
    <!--<![endif]-->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap-multiselect.js'?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap-datepicker.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap-datepicker.pt-BR.min.js'?>"></script>
    <!-- FILTRAR -->
    <script src="<?php echo base_url().'assets/js/filtrar.js'?>"></script> 
    <!-- VALIDATE -->
    <script src="<?php echo base_url().'assets/js/validate.js'?>" type="text/javascript"></script>
    <!-- MASCARAS -->
    <script src="<?php echo base_url().'assets/js/maskinput.js'?>" type="text/javascript"></script>
    <!-- Scripts -->
    <script src="<?php echo base_url().'assets/js/script.js'?>" type="text/javascript"></script>

</html>
