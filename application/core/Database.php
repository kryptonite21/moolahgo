<?php
/**
 * Database class
 */
class Database extends PDO
{
    /**
     * Constructor
     */
    function __construct()
    {
        /**
         * Database configuration variables
         */
        $this->database = 'moolahgo';
        $this->db_user = 'root';
        $this->db_password = '';

        /**
         * Database connection
         * 
         * Uncomment to connect with the database (moolahgo.sql)
         */
        
        //parent::__construct('mysql:host=localhost;dbname=moolahgo',$this->db_user, $this->db_password);
    }
}
?>