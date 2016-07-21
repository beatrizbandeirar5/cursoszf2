<?php

namespace Loja\Service;

use Doctrine\ORM\EntityManager;
/**
 * @author bannet
 */
abstract class AbstractService {
    protected $em;
    protected $entity;
    public function __construct(EntityManager $em){
      $this->em = $em;  
    }
    public function insert(array $data){
        $entity = new $this->entity($data);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data){
        $entity = $this->em->getReference($this->entity, $data['id']);
        $entity->setNomeFuncionario($data['nome_funcionario']);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    public function delete($id_funcionario){
        $entity = $this->em->getReference($this->entity,  $id_funcionario);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            return $id_funcionario;
        }
    } 
}
