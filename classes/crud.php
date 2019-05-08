<?php

include_once('database.php');


class Crud extends Database
{

    private $query, $run;


    public function __construct()
    {
        parent::__construct('mysql:dbname=phpoo;host=localhost;','root','');
    }



    private function set_statement($s)
    {

        if(is_object(parent::con())):

            $this->query = parent::con()->prepare($s);

        else:

            die(parent::killCon());

        endif;

    }



    private function do_run()
    {
        $this->query->execute($this->run);
    }



    public function run($r = [])
    {
        $this->run = $r;
        $this->do_run();

        return $this->query;
    }


    public final function insert($table, $values)
    {
        $this->set_statement("INSERT INTO ".$table." SET ".$values."");
        return $this;
    }



    public final function select($fields, $table, $condition)
    {
        $this->set_statement("SELECT ".$fields." FROM ".$table." ".$condition."");
        return $this;
    }



    public final function selectAll($fields, $table, $condition = '')
    {
        $this->set_statement("SELECT ".$fields." FROM ".$table." ".$condition."");
        return $this;
    }



    public final function update($table, $values, $condition = '')
    {
        $this->set_statement("UPDATE ".$table." SET ".$values." ".$condition."");
        return $this;
    }



    public final function delete($table, $condition)
    {
        $this->set_statement("DELETE FROM ".$table." ".$condition."");
        return $this;
    }



    public function last_id()
    {
        return parent::con()->lastInsertId();
    }

}