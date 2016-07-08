<?php

namespace Livraria\Model\CategoriaTable;


class CategoriaService {
    /**
    * @var CategoriaTable
    */
    protected $categoriaTable;
    public function __construct(CategoriaTable $table) {
        $this->categoriaTable = $table;
    }
    public function FetchAll(){
        $resultSet = $this->categoriaTable->select();
        return $resultSet;
    }
}
