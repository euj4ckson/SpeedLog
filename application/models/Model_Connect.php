<?php class Model_Connect extends CI_Model {
    public function loginCredentials($userLogin , $userPass)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario_apelido = '$userLogin' OR usuario_email = '$userLogin' AND usuario_senha = '$userPass'"; 
        $query = $this->db->query($sql);  
        $userType = $query->row_array();
        if($query->num_rows() > 0){
            $this->session->set_userdata('usuario',$userLogin);
            $this->session->set_userdata('apelido',$userType['usuario_apelido']);
            $this->session->set_userdata('nome',$userType['usuario_nome']);
            $this->session->set_userdata('cpf',$userType['usuario_cpf']);
            $this->session->set_userdata('idUser',$userType['usuario_id']);
            $this->session->set_userdata('tipo',$userType['usuario_tipo']);
            $this->session->set_userdata('id',$userType['usuario_id']);
            switch ($userType['usuario_tipo']) {
                case 'ADMINISTRADOR':
                    echo base_url('index.php/admin');
                    break;
                case 'CLIENTE':
                    echo base_url('index.php/client');
                    break;
                case 'ENTREGADOR':
                    echo base_url('index.php/deliveryman');
                    break;
            }
        }
    }
    public function verifyDuplicated($email_SignUp,$cpf_signUp,$nickname_SignUp){
        $this->db->where('usuario_email', $email_SignUp);
        $this->db->or_where('usuario_cpf', $cpf_signUp);
        $this->db->or_where('usuario_apelido', $nickname_SignUp);
        $query = $this->db->get('usuarios');
        $queryInfo = $query->result_array();
        $duplicated = [];
        foreach ($queryInfo as $row) {
            if ($row['usuario_email'] == $email_SignUp) $duplicated[] = 'email';
            if ($row['usuario_cpf'] == $cpf_signUp) $duplicated[] = 'cpf';
            if ($row['usuario_apelido'] == $nickname_SignUp) $duplicated[] = 'nickname';
        }
        if($query->num_rows() == 0) return false;
        else return $duplicated;
    }
    public function register($name_signUp,$email_SignUp,$cpf_signUp,$nickname_SignUp,$phoneNumber_SignUp,$license_SignUp,$pass_SignUp){
        $this->usuario_nome = $name_signUp;
        $this->usuario_email = $email_SignUp;
        $this->usuario_cpf = $cpf_signUp;
        $this->usuario_apelido = $nickname_SignUp;
        $this->usuario_senha = $pass_SignUp;
        $this->usuario_telefone = $phoneNumber_SignUp;
        if($license_SignUp!="") $this->usuario_tipo = "ENTREGADOR";
        else $this->usuario_tipo = "CLIENTE";
        $this->db->insert('usuarios',$this);
        if($license_SignUp!=""){
            $sql = "SELECT * FROM usuarios WHERE usuario_apelido = '$nickname_SignUp'"; 
            $query = $this->db->query($sql);  
            $deliveryman = $query->row_array();
            $deliverymanData = array(
                'entregador_id'=>intval($deliveryman['usuario_id']),
                'entregador_placaMoto'=>$license_SignUp,
                'entregador_status'=>'LIVRE'
            );
            $this->db->insert('entregadores',$deliverymanData);
        }
    }
}?>
