<?php

namespace Loja\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class funcionarioTable extends AbstractTableGateway{
    protected $table = "funcionario";
    public function __construct(Adapter $adapter){
        $this->adapter = $adapter;
        $this->ResultSetPrototype = new ResultSet();
        $this->ResultSetPrototype->setArrayObjectPrototype(new funcionario());
        $this->initialize();
    }
}
                                                 