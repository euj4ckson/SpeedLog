<title>Conectar - SpeedLog</title>
<?php print_r($this->session->userdata('tipo'));?>
<div class="landingBackground"><img src="<?php echo base_url('assets/img/bg-mobile-fallback.jpg');?>" alt=""></div>
<div class="content">
    <section class="features flex text-centered">
        <div class="feature">
            <img src="<?php echo base_url('assets/icons/friends-colored.png');?>" alt="">
            <h3><span>Mais que parceiros, amigos</span></h3>
            <h6>Seja nosso entregador e você terá controle total do seu tempo de trabalho e receberá dados que podem melhorar seus ganhos com entregas</h6>
        </div>
        <div class="feature">
            <img src="<?php echo base_url('assets/icons/heart-colored.png');?>" alt="">
            <h3><span>Benefício atrás de benefício</span></h3>
            <h6>Clientes e entregadores possuem proteção contra danos, cupons promocionais, suporte 24 horas e muito mais!</h6>
        </div>
        <div class="feature">
            <img src="<?php echo base_url('assets/icons/hourglass-colored.png');?>" alt="">
            <h3><span>Pediu, chegou</span></h3>
            <h6>Nossas rotas são otimizadas para completar os pedidos tão rapidamente que você não precisar se preocupar com o tempo de entrega</h6>
        </div>
    </section>
    <section class="services flex-column">
        <div class="service">
            <div class="serviceDescription flex-column">
                <span>
                    Fique por dentro das promoções, notícias e receba cupons no seu e-mail. Não vai perder nenhuma oportunidade assinando nossa <i>newsletter</i>:
                </span>
                <div>
                    <form class="newsletterForm"action="<?php echo base_url()?>index.php/connect/sub_email" method="post">
                        <div>
                            <label for="emailNewsletter">E-mail:</label>
                            <input type="text" name="emailNewsletter" id="newsletter">
                        </div>
                        <button class="btnNewsletter">Assinar</button>
                    </form>
                    
                </div>
            </div>
            <div class="flex-row">
                <img class="serviceImage" src="<?php echo base_url('assets/img/motoboys.jpg');?>"></img>
            </div>
        </div>
        <div class="service2">
            <video class="background playing" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="<?php echo base_url('assets/mp4/bg.mp4');?>" type="video/mp4" /></video>
            <button class="videoPause absolute">
                <img class="iconContinue" src="<?php echo base_url('assets/icons/continue.png');?>" alt="">
                <img class="iconPause" src="<?php echo base_url('assets/icons/pause.png');?>" alt="">
            </button>
            <div class="serviceDetails flex-column">
                <span>Mais inteligente,</span>
                <span>Mais intuitivo,</span>
                <span>Mais eficiente.</span>
                <button class="btnSign btnService pointer">Fazer parte</button>
            </div>
        </div>
    </section>
</div>
<script type = 'text/javascript' src = "<?php echo base_url('assets/js/connect.js');?>"></script>
