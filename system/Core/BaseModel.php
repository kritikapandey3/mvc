<?php

namespace System\Core;


abstract class BaseModel
{
    protected $table = '';
    protected $pk = 'id';
    protected $select = '*';
    protected $offset = 0;
    protected $limit;
    public function select($columns = '*')
    {
        $this->select = $columns;
    }
    public function offset($offset = 0)
    {
        $this->offset = $offset;
        return $this;
    }
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

}