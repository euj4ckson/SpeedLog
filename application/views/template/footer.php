<footer class="computerView">
    <div class="links flex-row">
        <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Termos e condições</a>
        <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Privacidade</a>
        <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Sobre nós</a>
    </div>  
    <div class="brand flex-column text-centered">
        <img src="<?php echo base_url('assets/img/logo.png');?>" alt="">
        <span>© 2023 SpeedLog</span>
    </div>
    <div class="socialMedia flex-row">
        <a class="btnSocialMedia btnTwitter" target="_blank" rel="noopener noreferrer" href="http://twitter.com">
            <img src="<?php echo base_url('assets/icons/twitter-white.png');?>" alt="Link Twitter">
        </a>
        <a class="btnSocialMedia btnFacebook" target="_blank" rel="noopener noreferrer" href="http://facebook.com">
            <img src="<?php echo base_url('assets/icons/facebook-white.png');?>" alt="Link Facebook">
        </a>
        <a class="btnSocialMedia btnInstagram" target="_blank" rel="noopener noreferrer" href="http://instagram.com">
            <img src="<?php echo base_url('assets/icons/instagram-white.png');?>" alt="Link Instagram">
        </a>
    </div>
    <div class="achievement flex-row">
        <div class="achievementImage"><img src="<?php echo base_url('assets/icons/achievement.png');?>" alt=""></div>
        <div class="flex-column flex-vertical-centered">
            <span id="achievementTitle"><strong>O início de tudo</strong></span>
            <span id="achievementDesc">Concluiu sua primeira entrega</span>
        </div>
    </div>
    <div class="achievement flex-row">
        <div class="achievementImage"><img src="<?php echo base_url('assets/icons/achievement.png');?>" alt=""></div>
        <div class="flex-column flex-vertical-centered">
            <span id="achievementTitle"><strong>Criatura noturna</strong></span>
            <span id="achievementDesc">Fez uma entrega durante a noite</span>
        </div>
    </div>
</footer>

<footer class="tabletView">
    <div class="linksMedia flex-column">
        <div class="links flex-row spaced-around wrap">
            <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Termos e condições</a>
            <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Privacidade</a>
            <a href="<?php echo base_url('');?>" target="_blank" rel="noopener noreferrer">Sobre nós</a>
        </div>  
        <div class="socialMedia flex-row">
            <a class="btnSocialMedia btnTwitter" target="_blank" rel="noopener noreferrer" href="http://twitter.com">
                <img src="<?php echo base_url('assets/icons/twitter-white.png');?>" alt="Link Twitter">
            </a>
            <a class="btnSocialMedia btnFacebook" target="_blank" rel="noopener noreferrer" href="http://facebook.com">
                <img src="<?php echo base_url('assets/icons/facebook-white.png');?>" alt="Link Facebook">
            </a>
            <a class="btnSocialMedia btnInstagram" target="_blank" rel="noopener noreferrer" href="http://instagram.com">
                <img src="<?php echo base_url('assets/icons/instagram-white.png');?>" alt="Link Instagram">
            </a>
        </div>
    </div>
    <div class="brand flex-column text-centered">
        <img src="<?php echo base_url('assets/img/logo.png');?>" alt="">
        <span>© 2023 SpeedLog</span>
    </div>
</footer>

<div class="supportImage">
    <img src="<?php echo base_url('assets/icons/support.png');?>" alt="">
</div>
<!-- <div class="support hidden"> -->
<div class="support">
    <div class="supportTitle">
        <img src="<?php echo base_url('assets/icons/support.png');?>" alt="">
        <span>SUPORTE</span>
        <div class="closeSupportChat">
            <img src="<?php echo base_url('assets/icons/x.png');?>" alt="">
        </div>
    </div>
    <div class="supportChat">
        <div class="supportMessage messageAdmin" id="msg1">
            <span>Olá <strong><?php echo $_SESSION["apelido"] ?></strong>, qual tipo de ajuda você precisa?</span>
            <button class="btnSupportOption" id="accData">Dados da conta</button>
            <button class="btnSupportOption" id="accDeliveries">Problema com entrega</button>
            <button class="btnSupportOption" id="accVouchers">Cupons</button>
        </div>
    </div>
    <div class="typeAndSend flex-row">
        <input type="text">
        <img src="<?php echo base_url('assets/icons/send.png');?>" alt="">
    </div>
</div>
<?php 
if($this->session->userdata('tipo')=='CLIENTE' || $this->session->userdata('tipo')=='ENTREGADOR'){ echo '';
}
if($this->session->userdata('tipo')!=''){ echo '
<footer class="mobileView">
    <button class="btnMobile btnProfile selectedMobile"><img src="'.base_url("assets/icons/user-colored.png").'" alt=""></button>';
    if($this->session->userdata('tipo') == 'ENTREGADOR') echo'
    <button class="btnMobile btnOrders"><img src="'.base_url("assets/icons/moto.png").'" alt=""></button>';
    else if($this->session->userdata('tipo') == 'CLIENTE') echo '
    <button class="btnMobile btnOrders"><img src="'.base_url("assets/icons/box.png").'" alt=""></button>';
    echo '
    <button class="btnMobile btnMessages"><img src="'.base_url("assets/icons/message.png").'" alt=""></button>
    <button class="btnMobile btnSettings"><img src="'.base_url("assets/icons/config.png").'" alt=""></button>
</footer>';
}
else{ echo '
<footer class="mobileView2 ">
    <div class="links flex-column">
        <a href="'.base_url('').'" target="_blank" rel="noopener noreferrer">Termos e condições</a>
        <a href="'.base_url('').'" target="_blank" rel="noopener noreferrer">Privacidade</a>
        <a href="'.base_url('').'" target="_blank" rel="noopener noreferrer">Sobre nós</a>
    </div>
    <div class="brandMedia">
        <div class="brand flex-column text-centered">
            <img src="'.base_url('assets/img/logo.png').'" alt="">
            <span>© 2023 SpeedLog</span>
        </div>
        <div class="socialMedia flex-row">
            <a class="btnSocialMedia btnTwitter" target="_blank" rel="noopener noreferrer" href="http://twitter.com">
                <img src="'.base_url('assets/icons/twitter-white.png').'" alt="Link Twitter">
            </a>
            <a class="btnSocialMedia btnFacebook" target="_blank" rel="noopener noreferrer" href="http://facebook.com">
                <img src="'.base_url('assets/icons/facebook-white.png').'" alt="Link Facebook">
            </a>
            <a class="btnSocialMedia btnInstagram" target="_blank" rel="noopener noreferrer" href="http://instagram.com">
                <img src="'.base_url('assets/icons/instagram-white.png').'" alt="Link Instagram">
            </a>
        </div>
    </div>
</footer>';
}
?>
<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.mask.js');?>"></script>
<!-- JAVA SCRIPT BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
    $('.supportImage').click(function(){
        // alert('a');
        $('.support').toggleClass('hidden');
    });
    $('.closeSupportChat').click(function(){
        // alert('a');
        $('.support').toggleClass('hidden');
    });
    $('.btnSupportOption').click(function(){
        var supportOption = '<div class="supportMessage messageClient" id="msg2"><span>'+$(this).html()+'</span></div>';
        $('.supportChat').append(supportOption);
        $('.supportChat').append('<div class="supportMessage messageAdmin" id="msg2"><span>Um atendente irá lhe atender em instantes...</span></div>');
        // $('.messageClient').filter(":first").focus();
    });
</script>
</body>
</html>
