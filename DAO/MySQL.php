<?php

class MySQL extends PDO{
    private $dsn = 'mysql:host=localhost;dbname=db_jornal';
    private $user = 'root';
    private $pass = 'Eduardo@mysql';

    public function __construct()
    {
        return parent::__construct($this->dsn, $this->user, $this->pass);
    }

}