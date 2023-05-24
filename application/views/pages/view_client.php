<title>Cliente - SpeedLog</title>
<div class="container">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<button class="btn btn-light" id="botaotrocatela" aria-current="page">Fazer Pedido</button>
				</li>
				<li class="nav-item">
					<button class="btn btn-light" id="botaoacompanhar">Acompanhe seu pedido</button>
				</li>
				<li class="nav-item">
					<button class="btn btn-light" id="botaohistorico">historico de pedidos</button>
				</li>
				<li class="nav-item">
					<button class="btn btn-light" id="botaoreclamacoes">Suporte</button>
				</li>
			</ul>
		<div class="row">
			<div class="col flex-row spaced-between" id="form_client">
				<form action="<?php echo base_url()?>index.php/client/fazer_pedido" method="post">
				<div class="line flex-row packageInfo">
					<div class="">
						<label for="exampleInputText1" class="form-label">Peso da Mercadoria(Kg)</label>
						<input type="number"  onblur="verificar_peso()" class="form-control" name="peso" id="peso"
							placeholder="Digite o peso da sua mercadoria" aria-describedby="TextHelp">
						<div id="divPeso"></div>
					</div>
					<div class="">
						<label for="exampleInputText1" class="form-label">Largura</label>
						<input type="Text" class="form-control" name="largura" id="largura"
							placeholder="Digite a largura da sua mercadoria" aria-describedby="TextHelp">
					</div>
					<div class="">
						<label for="exampleInputText1" class="form-label">Altura</label>
						<input type="Text" class="form-control" name="altura" id="altura"
							placeholder="Digite a altura da sua mercadoria" aria-describedby="TextHelp">
					</div>
				</div>
				<div class="line flex-row originInfo">
					<div class="mb-3">
						<label for="exampleInputText1" class="form-label">cep(retirada)</label>
						<input type="Text" value="36050-000" class="form-control" name="cepretirada"
							id="cepretirada" onblur="preencherCep1()" placeholder="Digite o cep de retirada da sua mercadoria"
							aria-describedby="TextHelp">
						<div id="divcep1"></div>
					</div>
					<div class="mb-3">
						<label for="exampleInputText1" class="form-label">Rua Retirada</label>
						<input type="Text"  class="form-control" name="ruaEntrega"
							id="ruaEntrega" placeholder="Digite o cep de entrega da sua mercadoria"
							aria-describedby="TextHelp">
					</div>
				</div>
				<div class="line flex-row destinationInfo">
					<div class="mb-3">
						<label for="exampleInputText1" class="form-label">cep(entrega)</label>
						<input type="Text" value="36036000" class="form-control" onblur="teste()" name="cepentrega"
							id="cepentrega" placeholder="Digite o cep de entrega da sua mercadoria"
							aria-describedby="TextHelp">
						<div id="divcep2"></div>
					</div>
					<div class="mb-3">
						<label for="exampleInputText1" class="form-label">Rua Entrega</label>
						<input type="Text"  class="form-control" name="ruaRetirada"
							id="ruaRetirada" placeholder="Digite o cep de entrega da sua mercadoria"
							aria-describedby="TextHelp">
					</div>
				</div>
					<div class="mb-3">
						<label for="exampleInputText1" class="form-label">Observações</label>
						<input type="Text" class="form-control" name="observacao" id="observacao"
							placeholder="Observações" aria-describedby="TextHelp">
					</div>
					<input type="Text" class="form-control" name="valor" id="valor_entrega"
						placeholder="Valor da entrega" aria-describedby="TextHelp">

					<input type="number" class="form-control" name="tempoEstimado" id="tempoEstimado" placeholder="tempo estimado" aria-describedby="TextHelp"><br>
					<input type="text" class="form-control" name="valor" id="valor" placeholder="valor" aria-describedby="TextHelp">
					<!-- Pagar -->
					<button type="button" class="btn btn-primary btnPagar" >
						Pagar</button>
					<div class="informacaoPagamento">
						<div class="cupom">
							<div class="mb-3">
								<label for="cupom" class="form-label">Cupom</label>
								<input type="text" class="form-control" id="cupom" placeholder="">
								<button type="button" class="btn btn-primary btnCupom" >Aplicar</button>
							</div>
						</div>
						<div class="total">
							Total
						</div>
						<div class="formaPagamento">
							Forma de Pagamento
							<!-- Acordeão -->
							<div class="accordion accordion-flush" id="accordionFlushExample">
								<div class="cartao">
									<h2 class="accordion-header" id="flush-headingOne">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
											Cartão de débito e crédito (até 3x sem juros)
										</button>
									</h2>
									<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
										<div class="accordion-body">
											<p>O cliente deve ter pelo menos 16 anos. Ao clicar em comprar, você dá ciência e aceita os termos desta transação.</p>

											<div class="row">
												<div class="form-check cCredito col-2">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="cCredito" checked>
												<label class="form-check-label" for="cCredito">
													Crédito
												</label>
												</div>
												<div class="form-check cDebito col-2 ">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="cDebito" checked>
													<label class="form-check-label" for="cDebito">
														Débito
													</label>
												</div>
											</div>

											<div class="Pagamento">
												<div class="cartão">
													<div class="mb-3">
														<label for="numeroCartao" class="form-label">Número do cartão</label>
														<input type="text" class="form-control" id="numeroCartao" aria-describedby="emailHelp">
													</div>
													<div class="mb-3">
														<label for="nomeCartao" class="form-label">Nome do cartão</label>
														<input type="text" class="form-control" id="nomeCartao">
													</div>
													<div class="mb-3">
														<label for="dataValidade" class="form-label">Data de Validade</label>
														<input type="text" class="form-control" id="dataValidade">
													</div>
													<div class="mb-3">
														<label for="cvv" class="form-label">CVV</label>
														<input type="text" class="form-control" id="cvv">
													</div>
													<div class="row parcelas">
														<div class="form-check col-2">
														<input class="form-check-input" type="radio" name="flexRadioDefault" id="umaParcela">
														<label class="form-check-label" for="umaParcela">
															1 Parcela 
														</label>
														</div>
														<div class="form-check col-2">
															<input class="form-check-input" type="radio" name="flexRadioDefault" id="duasParcela" checked>
															<label class="form-check-label" for="duasParcela">
																2 Parcelas
															</label>
														</div>
														<div class="form-check col-2">
															<input class="form-check-input" type="radio" name="flexRadioDefault" id="tresParcela" checked>
															<label class="form-check-label" for="tresParcela">
																3 Parcelas
															</label>
														</div>
													</div>
													<button type="submit" class="btn btn-primary">Pagar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="flush-headingThree">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
											Boleto
										</button>
									</h2>
									<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
										<div class="accordion-body">O prazo de validade do seu boleto é de até 3 dias úteis, você pode imprimir e pagar no banco ou utilizar o código que será enviado para o email cadastrado para pagar pela internet. Após o pagamento, o status do seu pedido será atualizado também em até 3 dias úteis (o tempo de atualização pode ser maior durante feriados). Além disso, você precisa ter 16 anos ou mais para que a sua compra seja autorizada. Ao clicar em comprar, você dá ciência e aceita os termos desta transação.</div>
										<button type="submit" class="btn btn-primary">Pagar</
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="flush-headingTwo">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
											Pix
										</button>
									</h2>
									<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
										<div class="accordion-body">Pagamento aprovado na hora.  Você poderá finalizar o seu Pix por meio do QR Code ou código no banco que preferir! Mas fique atento, este código só será válido por 4 horas. Ao clicar em comprar, você dá ciência e aceita os termos desta transação..</div>
										<button type="submit" class="btn btn-primary">Pagar</
									</div>
								</div>
							</div>
							</div>
						</div>	
						</div>	
						<button type="submit" class="btn btn-primary">Fazer pedido</button>
					</div>
					<!-- /pagar -->
				</form>
				<div class="invoice">
					<div class="invoiceHeader" align="center">SpeedLog - Nota fiscal</div>
					<hr/>
					<div class="invoiceDate" align="center">
						<?php $hoje = date('d/m/Y H:i:s'); echo $hoje;?><br>
					</div>
					<hr/>
					<div class="invoiceClientInfo">
						<strong>Cliente</strong>
						<div class="invoiceClientName"><?php echo $_SESSION["nome"];?></div>
						<div class="invoiceClientCPF">CPF: <?php echo $_SESSION["cpf"];?></div>
					</div>
					<hr/>
					<div class="invoiceDeliveryData">
						<strong>Pacote</strong>
						<div class="flex-row spaced-between">
							Peso: <span><span id="packageWeight">0</span>kg</span>
						</div>
						<div class="flex-row spaced-between">
							Medidas: <span><span id="packageWidth">0</span> x <span id="packageHeight">0</span>m</span>
						</div>
					</div>
					<hr/>
					<div class="invoiceAddress">
					<strong>Trajeto</strong>
					<div class="flex-row spaced-between">
						Origem:<span>CEP <span class="invoiceOriginCEP"></span></span>
					</div>
					<div class="flex-row spaced-between">
						<span class="invoiceOriginAddress"></span>
					</div>
					<div class="flex-row spaced-between">
						Destino:<span>CEP <span class="invoiceDestinationCEP"></span></span>
					</div>
					<div class="flex-row spaced-between">
						<span class="invoiceDestinationAddress"></span>
					</div>
					<hr/>
					<div class="invoiceValues">
						<strong>Valores</strong>
						<div class="flex-row spaced-between">Subtotal:<span>R$<span class="invoiceSubtotal">16,50</span></span>
						</div>
						<div class="flex-row spaced-between">Cupom: PASCOA <span>-R$<span class="invoiceVoucher">2,00</span></div>
						<div class="flex-row spaced-between">Total: <span>R$<span class="invoiceTotal">14,50</span></span></div>
					</div>
					<div class="invoicePayment flex-column">
						<strong>Pagamento</strong>
						<span class="invoicePaymentMethod">Cartão de crédito</span>
					</div>
					<button align="center" class="btn btn-primary">Enviar por Email</button>
				</div>
			</div>
			
			<div class="row">
				<div class="col" id="historico">
					<h1>seu historico de Pedidos</h1>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Entregador responsavel</th>
								<th scope="col">Endereço de entrega</th>
								<th scope="col">Cep de entrega</th>
								<th scope="col">Peso produto</th>
								<th scope="col">Situação</th>
							</tr>
						</thead>
						<?php
					 date_default_timezone_set('America/Sao_Paulo');
					 // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
						 
						  foreach ($historico as $p) { ?>
						<tr>
							<th scope="row"><?php echo $p->entrega_id?></th>

							<td><?php echo $p->entrega_responsavel?></td>
							<td><?php echo $p->entrega_enderecoDestino?></td>
							<td><?php echo $p->entrega_cepDestino?></td>
							<td><?php echo $p->entrega_peso?></td>
							<td><?php echo $p->entrega_status?></td>
							
							<?php if ($p->entrega_status=="FINALIZADO" || $p->entrega_status=="CANCELADO") {
								
								echo"<td> <button id=".  $p->entrega_id ." data-toggle='modal' data-target='#myModal type='button' class='btn btn-primary btn_avaliar'>AVALIAR</button></td>";

							} ?>

						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col" id="acompanhar">
					<h1>acompanhar pedido</h1>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Entregador responsavel</th>
								<th scope="col">Endereço de entrega</th>
								<th scope="col">Cep de entrega</th>
								<th scope="col">Valor</th>
								<th scope="col">Previsao para entrega</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach ($acompanhar as $p) { ?>
							<tr>
								<th scope="row"><?php echo $p->entrega_id?></th>
								<td><button id="<?php echo $p->entrega_responsavel ?> "class="btnEntregador"><?php  echo $p->entrega_responsavel?></button></td>
								<td><?php echo $p->entrega_enderecoDestino?></td>
								<td><?php echo $p->entrega_cepDestino?></td>
								<td><?php echo $p->entrega_valor?></td>
								<td><?php echo $p->tempoEstimado?></td>
								<td><button id="btn_ex" class="btn btn-danger">
										<a class="link_excluir" onclick="pegarid(<?php echo $p->entrega_id?>)"
											id="<?php echo $p->entrega_id?>" style="text-decoration:none ">CANCELAR
											PEDIDO! </a></button></td>
								<!--  echo base_url('index.php/client/cancelar_pedido/'.$p->entrega_id) -->
							</tr>
							<tr>
								<th scope="row"><?php echo $p->usuario_nome?></th>
								<td><?php  echo $p->usuario_status?></td>
								<td><?php echo $p->entregador_foto?></td>
								<td><?php echo $p->entrega_cepDestino?></td>
								
								<!--  echo base_url('index.php/client/cancelar_pedido/'.$p->entrega_id) -->
							</tr>
							<?php } ?>
								<?php foreach ($pedidos as $p) { ?>
							<tr>
								<th scope="row"><?php echo $p->entrega_id?></th>
								<td><button id="<?php echo $p->entrega_responsavel ?> "class="btnEntregador"><?php  echo $p->entrega_responsavel?></button></td>
								<td><?php echo $p->entrega_enderecoDestino?></td>
								<td><?php echo $p->entrega_cepDestino?></td>
								<td><?php echo $p->entrega_valor?></td>
								<td><button id="btn_ex" class="btn btn-danger">
										<a class="link_excluir" onclick="pegarid(<?php echo $p->entrega_id?>)"
											id="<?php echo $p->entrega_id?>" style="text-decoration:none ">CANCELAR
											PEDIDO! </a></button></td>
								<!--  echo base_url('index.php/client/cancelar_pedido/'.$p->entrega_id) -->
							</tr>
							 
							<?php } ?>
							
						</tbody>
					</table>
				</div>

			</div>


		</div>
	<!-- CHAT + MENSAGENS: -->
	<div class="row">
		<div class="col" id="chat">
			<div id="messages">
				<?php foreach ($mensagens as $i => $value):
                echo '<div class="message ">'. $value->	denuncia_data . '<br>' . $value->denuncia_descricao .
                '<button id="'.$value->denuncia_id.'" class="delMsg">x</button></div>';
                endforeach; ?>
                <textarea name="" id="txtMessage"></textarea>
				<button id="btnMessage">ENVIAR</button>
			</div>
		</div>
	</div>
	</div>
	<!-- AVALIAÇÃO DE SATISFAÇÃO: -->
	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div> -->
  <!-- <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nivel de satistação</h5>
        <button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
			<label class="form-check-label" for="inlineRadio1">1</label>
			</div>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
			<label class="form-check-label" for="inlineRadio2">2</label>
			</div>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
			<label class="form-check-label" for="inlineRadio3">3 </label>
			</div>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
			<label class="form-check-label" for="inlineRadio3">4 </label>
			</div>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
			<label class="form-check-label" for="inlineRadio3">5 </label>
			</div> <br>
			<div class="form-group">
			<label for="exampleInputEmail1">Descrição da avaliação</label>
			<input type="text" class="form-control" id="exampleInputText"  placeholder="nos ajude a melhorar, conte sua expêriencia">
			
		</div>

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary closeModal" data-dismiss="modal">fechar</button>
        <button type="button" class="btn btn-primary">Avaliar</button>
      </div>
    </div>
  </div> -->
</div>
<script type='text/javascript' src="<?php echo base_url('assets/js/client.js');?>"></script>
<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.mask.js');?>"></script>
