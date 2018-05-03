<!DOCTYPE html>
<html lang="pt-BR">
    <head>
            <?php  $CI =& get_instance();?>
            <script type="text/javascript">var base_url ='<?php echo base_url()?>';</script>
            <script type="text/javascript">var language ='<?php echo $GLOBALS['language']?>';</script>
            
            <meta charset="UTF-8">
            <title>Dumbo-Leads</title>
            <meta name="viewport" content="width=device-width">
            <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon.png'?>">

            <!-- Font Awesome -->
            <!--<link rel="stylesheet" href="<?php // echo base_url().'assets/fonts/font-awesome.min.css'?>">-->            
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">            
            
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
            <script type="text/javascript" src="<?php echo base_url().'assets/js/client_page.js'?>"></script>                
            
            <script src="<?php echo base_url().'assets/js/spin.min.js'?>"></script>
            <script src="<?php echo base_url().'assets/js/ladda.min.js'?>"></script>           
    </head>
    <body style="background-color:#fff">
            <!-- Modal Criar -->
            <div id="criar" class="modal fade" role="dialog">
              <div class="modal-dialog mxw-600">                
                <div class="modal-content fleft100 text-center pd-20">
                            <!--<button type="button" class="bk-none b-none pull-right" data-dismiss="modal"><img src="img/close.png" alt=""></button>-->
                            <a class="close" data-dismiss="modal" >&times;</a>
                            <span class="bol fw-600 fleft100 ft-size15"><i></i> <?php echo $CI->T("Nova Campanha", array(),$language);?></span>
                            <span class="ft-size13 fleft100"> <?php echo $CI->T("Inicio", array(),$language)." ".date("d/m/Y");?></span>                            
                            <div class="fleft100 gastos pd-15 m-top20">
                                    <div class="col-md-1 col-sm-1 col-xs-12 pd-0">
                                        <img src="<?php echo base_url().'assets/img/gt.png'?>" alt="">
                                    </div>
                                    <div class="col-md-11 col-sm-11 col-xs-12 pd-lr5 pd-0-xs">
                                            <span class="fw-600 fleft100 text-left pd-lr15 center-xs"><?php echo $CI->T("Orçamento diário em R$", array(),$language);?></span>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input id="daily_value" type="text" placeholder="0.00" value="0.00" class="orc number">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 text-left center-xs m-top10-xs pd-lr5">
                                                    <!--<span class="ft-size11 fw-600 fleft100"><?php // echo $CI->T("Gasto atual: ", array(),$language);?><br>R$0,00 de <span class="cl-green">R$0,00</span></span>-->
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 text-left center-xs m-top10-xs pd-lr5">
                                                    <!--<a href="" class="bt-silver"><?php // echo $CI->T("Salvar orçamento", array(),$language);?></a>-->
                                            </div>
                                    </div>
                            </div>                            
                            <hr class="fleft100">
                            <span class="fleft100"><?php echo $CI->T("PERFIS PARA CAPTAÇÃO DE LEADS", array(),$language);?></span>
                            <div class="fleft100 text-center">
                                    <div class="i-block mxw-250">
                                            <span class="fleft100 fw-600 m-top20 m-b5"><?php echo $CI->T("Objetivo da campanha:", array(),$language);?></span>
                                            <select name="" id="campaing_type" class="sel">
                                                    <option value="1"><?php echo $CI->T("PERFIS DE REFERÊNCIA", array(),$language);?></option>
                                                    <option value="2"><?php echo $CI->T("GEOLOCALIZAÇÃO", array(),$language);?></option>
                                                    <option value="3"><?php echo $CI->T("HASHTAG", array(),$language);?></option>
                                            </select>
                                    </div>
                                    <div id = "profiles_painel" class="i-block mxw-350">
                                            <ul class="key m-top20">
                                                <div id="profiles">
                                                    <?php                                                    
                                                    foreach ($profiles_insta_temp as $profile_insta_temp) {
                                                        echo '<li id = _'.$profile_insta_temp.'>                                                          
                                                                <span class="fleft100 ellipse">
                                                                    <div class ="col-md-12 col-sm-12 col-xs-12" data-toggle="tooltip" data-placement="top" title="'.$profiles_temp[$profile_insta_temp].'">';
                                                                        if($profiles_type_temp[$profile_insta_temp] == 1){
                                                                            echo substr($profiles_temp[$profile_insta_temp],0,9);
                                                                        }
                                                                        if($profiles_type_temp[$profile_temp] == 2){
                                                                            echo "@".substr($profiles_temp[$profile_insta_temp],0,9);
                                                                        }
                                                                        if($profiles_type_temp[$profile_temp] == 3){
                                                                            echo "#".substr($profiles_temp[$profile_insta_temp],0,9);
                                                                        }
                                                        echo        '</div>
                                                                    <b class="my_close">x</b>
                                                                </span>
                                                            </li>';
                                                    }
                                                    ?>                                            
                                                </div>    
                                            </ul>

                                            <div class="col-md-8 col-sm-8 col-xs-12 m-top20">
                                                    <div class="row">
                                                        <!--<input id = "login_profile"  type="text" style="text-transform:lowercase" class="typeahead form-control tt-query" placeholder="Perfil" onkeyup="javascript:this.value = this.value.toLowerCase();"  autocomplete="off" spellcheck="false"  required> -->
                                                        <div class="col-sm-12">
                                                            <input id = "profile_temp"  type="text" style="text-transform:lowercase;" class="addmais form-control" placeholder="digitar perfil aqui" autocomplete="off" spellcheck="false" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="container_search_profile" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                            <table id="table_search_profile" class="table">                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="reference_profile_message" class="form-group m-t10" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em"> </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 m-top20 pd-0">
                                                    <input type="hidden" id = "profile_type_temp" value="0">
                                                    <input type="hidden" id = "profile_insta_temp" value="0">
                                                    <a id="do_add_profile_temp" style="text-decoration:none" class="add pointer_mouse"><?php echo $CI->T("Adicionar", array(),$language);?> <i class="fa fa-plus-circle"></i></a>                                                    
                                            </div>
                                    </div>
                            </div>
