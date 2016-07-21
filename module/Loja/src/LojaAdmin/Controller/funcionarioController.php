<?php
namespace LojaAdmin\Controller;

class funcionarioController extends CrudController{
    public function __construct(){
        $this->entity = 'Loja\Entity\funcionario';
        $this->service = 'Loja\Service\funcionario';
        $this->controller = 'funcionario';
        $this->form = 'LojaAdmin\Form\funcionario';
        $this->route = 'loja-admin';
       
    }
}
