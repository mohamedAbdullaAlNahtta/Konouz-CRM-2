<?php

class DB
{
    protected $servername;
    protected $username;
    protected $password;
    protected $database;
    
    public $connection;
    
    
    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    	$this->database = $database;
        $this->open_db_connection();
        
    }
      
    public function open_db_connection()
    {
        
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        
        // Check connection
        if ($this->connection->connect_error) {
            return "Unable to connect to server" . $this->servername . ".!!!, Please check your connection, and if still the same problem, Please contact your administrator. Thanks for trusting US....... Software Development Team";
            
        }else{
            return true;
        }     
        
    }
    public function close_db_connection()
    {
        $this->connection->close();
        
    }
    
    public function query($sql)
    {
        $result = $this->connection->query($sql);

        if ($result === false) {
            return $this->connection->error;
        } else {
            return $result;
        }

        $this->close_db_connection();
        
    }

    public function multi_query($sql)
    {
        $result = $this->connection->multi_query($sql);
        
        if ($result === false) {
            return $this->connection->error;
        } else {
            return $result;
        }    
        
    }
    
    public function escape_string($string)
    {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
        
    }
    
}



?>