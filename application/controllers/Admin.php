<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('tipo') == 'ADMINISTRADOR'){
			$dados['sessao']=array($this->session->userdata('usuario'),$this->session->userdata('tipo'));
			$this->load->model('model_Admin');
			$dados['entregadores']=$this->model_Admin->listDeliverymen();
			$dados['entregas']=$this->model_Admin->listDeliveries();
			$dados['valorCaixa']=$this->model_Admin->valorCaixa();
			$dados['clientes']=$this->model_Admin->listClients();
			$dados['frete']=$this->model_Admin->deliveryVariables();
			$dados['denuncias']=$this->model_Admin->listReports();
			$this->load->helper('url');
			$this->load->model('model_Admin');
			$this->load->view('template/header');
			$this->load->view('pages/view_admin',$dados);
			$this->load->view('template/footer');
		}
		else redirect(base_url(''));
	}
	public function timeoutAccount()
	{
		$this->load->model('Model_Admin');
		$userTimedOut = $_POST['user'];
		$this->Model_Admin->timeoutAccount($userTimedOut);
	}
	public function banAccount()
	{
		$this->load->model('Model_Admin');
		$userBanned = $_POST['user'];
		$this->Model_Admin->banAccount($userBanned);
	}
	public function reactivateAccount()
	{
		$this->load->model('Model_Admin');
		$userReactivated = $_POST['user'];
		$this->Model_Admin->reactivateAccount($userReactivated);
	}
	public function cancelDelivery()
	{
		// 
	}
	public function registerAdmin()
	{
		$this->load->model('Model_Admin');
		$nomeAdmin = $_POST['nome'];
		$emailAdmin = $_POST['email'];
		$cpfAdmin = $_POST['cpf'];
		$apelidoAdmin = $_POST['apelido'];
		$telefoneAdmin = $_POST['telefone'];
		$senhaAdmin = $_POST['senha'];
		$this->Model_Admin->registerAdmin($nomeAdmin, $emailAdmin, $cpfAdmin,$apelidoAdmin, $telefoneAdmin, $senhaAdmin);
	}
	public function changeVariables()
	{
		$this->load->model('Model_Admin');
		$days = $_POST['days'];
		$cost = $_POST['cost'];
		$this->Model_Admin->changeVariables($days,$cost);
	
	}
	public function addVoucher()
	{
		$this->load->model('Model_Admin');
		$codeVoucher = $_POST['codeVoucher'];
		$discountVoucher = $_POST['discountVoucher'];
		$percentVoucher = $_POST['percentVoucher'];
		$startVoucher = $_POST['startVoucher'];
		$endVoucher = $_POST['endVoucher'];
		$quantityVoucher = $_POST['quantityVoucher'];
		$descriptionVoucher = $_POST['descriptionVoucher'];
		$this->Model_Admin->addVoucher($codeVoucher, $discountVoucher,$percentVoucher, $startVoucher,$endVoucher, $quantityVoucher, $descriptionVoucher);
	}
}?>
