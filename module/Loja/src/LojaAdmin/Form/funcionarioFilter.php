<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LojaAdmin\Form;

use Zend\InputFilter\InputFilter;
class funcionarioFilter extends InputFilter {
    public function __construct() {
        $this->add(array(
            'name' => 'nome_funcionario',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' =>array(
                        'messages' => array('isEmpty' => 'Nome não pode estar em branco'),
                    )
                )
            )
        ));
    }
}
