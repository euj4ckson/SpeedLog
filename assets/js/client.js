$(document).ready(function () {
	$("#numeroCartao").mask("0000 0000 0000 0000");
	$("#dataValidade").mask("00/00");
	$('#cepretirada').mask('00000-000');
	$('#cepentrega').mask('00000-000');
	$('#largura').mask('0.00');
	$('#altura').mask('0.00');
	$("#cvv").mask("000");
	
	$("#tempoEstimado").hide();
	$("#valor_entrega").hide();
	$("#form_client").show();
	$("#acompanhar").hide();
	$("#historico").hide();
	$("#chat").hide();
	$("#botaotrocatela").click(function () {
		$("#form_client").show();
		$("#acompanhar").hide();
		$("#historico").hide();
		$("#chat").hide();
	});
	$("#botaoacompanhar").click(function () {
		$("#acompanhar").show();
		$("#historico").hide();
		$("#form_client").hide();
		$("#chat").hide();
	});
	$("#botaohistorico").click(function () {
		$("#historico").show();
		$("#form_client").hide();
		$("#acompanhar").hide();
	  	$("#chat").hide();
	});
	$("#botaoreclamacoes").click(function () {
		$("#chat").show();
		$("#historico").hide();
		$("#form_client").hide();
		$("#acompanhar").hide();
	});
	$(".btnPagar").click(function () {
		$(".informacaoPagamento").show();
	});
});
function pegarid(aq) {
	$.post("client/cancelar_pedido", {
		id: aq
	}, function (resposta) {
		if (resposta == "0") {
			alert("impossivel excluir");

		}
		if (resposta == "2") {
			alert("excluido");
		}

	});
}
$("#peso").keyup(function() {
	if ($(this).val()>=12) {
		$(this).val('12');
		$(this).addClass('invalidInput');
	}
	var peso = $("#peso").val();
	$("#packageWeight").html(peso);
});
$("#peso").click(function() {
	$(this).removeClass('invalidInput');
});
$("#largura").keyup(function() {
	var largura = $("#largura").val();
	$("#packageWidth").html(largura);
});
$("#altura").keyup(function() {
	var altura = $("#altura").val();
	$("#packageHeight").html(altura);
});
$("#cepentrega").keyup(function() {
	var originCEP = $(this).val();
	$(".invoiceOriginCEP").html(originCEP);
});
$("#cepretirada").keyup(function() {
	var DestinationCEP = $(this).val();
	$(".invoiceDestinationCEP").html(DestinationCEP);
});
function verificar_peso() {
	var peso = $("#peso").val();
	parseInt(peso);
	if (peso>12) {
	$("#divPeso").html("Não é permitido cargas com esse porte.");
	$("#divPeso").show();
	}else $("#divPeso").hide();
}
// calculo de valor do pedido
function teste() {
	var cep = $("#cepentrega").val();
	var cep2 = $("#cepretirada").val();
	var peso = $("#peso").val();
	parseInt(peso);
	if (cep != "") {
		//USO DE API DE DISTANCIA
		$.get("https://api.distancematrix.ai/maps/api/distancematrix/json?origins=" + cep2 + "&destinations=" + cep + "&key=EcQvMZeILr23cq8aw6nausfBMUMl5", function (data) {
			console.log(data);
			if (data != "") {
				var distancia = data['rows'][0]['elements'][0]['distance']['text'];
				var tempo = data['rows'][0]['elements'][0]['duration']['text'];
				var numsStr = tempo.replace(/[^0-9]/g, '');
				$("#tempoEstimado").val(numsStr);
				$.post("client/calculo", {
					distancia_cal: distancia,
					tempo_cal: numsStr,
					peso_cal: peso
				}, function (resposta) {
					$("#divcep2").html("distancia entre os pontos: " + distancia + "Tempo estimado de chegada: " + tempo + " Valor estimado de frete: " + resposta + "")
					$(".total").html(resposta);
					$("#valor_entrega").val(resposta);
				});
			}
		});
		// USO DE API DE LOCALIZAÇÃO
		var cepmeu=cep;
		$.get( "https://viacep.com.br/ws/"+ cepmeu +"/json/?data=?", function( data2 ) {
		    $("#ruaRetirada").val(data2['logradouro']);
			$('.invoiceDestinationAddress').html(data2['logradouro']);
		});
	}
	if (cep2 || cep == "") $("#divcep").html("digite um cep valido!");
}
function preencherCep1() {
	var cepmeu2 = $("#cepretirada").val();
	$.get( "https://viacep.com.br/ws/"+ cepmeu2 +"/json/?data=?", function( data3 ) {
		    $("#ruaEntrega").val(data3['logradouro']);
			$('.invoiceOriginAddress').html(data3['logradouro']);
		});
}
$('#btnMessage').click(function(){
  var message = $("#txtMessage").val();
  $.post("client/adicionarMensagem",{msgAdd:message});
  $("#txtMessage").val('');
});
$('.btn_avaliar').click(function(){
	$('#exampleModal').modal('show');
});
$('.closeModal').click(function(){
	$('#exampleModal').modal('hide');
});
 