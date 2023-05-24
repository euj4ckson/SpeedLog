<?php 
ob_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') OR exit('No direct script access allowed');
class Connect extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('tipo') == NULL){
			$this->load->helper('url');
			$this->load->model('model_Connect');
			$this->load->view('template/header');
			$this->load->view('pages/view_connect');
			$this->load->view('template/footer');
		}
		else switch ($this->session->userdata('tipo')) {
                case 'ADMINISTRADOR':
                    redirect('admin');
                    break;
                case 'CLIENTE':
                    redirect('client');
                    break;
                case 'ENTREGADOR':
                    redirect('deliveryman');
                    break;
		}
	}
	public function connectUser()
	{
		$userName = $_POST['user'];
		$userPass = $_POST['pass'];
		$this->load->model('model_Connect');
        $this->model_Connect->loginCredentials($userName, $userPass);
	}
	public function registerUser()
	{
		$name_signUp = $_POST['name'];
		$email_SignUp = $_POST['email'];
		$cpf_signUp = $_POST['cpf'];
		$nickname_SignUp = $_POST['nick'];
		$phoneNumber_SignUp = $_POST['phone'];
		$license_SignUp = $_POST['license'];
		$pass_SignUp = $_POST['pass'];
		$this->load->model('model_Connect');
        $alreadyExists = $this->model_Connect->verifyDuplicated($email_SignUp,$cpf_signUp,$nickname_SignUp);
		if ($alreadyExists){
			print_r($alreadyExists);
		}
		else{
			$this->model_Connect->register($name_signUp,$email_SignUp,$cpf_signUp,$nickname_SignUp,$phoneNumber_SignUp,$license_SignUp,$pass_SignUp);
			$this->model_Connect->loginCredentials($email_SignUp,$pass_SignUp);
		}
	}
	public function logout()  
    {  
        $this->session->sess_destroy();  
		redirect(base_url(''));
    } 
	public function sub_email()
	{
		require_once('assets/email/PHPMailer.php');
		require_once('assets/email/SMTP.php');
		require_once('assets/email/Exception.php');
		
		
		$email_client=$_POST["emailNewsletter"];
		$mail = new PHPMailer(true);
		
		try {
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			// SET EMAIL 
			$mail->Username = '';
			$mail->Password = '';
			$mail->Port = 587;
			// SET EMAIL 
			$mail->setFrom('');
			$mail->addAddress($email_client);
		
			$mail->isHTML(true);
			$mail->Subject = 'Equipe SpeedLog';
			$mail->Body = '<strong> Obrigado por Assinar nosso portal de noticias, vamos manter você sincronizado com nossas novidades!!  </strong>';
			$mail->AltBody = 'Atenciosamente equipe Speed Log ';
		
			if($mail->send()) {
				echo 'Email enviado com sucesso';
				redirect('connect');
			} else {
				echo 'Email nao enviado';
			}
		} catch (Exception $e) {
			echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
		}
	} 
}?>
