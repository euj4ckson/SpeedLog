$(document).ready(function () {
  $("#valorCaixa").hide();
  var valor=$("#valorCaixa").text();
  valor=valor.replace(/[^0-9]/g, '');
  valor=parseInt(valor);
  valor=(valor*0.70);
  $("#valorCaixa").text("VALOR EM CAIXA:"+ valor);
  $("#valorCaixa").show()
  $(".orderTab").hide();
  $("#listPendingOrders").show();
});
$('#sendPicture').click(function () {
  var $picture = $('#picChange').val().substring($('#picChange').val().indexOf('.'));
  if (~$picture.indexOf(".")) {
    $.ajax({
        url: 'deliveryman/updatePicture',
        headers: {
            'Content-Type': 'application/json'
        },
        type: "POST",
        dataType: "json",
        data: {
            "pic": $picture
        },
        success: function (result) {
            console.log(result);
        },
        error: function () {
            console.log("error");
        }
    });
  }
});
$('#btnPendingOrders').click(function () {
  $(".orderTab").hide();
  $("#listPendingOrders").show();
});
$('#btnOngoingOrders').click(function () {
  $(".orderTab").hide();
  $("#listOngoingOrders").show();
});
$('#btnFinishedOrders').click(function () {
  $(".orderTab").hide();
  $("#listFinishedOrders").show();
});
$('.confirmar').click(function () {
    var idCard = this.id;
    $.post("deliveryman/confirmarPedido", {idPedido: idCard},function(response) {
      alert(response);
      location.reload();
    });
});
$('.cancelar').click(function () {
  $.post("deliveryman/cancelarPedido",{entregaId:this.id});
  location.reload();
});
$('.concluir').click(function () {
  $.post("deliveryman/concluirPedido",{entregaId:this.id});
  location.reload();
});