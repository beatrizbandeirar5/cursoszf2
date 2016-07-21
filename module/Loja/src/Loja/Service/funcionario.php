<?php 
namespace Loja\Service;
use Doctrine\ORM\EntityManager;
use Loja\Entity\funcionario as funcionarioService;

class funcionario {
    /**
     * @var EntityManager
     */
    protected $em;
    public function __construct(EntityManager $em){
      $this->em = $em;  
    }
    public function insert(array $data){
        $entity = new funcionarioService($data);
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
    public function delete($id_funcionario){
        $entity = $this->em->getReference('Loja\Entity\funcionario', $id_funcionario);
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            return $id_funcionario;
        }
    }
}
