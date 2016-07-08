<?php

namespace Loja\Model\funcionarioTable;


class funcionarioService {
    /**
    * @var funcionarioTable
    */
    protected $funcionarioTable;
    public function __construct(funcionarioTable $table) {
        $this->funcionarioTable = $table;
    }
    public function FetchAll(){
        $resultSet = $this->funcionarioTable->select();
        return $resultSet;
    }
}
