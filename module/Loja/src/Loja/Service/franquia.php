<?php

namespace Loja\Service;

class franquia {
    /**
     * @var EntityManager
     */
    protected $em;
    public function __construct(EntityManager $em){
      $this->em = $em;  
    }
    public function insert(array $data){
        $entity = new franquiaEntity($data);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
       
    }
    
    public function update(array $data){
        $entity = $this->em->getReference('Loja\Entity\franquia', $data['id']);
        $entity->setNomeFranquia($data['nome_franquia']);
        $entity->setCnpjFranquia($data['nome_franquia']);
        $entity->setfuncionarioIdFuncionario($data['nome_franquia']);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    public function delete($id_franquia){
        $entity = $this->em->getReference('Loja\Entity\funcionario', $id_franquia);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            return $id_franquia;
        }
    }
}
