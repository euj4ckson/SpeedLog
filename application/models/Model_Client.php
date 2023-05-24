<?php class Model_Client extends CI_Model {
    public function get_entregas()
    {    
        $this->db->where('entrega_clienteID',$_SESSION['id']);
        $this->db->select('*');
        $this->db->where('entrega_status',"FINALIZADO");
        $this->db->or_where('entrega_status',"CANCELADO");
        $this->db->from('entregas');
        // $this->db->join('usuarios', 'entregas.entrega_responsavel = usuarios.usuario_id');
        // $this->db->join('entregadores', 'entregas.entrega_responsavel = entregadores.entregador_id');
        $query = $this->db->get();
        return $query->result();

        
    }
    public function get_all()
    {    
        $this->db->where('entrega_clienteID',$_SESSION['id']);
        $this->db->where('entrega_status',"PENDENTE");
        $this->db->select('*');
        $this->db->from('entregas');
        $query = $this->db->get();
        return $query->result();

        
    }
    
    public function get_acompanhamento(){
               
        $this->db->where('entrega_clienteID',$_SESSION['id']);
        $this->db->where('entrega_status','ANDAMENTO');
        $this->db->from('entregas');
        $this->db->join('usuarios', 'entregas.entrega_responsavel = usuarios.usuario_id');
        // $this->db->join('entregadores', 'entregas.entrega_responsavel = entregadores.entregador_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir($largura, $altura,$cepretirada,$cepentrega,$peso,$observacao,$valor,$tempoEstimado,$ruaRetirada,$ruaEntrega)
    {
        $cliente=$_SESSION['usuario'];
        $id_cliente=$_SESSION['id'];

        $this->entrega_status="PENDENTE";
        $this->entrega_cliente=$cliente;
        $this->entrega_clienteID=$id_cliente;
        $this->entrega_cepOrigem=$cepretirada;
        $this->entrega_cepDestino=$cepentrega;
        $this->entrega_peso=$peso;
        $this->entrega_valor=$valor;
        $this->entrega_observacao=$observacao;
        $this->tempoEstimado=$tempoEstimado;
        $this->entrega_enderecoOrigem=$ruaRetirada;
        $this->entrega_enderecoDestino=$ruaEntrega;
        $this->db->insert('entregas', $this);
    }
    public function deletar_pedido($entregaDel){
        $this->db->where('entrega_id',$entregaDel);
        $this->db->delete('entregas');
    }
    public function cancelar_pedido($id_deletado)
    //DATA PEDIDO PARA CALCULO
    {
        $this->db->where('entrega_id',$id_deletado); 	
        $query = $this->db->get('entregas');
        $resultados=$query->result();
        foreach ($resultados as $key => $value) {
           
            $bob=$value->entrega_dataPedido;
        }
       $m = substr("$bob", 14, 8);
       $h = substr("$bob", 11, 8);
       // DATA LOCAL
       date_default_timezone_set('America/Sao_Paulo');
       $dataLocal = date(' i:s', time());
       $dataLocalh = date(' h:i:s', time());
       //RETURN
       $verificador=$dataLocal-$m;
       $verificador2=$dataLocalh-$m;
       
       if ($verificador<0 && $verificador2==0) {
        $verificador=intval($verificador)*(-1);
        
       }
       if ($verificador<5) {
       //query
         $this->db->where('entrega_id', $id_deletado);
         $this->db->update('entregas', array('entrega_status' => "CANCELADO"));
        // echo "2";

       } else {
        // echo "0";
       }
    }
    public function selectMessages()
    {
        $query = $this->db->get('denuncias');
        return $query->result();
    }
    public function inserir_msg($textoMsg){
        $this->message_text = $textoMsg;
        $this->db->insert('denuncias',$this);
    }

    public function delete_msg($msgDel){
        $this->db->where('message_id',$msgDel);
        $this->db->delete('elogios');
    }
    public function calcular_valor($peso,$distancia,$tempo)
    {
        // $sql = "SELECT * FROM frete WHERE frete_tipo = 'PADRAO'"; 
        // $query = $this->db->query($sql);  
        // $variables = $query->row_array();
        // QUERY PARA DEFINIR VALORES DE CALCULO
        $this->db->where('frete_tipo','PADRAO'); 	
        $query = $this->db->get('frete');
        $resultados=$query->result();
        // ALIMENTANDO VARIAVEIS COM VALORES PARA CALCULO
        foreach ($resultados as $value) {
            $calculo_distancia = $value->valor_km;
            $calculo_tempo = $value->valor_minuto;
            //peso
            $peso1 = $value->valor_kgAte1;
            $peso2 = $value->valor_kg1a3;
            $peso3 = $value->valor_kg3a8;
            $peso4 = $value->valor_kg8a12;
        } 
        $valor=0;
        $valorp=0;
        $valord=0;
        $valort=0;
        $pesor=$peso;
        $distanciar=$distancia;
        $tempor=$tempo;
        switch ($pesor) {
            case $pesor < 1:
                    $valorp=$peso1;
                break;
            case $peso > 1 and $peso <= 3:
                $valorp=$peso2;
                break;
            case $peso >3 and $peso <= 8:
                $valorp=$peso3;
                
                break;
            case $peso >8 and $peso <= 12:
                $valorp=$peso4;
                
                break;
            default:
            $valorp="Transporte não autorizado pelo peso.";
        }
        $valord=floatval(str_replace(' km', '', $distanciar))*$calculo_distancia;
        $valort=$tempor*$calculo_tempo;
        // echo var_dump($valort);
        // echo var_dump($calculo_tempo);
        $valor= (floatval($valorp)+floatval($valord)+floatval($valort));
        // echo var_dump($valor);
        // echo 'R$'.$valor;
        echo 'R$'.$valor;
              
        
    }
}?>
