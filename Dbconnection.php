<?php
/**
 * Created by PhpStorm.
 * User: amos neculau
 * Date: 6/7/2017
 * Time: 3:37 PM
 */
ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');
class Dbconnection{
    // Db parameters
    private $servername = "localhost";
    private $username = "root";
    private $password = "Amos.expert94";
    private $db = "sermoncentral";
    private $port = "3306";


    public function __construct()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db, $this->port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    public function query($sql)
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db, $this->port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn->query($sql);
    }

    public function insert($sql){

        $toReturn = 0;

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db, $this->port);

        if ($conn->query($sql) === TRUE) {
            $toReturn = 1;
        }

        return $toReturn;
    }

}
?>