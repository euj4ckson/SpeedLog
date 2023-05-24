//https://threejs.org/
$(document).ready(function () {
    $("#valorCaixa").hide();
    var valor=$("#valorCaixa").text();
    valor=valor.replace(/[^0-9]/g, '');
    valor=parseInt(valor);
    valor=(valor*0.30);
    $("#valorCaixa").text("VALOR EM CAIXA:"+ valor);
    $("#valorCaixa").show()
	$("#cpfAdmin").mask("000.000.000-00");
	$("#telefoneAdmin").mask("(00)0 0000-0000");
	$("#rskm").mask("00.00", {reverse: true});
	$("#rsmin").mask("00.00", {reverse: true});
    $(".tabAdmin").hide();
    $(".listDeliveryman").show();
});
$(".tabBtn").click(function(){              $(".tabAdmin").hide()});
$(".btnListDeliveryman").click(function(){  $(".listDeliveryman").show();});
$(".btnListDeliveries").click(function(){   $(".listDeliveries").show();});
$(".btnListClients").click(function(){      $(".listClients").show();});
$(".btnRegisterAdmins").click(function(){   $(".registerAdmins").show();});
$(".btnAdjustVariables").click(function(){  $(".adjustVariables").show();});
$(".btnReports").click(function(){          $(".listReports").show();});
$(".btnVouchers").click(function(){         $(".addVoucher").show();});
$("#btnCadastrarAdmin").click(function (){
    if ($("#nomeCompleto").val() != "" && 
    $("#emailAdmin").val() != "" && 
    $("#cpfAdmin").val() != "" && 
    $("#apelidoAdmin").val() != "" &&
    $("#telefoneAdmin").val() != "" && 
    $("#senhaAdmin").val() != "" && 
    $("#senhaAdmin").val() == $("#ConfSenhaAdmin").val()) {
        var post_nomeAdmin = $("#nomeCompleto").val();
        var post_emailAdmin = $("#emailAdmin").val();
        var post_cpfAdmin = $("#cpfAdmin").val();
        var post_apelidoAdmin = $("#apelidoAdmin").val();
        var post_telefoneAdmin = $("#telefoneAdmin").val();
        var post_senhaAdmin = $("#senhaAdmin").val();

        $.post("admin/registerAdmin", {
            nome: post_nomeAdmin,
            email: post_emailAdmin,
            cpf: post_cpfAdmin,
            apelido: post_apelidoAdmin,
            telefone: post_telefoneAdmin,
            senha: post_senhaAdmin,
        });
    }
});
$(".btnTimeOut").click(function (){
    var userTimedOut = this.id;
    $.post("admin/timeoutAccount",{user: userTimedOut});
    location.reload();
});
$("#all").click(function (){
    if ($(this).html() == 'TODOS'){
        $('.weekDay').prop('checked', true);
        $(this).html('NENHUM');
    }
    else{
        $(this).html('TODOS');
        $('.weekDay').prop('checked', false);
    }
});
$(".btnEditVariables").click(function (){
    var $days = [];
    $.each($('.weekDay'), function(){
        if (this.checked){
            $days.push($(this).attr('id').toUpperCase());
        }
    })
    var $cost = [];
    $.each($('.inputVariables'), function(){
        if ($(this).val()){
            $valor = $(this).val();
            $cost.push($valor);
        }
        else $cost.push(null);
    })
    var post_selectedDays = $days;
    var post_deliveryCost = $cost;
    if($days!="" && $cost!=""){
        $.post("admin/changeVariables", {
            days: post_selectedDays,
            cost: post_deliveryCost,
        });
        location.reload();
    } 
});
$("#btnAddVoucher").click(function (){
    // alert($("#startVoucher").val() + ' 11:24:11');
    if ($("#codeVoucher").val() != "" && 
    $("#discountVoucher").val() != "" && 
    $("#startVoucher").val() != "" &&
    $("#endVoucher").val() != "" && 
    $("#quantityVoucher").val() != "" && 
    $("#descriptionVoucher").val() != "") {
        var post_codeVoucher = $("#codeVoucher").val();
        var post_discountVoucher = $("#discountVoucher").val();
        if ($("#isPercentual").is(':checked')) var post_percentVoucher = '1';
        else var post_percentVoucher = '0';
        var post_startVoucher = $("#startVoucher").val() + ' 00:00:00';
        var post_endVoucher = $("#endVoucher").val() + ' 23:59:59';
        var post_quantityVoucher = $("#quantityVoucher").val();
        var post_descriptionVoucher = $("#descriptionVoucher").val();

        $.post("admin/addVoucher", {
            codeVoucher: post_codeVoucher,
            discountVoucher: post_discountVoucher,
            percentVoucher: post_percentVoucher,
            startVoucher: post_startVoucher,
            endVoucher: post_endVoucher,
            quantityVoucher: post_quantityVoucher,
            descriptionVoucher: post_descriptionVoucher,
        });
    }
    else alert('campos vazios');
});
