<?php

abstract class connectDB{
    protected $con;
    private $DATABASE_HOST = 'localhost';
    private $DATABASE_USER = 'root';
    private $DATABASE_PASS = '';
    private $DATABASE_NAME = 'test';
    function __construct()
    {
        $this->con = mysqli_connect($this->DATABASE_HOST,$this->DATABASE_USER,$this->DATABASE_PASS,$this->DATABASE_NAME);
        if ( mysqli_connect_errno() ) {
// If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

    }
}
?>