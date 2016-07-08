<?php
namespace LivrariaAdmin\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;
class CategoriasController extends AbstractActionController{
    /**
     *
     * @var EntityManager
     */

protected $em;
  public function indexAction(){
     $list = $this->getEm()
             ->getRepository('Livraria\Entity\Categoria')
             ->findAll();
     $page = $this->params()->fromRoute('page');
     $paginator = new Paginator(new ArrayAdapter($list));
     $paginator->setCurrentPageNUmbre($page);
     $paginator->setDefaultItemCountPerpage(1);
     
     return new ViewModel(array('data' => $list));
 }

 /*
  * @return EntityManager
  */
 protected function getEm(){
     if (null === $this->em)
         $this->em = $this->getServiceLocator()->get('Dotrine\ORM\Entity\Manager');
     
     return $this->em;
}
}