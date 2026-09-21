<?php
/**
* This file contains the ProductCategoriesTable Class Template
* 
*/

 /**
 * 
 * The purpose of this ProductCategoriesTable [template] class is to implement the table entity class for the 'ProductCategoriesTable' table in the database. 
 * 
 * 
 * To use this TEMPLATE - change 'ProductCategoriesTable' to the required table everywhere it appears 
 *  
 * eg: if you want to define a table entity class  for a database table called 'suppliers'
 * <ul>
 * <li>Rename this file - replace the 'ProductCategoriesTable' with 'SupplierTable' in the file name </li>
 * <li>Rename class  - replace the 'ProductCategoriesTable' with 'SupplierTable' as the class name </li>
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

class ProductCategoriesTable extends TableEntity {

    /**
     * Constructor for the ProductCategoriesTable Class
     * 
     * @param MySQLi $databaseConnection  The database connection object. 
     */
    function __construct($databaseConnection){
        parent::__construct($databaseConnection,'category');  //the name of the table is passed to the parent constructor
    }
    //END METHOD: Construct
   
    
   
    
}

