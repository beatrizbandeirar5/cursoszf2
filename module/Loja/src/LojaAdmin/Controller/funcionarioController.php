<?php
namespace LojaAdmin\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel;
use LojaAdmin\Form\funcionario as Frmfuncionario;

class funcionarioController extends AbstractActionController{
   /**
     * @var EntityManager
     */
protected $em;
  public function indexAction(){
      
        $list = $this->getEm()
             ->getRepository('Loja\Entity\funcionario')
             ->findAll();
     
     return new ViewModel(array('list'=>$list));
 }
 
 public function newAction(){
     $form = new Frmfuncionario();
     $request = $this->getRequest();
     
     if($request->isPost()){
         $form->setData($request->getPost());
         if($form->isValid()){
             $service = $this->getServiceLocator()->get('Loja\Service\funcionario');
             $service->insert($request->getPost()->toArray());
             
             return $this->redirect()->toRoute('loja-admin',array('controller'=>'funcionario'));
         }
     }
     return new ViewModel(array('form'=>$form));
 }
    public function editAction(){
        $form = new Frmfuncionario();
        $request = $this->getRequest();
//        var_dump($this->params()->fromRoute());exit(); 
        
        $repository = $this->getEm()->getRepository('Loja\Entity\funcionario');
        $entity = $repository->find($this->params()->fromRoute('id')); 
        
        if($this->params()->fromRoute('id'));
         
         $form->setData($entity->toArray());
        
        if($request->isPost()) {
            if($form->isValid()){
            $form->getData($request->getPost());
            $service = $this->getServiceLocator()->get('Loja\Service\funcionario');
            $dados = array_merge($request->getPost()->toArray(),$this->params()->fromRoute());
            $service->update($dados);    
            return $this->redirect()->toRoute('loja-admin',array('controller'=>'funcionario'));
            }   
            }
          return new ViewModel(array('form'=>$form));
}
    public function deleteAction(){
        $service = $this->getServiceLocator()->get('Loja\Service\funcionario');
        if($service->delete($this->params()->fromRoute('id'))){
            return $this->redirect()->toRoute('loja-admin',array('controller'=>'funcionario'));
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
