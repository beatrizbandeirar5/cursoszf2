<?php


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
        $entity = new clienteEntity($data);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data){
        $entity = $this->em->getReference('Loja\Entity\cliente', $data['id']);
        $entity->setNomeCliente($data['nome_cliente']);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    public function delete($id_cliente){
        $entity = $this->em->getReference('Loja\Entity\cliente', $id_cliente);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            return $id_cliente;
        }
    }
}
