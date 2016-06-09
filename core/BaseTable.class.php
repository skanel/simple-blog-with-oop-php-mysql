<?php

class BaseTable {

    protected $id = null;
    protected $table = null;

    function __constructor() {
        
    }

    function bind($data) {

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    function load($id) {
        $this->id = $id;
        $dbo = Db::getInstance();
        $sql = $this->buildQuery('load');

        $dbo->doQuery($sql);

        $row = $dbo->loadObjectList();
        if (is_array($row)) {
            foreach ($row as $key => $value) {
                if ($key == "id") {
                    continue;
                }
                $this->$key = $value;
            }
        }
    }

    function store() {
        $dbo = Db::getInstance();
        $sql = $this->buildQuery('store');
        $dbo->doQuery($sql);
    }

    protected function buildQuery($task) {
        $sql = "";

        if ($task == "store") {
            if ($this->id == "") {
                $keys = "";
                $values = "";
                $classVars = get_class_vars(get_class($this));
                //var_dump($classVars);
                $sql .="INSERT INTO {$this->table}";

                foreach ($classVars as $key => $value) {
                    if ($key == "id" || $key == "table") {
                        continue;
                    }
                    $keys .= "{$key},";
                    $values .= "'{$this->$key}',";
                }

                $sql .="(" . substr("$keys", 0, -1) . ") values (" . substr($values, 0, -1) . ")";
            } else {
                $classVars = get_class_vars(get_class($this));
                $sql .= "UPDATE {$this->table} SET ";

                foreach ($classVars as $key => $value) {
                    if ($key == "id" || $key == "table") {
                        continue;
                    }
                    $sql .= "{$key} = '{$this->$key}', ";
                }

                $sql = substr($sql, 0, -2) . " WHERE id = {$this->id}";
            }
        } elseif ($task == "load") {
            $sql = "SELECT * FROM {$this->table} where id ='$this->id'";
        }
        return $sql;
    }

}

?>
