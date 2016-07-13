<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Loja\Service;


class cliente {
    /**
     * @var EntityManager
     */
    
    protected $em;
    public function __construct(EntityManager $em){
      $this->em = $em;  
    }
    public function insert(array $data){
        $entity = new funcionarioEntity($data);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data){
        $entity = $this->em->getReference('Loja\Entity\cliente', $data['id']);
        $entity->setNomeFuncionario($data['nome_funcionario']);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    public function delete($id_funcionario){
        $entity = $this->em->getReference('Loja\Entity\funcionario', $id_funcionario);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            return $id_funcionario;
        }
    }
}
