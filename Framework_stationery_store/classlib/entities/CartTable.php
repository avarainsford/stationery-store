<?php
/**
* This file contains the CartTable Class Template
* 
*/

 /**
 * 
 * The purpose of this CartTable [template] class is to implement the table entity class for the 'CartTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'CartTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'CartTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'CartTable' with 'SupplierTable' as the class name </li>
 * <li>Edit this file to REPLACE 'Cart' in the class constructor with the table name 'supplier' [lower case]</li>
 * <li>Move this file to its correct folder in the project eg /classlib/entities/ </li> 
 * <li>Finally include this file in the index.php </li>
 * </ul>
 * 
 * 
 * 
 * @author Gerry Guinane
 * 
 */

class CartTable extends TableEntity {

    /**
     * Constructor for the CartTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'shoppingcart');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
    
    public function checkItemInCart($userID,$prodCode){

        //construct the SQL for the specified product in the specified customer's cart
        $this->SQL="SELECT Quantity FROM shoppingcart WHERE userID='$userID' AND ProdCode='$prodCode'";   
        
         try{
            $rs=$this->db->query($this->SQL);  //execute the query
            
            if($rs){
                if($rs->num_rows){
                    
                    return true;  
                }
                else{
                    //no records returned for this query 
                    return false;
                }
            }
            else{
                //the query has not executed successfully
                return false;
            }
            
        } catch (Exception $ex) {
            //an exception has occurred - get the details for diagnostic purposes
            $this->MySQLiErrorNr=$ex->getCode(); //get the exception number
            $this->MySQLiErrorMsg=$ex->getMessage(); //get the exception error message
            return false;
        } 
        
        
    }
    
    public function addProductItemToCart($userID,$prodCode){       

        if ($this->checkItemInCart($userID,$prodCode)) 
        { 
            $this->SQL="Update shoppingcart 
                        set quantity = quantity + 1  
            where userID = '$userID' and ProdCode = '$prodCode';"; 

        } 
        else{
            $this->SQL="Insert into shoppingcart
                        (userID, ProdCode, Quantity)
            values('$userID', '$prodCode', 1)";
        }
            
            try {
            $rs=$this->db->query($this->SQL);
        } catch (mysqli_sql_exception $e) { //catch the exception 
            $this->MySQLiErrorNr=$e->getCode();
            $this->MySQLiErrorMsg=$e->getMessage();
            return false;
        }
        //check the insert query worked
        if ($rs){return TRUE;}else{return FALSE;}
//        
       
        
        
    }
    
    public function getCartbyID($userID){ 
        
        //build the SQL Query
        $this->SQL="SELECT 
            p.ProdCode,
            p.ProdName, p.ProdPrice, s.Quantity, p.ProdPrice * s.Quantity as Total
            FROM shoppingcart s, products p 
            WHERE s.userID = '$userID' and p.ProdCode = s.ProdCode;";
        
        try{
            $rs=$this->db->query($this->SQL);  //execute the query
            
            if($rs){
                if($rs->num_rows){  //this query should return at least 1 record
                    return $rs;  //the resultset can be returned as it contains ONLY one record
                }
                else{
                    //no records returned for this query 
                    return false;
                }
            }
            else{
                //the query has not executed successfully
                return false;
            }
            
        } catch (Exception $ex) {
            //an exception has occurred - get the details for diagnostic purposes
            $this->MySQLiErrorNr=$ex->getCode(); //get the exception number
            $this->MySQLiErrorMsg=$ex->getMessage(); //get the exception error message
            return false;
        }              
 
    }
    
    public function getCartTotal($userID){ 
        
        $this->SQL = "SELECT 
            SUM(s.Quantity*p.ProdPrice)as CartTotal
            FROM shoppingcart s, products p 
            WHERE s.userID = '$userID' and p.ProdCode = s.ProdCode;"; 

   
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($this->db->affected_rows){
                    $row=$rs->fetch_assoc();
                    $cartTotal=$row['CartTotal'];
                    return $cartTotal; 
                }
                else{
                    
                    return 0;
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
        }         
 
    }
    
    public function checkItemQuantity($userID,$ProdCode){ 
        
        $this->SQL="SELECT 
            Quantity
            FROM shoppingcart 
            WHERE userID = '$userID' and ProdCode = '$ProdCode'
            AND Quantity > 1;";   
        
        //execute the query 
        if ($rs=$this->db->query($this->SQL)){ //the query has executed
            if($rs->num_rows){ //number of rows must be 1 (TRUE) if the item is already in the cart
                return $rs;
            }
            else{ //the item is not in the shopping csart
                return FALSE;
            }
        }
        else{ //something caused the query to fail
            return FALSE;
            
        }      
 
    }
   
    public function removeProductItemFromCart($userID,$prodCode){       

//        if ($this->getItemQuantity($userID,$prodCode) > 1) 
//        { 
//            $this->SQL="Update shoppingcart 
//                        set quantity = quantity - 1  
//            where userID = '$userID' and ProdCode = '$prodCode';"; 
//            
//
//        } 
        if($this->getCartbyID($userID)){ 
            
            $this->SQL = "DELETE FROM shoppingcart WHERE userID='$userID' and prodCode='$prodCode';";
            
            try {
                $rs=$this->db->query($this->SQL);
                return true;
            } catch (mysqli_sql_exception $e) { //catch the exception 
                return false;
            }
    }
        else{
            return false;
        }   
   
    }
    public function reduceProductQuantityCart($userID,$prodCode){       

        if($this->getCartbyID($userID)){ 
            
            $this->SQL = "UPDATE `k00320413_stationery_store`.`shoppingcart` SET `Quantity` = `Quantity`-1 WHERE (`userID` = '$userID') and (`ProdCode` = '$prodCode')";
            
            
            
            try {
                $rs=$this->db->query($this->SQL);
                return true;
            } catch (mysqli_sql_exception $e) { //catch the exception 
                return false;
            }
        }
        else{
            return false;
        }   
    
    }
    
    public function emptyCart($userID){
    $this->SQL="DELETE FROM shoppingcart WHERE userID='$userID' "; 
        
        if ($this->db->query($this->SQL)){return TRUE;}else{return FALSE;}
    }
    
   
    
}

