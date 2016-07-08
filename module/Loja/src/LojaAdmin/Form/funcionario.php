<?php
namespace LojaAdmin\Form;

use Zend\Form\Form;
class funcionario extends Form {
        public function __construct($name = null) {
            parent::__construct("funcionario");
            
            $this->setAttribute('method','post');
            $this->setInputFilter(new funcionarioFilter);
            $this->add(array(
                    'name' => 'id_funcionario',
                    'attributes' =>array(
                        'type' => 'hidden'
                    )
                    ));
            $this->add(array(
                'name' => 'nome_funcionario',
                'options' => array(
                    'type' => 'text',
                    'label' => 'Nome'
                ),
                'attributes' => array(
                    'id' => 'nome_funcionario',
                    'placeholder' => 'Entre com o nome'
                    )
            ));
            $this->add(array(
                'name'=> 'submit',
                'type' => 'Zend\Form\Element\Submit',
                'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
                )
            ));
            
        }
}
