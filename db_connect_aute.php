<?php
 
/**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
		
        // import database connection variables
        require_once __DIR__ . '/db_config_aute.php';
		
		
		 $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);   
		if($mysqli->connect_errno > 0){   
		die("Imposible conectarse con la base de datos [" . $mysqli->connect_error . "]");   
		}  
		
		$mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
		if (mysqli_connect_errno())  
 {  
      echo "Imposible conectarse a la base de datos: " . mysqli_connect_error();  
 } else {   
 }  
		
//echo "conectoooo";
        // Connecting to mysql database
        //$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
		
		
 
        // Selecing database
        //$db = mysqli_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        // returing connection cursor
        return $mysqli;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
      //  mysqli_close();
    }
 
}
 
?>