<!--                            <hr class="fleft100">
                            <span class="fleft100 m-top10 m-b30"><?php // echo $CI->T("QUAIS INFORMAÇÕES VOCÊ DESEJA CAPTAR?", array(),$language);?></span>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="ipcheck ip" placeholder="<?php // echo $CI->T("E-mail da conta", array(),$language);?>">
                                    <input type="text" class="ipsilver ip" placeholder="<?php // echo $CI->T("E-mail da Bio", array(),$language);?>">
                                    <input type="text" class="ipsilver ip" placeholder="<?php // echo $CI->T("E-mail Público", array(),$language);?>">
                                    <input type="text" class="ipcheck ip" placeholder="<?php // echo $CI->T("Número Telefone", array(),$language);?>">
                                    <input type="text" class="ipcheck ip" placeholder="<?php // echo $CI->T("Username Instagram", array(),$language);?>">
                            </div>-->
<!--                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="pais" class="fleft100 text-left ft-size11"><?php // echo $CI->T("Tipo do perfil", array(),$language);?></label>
                                    <select name="" id="profile_type_temp" class="sel">
                                            <option value="1"><?php // echo $CI->T("PERFIS", array(),$language);?></option>
                                            <option value="2"><?php // echo $CI->T("GEOLOCALIZAÇÃO", array(),$language);?></option>
                                            <option value="3"><?php // echo $CI->T("HASHTAG", array(),$language);?></option>
                                    </select>
                                    <label for="pais" class="fleft100 text-left ft-size11 m-top10"><?php // echo $CI->T("Sexo", array(),$language);?></label>
                                    <select name="" id="pais" class="sel">
                                            <option value=""><?php // echo $CI->T("AMBOS", array(),$language);?></option>
                                    </select>
                                    <label for="pais" class="fleft100 text-left ft-size11 m-top10"><?php // echo $CI->T("Tipo de conta", array(),$language);?></label>
                                    <select name="" id="pais" class="sel">
                                            <option value=""><?php // echo $CI->T("PESSOAL", array(),$language);?></option>
                                    </select>
                            </div>-->
                            <hr class="fleft100">
