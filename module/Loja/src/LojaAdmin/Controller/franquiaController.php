<?php
namespace LojaAdmin\Controller;
use Zend\View\Model\ViewModel;

class franquiaController extends CrudController{
    public function __construct(){
        $this->entity = 'Loja\Entity\franquia';
        $this->service = 'Loja\Service\franquia';
        $this->controller = 'franquia';
        $this->form = 'LojaAdmin\Form\franquia';
        $this->route = 'loja-admin'; 
    }
    public function newAction(){
     $form = $this->getServiceLocator()->get($this->form);
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
     $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
//        var_dump($this->params()->fromRoute());exit(); 
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id')); 
        
        if($this->params()->fromRoute('id'));
         
         $form->setData($entity->toArray());
        
        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()){
            $service = $this->getServiceLocator()->get($this->service);
            $dados = array_merge($request->getPost()->toArray(),$this->params()->fromRoute());
            $service->update($dados);    
            return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }   
            }
          return new ViewModel(array('form'=>$form));
}
}
