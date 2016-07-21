<?php


namespace Loja\Entity;
    /**
     * @ORM\Entity
     * @ORM\Table(name="cliente")
     */
    class cliente {
   
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id_cliente", type="integer")
     * @var integer
     */
    protected $idCliente;
    
    /**
     * @ORM\Column(type="text", name="nome_cliente")
     * @var string
     */
    protected $nomeCliente;
    
    /**
     * @ORM\Column(type="text", name="email_cliente")
     */
    protected $emailCliente;
    
    /**
     *@ORM\Column(type="text", name="telefone_cliente")
     */
    protected $telefoneCliente;
    
    /**
     * @ORM\Column(type="integer", name="funcionario_id_funcionario") 
     * @ORM\ManyToOne(targetEntity="Loja\Entity\funcionario")
     */
    protected $funcionarioIdFuncionario;
    
   
    public function getIdCliente() {
    return $this->idCliente;
    }

    public function getNomeCliente() {
        return $this->nomeCliente;
    }
    public function getEmailCliente() {
        return $this->emailCliente;
    }

    public function getTelefoneCliente() {
        return $this->telefoneCliente;
    }
    public function getFuncionarioIdFuncionario() {
      return $this->funcionarioIdFuncionario;
    }
    public function setIdCliente($id_cliente) {
        $this->idCliente = $id_cliente;
    }

    public function setNomeCliente($nome_cliente) {
        $this->nomeCliente = $nome_cliente;
    }
    public function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
        return $this;
    }

    public function setTelefoneCliente($telefoneCliente) {
        $this->telefoneCliente = $telefoneCliente;
        return $this;
    }
   
     public function setFuncionarioIdFuncionario($funcionarioIdFuncionario) {
        $this->funcionarioIdFuncionario = $funcionarioIdFuncionario;
        return $this;
    }
     public function __construct($options = null){
       Configurator::configure($this, $options);
    }

    public function toString(){
        return $this->nomeCliente;
    }
    public function toArray(){
        return array('id_cliente'=>$this->getIdCliente(),'nome_cliente'=>$this->getNomeCliente(),
            'email_cliente'=>$this->getEmailCliente(),'telefone_cliente'=>$this->getTelefoneCliente());
    }
}
