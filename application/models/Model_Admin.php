<?php class Model_Admin extends CI_Model {
    public function listDeliverymen()
    {
        $query = $this->db->select('*')
        ->from('entregadores')
        ->join('usuarios','usuarios.usuario_id = entregadores.entregador_id')
        ->get();
        return $query->result();
    }
    public function listDeliveries()
    {
        
        $query = $this->db->get('entregas');  
        return $query->result();
    }
    public function valorCaixa()
    {
        $this->db->select('SUM(entrega_valor)');
        $query = $this->db->get('entregas');
        return $query->result();
        
    }
    public function listClients()
    {
        $this->db->where('usuario_tipo','CLIENTE'); 	
        $query = $this->db->get('usuarios');  
        return $query->result();
    }
    public function listReports()
    {
        // $this->db->where('denuncia_status','PENDENTE'); 	
        $query = $this->db->select('*')
        ->from('denuncias')
        ->join('entregas','entregas.entrega_id = denuncias.denuncia_id')
        // ->join('usuarios','usuario.usuario_id = entrega.entrega_responsavel')
        ->get();
        return $query->result();
    }
    public function deliveryVariables()
    {
        $query = $this->db->get('frete');  
        return $query->result();
    }
    public function timeoutAccount($userTimedOut)
	{
        $this->usuario_status = "SUSPENSO";
        $this->db->where('usuario_id', $userTimedOut);
        $this->db->update('usuarios', $this);
	}
    public function banAccount($userBanned)
	{
        $this->usuario_status = "BANIDO";
        $this->db->where('usuario_id', $userBanned);
        $this->db->update('usuarios', $this);
	}
    public function reactivateAccount($userReactivated)
	{
        $this->usuario_status = "ATIVO";
        $this->db->where('usuario_id', $userReactivated);
        $this->db->update('usuarios', $this);
	}
    public function cancelDelivery()
	{
		// 
	}
    public function registerAdmin($nomeAdmin, $emailAdmin, $cpfAdmin,$apelidoAdmin, $telefoneAdmin, $senhaAdmin)
    {
        $this->usuario_nome = $nomeAdmin;
        $this->usuario_email = $emailAdmin;
        $this->usuario_cpf = $cpfAdmin;
        $this->usuario_apelido = $apelidoAdmin;
        $this->usuario_senha = $senhaAdmin;
        $this->usuario_tipo = "ADMINISTRADOR";
        $this->usuario_telefone = $telefoneAdmin;
        $this->usuario_status = "ATIVO";
        $this->db->insert('usuarios',$this);

    }
    public function changeVariables($days,$cost)
	{
        if($cost[0]) $this->valor_km = $cost[0];
        if($cost[1]) $this->valor_minuto = $cost[1];
        if($cost[2]) $this->valor_kgAte1 = $cost[2];
        if($cost[3]) $this->valor_kg1a3 = $cost[3];
        if($cost[4]) $this->valor_kg3a8 = $cost[4];
        if($cost[5]) $this->valor_kg8a12 = $cost[5];
        $this->db->where_in('frete_tipo', $days);
        $this->db->update('frete', $this);
	}
	public function addVoucher($codeVoucher, $discountVoucher, $percentVoucher, $startVoucher,$endVoucher, $quantityVoucher, $descriptionVoucher)
	{
		$this->cupom_cod = $codeVoucher;
		$this->cupom_desconto = $discountVoucher;
		$this->cupom_tipoPorcento = $percentVoucher;
		$this->cupom_inicio = $startVoucher;
		$this->cupom_termino = $endVoucher;
		$this->cupom_qtde = $quantityVoucher;
		$this->cupom_desc = $descriptionVoucher;
        $this->db->insert('cupons',$this);
	}
}?>
