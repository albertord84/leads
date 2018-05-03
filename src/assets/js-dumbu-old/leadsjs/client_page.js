$(document).ready(function () {
    
    //------------desenvolvido para DUMBU-LEADS-------------------    
    
    $(document).on('click', '.play', function(){        
        var id_element = this.id;
        var res = id_element.split("_");
        var id_campaing = res[res.length-1];
        var l = Ladda.create(this);
        l.start();
        l.start();
        $.ajax({
            url: base_url + 'index.php/welcome/activate_campaing',
            data:  {
                'id_campaing': id_campaing                          
            },   
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response['success']) {
                    //alert(response['message']);                    
                    document.getElementById("divcamp_"+id_campaing).innerHTML = response['html_response'];
                    //$('#divcamp_'+id_campaing+'').innerHTML = response['html_response'];
    //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
    //                                    set_global_var('pk', response['pk']);
    //                                    set_global_var('datas', response['datas']);
    //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
    //                                    set_global_var('login', login);
    //                                    set_global_var('pass', pass);
    //                                    set_global_var('email', email);
    //                                    set_global_var('need_delete', response['need_delete']); 
                } else {
                      alert(response['message']);
    //                                    $('#container_sigin_message').text(response['message']);
    //                                    $('#container_sigin_message').css('visibility', 'visible');
    //                                    $('#container_sigin_message').css('color', 'red');                                    
                }
            },
            error: function (xhr, status) {
                $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                $('#container_sigin_message').css('visibility', 'visible');
                $('#container_sigin_message').css('color', 'red');
            }
        });
        l.stop();
        
    });

    $(document).on('click', '.pause', function(){        
        var id_element = this.id;
        var res = id_element.split("_");
        var id_campaing = res[res.length-1];
        var l = Ladda.create(this);
        l.start();
        l.start();
        $.ajax({
            url: base_url + 'index.php/welcome/pause_campaing',
            data:  {
                'id_campaing': id_campaing                          
            },   
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response['success']) {
                    //alert(response['message']);
                    document.getElementById("divcamp_"+id_campaing).innerHTML = response['html_response'];
    //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
    //                                    set_global_var('pk', response['pk']);
    //                                    set_global_var('datas', response['datas']);
    //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
    //                                    set_global_var('login', login);
    //                                    set_global_var('pass', pass);
    //                                    set_global_var('email', email);
    //                                    set_global_var('need_delete', response['need_delete']); 
                } else {
                      alert(response['message']);
    //                                    $('#container_sigin_message').text(response['message']);
    //                                    $('#container_sigin_message').css('visibility', 'visible');
    //                                    $('#container_sigin_message').css('color', 'red');                                    
                }
            },
            error: function (xhr, status) {
                $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                $('#container_sigin_message').css('visibility', 'visible');
                $('#container_sigin_message').css('color', 'red');
            }
        });
        l.stop();
        
    });    

    
    $(document).on('click', '.cancel', function(){        
        var id_element = this.id;
        var res = id_element.split("_");
        var id_campaing = res[res.length-1];
        var l = Ladda.create(this);
        l.start();
        l.start();
        $.ajax({
            url: base_url + 'index.php/welcome/cancel_campaing',
            data:  {
                'id_campaing': id_campaing                          
            },   
            type: 'POST',
            dataType: 'json',
            beforeSend:function(){
                    return confirm("Are you sure to cancel this campaing?");
                 },
            success: function (response) {
                if (response['success']) {
                    alert(response['message']);
                    $('#divcamp_'+id_campaing+'').remove();
    //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
    //                                    set_global_var('pk', response['pk']);
    //                                    set_global_var('datas', response['datas']);
    //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
    //                                    set_global_var('login', login);
    //                                    set_global_var('pass', pass);
    //                                    set_global_var('email', email);
    //                                    set_global_var('need_delete', response['need_delete']);                                    
                } else {
                      alert(response['message']);
    //                                    $('#container_sigin_message').text(response['message']);
    //                                    $('#container_sigin_message').css('visibility', 'visible');
    //                                    $('#container_sigin_message').css('color', 'red');                                    
                }
            },
            error: function (xhr, status) {
                $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                $('#container_sigin_message').css('visibility', 'visible');
                $('#container_sigin_message').css('color', 'red');
            }
        }); 
        l.stop();
        
    });    
    
    $("#do_save_campaing").click(function () {
        var language = "PT";
        var total_daily_value = $('#daily_value').val(); 
        var available_daily_value = $('#daily_value').val();
        var insta_id = "";
        
        var campaing_type_id = $('#campaing_type').val();
        var client_objetive = $('#objective').val();
                
        var profiles = $('#profileForm').serialize();               
       
        if (total_daily_value != '' && client_objetive != '') {
            if (validate_element('#daily_value', "^[1-9][0-9]*([\.,][0-9]{1,2})?$") ||
                validate_element('#daily_value', "^[0][\.,][1-9][0-9]?$") ||
                validate_element('#daily_value', "^[0][\.,][0-9]?[1-9]$")) {
//                if (validate_element('#signin_clientLogin', '^[a-zA-Z0-9\._]{1,300}$')) {
                    //if($("#errorcaptcha").text()!='Codigo de segurança errado' && $("#errorcaptcha").text()!=''){
                        var l = Ladda.create(this);
                        l.start();
                        l.start();
                        $.ajax({
                            url: base_url + 'index.php/welcome/save_campaing',
                            data:  {
                                'total_daily_value': total_daily_value,
                                'available_daily_value': available_daily_value,                
                                'insta_id':insta_id,
                                'campaing_type_id': campaing_type_id,
                                'client_objetive': client_objetive,                
                                'language': language,
                                'profiles': profiles                                
                            },   
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response['success']) {
                                    alert(response['message']);
                                    document.getElementById("demo_show_campaings").innerHTML += response['html_response'];
//                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
//                                    set_global_var('pk', response['pk']);
//                                    set_global_var('datas', response['datas']);
//                                    set_global_var('early_client_canceled', response['early_client_canceled']);
//                                    set_global_var('login', login);
//                                    set_global_var('pass', pass);
//                                    set_global_var('email', email);
//                                    set_global_var('need_delete', response['need_delete']);                             
                                } else {
                                      alert(response['message']);
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');                                    
                                }

                            },
                            error: function (xhr, status) {
                                $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                                $('#container_sigin_message').css('visibility', 'visible');
                                $('#container_sigin_message').css('color', 'red');
                            }
                        }); 
                        l.stop();
//                } else {
//                    $('#container_sigin_message').text(T('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos!'));
//                    $('#container_sigin_message').css('visibility', 'visible');
//                    $('#container_sigin_message').css('color', 'red');
//                }
            } else {
                  alert('Deve ser um número (não zero) com até dois valores decimais!');
//                $('#container_sigin_message').text(T('Deve fornecer um valor númerico!'));
//                $('#container_sigin_message').css('visibility', 'visible');
//                $('#container_sigin_message').css('color', 'red');
                //modal_alert_message('O email informado não é correto');
            }
        } else {
              alert('Preencha todos os dados da campanha corretamente!');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       
    });
    
    $("#do_add_profile_temp").click(function () {
        
       //var profiles = $('#profileForm').serialize();               
       var profile_temp = $('#profile_temp').val();
       var profile_type_temp = $('#profile_type_temp').val();
       
       if (profile_temp){
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/add_temp_profile',
                    data:  {                        
                        'profile_temp': profile_temp,
                        'profile_type_temp': profile_type_temp
                    },   
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response['success']) {
                            alert(response['message']);
//                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
//                                    set_global_var('pk', response['pk']);
//                                    set_global_var('datas', response['datas']);
//                                    set_global_var('early_client_canceled', response['early_client_canceled']);
//                                    set_global_var('login', login);
//                                    set_global_var('pass', pass);
//                                    set_global_var('email', email);
//                                    set_global_var('need_delete', response['need_delete']);                               
                        } else {
                              alert(response['message']);
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');                                    
                        }
                    },
                    error: function (xhr, status) {
                        $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                        $('#container_sigin_message').css('visibility', 'visible');
                        $('#container_sigin_message').css('color', 'red');
                    }
                }); 
                l.stop();
            } else {
              alert('Deve fornecer um perfil');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       
    });

    $("#do_delete_profile_temp").click(function () {
        
       //var profiles = $('#profileForm').serialize();               
       var profile_temp = $('#profile_temp').val();
       
       if (profile_temp) {
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/delete_temp_profile',
                    data:  {                        
                        'profile_temp': profile_temp
                    },   
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response['success']) {
                            alert(response['message']);
//                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
//                                    set_global_var('pk', response['pk']);
//                                    set_global_var('datas', response['datas']);
//                                    set_global_var('early_client_canceled', response['early_client_canceled']);
//                                    set_global_var('login', login);
//                                    set_global_var('pass', pass);
//                                    set_global_var('email', email);
//                                    set_global_var('need_delete', response['need_delete']);                                    
                        } else {
                              alert(response['message']);
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');                                    
                        }

                    },
                    error: function (xhr, status) {
                        $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                        $('#container_sigin_message').css('visibility', 'visible');
                        $('#container_sigin_message').css('color', 'red');
                    }
                });
                l.stop();
            } else {
              alert('Deve fornecer um perfil');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       
    });
    
    
    $("#do_show_campaings").click(function () {
               
       if (true) {
//            if (validate_element('#client_email', "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,4}$")) {
//                if (validate_element('#signin_clientLogin', '^[a-zA-Z0-9\._]{1,300}$')) {
                    //if($("#errorcaptcha").text()!='Codigo de segurança errado' && $("#errorcaptcha").text()!=''){
                        var l = Ladda.create(this);
                        l.start();
                        l.start();
                        $.ajax({
                            url: base_url + 'index.php/welcome/show_campaings',
                            data:  {
                            },   
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response['success']) {
                                    //alert(response['message']);
                                    clearBox("demo_show_campaings");
                                    //document.getElementById("demo_show_campaings").innerHTML = "";
                                    document.getElementById("demo_show_campaings").innerHTML = response['message'];
//                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
//                                    set_global_var('pk', response['pk']);
//                                    set_global_var('datas', response['datas']);
//                                    set_global_var('early_client_canceled', response['early_client_canceled']);
//                                    set_global_var('login', login);
//                                    set_global_var('pass', pass);
//                                    set_global_var('email', email);
//                                    set_global_var('need_delete', response['need_delete']);                               
                                } else {
                                      alert(response['message']);
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');                                    
                                }
                            },
                            error: function (xhr, status) {
                                $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                                $('#container_sigin_message').css('visibility', 'visible');
                                $('#container_sigin_message').css('color', 'red');
                            }
                        });
                        l.stop();
//                } else {
//                    $('#container_sigin_message').text(T('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos!'));
//                    $('#container_sigin_message').css('visibility', 'visible');
//                    $('#container_sigin_message').css('color', 'red');
//                }
//            } else {
//                $('#container_sigin_message').text(T('Problemas na estrutura do email informado!'));
//                $('#container_sigin_message').css('visibility', 'visible');
//                $('#container_sigin_message').css('color', 'red');
//                //modal_alert_message('O email informado não é correto');
//            }
        } else {
              alert('Preencha todos os dados corretamente!');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       
    });
    
    $("#do_activate_campaing").click(function () {
        var id_campaing = $('#id_campaing').val();
        if (validate_element('#id_campaing', '^[1-9][0-9]*$')) {
            var l = Ladda.create(this);
            l.start();
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/activate_campaing',
                data:  {
                    'id_campaing': id_campaing                          
                },   
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        alert(response['message']);
        //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
        //                                    set_global_var('pk', response['pk']);
        //                                    set_global_var('datas', response['datas']);
        //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
        //                                    set_global_var('login', login);
        //                                    set_global_var('pass', pass);
        //                                    set_global_var('email', email);
        //                                    set_global_var('need_delete', response['need_delete']); 
                    } else {
                          alert(response['message']);
        //                                    $('#container_sigin_message').text(response['message']);
        //                                    $('#container_sigin_message').css('visibility', 'visible');
        //                                    $('#container_sigin_message').css('color', 'red');                                    
                    }
                },
                error: function (xhr, status) {
                    $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                    $('#container_sigin_message').css('visibility', 'visible');
                    $('#container_sigin_message').css('color', 'red');
                }
            });
            l.stop();
        }
        else{
            alert("O id deve ser um número entero positivo");
        }         
    });
    
    $("#do_pause_campaing").click(function () {
        var id_campaing = $('#id_campaing').val();
        if (validate_element('#id_campaing', '^[1-9][0-9]*$')) {
            var l = Ladda.create(this);
            l.start();
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/pause_campaing',
                data:  {
                    'id_campaing': id_campaing                          
                },   
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        alert(response['message']);
        //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
        //                                    set_global_var('pk', response['pk']);
        //                                    set_global_var('datas', response['datas']);
        //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
        //                                    set_global_var('login', login);
        //                                    set_global_var('pass', pass);
        //                                    set_global_var('email', email);
        //                                    set_global_var('need_delete', response['need_delete']);                                    
                    } else {
                          alert(response['message']);
        //                                    $('#container_sigin_message').text(response['message']);
        //                                    $('#container_sigin_message').css('visibility', 'visible');
        //                                    $('#container_sigin_message').css('color', 'red');                                    
                    }
                },
                error: function (xhr, status) {
                    $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                    $('#container_sigin_message').css('visibility', 'visible');
                    $('#container_sigin_message').css('color', 'red');
                }
            });
            l.stop();
        }
        else{
            alert("O id deve ser um número entero positivo");
        }
    });
    
    $("#do_cancel_campaing").click(function () {
        var id_campaing = $('#id_campaing').val();
        if (validate_element('#id_campaing', '^[1-9][0-9]*$')) {
            var l = Ladda.create(this);
            l.start();
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/cancel_campaing',
                data:  {
                    'id_campaing': id_campaing                          
                },   
                type: 'POST',
                dataType: 'json',
                beforeSend:function(){
                        return confirm("Are you sure to cancel this campaing?");
                     },
                success: function (response) {
                    if (response['success']) {
                        alert(response['message']);
        //                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
        //                                    set_global_var('pk', response['pk']);
        //                                    set_global_var('datas', response['datas']);
        //                                    set_global_var('early_client_canceled', response['early_client_canceled']);
        //                                    set_global_var('login', login);
        //                                    set_global_var('pass', pass);
        //                                    set_global_var('email', email);
        //                                    set_global_var('need_delete', response['need_delete']);                                    
                    } else {
                          alert(response['message']);
        //                                    $('#container_sigin_message').text(response['message']);
        //                                    $('#container_sigin_message').css('visibility', 'visible');
        //                                    $('#container_sigin_message').css('color', 'red');                                    
                    }
                },
                error: function (xhr, status) {
                    $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                    $('#container_sigin_message').css('visibility', 'visible');
                    $('#container_sigin_message').css('color', 'red');
                }
            }); 
            l.stop();
        }
        else{
            alert("O id deve ser um número entero positivo");
        }
        l.stop();
    });
        
    $("#do_add_profile").click(function () {
        
       //var profiles = $('#profileForm').serialize();               
       var profile = $('#profile').val();
       var id_campaing = $('#id_campaing').val();
       var profile_type = $('#profile_type').val();
       
       if (profile) {
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/add_profile',
                    data:  {                        
                        'profile': profile,                                
                        'id_campaing': id_campaing,
                        'profile_type': profile_type
                    },   
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response['success']) {
                            //document.getElementById("demo_show_campaings").innerHTML = response['message'];
                            //alert('Profile added');                                    
                            alert(response['message']);                                    
                        }else {                              
                                if(!response['old_profile'])
                                    alert(response['message']);
                                else{
                                    $.ajax({                                    
                                    url: base_url + 'index.php/welcome/add_existing_profile',
                                    data: {
                                        'old_profile': response['old_profile']
                                    },
                                    type: 'POST',
                                    dataType: 'json',
                                    beforeSend:function(){
                                        return confirm("You wish add a previously deleted profile for this campaing?");
                                     },
                                    success: function (response2) {
                                        if (response2['success']) {
                                            alert(response2['message']);
                                        }
                                        else{
                                            alert(response2['message']);
                                        }
                                    }
                                    });
                                }
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');   
                        }

                    },
                    error: function (xhr, status) {
                        $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                        $('#container_sigin_message').css('visibility', 'visible');
                        $('#container_sigin_message').css('color', 'red');
                    }
                });
                l.stop();
            } else {
              alert('Deve fornecer um perfil');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       
    });
    
    $("#do_delete_profile").click(function () {
        
       //var profiles = $('#profileForm').serialize();               
       var profile = $('#profile').val();
       var id_campaing = $('#id_campaing').val();
       
       if (profile) {
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/delete_profile',
                    data:  {                        
                        'profile': profile,                                
                        'id_campaing': id_campaing
                    },   
                    type: 'POST',
                    dataType: 'json',
                    beforeSend:function(){
                        return confirm("Are you sure to remove this profile?");
                     },
                    success: function (response) {
                        if (response['success']) {
                            alert(response['message']);
//                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
//                                    set_global_var('pk', response['pk']);
//                                    set_global_var('datas', response['datas']);
//                                    set_global_var('early_client_canceled', response['early_client_canceled']);
//                                    set_global_var('login', login);
//                                    set_global_var('pass', pass);
//                                    set_global_var('email', email);
//                                    set_global_var('need_delete', response['need_delete']);                                    
                        } else {
                              alert(response['message']);
//                                    $('#container_sigin_message').text(response['message']);
//                                    $('#container_sigin_message').css('visibility', 'visible');
//                                    $('#container_sigin_message').css('color', 'red');                                    
                        }
                    },
                    error: function (xhr, status) {
                        $('#container_sigin_message').text('Não foi possível comprobar a autenticidade do usuario no Instagram!');
                        $('#container_sigin_message').css('visibility', 'visible');
                        $('#container_sigin_message').css('color', 'red');
                    }
                });
                l.stop();
            } else {
              alert('Deve fornecer um perfil');
//            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
//            $('#container_sigin_message').css('visibility', 'visible');
//            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
       
       l.stop();
    });
    
    $("#do_go_leads").on("click", function(){
        //$("#loading").load('<?php echo site_url('site2/home2/'); ?>'+id);
        //$("#loading").load('<?php echo site_url('+base_url + 'index.php/welcome/go_leads); ?>');
        //window.location.href = base_url + 'index.php/welcome/go_leads';
        //var id = 2;//$(this).attr('id'); //you need to have 'id' attribute in your anchor
        //$("#loading").load('<?php echo site_url('+ base_url + 'index.php/welcome/go_leads); ?>');
        
        $.ajax({
            type: "POST",
            url: base_url + 'index.php/welcome/ask_go_leads', //calling method in controller
            data: {},
            dataType:'json',
            success: function (response) {
                if (response['success']) {
                    $(location).attr('href',base_url+'index.php/welcome/go_leads');
                }
                else{
                    alert(response['message']);
                }
            },
            error: function(){ alert('Ooops ... server problem'); }
        });
        
    });
    
    $("#do_go_add_card").on("click", function(){
        //$("#loading").load('<?php echo site_url('site2/home2/'); ?>'+id);
        //$("#loading").load('<?php echo site_url('+base_url + 'index.php/welcome/go_leads); ?>');
        //window.location.href = base_url + 'index.php/welcome/go_leads';
        //var id = 2;//$(this).attr('id'); //you need to have 'id' attribute in your anchor
        //$("#loading").load('<?php echo site_url('+ base_url + 'index.php/welcome/go_leads); ?>');
        
        $.ajax({
            type: "POST",
            url: base_url + 'index.php/welcome/ask_go_add_card', //calling method in controller
            data: {},
            dataType:'json',
            success: function (response) {
                if (response['success']) {
                    $(location).attr('href',base_url+'index.php/welcome/go_add_card');
                }
                else{
                    alert(response['message']);
                }
            },
            error: function(){ alert('Ooops ... server problem'); }
        });
        
    });
    
    $("#do_get_leads").on("click", function(){
        // Data to post
        var profile = $('#profile').val();
        var id_campaing = $('#id_campaing').val();
        var init_date = toTimestamp( $('#init_date').val() );
        var end_date = toTimestamp( $('#end_date').val() );
        
        if(init_date <= end_date){
            $.ajax({
            type: "POST",
            url: base_url + 'index.php/welcome/get_leads_campaing', //calling method in controller
            data: {
                id_campaing: id_campaing,
                profile: profile,
                init_date: init_date,
                end_date: end_date
            },
            dataType:'json',
            success: function (response) {
                if (response['success']) {
                    a = document.createElement('a');
                    
                    a.href = window.URL.createObjectURL( new Blob([response['file']]) );
                    // Give filename you wish to download
                    a.download = "leads.csv";
                    a.style.display = 'none';
                    document.body.appendChild(a);
                    a.click();
                }
                else{
                    alert(response['message']);
                }
            },
            error: function(){ alert('Ooops ... server problem'); }
        });
        }
        else
        {
            alert("A data incial deve ser anterior à data final");
        }        
    });
    
    $("#do_add_card").on("click", function(){
        
        var l = Ladda.create(this);
        l.start();
        l.start();
        
        if (($('#credit_card_name').val()).toUpperCase()==='VISA' || ($('#credit_card_name').val()).toUpperCase()==='MASTERCARD') {
            alert("Informe seu nome no cartão e não a bandeira dele.");
        }

        var name = validate_element('#credit_card_name', "^[A-Z ]{4,50}$");
        var number = validate_element('#credit_card_number', "^[0-9]{10,20}$");

        if (number) {
            // Validating a Visa card starting with 4, length 13 or 16 digits.
            number = validate_element('#credit_card_number', "^(?:4[0-9]{12}(?:[0-9]{3})?)$");

            if (!number) {
                // Validating a MasterCard starting with 51 through 55, length 16 digits.
                number = validate_element('#credit_card_number', "^(?:5[1-5][0-9]{14})$");

                if (!number) {
                    // Validating a American Express credit card starting with 34 or 37, length 15 digits.
                    number = validate_element('#credit_card_number', "^(?:3[47][0-9]{13})$");

                    if (!number) {
                        // Validating a Discover card starting with 6011, length 16 digits or starting with 5, length 15 digits.
                        number = validate_element('#credit_card_number', "^(?:6(?:011|5[0-9][0-9])[0-9]{12})$");

                        if (!number) {
                            // Validating a Diners Club card starting with 300 through 305, 36, or 38, length 14 digits.
                            number = validate_element('#credit_card_number', "^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$");

                            if (!number) {
                                // Validating a Elo credit card
                                number = validate_element('#credit_card_number', "^(?:((((636368)|(438935)|(504175)|(451416)|(636297))[0-9]{0,10})|((5067)|(4576)|(4011))[0-9]{0,12}))$");

                                if (!number) {
                                    // Validating a Hypercard
                                    number = validate_element('#credit_card_number', "^(?:(606282[0-9]{10}([0-9]{3})?)|(3841[0-9]{15}))$");
                                }
                            }
                        }
                    }
                }
            }
        }

        var cvv = validate_element('#credit_card_cvc', "^[0-9]{3,4}$");
        var month = validate_month('#credit_card_exp_month', "^(0?[1-9]|1[012])$");
        //validate_element('#client_email', "^([2-9][0-9]{3})$");
        var year = validate_year('#credit_card_exp_year', "^([2-9][0-9]{3})$");            
        var date = validate_date($('#credit_card_exp_month').val(),$('#credit_card_exp_year').val());            
        if (name && number && cvv && month && year) {
            if (date) {
                //alert('Dados corretos!');
                datas={                    
                    'credit_card_number': $('#credit_card_number').val(),
                    'credit_card_cvc': $('#credit_card_cvc').val(),
                    'credit_card_name': $('#credit_card_name').val(),
                    'credit_card_exp_month': $('#credit_card_exp_month').val(),
                    'credit_card_exp_year': $('#credit_card_exp_year').val()                                        
                };                
                
                $.ajax({
                    url: base_url + 'index.php/welcome/add_credit_card',
                    data: datas,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response['success']) {
                            alert(response['message']);                            
                        } else {
                            if(!response['existing_card'])
                                alert(response['message']);
                            else{                                
                                $.ajax({                                    
                                url: base_url + 'index.php/welcome/update_credit_card',
                                data: datas,
                                type: 'POST',
                                dataType: 'json',
                                beforeSend:function(){
                                    return confirm("You wish overwrite a previously added credit card?");
                                 },
                                success: function (response2) {
                                    if (response2['success']) {
                                        alert(response2['message']);
                                    }
                                    else{
                                        alert(response2['message']);
                                    }
                                }
                                });
                            }
                        }
                    },
                    error: function (xhr, status) {
                        set_global_var('flag', true);
                    }
                });
            } else {
                alert('Data errada');
                /*set_global_var('flag', true);
                $('#btn_sing_in').attr('disabled', false);
                $('#btn_sing_in').css('cursor', 'pointer');
                $('#my_body').css('cursor', 'auto');
                 */
            }   
        } else{
            alert('Verifique os dados fornecidos');
            /*set_global_var('flag', true);
            $('#btn_sing_in').attr('disabled', false);
            $('#btn_sing_in').css('cursor', 'pointer');
            $('#my_body').css('cursor', 'auto');*/
        }
        l.stop();
    });
    
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
    
});
   