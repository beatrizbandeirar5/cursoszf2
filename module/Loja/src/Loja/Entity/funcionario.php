<?php
namespace Loja\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="funcionario")
 * @ORM\Entity(repositoryClass="Loja\Entity\funcionarioRepository")
 */
class funcionario {
     public function __construct($options = null){
       Configurator::configure($this, $options);
       $this->franquias = new ArrayCollection();
    } 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id_funcionario", type="integer")
     * @var integer
     */
    protected $idFuncionario;
  
    /**
     * @ORM\Column(type="text", name="nome_funcionario")
     * @var string
     */
    protected $nomeFuncionario;
    /**
      * @ORM\OneToMany(targetEntity="Loja\Entity\franquia", mappedBy="funcionario")
      */
    protected $franquias;
     
    function getIdFuncionario() {
    return $this->idFuncionario;
    }

    function getNomeFuncionario() {
        return $this->nomeFuncionario;
    }

    function setIdFuncionario($id_funcionario) {
        $this->idFuncionario = $id_funcionario;
    }

    function setNomeFuncionario($nome_funcionario) {
        $this->nomeFuncionario = $nome_funcionario;
    }
   
    public function toString(){
        return $this->nomeFuncionario;
    }
    public function toArray(){
        return array('id_funcionario'=>$this->getIdFuncionario(),'nome_funcionario'=>$this->getNomeFuncionario());
    }
}
