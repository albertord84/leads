$(document).ready(function () {    
       
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    //------------desenvolvido para DUMBU-LEADS-------------------    
    $("#do_logout").click(function () {                
        $.ajax({
            url: base_url + 'index.php/admin/logout',            
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response['success']) {                    
                    $(location).attr('href',base_url);
                } else {
                      modal_alert_message(response['message']);
                }
            },
            error: function (xhr, status) {
//                $('#container_sigin_message').text('Não foi possível executar sua solicitude!');
//                $('#container_sigin_message').css('visibility', 'visible');
//                $('#container_sigin_message').css('color', 'red');
            }
        });                            
    });
    
    $("#do_show_robots").click(function () { 
    var status_id = $('#status_select').val();
        $.ajax({
            url: base_url + 'index.php/admin/show_robots', 
            data:  {
                        'status_id': status_id,                                       
                        'language': language                                
                    }, 
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response['success']) { 
                    var robots = response['robots_array'];
                    var i, num_robots = robots.length;
                    var html = "";
                    var options_trd=response['options'];
//                    for(i = 0; i < num_robots; i++){
//                        html += '<div id="user_'+robots[i]['id']+'" >';
//                            html += '<b>login: </b>' + robots[i]['login']+'<br>';
//                            html += '<b>status: </b>' + robots[i]['status_id']+'<br>';
//                            html += '<b>data: </b>' + toDate(robots[i]['init']) + '<br><br>';
//                            html += '<b>email: </b>' + robots[i]['end']+'<br>'
//                            html += '---------------------------------- <br>';
//
//                                                html += '</div>';
//                    }
            //html+='<div class="row">';
            //html+='<div class="col-md-2">';
            html+='<div id="admin_form" class="row">';
            html+=    '<div class="col-md-1"></div>';
            html+=    '<div class="col-md-2">';

            html+='<br><p><b style="color:red">Total de registros: </b><b>'+num_robots+'</b></p><br>';
            html+='</div>';
            html+='</div>';
            html+='<div class="row">';
            html+='<div class="col-xs-10">';
            html+='<table class="table">';
            html+='<tr class="list-group-item-success">';
            html+='<td style="max-width:240px; padding:5px"><b>No.</b></td>';
            html+='<td style="max-width:240px; padding:5px"><b>Dados gerais</b></td>';
            html+='<td style="max-width:240px; padding:5px"><b>Estado atual</b></td>';
            html+='<td style="max-width:240px; padding:5px"><b>Operações</b></td>';
            html+='</tr>';
            html+='</table>';
            html+='</div>';
            html+='</div>';
            var sel='</select>';
            html+='<div class="row">';
            html+='<div class="col-xs-10">';
            html+='<table class="table">';
                 
                    for(var i = 0; i < num_robots; i++){
                        //html+=''
                            html+= '<tr class="list-group-item-success" id="row-client-'+robots[i]['id']+'" style="visibility: visible;display: block'; 
                            if (i % 2==0) {html+='; background-color: #dff0d8';}
                            html+= '">';
                                html+= '<td style="max-width:240px; padding:5px">';
                                    var k=i+1;
                                    html+= '<br><br><b>'+k; html+='</b><br><br><br>';
                                    html+='</td>';                                
                                    html+= '<td style="width:240px; padding:5px">';
                                    html+='<b>Dumbu ID: </b>'+robots[i]['id']+'<br>';
                                    html+='<b>Profile: </b>'+robots[i]['login']+'<br>';
                                    html+='<b>Password: </b>'+robots[i]['pass']+'<br>';
                                    html+='<b>DS ID:</b>'; //</b><br>'+robots[i]['ds_user_id']+'<br>';
                                    html+='<input id="idseldsid_'+robots[i]['id']+'" name="nameseledsid_'+robots[i]['id'];
                                    html+='" type="date" class="robot_atribute" value="';
                                    html+=toDate(robots[i]['ds_user_id'])+'">';
                                    html+='</input>';
                                    html+='</td>';
                                    //echo '<b>Email: </b>'.$result[$i]['email'].'<br>';
                                    //if ($SERVER_NAME == "ONE")
                                    //    echo '<b>Idioma: </b>'.$result[$i]['language'].'<br><br>';
                                    //else echo '<br>';
                                    //echo '<b>Status: </b><b id="label_status_'.$result[$i]['user_id'].'" style="color:red">'.get_name_status($result[$i]['status_id']).'</b><br>';
                                    html+= '<td style="width:240px; padding:5px">';
                                    var nid=robots[i]['status_id'];
                                    html+='<b>Status: </b><br>';
                                    html+='<select class="robot_atribute" id="idselestatus_'+robots[i]['id'];
                                    html+='" name="nameselestatus_'+robots[i]['id']+'" value="'+robots[i]['status_id'];
                                    html+='">';
                                    html+=options_trd;
                                    html+='</select>';
                                    html+='<br>';
                                    html+='<b>Data de inicio: </b><br>';
                                    html+='<input id="idselinit_'+robots[i]['id']+'" name="nameseleinit_'+robots[i]['id'];
                                    html+='" type="date" class="robot_atribute" value="';
                                    html+=toDate(robots[i]['init'])+'">';
                                    html+='</input>';
                                    html+='<br>';
                                    html+='<b>Data final: </b><br>';
                                    html+='<input id="idselend_'+robots[i]['id']+'" name="nameselend_'+robots[i]['id'];
                                    html+='" type="date" class="robot_atribute" value="';
                                    html+=toDate(robots[i]['end'])+'">';
                                    html+='</input>';
                                    html+='</td>';
                                    html+= '<td style="width:240px; padding:5px">';
                                    html+='<button  style="min-width:150px" id = "idbtnapply_'+robots[i]['id']+'" name="namebtnapply_'+robots[i]['id'];
                                    html+='" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">';
                                    html+='<span class="ladda-label">Ok</span>';
                                    html+='</button>';
                                    html+='<br>';
                                    html+='<button  style="min-width:150px" id = "idbtnapply_'+robots[i]['id']+'" name="namebtnapply_'+robots[i]['id'];
                                    html+='" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">';
                                    html+='<span class="ladda-label">Cancel</span>';
                                    html+='</button>';
                                    html+='</td>';
                                    html+='</tr>';

                                    //html+='<br>';
                                  
                        
                        
                    }
                    html+='</table>';
                    html+='</div>';
                    html+='</div>';
                    document.getElementById("container_robots").innerHTML = html;
                    //modal_alert_message("Existen "+num_users+" usuarios a mostrar");
                } else {
                    document.getElementById("container_robots").innerHTML = "";  
                    modal_alert_message(response['message']);
                }
            },
            error: function (xhr, status) {
//                $('#container_sigin_message').text('Não foi possível executar sua solicitude!');
//                $('#container_sigin_message').css('visibility', 'visible');
//                $('#container_sigin_message').css('color', 'red');
            }
        });                            
    });
    
    /* Generic Confirm func */
    function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {

    var confirmModal = 
      $('<div class="modal fade" style="top:30%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +        
          '<div class="modal-dialog modal-sm" role="document">' +
          '<div class="modal-content">' +
          '<div class="modal-header">' +
            '<button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                '<img src="'+base_url+'assets/img/FECHAR.png">'+
            '</button>' +
            '<h5 class="modal-title"><b>' + heading +'</b></h5>' +
          '</div>' +

          '<div class="modal-body">' +
            '<p>' + question + '</p>' +
          '</div>' +

          '<div class="modal-footer">' +            
            '<button id="okButton" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">'+
                        '<spam class="ladda-label"><div style="color:white; font-weight:bold">'+
                            okButtonTxt+
                        '</div></spam>'+
            '</button>'+
            '<a href="#!" class="btn" data-dismiss="modal">' + 
              cancelButtonTxt + 
            '</a>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');

    confirmModal.find('#okButton').click(function(event) {
      callback();
      confirmModal.modal('hide');
    }); 

    confirmModal.modal('show');    
    };  
    /* END Generic Confirm func */
 
    function confirm_arg(heading, question, cancelButtonTxt, okButtonTxt, callback, args) {

    var confirmModal = 
      $('<div class="modal fade" style="top:30%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +        
          '<div class="modal-dialog modal-sm" role="document">' +
          '<div class="modal-content">' +
          '<div class="modal-header">' +
            '<button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                '<img src="'+base_url+'assets/img/FECHAR.png">'+
            '</button>' +
            '<h5 class="modal-title"><b>' + heading +'</b></h5>' +
          '</div>' +

          '<div class="modal-body">' +
            '<p>' + question + '</p>' +
          '</div>' +

          '<div class="modal-footer">' +            
            '<button id="okButton2" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">'+
                        '<spam class="ladda-label"><div style="color:white; font-weight:bold">'+
                            okButtonTxt+
                        '</div></spam>'+
            '</button>'+
            '<a href="#!" class="btn" data-dismiss="modal">' + 
              cancelButtonTxt + 
            '</a>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');

        confirmModal.find('#okButton2').click(function(event) {
        callback(args);
        confirmModal.modal('hide');
    }); 

    confirmModal.modal('show');    
  };  
    /* END Generic Confirm func */
   
});
   
