<?php
/**
* This file contains the WishlistTable Class Template
* 
*/

 /**
 * 
 * The purpose of this WishlistTable [template] class is to implement the table entity class for the 'WishlistTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'WishlistTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'WishlistTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'WishlistTable' with 'SupplierTable' as the class name </li>
 * <li>Edit this file to REPLACE 'Wishlist' in the class constructor with the table name 'supplier' [lower case]</li>
 * <li>Move this file to its correct folder in the project eg /classlib/entities/ </li> 
 * <li>Finally include this file in the index.php </li>
 * </ul>
 * 
 * 
 * 
 * @author Gerry Guinane
 * 
 */

class WishlistTable extends TableEntity {

    /**
     * Constructor for the WishlistTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'wishlist');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
    
    public function addToWishlist($userID, $prodCode){
       
        //insert statement addprod
        $this->SQL="INSERT INTO wishlist
                    
VALUES ( '$userID',
                    '$prodCode'
                   )";   
  
        //execute the insert query
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
    
    public function getRecordByID($userID){
        $this->SQL="SELECT p.prodname as Products FROM wishlist w, products p WHERE w.wishlistID='$userID' and p.prodcode = w.prodcode;";
        
        //execute the query using a try catch 
        try{
            $rs=$this->db->query($this->SQL);  //execute the query
            
            if($rs){
               return $rs;  //the resultset can be returned as it contains ONLY one record
                
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

    

     
    

    
    

    

   
    
   
    
}

