<?php

class Dbh {
    private $host = 'remotemysql.com';
    private $user = 'jBpfdZcUF7';
    private $pwd = 'g8BqbMJpQR';
    private $dbName = 'jBpfdZcUF7';

    /*private $host = 'studmysql01.fhict.local';
    private $user = 'dbi429690';
    private $pwd = 'alexjana';
    private $dbName = 'dbi429690';
    */
    
    protected function connect() {  

        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pwd);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*$dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        // setting fetch mode to associative array
        $pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, pDO::FETCH_ASSOC);*/

        return $conn;
    }
}
