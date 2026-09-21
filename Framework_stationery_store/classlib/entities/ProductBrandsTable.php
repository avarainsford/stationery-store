<?php
/**
* This file contains the ProductBrandsTable Class Template
* 
*/

 /**
 * 
 * The purpose of this ProductBrandsTable [template] class is to implement the table entity class for the 'ProductBrandsTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'ProductBrandsTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'ProductBrandsTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'ProductBrandsTable' with 'SupplierTable' as the class name </li>
 * <li>Edit this file to REPLACE 'XXX' in the class constructor with the table name 'supplier' [lower case]</li>
 * <li>Move this file to its correct folder in the project eg /classlib/entities/ </li> 
 * <li>Finally include this file in the index.php </li>
 * </ul>
 * 
 * 
 * 
 * @author Gerry Guinane
 * 
 */

class ProductBrandsTable extends TableEntity {

    /**
     * Constructor for the ProductBrandsTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'brand');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
   
    
   
    
}

