<title>Entregador - SpeedLog</title>
<div class="container flex wrap">
  <?php   
    foreach($perfil as $DeliverymanColumn){
      $idadeConta = date_diff(date_create(date('Y-m-d', strtotime($DeliverymanColumn->usuario_dataConta))),date_create(date('Y-m-d', time())));
    echo '
    <div class="profileDeliveryman flex column">
      <div class="profilePhotoStatus flex-vertical-self-centered" >
      
        <form method="POST" enctype="multipart/form-data">
          <label class="profilePhoto" for="picChange">';
            if ($DeliverymanColumn->entregador_foto) echo '
            <img class="profilePic pointer" src="'.base_url('assets/pictures/'.$DeliverymanColumn->entregador_foto).'">';
            else echo '<img class="profilePic pointer" src="'.base_url('assets/icons/user-colored.png').'">';
          echo '
          </label>
          <br>
          <input id="picChange" type="file" name="pic" accept="image/*" class="form-control">
          <div align="center">
          </div>
          <button type="submit" id="sendPicture" class="statusDeliveryman pointer">
          <img src="'.base_url('assets/icons/photo-colored.png').'">
          </button>
          </form>';
          // <button type="submit" id="sendPicture" class="btnBlue">Enviar imagem</button>
          // <div id="overlay"><button class="changePic">a</div>
        // if($DeliverymanColumn->usuario_status == 'SUSPENSO') echo 's';
        // else echo 'a';
        echo '
      </div>
      <div class="deliverymanStats flex-row">
        <div class="stat" id="deliveries">
        <img src="'.base_url('assets/icons/moto.png').'" alt="">
        2</div>
        <div class="stat" id="rating">
          <img src="'.base_url('assets/icons/star-colored.png').'" alt="">
          4.8/5.0
        </div>
        <div class="stat" id="serviceTime">
          <img src="'.base_url('assets/icons/time-colored.png').'" alt="">
          '.number_format($idadeConta->format("%a")/365, 1, ",", ".").' anos
        </div>
      </div>
      <div class="profileID flex-row">
        <div class="flex-column profileInfo" style="width:70%">
          <span class="accNickname">'.$DeliverymanColumn->usuario_apelido.'</span>  
          <span class="licensePlate">'.$DeliverymanColumn->entregador_placaMoto.'</span>  
          <span class="accFullname">'.$DeliverymanColumn->usuario_nome.'</span>
        </div>
        <div class="flex-row editProfileInfo">
          <button class="btnEditProfileInfo">
            <img src="'.base_url('assets/icons/edit-colored.png').'">
          </button><br>
        </div>
      </div>
      <div class="ganhos valorCaixa">GANHOS: R$32,50';
      // foreach ($valorCaixa as $value) {
      //   foreach ($value as $value2) {
      //       echo "R$". $value2;
      //   }
      // }
        echo '</div>
      <div class="achievements">
        <!--  -->
      </div>
    </div>';
  }
  ?>
  <div>
  <ul class="nav nav-tabs">
      <li class="nav-item">
        <button class="btn btn-light" id="btnPendingOrders" aria-current="page">Pedido Pendente</button>
      </li>
      <li class="nav-item">
        <button class="btn btn-light" id="btnOngoingOrders">Pedido atual</button>
      </li>
      <li class="nav-item">
        <button class="btn btn-light" id="btnFinishedOrders">Pedido concluído</button>
      </li>
    </ul>
    <div class="orderTab" id="listPendingOrders">
      <?php foreach ($pendente as $key) {
        echo '
          <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
              <h5 class="card-title">
              <h5 class="card-title">Origem: '.$key->entrega_enderecoOrigem.$key->entrega_cepOrigem.'.</h5>
              <h5 class="card-title">Destino: '.$key->entrega_enderecoDestino.$key->entrega_cepDestino.'.</h5>
              <p class="card-text">Valor: R$ '.$key->entrega_valor.',00</p>
              <p class="card-text">Peso: '.$key->entrega_peso.'kg</p>
              <p class="card-text">Nome do cliente: '.$key->entrega_cliente.'</p>
              <p class="card-text">Observação: '.$key->entrega_observacao.'</p>
              <button type="button" class="btn btn-primary btn-lg confirmar" id="'.$key->entrega_id.'" data-toggle="modal" data-target="#myModal">
                Iniciar Viagem
              </button>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Iniciar entrega</h4>
                    </div>
                    <div class="modal-body">
                      Você deseja concluir essa viagem?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <a class="btn btn-primary confirmar" id="'. $key->entrega_id .'" >Concluir da viagem</a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      <br>';
        }?>
    </div>
    <div class="orderTab" id="listOngoingOrders">
      <?php foreach ($andamento as $key) {
        echo '
        <div class="card text-center">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h5 class="card-title">
            <h5 class="card-title">Origem: '.$key->entrega_enderecoOrigem.$key->entrega_cepOrigem.'.</h5>
            <h5 class="card-title">Destino: '.$key->entrega_enderecoDestino.$key->entrega_cepDestino.'.</h5>
            <p class="card-text">Valor: R$ '.$key->entrega_valor.',00</p>
            <p class="card-text">Peso: '.$key->entrega_peso.'kg</p>
            <p class="card-text">Nome do cliente: '.$key->entrega_cliente.'</p>
            <p class="card-text">Observação: '.$key->entrega_observacao.'</p>
            <button type="button" class="btn btn-primary btn-lg concluir" id="'. $key->entrega_id .'" data-toggle="modal" data-target="#myModal2">
              Concluir Viagem
            </button>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cancelamento da Viagem</h4>
                  </div>
                  <div class="modal-body">
                    Você deseja concluir essa viagem?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary concluir" id="'. $key->entrega_id .'" >Concluir da viagem</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-lg cancelar" id="'. $key->entrega_id .'" data-toggle="modal" data-target="#myModal3">
          Cancelar Viagem
        </button>
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cancelamento da Viagem</h4>
              </div>
              <div class="modal-body">
                Você realmente deseja cancelar essa viagem?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary cancelar" id="'. $key->entrega_id .'" >Desistir da viagem</a>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <br>';
      }?>
    </div>
    <div class="orderTab" id="listFinishedOrders">
      <?php foreach ($concluido as $key) {
        echo '
        <div class="card text-center">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h5 class="card-title">
            <h5 class="card-title">Origem: '.$key->entrega_enderecoOrigem.$key->entrega_cepOrigem.'.</h5>
            <h5 class="card-title">Destino: '.$key->entrega_enderecoDestino.$key->entrega_cepDestino.'.</h5>
            <p class="card-text">Valor: R$ '.$key->entrega_valor.',00</p>
            <p class="card-text">Peso: '.$key->entrega_peso.'kg</p>
            <p class="card-text">Nome do cliente: '.$key->entrega_cliente.'</p>
            <p class="card-text">Observação: '.$key->entrega_observacao.'</p>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        </div>
        <br>';
      }?>
    </div>
  
  </div>
</div>
<?php
 if(isset($_FILES['pic']) && str_contains($_FILES['pic']['name'], '.'))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = $_SESSION['apelido'] . $ext; //Definindo um novo nome para o arquivo
    $dir ="assets/pictures/"; //Diretório para uploads
 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    // echo '<div class="alert alert-success" role="alert" align="center">
    //       <img src="'.base_url('assets/pictures/' . $new_name).'" class="img img-responsive img-thumbnail" width="200"> 
    //       <br>
    //       Imagem enviada com sucesso!
    //       <br>
    //       <a href="exemplo_upload_de_imagens.php">
    //       <button class="btn btn-default">Enviar nova imagem</button>
    //       </a></div>';
 } ?>
<script type = 'text/javascript' src = "<?php echo base_url('assets/js/deliveryman.js');?>"></script>
<!-- <form action="index.php/connect/registerUser" method="POST" enctype="multipart/form-data"> -->
  <!-- 
				<label for="conteudo">Enviar imagem:</label>
				<input name="conteudo" id="profile3x4Picture" type="file" name="pic" accept="image/*" class="form-control">
				</div> -->

