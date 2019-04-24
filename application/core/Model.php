<?php
/**
 * Main Model class
 */
class Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        $this->db = new Database();
    }
}
?>