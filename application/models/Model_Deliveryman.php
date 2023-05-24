<?php date_default_timezone_set('America/Sao_Paulo');class Model_Deliveryman extends CI_Model {
    // ATUALIZAR FOTO DE PERFIL:
    
    public function updatePicture($profilePic)
    {
        $this->entregador_foto = $profilePic;
        $this->db->where('entregador_id',$_SESSION['id']);
        $this->db->update('entregadores',$this);
    }
    // LISTAR PEDIDOS PENDENTES:
    public function viewPendingOrders()
    {
        $this->db->where('entrega_responsavel',$_SESSION['id']);
        $this->db->where('entrega_status','PENDENTE');
        $query = $this->db->get('entregas');
        return $query->result();
    }
    // CARREGAR PERFIL DO MOTOBOY COM AS INFORMAÇÕES:
    public function deliverymanProfile($idDeliveryman)
    {
        $this->db->where('usuario_id',$idDeliveryman);
        $this->db->join('entregadores', 'usuarios.usuario_id = entregadores.entregador_id');
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    // LISTAR PEDIDOS EM ANDAMENTO:
    public function viewOngoingOrders()
    {
        $this->db->where('entrega_status','ANDAMENTO');
        $query = $this->db->get('entregas');
        return $query->result();
    }
    // LISTAR PEDIDOS FINALIZADOS:
    public function viewFinishedOrders()
    {
        $this->db->where('entrega_clienteID',$_SESSION['id']);
        $this->db->where('entrega_status','FINALIZADO');
        $query = $this->db->get('entregas');
        return $query->result();
    }
    // ACEITAR ENTREGA:
    public function takeOrder($idConfirmarPedido)
    {
        //select data
        $this->db->where('entrega_id',$idConfirmarPedido);
        $query = $this->db->get('entregas');
        $data= $query->result();
        // print_r($data);
        // calculo para tempo estimado
        foreach ($data as $value) {
            $tmp= $value->tempoEstimado;
        }
        // armazenando variaveis de tempo
        $agora = date('H:i');
        $Previsao= date('H:i', strtotime('+ '.$tmp.' minute', strtotime($agora)));
        echo $Previsao;
        // update
        $this->entrega_status='ANDAMENTO';
        $this->tempoEstimado=$Previsao;
        // PRECISA DE TESTES AINDA:
        $this->entrega_responsavel= $_SESSION['id'];
        $this->db->where('entrega_id',$idConfirmarPedido);
        $this->db->update('entregas',$this);
    }
    // CANCELAR ENTREGA:
    public function cancelOrder($idCancelarPedido)
    {
        $this->entrega_status='PENDENTE';
        $this->db->where('entrega_id',$idCancelarPedido);
        $this->db->update('entregas',$this);
    }
    // CONCLUIR ENTREGA:
    public function finishOrder($idConcluirPedido)
    {
        $this->entrega_status='FINALIZADO';
        $this->db->where('entrega_id',$idConcluirPedido);
        $this->db->update('entregas',$this);
    }
    public function valorCaixa()
    {   
        $id= $_SESSION['id'];
        $this->db->where('entrega_responsavel',$id);
        $this->db->select('SUM(entrega_valor)');
        $query = $this->db->get('entregas');
        return $query->result();
        
    }
}?>
