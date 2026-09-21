<?php
/**
* This file contains the CustomerViewProducts Class
* 
*/

class CustomerViewProducts extends PanelModel {
  
    /**
    * Constructor Method
    * 
    * The constructor for the PanelModel class. The CustomerViewProducts class provides the 
    * panel content for up to 3 page panels.
    * 
    * @param User $user  The current user
    * @param MySQLi $db The database connection handle
    * @param Array $postArray Copy of the $_POST array
    * @param String $pageTitle The page Title
    * @param String $pageHead The Page Heading
    * @param String $pageID The currently selected Page ID
    * 
    */  
    function __construct($user,$db,$postArray,$pageTitle,$pageHead,$pageID){  
        $this->modelType='CustomerViewProducts';
        parent::__construct($user,$db,$postArray,$pageTitle,$pageHead,$pageID);
    } 

    
    
    /**
     * Set the Panel 1 heading 
     */
    public function setPanelHead_1(){
        
        switch ($this->pageID) {
            case "viewProducts":
                $this->panelHead_1='<h3>Browse All</h3>';
                break;
            case "viewProductsCategory":
                $this->panelHead_1='<h3>Browse By Category</h3>';
                break;
            case "viewProductsBrands": 
	    $this->panelHead_1='<h3>Browse By Brand</h3>';
                break;
            case "viewProductsPrice": 
	    $this->panelHead_1='<h3>Browse By Price</h3>';
                break;
            case "viewProductsSale": 
	    $this->panelHead_1='<h3>Browse Sale Items</h3>';
                break;
            default:  //DEFAULT menu item handler
                $this->panelHead_1='<h3>Manage Products</h3>';
                break;
            }//end switch   
        
    }

    
    /**
    * Set the Panel 1 text content 
    */ 
    public function setPanelContent_1(){
        
        switch ($this->pageID) {
            case "viewProducts":  //sample menu item handler
                $productsTable=new ProductsTable($this->db); 
                $cartTable=new CartTable($this->db);
                $userID = $this->user->getUserID();
                //query all records
                $rs=$productsTable->getAllRecords(); 
                
                //construct the content based on the query result
                if ($rs){
                    //$this->panelContent_1= HelperHTML::generateTABLE($rs); //use the helper class to generate the table
                                          
                        if($rs->num_rows){
                            $this->panelContent_1= HelperHTML::generateAddToCartTABLE($rs, $this->pageID, 'ProdCode');
                        
                        if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($userID,$prodCode)){
                            $this->panelContent_1='Product has been added to your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_1='Unable to add product to cart.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                        }
                        
                        
                        else{
                            $this->panelContent_1='No product records found'; //table may be empty
                        }
                }
                        
                        
                        
                    
                break;
            case "viewProductsCategory":  //sample menu item handler
                $productCategoriesTable= new ProductCategoriesTable($this->db);
                $this->panelContent_1=Form::form_select_category($productCategoriesTable, $this->pageID);
                break;
            case "viewProductsBrands":  //sample menu item handler
                $productBrandsTable= new ProductBrandsTable($this->db);
                $this->panelContent_1=Form::form_select_brand($productBrandsTable, $this->pageID);
                break;
            case "viewProductsPrice":  //sample menu item handler
                $this->panelContent_1=Form::form_select_price($this->pageID);
                break;
            case "viewProductsSale":  //sample menu item handler
                $productsTable=new ProductsTable($this->db); 
                $cartTable=new CartTable($this->db);
                
                //query all records
                $rs=$productsTable->selectSaleProducts(); 
                
                //construct the content based on the query result
                if ($rs){
                    $this->panelContent_1= HelperHTML::generateAddToCartTABLE($rs, $this->pageID, 'ProdCode');
                    
                    if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($this->user->getUserID(),$prodCode)){
                            $this->panelContent_1='Product has been added to your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_1='Unable to add product to cart.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                }
                else{
                    $this->panelContent_1='No products are currently on sale'; //table may be empty
                }
                
                break;
            default:  //sample DEFAULT menu item handler
                $this->panelContent_1="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            }//end switch   
        
    }        

     /**
     * Set the Panel 1 heading 
     */
    public function setPanelHead_2(){
        
        switch ($this->pageID) {
            case "viewProducts":
                $this->panelHead_2='<h3>Browse All</h3>';
                break;
            case "viewProductsCategory":
                $this->panelHead_2='<h3>Browse By Category</h3>';
                break;
            case "viewProductsBrands": 
	    $this->panelHead_2='<h3>Browse By Brand</h3>';
                break;
            case "viewProductsPrice": 
	    $this->panelHead_2='<h3>Browse By Price</h3>';
                break;
            case "viewProductsSale": 
	    $this->panelHead_2='<h3>Browse Sale Items</h3>';
                break;
            default:  //DEFAULT menu item handler
                $this->panelHead_2='<h3>Manage Products</h3>';
                break;
            }//end switch   
        
    } 
    
    /**
    * Set the Panel 2 text content 
    */ 
    public function setPanelContent_2(){
        switch ($this->pageID) {
            case "viewProducts":  //sample menu item handler
                $this->panelContent_2="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            case "viewProductsCategory":  //sample menu item handler
                $productsTable=new ProductsTable($this->db);
                $cartTable=new CartTable($this->db);
                if (isset($this->postArray['btnSearchCategory'])){ //product search button has been pressed
                    
                    //get the search term from the form
                    $searchTerm=$this->postArray['CategoryID'];
                   
                    

                    $rs=$productsTable->selectByProductCategory($searchTerm);

                    if($rs){                            
                        $this->panelContent_2= HelperHTML::generateAddToCartTABLE($rs, $this->pageID, 'ProdCode');                                               
                              
                    }
                    else{
                            $this->panelContent_2='There are no products in this category.';
                        } 
                        
        }
        if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($this->user->getUserID(),$prodCode)){
                            $this->panelContent_2='Product has been added to your cart.'; 
                                }
                                else{
                                    $this->panelContent_2='Unable to add product to cart.';
                                } 
                        
                        
                    }
                
    
                
                
                break;
            case "viewProductsBrands":
                $productsTable=new ProductsTable($this->db);
                $cartTable=new CartTable($this->db);
                if (isset($this->postArray['btnSearchBrand'])){ 
                    
                    //get the search term from the form
                    $searchTerm=$this->postArray['BrandID'];
                   
                    $rs=$productsTable->selectByProductBrand($searchTerm);

                    if($rs){                        
                        
                            $this->panelContent_2= HelperHTML::generateAddToCartTABLE($rs, $this->pageID, 'ProdCode');
                            
                    }
                    
                    else{
                            $this->panelContent_2='There are no products from this brand.';
                    }   
                    
                }
                if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($this->user->getUserID(),$prodCode)){
                            $this->panelContent_2='Product has been added to your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_2='Unable to add product to cart.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                break;
            case "viewProductsPrice":  //sample menu item handler
                $productsTable=new ProductsTable($this->db);
                $cartTable=new CartTable($this->db);
                if (isset($this->postArray['btnSearchPrice'])){ 
                    
                    //get the search term from the form
                    $searchTerm=$this->postArray['Price'];
                   
                    

                    $rs=$productsTable->selectProductbyPrice($searchTerm);

                    if($rs){                        
                        
                    $this->panelContent_2= HelperHTML::generateAddToCartTABLE($rs, $this->pageID, 'ProdCode');
                    if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($userID,$prodCode)){
                            $this->panelContent_1='Product has been added to your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_1='Unable to add product to cart.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                    }
                        else{
                            $this->panelContent_2='There are no products from this brand.';
                        }                                      
                }
                if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($cartTable->addProductItemToCart($this->user->getUserID(),$prodCode)){
                            $this->panelContent_2='Product has been added to your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_2='Unable to add product to cart.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                break;
            case "viewProductsSale":  //sample menu item handler
                
                break;
            default:  //sample DEFAULT menu item handler
                $this->panelContent_2="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            }//end switch   
    }

    public function setPanelHead_3(){
        
        switch ($this->pageID) {
            case "viewProducts":
                $this->panelHead_3='<h3>Browse All</h3>';
                break;
            case "viewProductsCategory":
                $this->panelHead_3='<h3>Browse By Category</h3>';
                break;
            case "viewProductsBrand": 
	    $this->panelHead_3='<h3>Browse By Brand</h3>';
                break;
            case "viewProductsPrice": 
	    $this->panelHead_3='<h3>Browse By Price</h3>';
                break;
            case "viewProductsSale": 
	    $this->panelHead_3='<h3>Browse Sale Items</h3>';
                break;
            default:  //DEFAULT menu item handler
                $this->panelHead_3='<h3>Manage Products</h3>';
                break;
            }//end switch   
        
    }
    
    /**
    * Set the Panel 3 text content 
    */ 
    public function setPanelContent_3(){
        switch ($this->pageID) {
            case "viewProducts":  //sample menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            case "viewProductsCategory":  //sample menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            case "viewProductsBrand":  //sample menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            case "viewProductsPrice":  //sample menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            case "viewProductsSale":  //sample menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            default:  //sample DEFAULT menu item handler
                $this->panelContent_3="Panel 1 content for \$pageID <b>$this->pageID</b> menu item is under construction.";
                break;
            }//end switch  
    }        

        
        
}
        