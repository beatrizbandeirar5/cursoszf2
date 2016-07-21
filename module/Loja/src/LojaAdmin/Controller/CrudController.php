<?php

namespace LojaAdmin\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel;

abstract class CrudController extends AbstractActionController{
      /**
      * @var EntityManager
      */
        protected $em;
        protected $service;
        protected $entity;
        protected $form;
        protected $route;
        protected $controller;

  public function indexAction(){
      
        $list = $this->getEm()
             ->getRepository($this->entity)
             ->findAll();
     
     return new ViewModel(array('list'=>$list)); 
 }
 
 public function newAction(){
     $form = new $this->form();
     $request = $this->getRequest();
     
     if($request->isPost()){
         $form->setData($request->getPost());
         if($form->isValid()){
             $service = $this->getServiceLocator()->get($this->service);
             $service->insert($request->getPost()->toArray());
             
             return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
         }
     }
     return new ViewModel(array('form'=>$form));
 }
    public function editAction(){
        $form = new $this->form();
        $request = $this->getRequest();
//        var_dump($this->params()->fromRoute());exit(); 
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id')); 
        
        if($this->params()->fromRoute('id'));
         
         $form->setData($entity->toArray());
        
        if($request->isPost()) {
            if($form->isValid()){
            $form->getData($request->getPost());
            $service = $this->getServiceLocator()->get($this->service);
            $dados = array_merge($request->getPost()->toArray(),$this->params()->fromRoute());
            $service->update($dados);    
            return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }   
            }
          return new ViewModel(array('form'=>$form));
}
    public function deleteAction(){
        $service = $this->getServiceLocator()->get($this->service);
        if($service->delete($this->params()->fromRoute('id'))){
            return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
        }
    }
        /*
        * @return EntityManager
        */
     protected function getEm(){
     if (null === $this->em){
        $this->em = $this->getServiceLocator()->get('Doctrine\ORM\Entity\Manager');
     }
     
     return $this->em;
  }
}

