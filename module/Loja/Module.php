<?php
namespace Loja;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Loja\Model\funcionarioTable;
use Loja\Service\funcionario as FuncionarioService;
use Loja\Service\franquia as FranquiaService;
use Loja\Service\cliente as ClienteService;
class Module{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__.'Admin' => __DIR__ . '/src/' . __NAMESPACE__.'Admin',
                   __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
 public function getServiceConfig(){
        return array(
            'factories' => array(
                'Loja\Model\funcionarioService' => function($service){
                $dbAdapter = $service->get('Zend\Db\Adapter\Adapter'); 
                $funcionarioTable = new funcionarioTable($dbAdapter);
                $funcionarioService = new Model\funcionarioService($funcionarioTable);
                return $funcionarioService;
                },
                  'Loja\Service\funcionario' => function($service){
                    return new funcionarioService($service->get('Doctrine\ORM\EntityManager'));
                  }
            ),
                    
        );
    }
}
    