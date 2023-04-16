<?php
//database

//database credentials
require_once 'db_cred.php';
require_once 'core.php';

/**
 *@author David Sampah
 *@version 1.1
 */
class db_connection
{
    //properties
    public $result = null;
    public $conn = null;

    //connect
    /**
     *Database connection
     *@return bolean
     **/
    public function connect()
    {
        $this->conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
        if (mysqli_connect_errno()) {
            return false;
        } else {
            return true;

        }

    }

    //execute a query
    /**
     *Query the Database
     *@param takes a connection and sql query
     *@return bolean
     **/
    public function db_query($sql_Query)
    {
        if (!$this->connect()) {
            return false;
        } elseif ($this->conn == null) {
            return false;
        }

        $this->result = mysqli_query($this->conn, $sql_Query);
        if ($this->result == false) {
            return false;
        } else {
            return true;
        }
    }

    //execute a query with mysqli real escape string
    //to saveguard from sql injection
    /**
     *Query the Database
     *@param takes a connection and sql query
     *@return bolean
     **/

    //fetch a data
    /**
     *get select data
     *@return a record
     **/
    public function getAData($sql_Query)
    {
        //excuting query
        if (!$this->db_query($sql_Query)) {
            return false;
        } elseif ($this->result == null) {
            return false;
        }
        //return the record
        return mysqli_fetch_assoc($this->result);

    }

    //fetch all data
    /**
     *get select data
     *@return all record
     **/
    public function getAllData($sql_Query)
    {
        if (!$this->db_query($sql_Query)) {
            return false;
        } elseif ($this->result == null) {
            return false;
        }
        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }

    //count data
    /**
     *get select data
     *@return a count
     **/

    public function countData()
    {
        //check if result was set
        if ($this->result == null) {
            return false;
        } elseif ($this->result == false) {
            return true;
        }

        //return a record
        return mysqli_num_rows($this->result);
    }

    // function id (Insert and getid)

    public function getLastInsertedId($sql)
    {
        if ($this->db_query($sql)) {
            $last_id = mysqli_insert_id($this->conn);
            return $last_id;
        } else {
            return false;
        }
    }

}
