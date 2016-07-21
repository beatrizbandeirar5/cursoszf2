<?php
namespace Loja\Entity;
use Doctrine\ORM\Mapping as ORM;
    /**
    * @ORM\Entity
    * @ORM\Table(name="franquia")
    * @ORM\Entity(repositoryClass="Loja\Entity\franquiaRepository")
    */
class franquia {
     public function __construct($options = null){
       Configurator::configure($this, $options);
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id_franquia", type="integer")
     * @var integer
     */
    protected $idFranquia;
    /**
     * @ORM\Column(type="text", name="nome_franquia")
     * @var string
     */
     protected $nomeFranquia;
     /**
     * @ORM\Column(type="text", name="cnpj_franquia") 
     */
     protected $cnpjFranquia;
    /** 
     * @var Loja\Entity\funcionario
     * 
     * @ORM\ManyToOne(targetEntity="Loja\Entity\funcionario")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="funcionario_id_funcionario", referencedColumnName="id_funcionario")
     * })
     */
    protected $funcionarioIdFuncionario;
    
    public function getIdFranquia() {
        return $this->idFranquia;
    }

    public function getNomeFranquia() {
        return $this->nomeFranquia;
    }

    public function getCnpjFranquia() {
        return $this->cnpjFranquia;
    }

    public function getFuncionarioIdFuncionario() {
        return $this->funcionarioIdFuncionario;
    }

    public function setIdFranquia($idFranquia) {
        $this->idFranquia = $idFranquia;
        return $this;
    }

    public function setNomeFranquia($nomeFranquia) {
        $this->nomeFranquia = $nomeFranquia;
        return $this;
    }

    public function setCnpjFranquia($cnpjFranquia) {
        $this->cnpjFranquia = $cnpjFranquia;
        return $this;
    }
    public function setFuncionarioIdFuncionario($funcionarioIdFuncionario) {
        $this->funcionarioIdFuncionario = $funcionarioIdFuncionario;
        return $this;
    }       
    public function toString(){
        return $this->nomeFranquia;
    }
    public function getFranquias(){
        return $this->franquias;
    }
    public function toArray(){
        return array('id_franquia'=>$this->getIdFranquia(),
            'nome_franquia'=>$this->getNomeFranquia(),
            'cnpj_franquia'=>$this->getCnpjFranquia(),
            'funcionario_id_funcionario'=>$this->getFuncionarioIdFuncionario(),
                );
    }

}