function reset_element(element_selector, style) {
    $(element_selector).css("border", style);
}   

function validate_element(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern)) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
function toTimestamp(strDate){
    if(!strDate)
        return null;
    var datum = Date.parse(strDate);
    return datum/1000;
}


function validate_month(element_selector, pattern) {
    if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) < 1 || Number($(element_selector).val()) > 12) {
        $(element_selector).css("border", "1px solid red");
        return false;
    } else {
        $(element_selector).css("border", "1px solid gray");
        return true;
    }
}

function validate_year(element_selector, pattern) {
    if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) < 2018) {
        $(element_selector).css("border", "1px solid red");
        return false;
    } else {
        $(element_selector).css("border", "1px solid gray");
        return true;
    }
}

function validate_date(month, year) {
    var d=new Date();        
    if (year < d.getFullYear() || (year == d.getFullYear() && month <= d.getMonth()+1)){
        return false;
    }
    return true;
}

function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
}

function message_container(message, container, color){
    $(container).text(message);                                            
    $(container).css('visibility','visible');
    $(container).css('color', color);
}   

function concert_especial_char(str){
    str.replace(String.fromCharCode(46),String.fromCharCode(92,46));
    return str;
}

function toDate(number){    
    var a = new Date(number*1000);
    var year = a.getFullYear();
    var month = a.getMonth()+1;
    if(month <= 9)
        month = '0'+month;
    
    var date = a.getDate();
    if(date <= 9)
        date = '0'+date;
    var t = date + '/' + month + '/' + year;
    return t;
}

function real_date(number){
    var a = new Date(number);
    var year = a.getFullYear();
    var month = a.getMonth()+1;
    if(month <= 9)
        month = '0'+month;
    var date = a.getDate();        
    var t = month + '/' + date + '/' + year; 
    
    var datum = Date.parse(t);
    return datum;
}

function capitalize(s){
    return s.toLowerCase().replace( /\b./g, function(a){ return a.toUpperCase(); } );
};

