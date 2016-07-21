<?php 
namespace Loja\Service;
use Doctrine\ORM\EntityManager;
use Loja\Entity\funcionario as funcionarioService;

class funcionario extends AbstractService{
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Loja\Entity\funcionario';
    }
}