<!--                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="btn btn-mlds btnblue m-top10"><?php // echo $CI->T("Extrair dados", array(),$language);?></button>
                            </div>-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id= "do_save_campaing" type="button" class="btn btn-mlds btngreen m-top10"><?php echo $CI->T("Salvar", array(),$language);?></button>
                            </div>
                            <small class="fleft100 m-top30 text-left">
                                    *Consideramos 1 lead como um perfil, incluindo todos os dados disponíveis (e-mail, telefone, local, gênero, perfil e tipo de perfil). Nem todos os leads têm todos os dados disponíveis, nosso dado principal é o e-mail. <br>**O valor é cobrado por lead extraído, podendo ser apenas o e-mail ou todos os dados (e-mail, telefone, local, gênero, perfil e tipo). Sempre extraímos todos os dados disponíveis. <br>***Cobramos apenas por leads únicos, ou seja, caso você extraia um lead que já foi extraído na sua conta anteriormente, ele não será cobrado.
                            </small>
                </div>
              </div>
            </div>
            <!-- Fecha Modal Criar -->
            
            <!-- Modal Editar -->
            <div id="editar" class="modal fade" role="dialog">                
              <div class="modal-dialog mxw-600">
                <div class="modal-content fleft100 text-center pd-20">
                    <input id = "campaing_id" type="hidden" value = ""></input>                     
                            <a class="close" data-dismiss="modal" >&times;</a>
                            <!--<button type="button" class="bk-none b-none pull-right" data-dismiss="modal"><img src="img/close.png" alt=""></button>-->
                            <span class="bol fw-600 fleft100 ft-size15"><i></i> <?php echo $CI->T("Editar Campanha", array(),$language);?></span>
                            <span class="ft-size13 fleft100"><?php echo $CI->T("Inicio", array(),$language)." ".date("Y/m/d");?></span>
                            <ul class="fleft100 bs m-top10 m-b20">
                                    <li><a style="text-decoration:none"  id="ativada" class = "pointer_mouse"><i class="fa fa-play-circle"></i> ATIVAR</a></li>
                                    <li><a style="text-decoration:none"  id="pausada" class = "pointer_mouse"><i class="fa fa-pause-circle"></i> PAUSAR</a></li>
                                    <li><a style="text-decoration:none"  id="encerrar" class = "pointer_mouse"><i class="fa fa-times-circle"></i> TERMINAR</a></li>
                            </ul>
                            <span id="leads_analised" class="fleft100"><h4 class="i-block fw-800"><label id="dados_captados"></label></h4> leads captados</span>                                                        
                            <div class="fleft100 gastos pd-15 m-top20">
                                    <div class="col-md-1 col-sm-1 col-xs-12 pd-0">
                                        <img src="<?php echo base_url().'assets/img/gt.png'?>" alt="">
                                    </div>
                                    <div class="col-md-11 col-sm-11 col-xs-12 pd-lr5 pd-0-xs">
                                            <span class="fw-600 fleft100 text-left pd-lr15 center-xs">Orçamento diário en R$</span>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id = "edit_daily_value" type="text" placeholder="0.00" value="0.00" class="orc">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 text-left center-xs m-top10-xs pd-lr5">
                                                    <span class="ft-size11 fw-600 fleft100">Gasto atual: <br>R$ <label id="gasto"></label> de <span class="cl-green">R$ <label id="total"></label></span></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 text-left center-xs m-top10-xs pd-lr5">
                                                    <a id ="update_daily_value" class="pointer_mouse bt-silver">Salvar orçamento</a>
                                            </div>
                                    </div>       
                                    <div id = "response_daily_value"></div>
                            </div>                                           
                            <hr class="fleft100">                            
                            <span class="fleft100">PERFIS PARA CAPTAÇÃO DE LEADS</span>
                            <div class="fleft100 text-center">
                                    <div class="i-block mxw-250">
                                            <span class="fleft100 fw-600 m-top20 m-b5">Objetivo da campanha:</span>
                                            <label id = "tipo"></label>
                                            <input id = "type_campaing" type="hidden"></input>
<!--                                            <select name="" id="" class="sel">
                                                    <option value="">PERFIS</option>
                                            </select>-->
                                    </div>
                                    <div class="i-block mxw-350">
                                            <ul class="key m-top20">
                                                <div id ="profiles_edit">
                                                </div>
                                            </ul>

                                            <div class="col-md-8 col-sm-8 col-xs-12 m-top20">
                                                    <input id ="profile_edit" type="text" class="addmais" placeholder="digitar perfil aqui" type="text" style="text-transform:lowercase;">
                                                    <input id ="profile_insta_edit" type="hidden">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 m-top20 pd-0">
                                                    <a id ="do_add_profile" style="text-decoration:none" class="pointer_mouse add">Adicionar <i class="fa fa-plus-circle"></i></a>                                                    
                                            </div>
                                        <div class="row">
                                        <div id="container_search_profile2" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                            <table id="table_search_profile2" class="table">                                
                                            </table>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div id="reference_profile_message2" class="form-group m-t10" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em"> </div>
                                        </div>
                                    </div>
                            </div>
<!--                            <hr class="fleft100">
                            <span class="fleft100 m-top10 m-b30">QUAIS INFORMAÇÕES VOCÊ DESEJA CAPTAR?</span>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="ipcheck ip" placeholder="E-mail da conta">
                                    <input type="text" class="ipsilver ip" placeholder="E-mail da Bio">
                                    <input type="text" class="ipsilver ip" placeholder="E-mail Público">
                                    <input type="text" class="ipcheck ip" placeholder="Número Telefone">
                                    <input type="text" class="ipcheck ip" placeholder="Username Instagram">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="pais" class="fleft100 text-left ft-size11">Pais de origem</label>
                                    <select name="" id="pais" class="sel">
                                            <option value="">PERFIS</option>
                                    </select>
                                    <label for="pais" class="fleft100 text-left ft-size11 m-top10">Sexo</label>
                                    <select name="" id="pais" class="sel">
                                            <option value="">AMBOS</option>
                                    </select>
                                    <label for="pais" class="fleft100 text-left ft-size11 m-top10">Tipo de conta</label>
                                    <select name="" id="pais" class="sel">
                                            <option value="">PESSOAL</option>
                                    </select>
                            </div>-->
                            <hr class="fleft100">
