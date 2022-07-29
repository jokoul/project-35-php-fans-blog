<?php
class Database {
    public $host = DB_HOST;
    public $username = DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;

    public $link;//represent mysqli object
    public $error;

    /**
     * Class Constructor
     */
    //constructor function to instance the class with initial values
    // public function __construct($host, $username,$password,$db_name){
    //     $this->host = $host;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->db_name = $db_name;
    //     //Call Connect Function
    //     $this->connect();//$this represent an instance of the class inside function, it is used to call another fn from this class
    // }
    //properties already setup
    public function __construct()
    {
        //Call Connect Function
        $this->connect();//$this represent an instance of the class inside function, it is used to call another fn from this class
    }
     /**
     * Connector
     */
    private function connect()
    {
        //launch connection to the database
        $this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
        //check connection
        if(!$this->link){
            $this->error = "Connection Failed : " . $this->link->connect_error;
            return false;
        }
    }
    /**
     * Select
     */
    public function select($query)
    {
        //if it doesn't succeed, it's gonna die and send error message (__LINE__ : current line number of the file)
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        //check
        if($result->num_rows > 0){
            //if number of entries find is greater than 0
            return $result;
        }else{
            return false;
        }
    }
    /**
     * Insert
     */
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

        //Validate Insert
        if($insert_row){
            //if the row is inserted, redirect to index page with a message
            header("Location: index.php?msg=" . urlencode('Record Added') . "");
            exit();//to stop the script here
        } else {
            //if row doesn't inserted
            die('Error : (' . $this->link->errno . ') ' . $this->link->error);
        }
    }
    /**
     * Update
     */
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);

        //Validate Insert
        if($update_row){
            //if the row is inserted, redirect to index page with a message
            header("Location: index.php?msg=" . urlencode('Record Updated') . "");
            exit();//to stop the script here
        } else {
            //if row doesn't inserted
            die('Error : (' . $this->link->errno . ') ' . $this->link->error);
        }
    }
    /**
     * Delete
     */
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

        //Validate Insert
        if($delete_row){
            //if the row is inserted, redirect to index page with a message
            header("Location: index.php?msg=" . urlencode('Record Deleted') . "");
            exit();//to stop the script here
        } else {
            //if row doesn't inserted
            die('Error : (' . $this->link->errno . ') ' . $this->link->error);
        }
    }
}