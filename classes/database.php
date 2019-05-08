<?php

class Database
{

    private $dsn, $user, $pass, $con, $error_con;

    public function __construct($dsn, $user, $pass)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->pass = $pass;

        $this->set_con();
    }


    private function set_con()
    {
        try {

            $this->con = new PDO($this->dsn, $this->user, $this->pass);

        } catch (PDOException $e) {

            $this->error_con = 'Falha ao estabelecer conexão.';
            $e->getMessage();

        }
    }


    public function con()
    {

        return $this->con;
    }

    public function killCon(){
        return $this->error_con;
    }


}