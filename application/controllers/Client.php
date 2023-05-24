<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('tipo') == 'CLIENTE'){
			$dados['sessao']=$this->session->userdata('usuario');
			$this->load->model('Model_Client');
			$dados['mensagens']=$this->Model_Client->selectMessages();
			$dados['pedidos']=$this->Model_Client->get_all();
			$dados['acompanhar']=$this->Model_Client->get_acompanhamento();
			$dados['historico']=$this->Model_Client->get_entregas();
			$this->load->helper('url');
			$this->load->view('template/header');
			$this->load->view('pages/view_client',$dados);
			$this->load->view('template/footer');
		}
		else redirect(base_url(''));
	}
	public function fazer_pedido()
	{
		$this->load->model('Model_Client');
		$largura =$this->input->post('largura');
		$valor =$this->input->post('valor');
		$altura =$this->input->post('altura');
		$cepretirada =$this->input->post('cepretirada');
		$cepentrega =$this->input->post('cepentrega');
		$peso =$this->input->post('peso');
		$observacao =$this->input->post('observacao');
		$tempoEstimado =$this->input->post('tempoEstimado');
		$ruaEntrega =$this->input->post('ruaEntrega');
		$ruaRetirada =$this->input->post('ruaRetirada');
		
        $this->Model_Client->inserir($largura, $altura,$cepretirada,$cepentrega,$peso,$observacao,$valor,$tempoEstimado,$ruaRetirada,$ruaEntrega);
		redirect('client');
       
	}
	public function cancelar_pedido()

	{
		
		$id_pedido=$_POST['id'];
		$this->load->model('Model_Client');

		
		$this->Model_Client->cancelar_pedido($id_pedido);
	}
	public function calculo()
	{
		// print_r($_POST);
		$peso=$_POST['peso_cal'];
		$distancia= $_POST['distancia_cal'];
		$tempo= $_POST['tempo_cal'];
		$this->load->model('Model_Client');
		$this->Model_Client->calcular_valor($peso,$distancia,$tempo);


	// 	calcular_valor
	}
	public function adicionarMensagem(){
		$textoMsg = $_POST['msgAdd'];
		$this->load->model('Model_Client');
        $this->Model_Client->inserir_msg($textoMsg);

	}
    public function deleteMessage(){
		$msgDel = $_POST['msgDel'];
		$this->load->model('Model_Client');
        $this->Model_Client->delete_msg($msgDel);

	}	
    public function pegaEntregador(){
		$entregador = $_POST['entregador'];
		$this->load->model('Model_Client');
		$_SESSION['motorista']=$this->Model_Client->entregadorPerfil($entregador);
		

	}	
}?>
