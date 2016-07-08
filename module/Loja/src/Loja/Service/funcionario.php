<?php
namespace Loja\Service;
use Doctrine\ORM\EntityManager;
use Loja\Entity\funcionario as funcionarioEntity;
use Livraria\Entity\Configurator;

class funcionario {
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
        $entity = $this->em->getReference('Loja\Entity\funcionario', $data['id']);
        $entity->setNomeFuncionario($data['nome_funcionario']);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
