<?php

namespace Livraria\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class CategoriaTable extends AbstractTableGateway{
    protected $table = "categorias";
    public function __construct(Adapter $adapter){
        $this->adapter = $adapter;
        $this->ResultSetPrototype = new ResultSet();
        $this->ResultSetPrototype->setArrayObjectPrototype(new Categoria());
        $this->initialize();
    }
}
                                                 