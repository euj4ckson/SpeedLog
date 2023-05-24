$(document).ready(function(){
    $(".loginForm").hide();
    $(".signUpType").hide();
    $(".signUp").hide();
    $(".iconContinue").hide();
	$('#cpf_SignUp').mask('000.000.000-00');
	$('#phoneNumber_SignUp').mask('(00)00000-0000');
	$('#license_SignUp').mask('AAA AAAA');
    // IMPEDE ESPAÇOS NOS INPUTS:
    $(".spaceNotAllowed").on({
        keydown: function(e) {
          if (e.which === 32)
            return false;
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
        }
    });
    // var str = "    ";
    // if (!str.replace(/\s/g, '').length) {
    // console.log('string only contains whitespace (ie. spaces, tabs or line breaks)');
    // }

    // TIPO 1= CARRO, 2 =  MOTO, 3 = CAMINHAO
    // var settings = {
    //     "url": "https://placa-fipe.apibrasil.com.br/placa/consulta",
    //     "method": "POST",
    //     "timeout": 0,
    //     "headers": {
    //       "Content-Type": "application/json"
    //     },
    //     "data": JSON.stringify({
    //       "placa": "MRX5805"
    //     }),
    //   };
      
    //   $.ajax(settings).done(function (response) {
    //     console.log(response);
    //   });
    
    
    // var cpfSearch = {
    //     "url": "https://apigateway.conectagov.estaleiro.serpro.gov.br/api-cpf-light-trial/v2/consulta/cpf",
    //     "method": "POST",
    //     // "timeout": 0,
    //     "headers": {
    //       "Content-Type": "application/json",
    //     //   'Authorization': 'https://apigateway.conectagov.estaleiro.serpro.gov.br/oauth2/jwt-token'
    //     },
    //     "data": JSON.stringify({
    //       "x-cpf-usuario": ""
    //     }),
    //   };
      
    //   $.ajax(cpfSearch).done(function (response) {
    //     console.log(response);
    //   });
    // $.ajax({
    //     url: 'https://apigateway.conectagov.estaleiro.serpro.gov.br/api-cpf-light-trial/v2/consulta/cpf',
    //     headers: {
    //         'Content-Type': 'application/json'
    //     },
    //     type: "POST",
    //     dataType: "json",
    //     data: {
    //         "x-cpf-usuario": "14852776636"
    //     },
    //     success: function (result) {
    //         console.log(result);
    //     },
    //     error: function () {
    //         console.log("error");
    //     }
    // });
});
$(".btnSign").click(function(){
    if ($(this).hasClass("btnSignIn") && $('.signIn').is(':hidden')){
        $('.tabSign').removeClass('selectedTabSign');
        $('.tabSignIn').addClass('selectedTabSign');
        $(".loginForm").show();
        $(".signUpType").hide();
        $(".signUp").hide();
        $(".signIn").show();
    }
    else if ($(this).hasClass("btnSignUp") && $('.signUpType').is(':hidden') || $(this).hasClass("btnService") && $('.signUpType').is(':hidden')){
        $('.tabSign').removeClass('selectedTabSign');
        $('.tabSignUp').addClass('selectedTabSign');
        $(".loginForm").show();
        $(".signUpType").show();
        $(".signIn").hide();
        $(".signUp").hide();
    }
    else {
        $(".loginForm").hide();
        $('.tabSign').removeClass('selectedTabSign');
    }
});
$(".videoPause").click(function(){
    if ($(".background").get(0).paused){
        $(".background").get(0).play();
        $(".iconPause").show();
        $(".iconContinue").hide();
    }
    else {
        $(".background").get(0).pause();
        $(".iconContinue").show();
        $(".iconPause").hide();
    }
});
$(".signUpClient").click(function(){
    $(".deliverymanForm").hide();
    $(".signUpType").hide();
    $(".signUp").show();
    $(".clientCheck").show();
    $(".deliverymanCheck").hide();
});
$(".signUpDeliveryman").click(function(){
    $(".deliverymanForm").show();
    $(".signUpType").hide();
    $(".signUp").show();
    $(".clientCheck").hide();
    $(".deliverymanCheck").show();
});
$("#signIn").click(function(){
    if ($("#user_SignIn").val() != "" && $("#pass_SignIn").val() != "") {
        var userName_signIn = $("#user_SignIn").val();
        var userPass_signIn = $("#pass_SignIn").val();
        if ($("#keepLogged").is(':checked')){
            alert("lembrar login marcado!")
        }
        $.post("index.php/connect/connectUser",{user:userName_signIn,pass:userPass_signIn}, function(result){
            console.log(result);
            if (result){
                location.assign(result);
                location.reload();
            }
            else $('#warning').html('Credenciais incorretas');
        });
    }
    else $('#warning').html('Preencha todos os campos');
    });
