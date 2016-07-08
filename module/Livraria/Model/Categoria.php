<?php

namespace Livraria\Model;

class Categoria {
    public $id;
    public $name;
    
    public function exchangeArray($data){
        $this ->id=(isset($data['id'])) ? $data ['id'] : null;
        $this ->id=(isset($data['nome'])) ? $data ['nome'] : null;
        
    }
}
