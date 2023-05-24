<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');?>
<!DOCTYPE html>
<!-- BRAZILIAN PORTUGUESE -->
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- PALAVRAS-CHAVE PARA MECANISMOS DE PESQUISA // SEARCH ENGINES KEYWORDS -->
	<meta name="keywords" content="Entregas, Motoboy, Logística">
	<!-- UMA BREVE DESCRIÇÃO DO SITE // SHORT DESCRIPTION OF THE WEB PAGE -->
	<meta name="description" content="SpeedLog é uma plataforma de entregas rápidas realizadas por motoboys"/>
	<!-- CRIADOR(ES) DA PÁGINA // AUTHOR OF THE PAGE -->
	<meta name="author" content="TeamKeep"/>
	<!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- DESKTOP ICON -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png');?>" type="image/x-icon">
	<!-- FOLHA DE ESTILO GERAL // GENERAL STYLESHEET -->
	<link rel ="stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/style.css'); ?>">
	<link rel ="stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/library.css'); ?>">
	<!-- GOOGLE FONTS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
	<!-- SCRIPT JQUERY -->
	<script type = 'text/javascript' src = "<?php echo base_url('assets/js/jquery.js');?>"></script>
</head>
<body>
<!-- CABEÇALHO // HEADER -->
<?php if($this->session->userdata('tipo') == ''){ echo
	'<header class="homeHeader">
		<img class="largerLogo" src="'.base_url("assets/img/title.png").'" alt="Logo SpeedLog">
		<img class="mobileLogo" src="'.base_url("assets/img/logo.png").'" alt="Logo SpeedLog">
		<!-- <div class="language">
			<div class="btnChangeLanguage">
				<span>Português</span>
				<li>pt-br</li>
				<li>en</li>
			</div>
		</div> -->
		<div class="signOptions flex-column">
				<!-- SIGN OPTIONS -->
			<div class="signButtons flex-row spaced-around">
				<div class="tabSign tabSignIn flex flex-horizontal-centered">
					<button class="btnSign btnSignIn">ENTRAR</button>
				</div>
				<div class="tabSign tabSignUp flex flex-horizontal-centered">
					<button class="btnSign btnSignUp">CADASTRAR</button>
				</div>
			</div>
			<div class="loginForm">
				<!-- SIGN IN -->
				<div class="signIn flex-column">
					<div class="mb-3 flex-column">
						<label for="userSignIn" class="form-label text-centered">USUÁRIO OU EMAIL</label>
						<input value="carlinha" type="email" class="formInput inputSignIn" id="user_SignIn">
					</div>
					<div class="mb-3 flex-column">
						<label for="passSignIn" class="form-label text-centered">SENHA</label>
						<input value="1" type="password" class="formInput inputSignIn" id="pass_SignIn">
					</div>
					<div class="rememberLogin">
						<input type="checkbox" class="form-check-input" id="keepLogged">
						<label class="form-check-label" for="keepLogged">Lembrar dados de acesso</label>
					</div>
					<a class="forgotPass" href="">Esqueci minha senha</a>
					<button id="signIn" class="btnSign btnSignIn btnWhite" >ENTRAR</button>
					<p id="warning"></p>
				</div>
				<!-- SIGN UP TYPE BUTTONS -->
				<div class="signUpType flex column">
					<button class="signUpClient btnBlue">CLIENTE</button>
					<button class="signUpDeliveryman btnBlue">ENTREGADOR</button>
				</div>
				<!-- SIGN UP FORM -->
				<div class="signUp flex column">
					<div class="mb-3 flex-column">
						<label for="name_SignUp" class="form-label text-centered">NOME COMPLETO</label>
						<input name="name_SignUp" class="formInput inputSignUp" id="name_SignUp" value="1" >
					</div>
					<div class="mb-3 flex-column">
						<label for="email_SignUp" class="form-label text-centered">E-MAIL</label>
						<input name="email_SignUp" class="formInput inputSignUp spaceNotAllowed" id="email_SignUp" value="1" >
					</div>
					<div class="mb-3 flex-column">
						<label for="cpf_SignUp" class="form-label text-centered">CPF</label>
						<input name="cpf_SignUp" class="formInput inputSignUp spaceNotAllowed" id="cpf_SignUp" value="111.111.111-11" >
					</div>
					<div class="mb-3 flex-column">
						<label for="nickname_SignUp" class="form-label text-centered">APELIDO</label>
						<input name="nickname_SignUp" class="formInput inputSignUp spaceNotAllowed" id="nickname_SignUp" value="1" >
						<div id="nicknameHelp" class="form-text">Seu apelido deve ser único. Você poderá usar tanto o e-mail quanto esse apelido para acessar sua conta</div>
					</div>
					<div class="mb-3 flex-column">
						<label for="phoneNumber_SignUp" class="form-label text-centered">TELEFONE</label>
						<input name="phoneNumber_SignUp" class="formInput inputSignUp spaceNotAllowed" id="phoneNumber_SignUp" placeholder="(XX) 00000 0000" value="1" >
					</div>
					
					<!-- DELIVERY MAN ADDITIONAL INPUTS -->
					<div class="deliverymanForm">
						<div class="mb-3 flex-column deliverymanForm">
							<label for="license_SignUp" class="form-label text-centered">PLACA DA MOTO</label>
							<input name="license_SignUp" class="formInput inputSignUp spaceNotAllowed" id="license_SignUp" value="">
						</div>
					</div>
					<div class="mb-3 flex-column">
						<label for="pass1_SignUp" class="form-label text-centered">SENHA</label>
						<input name="pass1_SignUp" type="password" class="formInput inputSignUp spaceNotAllowed" id="pass1_SignUp" value="1" >
					</div>
					<div class="mb-3 flex-column">
						<label for="pass2_SignUp" class="form-label text-centered">CONFIRME SUA SENHA</label>
						<input name="pass2_SignUp" type="password" class="formInput inputSignUp spaceNotAllowed" id="pass2_SignUp" value="1" >
					</div>
					
					<!-- DELIVERYMAN EMAIL CHECK -->
					<div class="form-check deliverymanCheck">
						<input name="deliverymanEmailCheck" type="checkbox" class="form-check-input" id="deliverymanEmailCheck">
						<label class="form-check-label text-centered" for="deliverymanEmailCheck">Quero receber e-mails sobre minhas entregas</label>
					</div>
					<!-- CLIENT EMAIL CHECK -->
					<div class="form-check clientCheck">
						<input name="clientEmailCheck" type="checkbox" class="form-check-input" id="clientEmailCheck">
						<label class="form-check-label text-centered" for="clientEmailCheck">Quero receber e-mails sobre meus pedidos</label>
					</div><br>
					<div id="emailHelp" class="form-text text-centered">Você pode alterar essa opção mais tarde no seu perfil.</div>
					<button id="signUp" class="btnBlue">CADASTRAR</button>
					<p id="warning"></p>
					<div id="dataHelp" class="form-text">Seus dados jamais serão compartilhados com terceiros. Para saber mais leia nossa <a href='. base_url("").' target="_blank" rel="noopener noreferrer">Política de privacidade</a></div>
					</div>
				</div>
			</div>
		</div>
	</header>';
}
else { echo '<header class="userHeader flex-row">
	<div class="welcome flex-row">
		<img src="'. base_url("assets/img/logo.png") .'" alt="Logo SpeedLog">
		<h4>Boas vindas,'. $_SESSION["apelido"] .'</h4>
    	<button class="btnHeader btnLogout"><img src="'. base_url("assets/icons/logout-colored.png") .'" alt="Logo SpeedLog"></button>
	</div>
	<div class="userNavbar">
		<button class="btnHeader btnProfile">Perfil</button>
		<button class="btnHeader btnMessages">Mensagens</button>
		<button class="btnHeader btnNotifications">Notificações</button>
		<button class="btnHeader btnSettings">Configurações</button>
	</div>
	<!-- <div class="language">
		<div class="btnChangeLanguage">
			<span>Português</span>
			<li>pt-br</li>
			<li>en</li>
		</div>
	</div> -->
</header>';
if($this->session->userdata('tipo') == 'ADMIN'){ echo
'';}
if($this->session->userdata('tipo') == 'CLIENTE'){ echo
'';}
if($this->session->userdata('tipo') == 'ENTREGADOR'){ echo
'';}
};
?>
<script>
$(".btnLogout").click(function (){
    location.assign('connect/logout');
});
</script>
