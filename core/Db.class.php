<?php

class Db {

    private $host;
    private $user;
    private $pass;
    private $dbName;
    static private $instance;
    private $connection;
    private $results;
    private $numRows;

    private function __contructor() {
        
    }

    public function getNumRows() {
        return $this->numRows;
    }

    public function getResults() {
        return $this->results;
    }

    static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function connect($host, $user, $pass, $dbName) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return $this->connection;
    }

    public function doQuery($sql) {
        $this->results = mysqli_query($this->connection, $sql);

        if (is_object($this->results)) {
            $this->numRows = $this->results->num_rows;
        }
    }

    function loadObjectList() {
        $obj = "No Result";

        if ($this->results) {
            $obj = mysqli_fetch_assoc($this->results);
        }
        return $obj;
    }

}

?>
