<?php

namespace Loja\Entity;

use Doctrine\ORM\EntityRepository;

class funcionarioRepository extends EntityRepository{
    public function fetchPairs() {
        $entities = $this->findAll();
        
        $array = array();
        
        foreach($entities as $entity) {
            $array[$entity->getIdFuncionario()] = $entity->getNomeFuncionario();
        }
        return $array;
    } 
}
