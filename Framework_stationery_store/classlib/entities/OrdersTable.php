<?php
/**
* This file contains the OrdersTable Class Template
* 
*/

 /**
 * 
 * The purpose of this OrdersTable [template] class is to implement the table entity class for the 'OrdersTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'OrdersTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'OrdersTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'OrdersTable' with 'SupplierTable' as the class name </li>
 * <li>Edit this file to REPLACE 'Orders' in the class constructor with the table name 'supplier' [lower case]</li>
 * <li>Move this file to its correct folder in the project eg /classlib/entities/ </li> 
 * <li>Finally include this file in the index.php </li>
 * </ul>
 * 
 * 
 * 
 * @author Gerry Guinane
 * 
 */

class OrdersTable extends TableEntity {

    /**
     * Constructor for the OrdersTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'order');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
    
    public function createOrder($userID){
            
            $this->SQL="Insert into k00320413_stationery_store.order(userid, orderdate, status, totalPrice) 
            SELECT s.userid,
            current_timestamp(),
            'In Progress',
            SUM(s.Quantity*p.ProdPrice)
            FROM shoppingcart s, products p 
            WHERE s.userID = '$userID' and p.ProdCode = s.ProdCode;";
            
            try {
            $rs=$this->db->query($this->SQL);
        } catch (mysqli_sql_exception $e) { //catch the exception 
            $this->MySQLiErrorNr=$e->getCode();
            $this->MySQLiErrorMsg=$e->getMessage();
            return false;
        }
        //check the insert query worked
        if ($rs){return TRUE;}else{return FALSE;}
    }
    
    public function getOrdersbyID($userID){ 
        
        //build the SQL Query
        $this->SQL="SELECT OrderDate, Status, TotalPrice
        FROM k00320413_stationery_store.order WHERE userID = '$userID';";
        
        try{
            $rs=$this->db->query($this->SQL);  //execute the query
            
            if($rs){
                
                    return $rs;  
            }
                else{
                    //no records returned for this query 
                    return false;
                }
            }
            
            
        catch (Exception $ex) {
            //an exception has occurred - get the details for diagnostic purposes
            $this->MySQLiErrorNr=$ex->getCode(); //get the exception number
            $this->MySQLiErrorMsg=$ex->getMessage(); //get the exception error message
            return false;
        } 

 
    }
   
    
   
    
}

