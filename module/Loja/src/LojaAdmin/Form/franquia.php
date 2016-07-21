<?php

namespace LojaAdmin\Form;
use Zend\Form\Form,
    Zend\Form\Element\Select;
/**
 * Description of franquia
 *
 * @author bannet
 */
class franquia extends Form {
     protected $funcionarios;
   public function __construct($name = null, array $funcionarios = null) {
            parent::__construct("franquia");
            
            $this->funcionarios = $funcionarios;
            $this->setAttribute('method','post');
            #$this->setInputFilter(new franquiaFilter);
            $this->add(array(
                    'name' => 'id_franquia',
                    'attributes' =>array(
                        'type' => 'hidden'
                    )
                    ));
            $this->add(array(
                'name' => 'nome_franquia',
                'options' => array(
                    'type' => 'text',
                    'label' => 'Nome da Franquia',
                    
                ),
                'attributes' => array(
                    'id' => 'nome_franquia',
                    'placeholder' => 'Entre com o nome da Franquia',
                    'class' => 'form-control'
                    )
            ));
            
             $this->add(array(
                'name' => 'cnpj_franquia',
                'options' => array(
                    'type' => 'text',
                    'label' => 'Cnpj da Franquia',
                    
                ),
                'attributes' => array(
                    'id' => 'cliente_franquia',
                    'placeholder' => 'Entre com o cnpj da Franquia',
                    'class' => 'form-control'
                    )
            ));
            
             $funcionario = new Select();
             $funcionario->setLabel("funcionario")
                     ->setName("funcionario")
                     ->setAttribute('class', 'form-control')
                     ->setOptions(array('value_options' => $funcionarios)
                             
                             );
          
                     
             $this->add($funcionario);
             $this->add(array(
                'name'=> 'submit',
                'type' => 'Zend\Form\Element\Submit',
                'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success btn-block'
                )
            )); 
        }
}


