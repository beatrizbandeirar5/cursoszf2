<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Loja\Entity;
    /**
     * @ORM\Entity
     * @ORM\Table(name="cliente")
     */
    class cliente {
    public function __construct($options = null){
       Configurator::configure($this,$options);
    }
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
    public function toString(){
        return $this->nomeCliente;
    }
    public function toArray(){
        return array('id_cliente'=>$this->getIdCliente(),'nome_cliente'=>$this->getNomeCliente(),
            'email_cliente'=>$this->getEmailCliente(),'telefone_cliente'=>$this->getTelefoneCliente());
    }
}
