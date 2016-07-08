<?php

namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em -= $this->getServiceLocator()->GET('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Livraria\Entity\Categoria');
        $categorias = $repo->findAll();
        /**
        $categoriaService = $this->get('Livraria\Model\CategoriaService');
        $categorias = $categoriaService->fetchAll();
        */
        return new ViewModel(array('categorias'=>$categorias));
    }
}
