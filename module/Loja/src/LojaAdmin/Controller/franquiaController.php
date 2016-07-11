<?php

namespace LojaAdmin\Controller;


class franquiaController extends AbstractActionController{
   /**
     * @var EntityManager
     */
protected $em;
  public function indexAction(){
      
        $list = $this->getEm()
             ->getRepository('Loja\Entity\franquia')
             ->findAll();
     
     return new ViewModel(array('list'=>$list));
 }
 
 public function newAction(){
     $form = new Frmfranquia();
     $request = $this->getRequest();
     
     if($request->isPost()){
         $form->setData($request->getPost());
         if($form->isValid()){
             $service = $this->getServiceLocator()->get('Loja\Service\franquia');
             $service->insert($request->getPost()->toArray());
             
             return $this->redirect()->toRoute('loja-admin',array('controller'=>'franquia'));
         }
     }
     return new ViewModel(array('form'=>$form));
 }
    public function editAction(){
        $form = new Frmfranquia();
        $request = $this->getRequest();
        $repository = $this->getEm()->getRepository('Loja\Entity\franquia');
        $entity = $repository->find($this->params()->fromRoute('id')); 
        
        if($this->params()->fromRoute('id'));  
         $form->setData($entity->toArray());
        
        if($request->isPost()) {
            if($form->isValid()){
            $form->getData($request->getPost());
            $service = $this->getServiceLocator()->get('Loja\Service\franquia');
            $dados = array_merge($request->getPost()->toArray(),$this->params()->fromRoute());
            $service->update($dados);    
            return $this->redirect()->toRoute('loja-admin',array('controller'=>'franquia'));
            }   
            }
          return new ViewModel(array('form'=>$form));
}
    public function deleteAction(){
        $service = $this->getServiceLocator()->get('Loja\Service\franquia');
        if($service->delete($this->params()->fromRoute('id'))){
            return $this->redirect()->toRoute('loja-admin',array('controller'=>'franquia'));
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