<!--                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="btn btn-mlds btnblue m-top10">Extrair dados</button>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="btn btn-mlds btngreen m-top10">Salvar</button>
                            </div>-->
                            <small class="fleft100 m-top30 text-left">
                                    *Consideramos 1 lead como um perfil, incluindo todos os dados disponíveis (e-mail, telefone, local, gênero, perfil e tipo de perfil). Nem todos os leads têm todos os dados disponíveis, nosso dado principal é o e-mail. <br>**O valor é cobrado por lead extraído, podendo ser apenas o e-mail ou todos os dados (e-mail, telefone, local, gênero, perfil e tipo). Sempre extraímos todos os dados disponíveis. <br>***Cobramos apenas por leads únicos, ou seja, caso você extraia um lead que já foi extraído na sua conta anteriormente, ele não será cobrado.
                            </small>
                </div>
              </div>
            </div>
            <!-- Fecha Modal Editar -->

            <!-- Modal Pagamento -->
            <div id="pagamento" class="modal fade" role="dialog">
              <div class="modal-dialog mxw-600 pgment">
                <div class="modal-content fleft100 text-center">
                            <div class="fleft100 bk-silver pd-20">
                                <a class="close" data-dismiss="modal" >&times;</a>
                            </div>
                            <div class="fleft100 bk-silver pd-10">
                                    <?php
                                        //if(!$client_data['has_payment']){
                                    ?>
                                        <!--<span id ="ops"><h3>Ops! Você ainda não possui um método de pagamento.</h3></span>-->
                                    <?php
                                        //}
                                    ?>
                                    <h4 class="fleft100 pd-lr60 m-top10 fw-600 pd-lr0-xs">Para poder obter seus leads, adicione seus dados de pagamento abaixo:</h4>
                            </div>
                            <div class="fleft100 bk-fff pd-tb50 pd-lr25-xs">
                                    <div class="col-md-7 col-sm-7 col-xs-12 pd-0 fnone i-block">
                                            <div class="col-md-7 col-sm-7 col-xs-7 pd-lr5 carbol">
                                                    <a id = "pago_cartao" class="cl-black cartao ativo c-pointer">
                                                            <span class="col-md-2 col-sm-2 col-xs-12 pd-0">
                                                                <img src="<?php echo base_url().'assets/img/cr.png'?>" class="mxw-50 wauto-xs">
                                                            </span>
                                                            <span class="col-md-10 col-sm-10 col-xs-12 pd-lr5 text-left center-xs">
                                                                    Cartão de crédito
                                                            </span>
                                                    </a>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 pd-lr5 carbol">
                                                    <a id = "pago_boleto" class="cl-black boleto c-pointer">
                                                            <span class="col-md-2 col-sm-2 col-xs-12 pd-0">
                                                                <img src="<?php echo base_url().'assets/img/bol.png'?>" class="mxw-50 wauto-xs">
                                                            </span>
                                                            <span class="col-md-10 col-sm-10 col-xs-12 pd-lr5 text-left center-xs">
                                                                    Boleto
                                                            </span>
                                                    </a>
                                            </div>
                                            <div class="fleft100 ctr m-top5">
                                                    <div class="fleft100 pd-lr5">
                                                            <input id="credit_card_name" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" placeholder="Nome no cartão">
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-12 pd-lr5">
                                                            <input id="credit_card_number" type="text" placeholder="Número do cartão" class = "number" maxlength="20">
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 pd-lr5">
                                                            <input id="credit_card_cvc" type="text" placeholder="CVV/CVC" class = "number" maxlength="4">
                                                    </div>
                                                    <div class="col-md-3 col-sm-4 col-xs-12 pd-lr5 m-top5">
                                                            Validade
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 pd-lr5">
                                                        <select name="" id="credit_card_exp_month" class="seldumbu">
                                                                    <?php
                                                                        for($i = 1; $i <= 9; $i++){
                                                                            echo '<option value="'.$i.'">0'.$i.'</option>';
                                                                        }
                                                                        for($i = 10; $i <= 12; $i++){
                                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                                        }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5 col-sm-4 col-xs-12 pd-lr5">
                                                            <select name="" id="credit_card_exp_year" class="seldumbu">
                                                                    <?php
                                                                        $year = date("Y");
                                                                        for($i = 0; $i < 10; $i++){
                                                                            echo '<option value="'.($year+$i).'">'.($year+$i).'</option>';
                                                                        }                                                                        
                                                                    ?>
                                                            </select>
                                                    </div>
                                            </div>
                                            <div class="fleft100 blt m-top5 d-none">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 pd-lr5">
                                                            <input type="text" placeholder="Nome completo" id = "boleto_nome">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 pd-lr5">
                                                        <input type="text" placeholder="Valor" id = "boleto_value" maxlength="7">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd-lr5">
                                                            <!--<input id="" type="text" placeholder="CPF">-->
                                                        <input id="boleto_cpf" value="" placeholder="CPF" type="text" class = "number cpf" maxlength="11">
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 pd-lr5">
                                                            <input id="boleto_cpe" type="text" placeholder="CPE" class = "number cep" maxlength="8">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5">
                                                        <button id = "find_cep" type="button" class="fa fa-search btn-search btngreen"></button>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9 col-xs-12 pd-lr5">
                                                            <input id="boleto_endereco" type="text" placeholder="Endereço">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 pd-lr5">
                                                            <input id="boleto_numero" type="text" placeholder="Num/Comp">
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-12 pd-lr5">
                                                            <input id="boleto_bairro" type="text" placeholder="Bairro">
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-12 pd-lr5">
                                                            <input id="boleto_municipio" type="text" placeholder="Municipio">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5">
                                                            <input id="boleto_estado" type="text" placeholder="UF" maxlength="2">
                                                    </div>
                                                    <div class="fleft100 m-top5">
                                                            <h5 class="cl-green fw-600">IMPORTANTE!</h5>
                                                            <span class="text-justify fleft100">O boleto será enviado para o e-mail cadastrado e ficará disponível em sua área de assinante. Faça o pagamento em até 2 dias úteis para manter sua conta ativa.</span>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="fleft100 pd-tb30 bk-silver text-center">
                                    <div class="col-md-6 col-sm-8 col-xs-12 fnone i-block">
                                            <button id = "salvar_modo_pago" type="button" class="btn btn-mlds btngreen m-top10">SALVAR</button>
                                    </div>
                            </div>
                </div>
              </div>
            </div>
            <!-- Fecha Modal Pagamento -->
            
            <!-- Modal Extraer Leads -->
            <div id="extraer" class="modal fade" role="dialog">                
              <div class="modal-dialog mxw-600">
                <div class="modal-content fleft100 text-center pd-20">
                    <input id = "id_campaing_leads" type="hidden" value = ""></input>                     
                            <a class="close" data-dismiss="modal" >&times;</a>
                            <!--<button type="button" class="bk-none b-none pull-right" data-dismiss="modal"><img src="img/close.png" alt=""></button>-->
                            <hr class="fleft100">
                            <span class="fleft100 m-top10 m-b30">QUAIS INFORMAÇÕES VOCÊ DESEJA CAPTAR?</span>
                            <div align = "left" class="col-md-6 col-sm-6 col-xs-12">
