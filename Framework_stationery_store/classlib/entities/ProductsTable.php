<?php
/**
* This file contains the ProductsTable Class Template
* 
*/

 /**
 * 
 * The purpose of this ProductsTable [template] class is to implement the table entity class for the 'ProductsTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'ProductsTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'ProductsTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'ProductsTable' with 'SupplierTable' as the class name </li>
 * <li>Edit this file to REPLACE 'Products' in the class constructor with the table name 'supplier' [lower case]</li>
 * <li>Move this file to its correct folder in the project eg /classlib/entities/ </li> 
 * <li>Finally include this file in the index.php </li>
 * </ul>
 * 
 * 
 * 
 * @author Gerry Guinane
 * 
 */

class ProductsTable extends TableEntity {

    /**
     * Constructor for the ProductsTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'products');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
    public function getAllRecords(){
        
         //construct the SQL query        
         $this->SQL="SELECT 
                            
                            p.ProdName as Name,
                            p.ProdCode,
                            p.ProdPrice as Price,
                            p.ProdDescription as Description,
                            pc.CategoryName AS Category,
                            pb.BrandName AS Brand
                      FROM
                            products p,
                            category pc,
                            brand pb
                      WHERE
                             p.ProdCategory = pc.CategoryID 
                             and p.ProdBrand = pb.BrandID;";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function selectByProductCategory($CategoryID){
        
         //construct the SQL query        
         $this->SQL="SELECT 
                            p.ProdName as Name,
                            p.ProdCode,
                            p.ProdPrice as Price,
                            
                            pc.CategoryName AS Category
                          
                      FROM
                            products p,
                            category pc,
                            brand pb
                      WHERE
                             p.ProdCategory = pc.CategoryID 
                             and p.ProdBrand = pb.BrandID
                             and p.ProdCategory = '$CategoryID';";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function selectByProductCode($prodCode){
        
         //construct the SQL query        
         $this->SQL="SELECT *
                          
                      FROM
                            products
                      WHERE
                            ProdCode = '$prodCode';";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function selectByProductBrand($BrandID){
        
         //construct the SQL query        
         $this->SQL="SELECT 
                            p.ProdName as Name,
                            p.ProdCode,
                            p.ProdPrice as Price,
                            
                            pb.BrandName AS Brand
                      FROM
                            products p,
                            category pc,
                            brand pb
                      WHERE
                             p.ProdCategory = pc.CategoryID 
                             and p.ProdBrand = pb.BrandID
                             and p.ProdBrand = '$BrandID';";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function selectSaleProducts(){
        
         //construct the SQL query        
         $this->SQL="SELECT 
                            p.ProdName as Name,
                            p.ProdCode,
                            p.ProdPrice as Price,
                            p.ProdDescription as Description,
                            pc.CategoryName AS Category,
                            pb.BrandName AS Brand
                      FROM
                            products p,
                            category pc,
                            brand pb
                      WHERE
                             p.ProdCategory = pc.CategoryID 
                             and p.ProdBrand = pb.BrandID
                             and p.ProdSale = 1;";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function selectProductbyPrice($Price){
        
         //construct the SQL query        
         $this->SQL="SELECT 
                            p.ProdName as Name,
                            p.ProdCode,
                            p.ProdPrice as Price,
                            p.ProdDescription as Description,
                            pc.CategoryName AS Category,
                            pb.BrandName AS Brand
                      FROM
                            products p,
                            category pc,
                            brand pb
                      WHERE
                             p.ProdCategory = pc.CategoryID 
                             and p.ProdBrand = pb.BrandID
                             and p.ProdPrice < '$Price';";
         
         
        //execute the query
        try {
                $rs=$this->db->query($this->SQL);
                if($rs->num_rows){
                    return $rs; //return the recordset
                }
                else{
                    return false;  //no records found
                }  
        } catch (mysqli_sql_exception $e) { //catch the exception 
                $this->MySQLiErrorNr=$e->getCode();
                $this->MySQLiErrorMsg=$e->getMessage();
                return false;  //the query failed for some reason
            }        

    }
    
    public function addProduct($postArray){
        
        
        extract($postArray);
        //prepare the form values      
        $prodCode= addslashes($prodCode);
        $prodName= addslashes($prodName);
        $prodCategory=(integer)$prodCategory;
        $prodBrand=(integer)$prodBrand;
        $prodDescription= addslashes($prodDescription);
        $prodPrice=(float)$prodPrice; 
        $prodQuantityInStock=(integer) $prodQuantityInStock;  
        $prodSale=(integer) $prodSale;  
        
        
        //insert statement addprod
        $this->SQL="INSERT INTO products
                    (ProdCode, ProdName, ProdBrand, ProdCategory, ProdDescription, ProdPrice, ProdQuantityInStock, ProdSale)
VALUES (
                    '$prodCode',
                    '$prodName',
                    $prodBrand,
                    $prodCategory,
                    '$prodDescription',
                    $prodPrice,
                    $prodQuantityInStock,
                    $prodSale
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
    
    public function updateProduct($postArray){
        
        
        extract($postArray);
        //prepare the form values      
        $prodCode= addslashes($prodCode);
        $prodName= addslashes($prodName);
        $prodCategory=(integer)$prodCategory;
        $prodBrand=(integer)$prodBrand;
        $prodDescription= addslashes($prodDescription);
        $prodPrice=(float)$prodPrice; 
        $prodQuantityInStock=(integer) $prodQuantityInStock;  
        $prodSale=(integer) $prodSale;  
        
        
        //insert statement addprod
        $this->SQL="UPDATE products SET
                ProdCode ='$prodCode',
                ProdName =  '$prodName', 
                ProdBrand = $prodBrand,
                ProdCategory = $prodCategory,
                ProdDescription = '$prodDescription', 
                ProdPrice =  $prodPrice,
                ProdQuantityInStock =  $prodQuantityInStock, 
                ProdSale = $prodSale
                WHERE prodCode = '$prodCode';";   
  
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

  
}

