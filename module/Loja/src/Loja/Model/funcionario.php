<?php

namespace Loja\Model;

class funcionario {
    public $id_funcionario;
    public $name_funcionario;
    
    public function exchangeArray($data){
        $this ->id=(isset($data['id_funcionario'])) ? $data ['id_funcionario'] : null;
        $this ->id=(isset($data['nome_funcionario'])) ? $data ['nome_funcionario'] : null;
        
    }
}