<!--                                
                                    <div>
                                        <input type="checkbox" id="coding" name="interest" value="coding"> Coding
                                    </div>-->
                                    <div>
                                        <input id = "mark_all" type="checkbox" value="mark_all"> Marcar todos<br>
                                    </div>
                                    <hr>
                                    <div></div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="perfil"> Perfil de referencia<br>
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="username"> Nome do usuário de perfil extraido
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="name"> Nome completo do perfil extraido
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="all_email"> Todos os e-mails
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="code_coutry"> Código telefónico do pais
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]"  value="telf"> Número de telefone
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]"  value="public_telf"> Número de telefone público
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="contact_telf"> Número de telefone de contato
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="sexo"> Gênero
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="categoria"> Categoria
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="data_nascimento"> Data de nascimento                                    
                                    </div>
                                    <div>
                                        <input type="checkbox" class = "inf" name = "inf[]" value="privativo"> Privativo                                    
                                    </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    
<!--                                <div class="m-top70">
                                    <label>Data incial</label>
                                </div>    
                                <input type="date" id="init_date2" max="<?php // echo date("Y-m-d");?>">
                                       
                                <div class = "m-top40">    
                                    <label>Data final</label>
                                </div>                                    
                                    <input type="date" id="end_date2" max="<?php // echo date("Y-m-d");?>">
                                    
                                <div class = "m-top40">    
                                    <label>Data final</label>
                                </div>     -->        
                                <div class = "m-top60">    
                                    
                                </div>  
                                <div class="calendario">
                                    <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5">
                                        
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 pd-lr5">
                                        <div class="form-group m-top5 m-top0-xs">
                                            <label for="init_date" class="fleft100 text-left">Data Inicial</label>
                                                <div class='input-group date' id='datetimepicker_lead'>
                                                    <input type='text' class="form-control" id="init_date" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendario">
                                    <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5">
                                        
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 pd-lr5">
                                        <div class="form-group m-top5 m-top0-xs">
                                            <label for="end_date" class="fleft100 text-left">Data Final</label>
                                                <div class='input-group date' id='datetimepicker_lead2'>
                                                    <input type='text' class="form-control" id="end_date" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            <hr class="fleft100">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id = "do_get_leads" type="button" class="btn btn-mlds btnblue m-top10">Extrair leads</button>
                            </div>                            
                            <small class="fleft100 m-top30 text-left">
                                    *Consideramos 1 lead como um perfil, incluindo todos os dados disponíveis (e-mail, telefone, local, gênero, perfil e tipo de perfil). Nem todos os leads têm todos os dados disponíveis, nosso dado principal é o e-mail. <br>**O valor é cobrado por lead extraído, podendo ser apenas o e-mail ou todos os dados (e-mail, telefone, local, gênero, perfil e tipo). Sempre extraímos todos os dados disponíveis. <br>***Cobramos apenas por leads únicos, ou seja, caso você extraia um lead que já foi extraído na sua conta anteriormente, ele não será cobrado.
                            </small>
                </div>
              </div>
            </div>
            <!-- Fecha Modal Extraer Leads -->
            
            <section class="topo-home fleft100 bk-black">
                    <header class="fleft100 pd-tb20">
                            <div class="container">
                                    <div class="col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
                                        <a href=""><img src="<?php echo base_url().'assets/img/logo.png'?>" alt=""></a>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-6 text-right menu">
                                        <button id="do_logout" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="b-none bk-none cl-fff ft-size13">
                                            <img src="<?php echo base_url().'assets/img/user.png'?>" style="position: relative;top: -2px;right: 5px;">
                                            SAIR
                                        </button>
                                    </div>					
                            </div>
                    </header>
            </section>
            <section class="fleft100 pd-tb30">
                    <div class="container">
                            <div class="col-md-2 col-sm-12 col-xs-12 sidbar">
                                    <ul>
                                            <li><a href="https:/www.dumbu.pro">Captação de Seguidores</a></li>
                                            <!--<li><a href="">Extração de Leads</a></li>-->
                                            <li><a href="" data-toggle="modal" data-target="#pagamento"><b><u>Pagamentos</u></b></a></li>
                                            <li><a href="">Contato / FAQ</a></li>
                                    </ul>
                            </div>
                            <div class="col-md-10 col-sm-12 col-xs-12 center-xs">
                                    <div class="fleft100 perfil text-center">
                                            <div class="icone"><?php $login_name = $this->session->userdata('login'); $upper_login_name = strtoupper($login_name); echo $upper_login_name[0]; ?></div>
                                            <span class="fleft100"><?php echo $login_name;?></span>
                                    </div>
                                    <span id="alerta_pago">
                                    <?php
                                        if(!$client_data['has_payment'] || $this->session->userdata('status_id') == 6){
                                            if($this->session->userdata('status_id') == 6){                                                
                                    ?>
                                                <div class="alert alert-danger fleft100 m-top10">
                                                    <i class="fa fa-exclamation-triangle"></i> 
                                                    Este usuário atualmente está bloqueado. Por favor, atualice seu método de pago e em breve será contatado. 
<!--                                                    <a href="" data-toggle="modal" data-target="#pagamento">
                                                        <u>Clique aqui</u>
                                                    </a>-->
                                                </div>

                                    <?php
                                            }
                                            else{
                                    ?>            
                                                <div class="alert alert-danger fleft100 m-top10">
                                                    <i class="fa fa-exclamation-triangle"></i> 
                                                    Você precisa atualizar seu pagamento. 
                                                    <a href="" data-toggle="modal" data-target="#pagamento">
                                                        <u>Clique aqui</u>
                                                    </a>
                                                </div>

                                    <?php
                                            }
                                        }
                                    ?>                                    
                                    </span>
                                <h5 class="fleft100 fw-800 title-pg ft-size15"><img src="<?php echo base_url().'assets/img/cp.png'?>" class="m-r8"> Campanhas</h5>

                                    <div class="col-md-8 col-sm-8 col-xs-12 ft-size12 pd-0 m-top30">
                                            <div class="fleft100 gastos pd-15">
                                                    <div class="col-md-1 col-sm-1 col-xs-12 pd-0">
                                                        <img src="<?php echo base_url().'assets/img/gt.png'?>" alt="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 pd-lr5 m-top5">
                                                            <span class="fleft100 fw-600">Leads extraídos:</span>
                                                            <span class="fleft100 fw-600 cl-green">
                                                                <?php
                                                                    $total_captados = 0;
                                                                    foreach ($campaings as $campaing) {
                                                                        $total_captados += $campaing['amount_leads'];
                                                                    }
                                                                    echo $total_captados;
                                                                ?>
                                                            </span>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 pd-lr5 m-top5">
                                                            <span class="fleft100 fw-600">Custo por extração:</span>
                                                            <span class="fleft100 fw-600 cl-green">
                                                                <?php 
                                                                    require_once $_SERVER['DOCUMENT_ROOT'] . '/leads/worker/class/system_config.php';
                                                                    $GLOBALS['sistem_config'] = new leads\cls\system_config();
                                                                    echo $CI->T("R$ ", array(),$language);
                                                                    echo $GLOBALS['sistem_config']->FIXED_LEADS_PRICE/100;                                                                        
                                                                ?>
                                                            </span>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5 m-top5">
                                                            <span class="fleft100 fw-600">Gasto atual:</span>
                                                            <span class="fleft100 fw-600 cl-green"><?php echo "R$" ?> <?php echo number_format((float)($total_captados*$GLOBALS['sistem_config']->FIXED_LEADS_PRICE/100), 2, '.', '');?> </span>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12 pd-lr5 text-right center-xs m-top10-xs filtrar">
                                                            <div class="dropdown i-block dropfiltro">
                                                              <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="b-none bk-none ft-size12 cl" style="color:#5c8fe1">
                                                                  <img src="<?php echo base_url().'assets/img/user.png'?>" alt=""> <u><b>
                                                                  Campanhas por data</b></u>
                                                              </button>
                                                              <ul class="dropdown-menu text-center" aria-labelledby="dLabel">
                                                                    <li><a class="c-pointer person">Personalizado</a></li>
                                                                <li><a class="date_filter pointer_mouse" id ="menos_0" >Hoje</a></li>
                                                                <li><a class="date_filter pointer_mouse" id ="menos_1" >Ontem</a></li>
                                                                <!--<li><a href="">Esta semana (dom. - hoje)</a></li>-->
                                                                <!--<li><a href="">Esta semana (de segunda-feira até hoje)</a></li>-->
                                                                <li><a class="date_filter pointer_mouse" id ="menos_7">Últimos 7 dias</a></li>
                                                                <!--<li><a href="">Semana passada (seg. - sáb.)</a></li>-->
                                                                <!--<li><a href="">Semana passada (seg. - dom.)</a></li>-->
                                                                <!--<li><a href="">Última semana útil (seg. - sex.)</a></li>-->
                                                                <li><a class="date_filter pointer_mouse" id ="menos_14">Últimos 14 dias</a></li>
                                                                <!--<li><a href="">Este mês</a></li>-->
                                                                <li><a class="date_filter pointer_mouse" id ="menos_30">Últimos 30 dias</a></li>
                                                                <!--<li><a href="">Mês passado</a></li>-->
                                                                <li><a class="date_filter pointer_mouse" id ="tudo">Todo o período</a></li>
                                                              </ul>
                                                            </div>

                                                            <div class="menu_btn">
                                                                <div class="calendario">
                                                                    <div class="col-md-5 col-sm-5 col-xs-12 pd-lr5">
                                                                            <div class="form-group m-top5 m-top0-xs">
                                                                                    <label for="init_filter" class="fleft100 text-left">Data Inicial</label>
                                                                            <div class='input-group date' id='datetimepicker'>
                                                                                <input type='text' class="form-control" id="init_filter" />
                                                                                <span class="input-group-addon">
                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                </span>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                            <div class="col-md-5 col-sm-5 col-xs-12 pd-lr5">
                                                                                    <div class="form-group m-top5 m-top0-xs">
                                                                                            <label for="end_filter" class="fleft100 text-left">Data Final</label>
                                                                            <div class='input-group date' id='datetimepicker2'>
                                                                                <input type='text' class="form-control" id = "end_filter"/>
                                                                                <span class="input-group-addon">
                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                </span>
                                                                            </div>
                                                                    </div>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-2 col-xs-12 pd-lr5">
                                                                                    <div class='input-group date m-top0-xs' style="margin-top:27px;">
                                                                        <span class="input-group-addon c-pointer bt-cal" id ="filter_person">
                                                                            <span class="fa fa-search" ></span>
                                                                        </span>
                                                                    </div>
                                                                            </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 pd-left50 m-top30 pd-lr0-xs">
                                            <a style="text-decoration:none" class="btblue-radius w100 ft-size17 text-center m-top15 ellipse pointer_mouse" data-toggle="modal" data-target="#criar" >Criar campanha <i class="fa fa-plus-circle"></i></a>
                                    </div>
                                    <div class="col-xs-12 m-top30">
                                        <h5>Campanhas criadas em <strong><span id = "init_day_filter"><?php echo date('d/m/Y', $date_filter['init_day']); ?></span></strong> até <strong><span id = "end_day_filter"><?php echo date('d/m/Y', $date_filter['end_day']); ?></span></strong> | <span><a class="date_filter pointer_mouse" id ="tudo2" style="color: #206040; text-transform: uppercase; text-decoration: underline;"><strong> Ver todas as campanhas</strong></a></span></h5>
                                    </div>
                                    <div id = list_campaings>
                                        <?php
                                            foreach ($campaings as $campaing) {                                            
                                        ?>
                                            <div id = "campaing_<?php echo $campaing['campaing_id'];?>" class="fleft100 bk-silver camp                                            
                                                <?php 
                                                    $color_status = ["ATIVA" => "camp-green", "PAUSADA" => "camp-silver", "TERMINADA" => "camp-silver", "CANCELADA" => "camp-red", "CRIADA" => "camp-blue"];
                                                    echo $color_status[$campaing['campaing_status_id_string']]; 
                                                ?> 
                                            m-top20 center-xs">                                            
                                                <div class="col-md-2 col-sm-2 col-xs-12 m-top10">
                                                        <span class="bol fw-600 fleft100 ft-size15"><i></i> Campanha</span>
                                                        <span id = "campaing_status_<?php echo $campaing['campaing_id'];?>" class="fleft100"><?php echo ucfirst(strtolower($campaing['campaing_status_id_string'])); ?></span>
                                                        <span class="ft-size13"><?php echo "Inicio: ".date('d/m/Y', $campaing['created_date'])?></span>                                                        
                                                        <?php 
                                                        if($campaing['end_date']){
                                                        ?>
                                                            <span class="ft-size13"><?php echo "Fim: ".date('d/m/Y', $campaing['end_date'])?></span> 
                                                            
                                                        <?php                                                        
                                                        }
                                                        ?>
                                                        <ul class="fleft75 bs2">    
                                                            <?php
                                                            if($campaing['campaing_status_id'] == 1 || $campaing['campaing_status_id'] == 3){
                                                            ?>  
                                                                <li><a id="action_<?php echo $campaing['campaing_id'];?>" class = "mini_play pointer_mouse"><i id = "action_text_<?php echo $campaing['campaing_id'];?>" class="fa fa-play-circle"> ATIVAR</i></a></li>                                                          
                                                            <?php                                                        
                                                            }
                                                            ?>    
                                                            <?php
                                                            if($campaing['campaing_status_id'] == 2){
                                                            ?>
                                                                <li><a id="action_<?php echo $campaing['campaing_id'];?>" class = "mini_pause pointer_mouse"><i id = "action_text_<?php echo $campaing['campaing_id'];?>" class="fa fa-pause-circle"> PAUSAR</i></a></li>
                                                            <?php                                                        
                                                            }
                                                            ?>    
                                                        </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="key m-top20-xs">
                                                            <div id = "profiles_view_<?php echo $campaing['campaing_id'];?>">
                                                                <?php                                                                
                                                                    foreach ($campaing['profile'] as $profile) {
                                                                        if($profile){
                                                                ?>
                                                                        <li id = "___<?php echo $profile['insta_id'];?>">
                                                                            <span data-toggle="tooltip" data-placement="top" title="<?php echo $profile['profile']; ?>">
                                                                                <?php
                                                                                if($campaing['campaing_type_id'] == 1){
                                                                                    echo substr($profile['profile'],0,9);
                                                                                }
                                                                                if($campaing['campaing_type_id'] == 2){
                                                                                    echo "@".substr($profile['profile'],0,9);
                                                                                }
                                                                                if($campaing['campaing_type_id'] == 3){
                                                                                    echo "#".substr($profile['profile'],0,9);
                                                                                }                                                                                
                                                                                ?>
                                                                            </span>
                                                                        </li>                                                            
                                                                <?php
                                                                        }

                                                                    }                                                                
                                                                ?>
                                                            </div>        
                                                        </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 m-top20-xs">
                                                        <span class="fleft100 ft-size12">Tipo: <span class="cl-green"><?php echo $campaing['campaing_type_id_string']; ?></span></span>
                                                        <span class="fleft100 fw-600 ft-size16"><?php echo $campaing['amount_leads']; ?> leads captados</span>
                                                        <span class="ft-size11 fw-600 m-top8 fleft100">Gasto atual: <br>R$ <label id="show_gasto_<?php echo $campaing['campaing_id'];?>"><?php echo number_format((float)($campaing['total_daily_value'] - $campaing['available_daily_value'])/100, 2, '.', ''); ?></label> de <span class="cl-green">R$ <label id="show_total_<?php echo $campaing['campaing_id'];?>"><?php echo number_format((float)$campaing['total_daily_value']/100, 2, '.', ''); ?></label></span></span>
                                                </div>
                                                <div id="divcamp_<?php echo $campaing['campaing_id'];?>" class="col-md-3 col-sm-3 col-xs-12 text-center m-top15">
                                                        <div class="col-md-6 col-sm-6 col-xs-6">                                                            
                                                                <a href="" class="cl-black extraer_leads" data-toggle="modal" data-id="extraer_<?php echo $campaing['campaing_id'];?>" >
                                                                    <img src="<?php echo base_url().'assets/img/down.png'?>" alt="">
                                                                        <span class="fleft100 ft-size11 m-top8 fw-600">Extrair leads</span>
                                                                </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <?php
                                                                    if($campaing['campaing_status_id_string'] != "CANCELADA"){
                                                                ?>
                                                                <div id="edit_campaing_<?php echo $campaing['campaing_id'];?>">
                                                                    <a href="" class="cl-black edit_campaing" data-toggle="modal" data-id="editar_<?php echo $campaing['campaing_id'];?>" >
                                                                        <img src="<?php echo base_url().'assets/img/editar.png'?>" alt="">
                                                                            <span class="fleft100 ft-size11 m-top8 fw-600">Editar</span>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                        </div>
                                                </div>
                                            </div>
                                        <?php                                     
                                            }
                                        ?>
                                    </div>    
                            </div>
                    </div>
            </section>
    
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