$("#signUp").click(function(){
    
    $.each($('.inputSignUp'), function(){
        if ($(this).val()=="") {
            // alert($(this).attr('id'));
            $(this).attr('placeholder', 'Não pode ser vazio');
            $(this).addClass('invalidInput');
            $(this).filter(":first").focus();
        }
    })
    if ($('.deliverymanForm').is(':hidden')) {
        if ($("#name_SignUp").val() != "" && 
        $("#email_SignUp").val() != "" && 
        $("#cpf_SignUp").val() != "" && 
        $("#nickname_SignUp").val() != "" &&
        $("#phoneNumber_SignUp").val() != "" && 
        $("#pass1_SignUp").val() != "" && 
        $("#pass2_SignUp").val() == $("#pass1_SignUp").val()) {
            var name_signUp = $("#name_SignUp").val();
            var email_SignUp = $("#email_SignUp").val();
            var cpf_signUp = $("#cpf_SignUp").val();
            var nickname_SignUp = $("#nickname_SignUp").val();
            var phoneNumber_SignUp = $("#phoneNumber_SignUp").val();
            var licensePlate_SignUp = $('#license_SignUp').val();
            var pass_SignUp = $("#pass1_SignUp").val();
            $.post("index.php/connect/registerUser",{name:name_signUp,email:email_SignUp,cpf:cpf_signUp,nick:nickname_SignUp,phone:phoneNumber_SignUp,license:licensePlate_SignUp,pass:pass_SignUp}, function(result){
                if (result.includes("speedlog")){
                    location.assign(result);
                    location.reload();
                }
                else {
                    if (result.includes('nickname')){
                        $("#nickname_SignUp").addClass('invalidInput');
                        $('#nickname_SignUp').filter(":first").focus();
                    }
                    else $("#nickname_SignUp").addClass('validInput');
                    if (result.includes('cpf')){
                        $("#cpf_SignUp").addClass('invalidInput');
                        $('#cpf_SignUp').filter(":first").focus();
                    }
                    else $("#cpf_SignUp").addClass('validInput');
                    if (result.includes('email')){
                        $("#email_SignUp").addClass('invalidInput');
                        $('#email_SignUp').filter(":first").focus();
                    }
                    else $("#email_SignUp").addClass('validInput');
                }
            });
            $("#txtMessage").val('');
            // if ($("#clientEmailCheck").is(':checked')){
            //     alert("receber email marcado!")
            // }
        }
        else $('#warning').html('Preencha todos os campos');
    }
    else if ($('.deliverymanForm').is(':visible') && $('#license_SignUp').val() != "") {
        if ($("#name_SignUp").val() != "" && 
        $("#email_SignUp").val() != "" && 
        $("#cpf_SignUp").val() != "" && 
        $("#nickname_SignUp").val() != "" &&
        $("#phoneNumber_SignUp").val() != "" && 
        $("#pass1_SignUp").val() != "" && 
        $("#pass2_SignUp").val() == $("#pass1_SignUp").val()) {
            var name_signUp = $("#name_SignUp").val();
            var email_SignUp = $("#email_SignUp").val();
            var cpf_signUp = $("#cpf_SignUp").val();
            var nickname_SignUp = $("#nickname_SignUp").val();
            var phoneNumber_SignUp = $("#phoneNumber_SignUp").val();
            var licensePlate_SignUp = $('#license_SignUp').val();
            var pass_SignUp = $("#pass1_SignUp").val();
            $.post("index.php/connect/registerUser",{name:name_signUp,email:email_SignUp,cpf:cpf_signUp,nick:nickname_SignUp,phone:phoneNumber_SignUp,license:licensePlate_SignUp,pass:pass_SignUp}, function(result){
                if (result.includes("speedlog")){
                    location.assign(result);
                    location.reload();
                }
                else {
                    if (result.includes('email')) $("#email_SignUp").addClass('invalidInput');
                    else $("#email_SignUp").addClass('validInput');
                    if (result.includes('cpf')) $("#cpf_SignUp").addClass('invalidInput');
                    else $("#cpf_SignUp").addClass('validInput');
                    if (result.includes('nickname')) $("#nickname_SignUp").addClass('invalidInput');
                    else $("#nickname_SignUp").addClass('validInput');
                }
            });
            $("#txtMessage").val('');
        }
        else $('#warning').html('Preencha todos os campos');
    }
    else{
        $('#license_SignUp').attr('placeholder', 'Não pode ser vazio');
        $("#license_SignUp").addClass('invalidInput');
    }
});

$(".formInput").keyup(function(){
    $('#warning').html('');
    $(this).removeClass('invalidInput');
    $(this).removeClass('validInput');
});