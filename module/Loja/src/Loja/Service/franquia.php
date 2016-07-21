<?php

namespace Loja\Service;

use Doctrine\ORM\EntityManager;
use Loja\Entity\Configurator;


class franquia extends AbstractService {
   
    public function __construct(EntityManager $em){
      parent:: __construct($em);
      $this->entity = 'Loja\Entity\franquia';
      
    }
    public function insert(array $data){
        $entity = new $this->entity($data);
       $funcionario = $this->em->getReference('Loja\Entity\funcionario', $data['funcionario']);
        $entity->setFuncionarioIdFuncionario($funcionario);
      
      $this->em->persist($entity);
      $this->em->flush();
      return $entity;
    }
    public function update(array $data){
        $entity = $this->em->getReference($this->entity, $data['id_franquia']);
        $entity = Configurator::configure($entity, $data);
        
        $funcionario = $this->em->getReference('Loja\Entity\funcionario', $data['funcionario']);
        $entity->setfuncionarioIdFuncionario($funcionario);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
