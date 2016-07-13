<?php

namespace LojaAdmin\Form;

use Zend\InputFilter\InputFilter;
class funcionarioFilter extends InputFilter {
    public function __construct() {
        $this->add(array(
            'name' => 'nome_franquia',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('cnpj' => 'StringTags'),
                array('cnpj' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' =>array(
                        'messages' => array('isEmpty' => 'Nome não pode estar em branco'),
                        'messages' => array('isEmpty' => 'Cnpj não pode estar em branco')
                    )
                )
            )
        ));
    }
}
