<?php
use Zend\Form\Form;

namespace LojaAdmin\Form;

/**
 * Description of franquia
 *
 * @author bannet
 */
class franquia extends Form {
   public function __construct($name = null) {
            parent::__construct("franquia");
            
            $this->setAttribute('method','post');
            $this->setInputFilter(new franquiaFilter);
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


