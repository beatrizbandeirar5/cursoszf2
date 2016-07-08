<?php

namespace Loja\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->GET('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Loja\Entity\funcionario');
        $funcionario = $repo->findAll();
        /**
        $funcionarioService = $this->get('Loja\Model\funcionarioService');
        $funcionario = $funcionarioService->fetchAll();
        */
        return new ViewModel(array('funcionario'=>$funcionario));
    }
}
