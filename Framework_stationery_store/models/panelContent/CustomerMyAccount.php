<?php
/**
* This file contains the CustomerMyAccount Class
* 
*/


/**
 * CustomerMyAccount is an extended PanelModel Class
 * 
 * The purpose of this class is to generate HTML view panel headings and template content
 * for an  <em><b>CUSTOMER user account management </b></em>  page.  The content generated is intended for 3 panel
 * view layouts. 
 * 
 * @author gerry.guinane
 * 
 */


class CustomerMyAccount extends PanelModel{
    
    
    

    /**
    * Constructor Method
    * 
    * The constructor for the PanelModel class. The ManageSystems class provides the 
    * panel content for up to 3 page panels.
    * 
    * @param User $user  The current user
    * @param MySQLi $db The database connection handle
    * @param Array $postArray Copy of the $_POST array
    * @param String $pageTitle The page Title
    * @param String $pageHead The Page Heading
    * @param String $pageID The currently selected Page ID
    */   
    function __construct($user,$db,$postArray,$pageTitle,$pageHead,$pageID){  
        $this->modelType='CustomerMyAccount';
        parent::__construct($user,$db,$postArray,$pageTitle,$pageHead,$pageID);
    } 



    /**
     * Set the Panel 1 heading 
     */
    public function setPanelHead_1(){
        switch ($this->pageID) {
            case "myAccount":
                $this->panelHead_1='<h3>Manage My Account</h3>'; 
                break;
            case "editAccount":
                $this->panelHead_1='<h3>Edit My Account</h3>'; 
                break;
            case "changePassword":
                $this->panelHead_1='<h3>Change My Password</h3>'; 
                break;
            case "viewCart":
                $this->panelHead_1='<h3>View Shopping Cart</h3>'; 
                break;
            case "checkBalance":
                $this->panelHead_1='<h3>Check Points Balance</h3>'; 
                break;
            case "viewOrderHistory":
                $this->panelHead_1='<h3>View Order History</h3>'; 
                break;
            case "viewWishlists":
                $this->panelHead_1='<h3>View Wishlist</h3>'; 
                break;
            case "addToWishlist":
                $this->panelHead_1='<h3>Add to Wishlist</h3>'; 
                break;
            default:
                $this->panelHead_1='<h3>Manage My Account</h3>'; 
                break;
            }//end switch       
    }
    
    /**
    * Set the Panel 1 text content 
    */     
    public function setPanelContent_1(){
        switch ($this->pageID) {
            case "myAccount":
                $this->panelContent_1='Use the links above to manage and make changes to your registered account'; 
                break;
            case "editAccount": 
                $countyTable=new CountyTable($this->db);
                $userTable=new UserTable($this->db);
                $thisUserRecord=$userTable->getRecordByID($this->user->getUserID());
                $this->panelContent_1=Form::form_edit_account($countyTable,$thisUserRecord,$this->pageID); 
                
                break;
            case "changePassword":
                $this->panelContent_1=Form::form_password_change($this->pageID); 
                break;
            case "viewOrderHistory":
                $orderTable=new OrdersTable($this->db);
                $rs=$orderTable->getOrdersbyID($this->user->getUserID());
                
                if ($rs){                
                        
                            $this->panelContent_1= HelperHTML::generateTABLE($rs);
                }
                        
                        else{
                            $this->panelContent_1='You have not placed any orders yet.';
                        }
               break;
                        
            case "viewWishlists":
                $wishlistTable= new WishlistTable($this->db);
                $rs = $wishlistTable->getRecordByID($this->user->getUserID());
                if($rs){
                $this->panelContent_1= HelperHTML::generateTABLE($rs);
                        
                }
                else{
                    $this->panelContent_1='There are no items in your wishlist.';
                }
                
                break;
                
            case "addToWishlist":
                $productsTable=new ProductsTable($this->db); 
                $wishlistTable=new WishlistTable($this->db);
                $userID = $this->user->getUserID();
                //query all records
                $rs=$productsTable->getAllRecords(); 
                
                //construct the content based on the query result
                if ($rs){
                    //$this->panelContent_1= HelperHTML::generateTABLE($rs); //use the helper class to generate the table
                                          
                        if($rs->num_rows){
                            $this->panelContent_1= HelperHTML::generateAddToWishlistTABLE($rs, $this->pageID, 'ProdCode');
                        
                        if(isset($this->postArray['btnConfirm'])){
                    
                        $prodCode = $this->postArray['btnConfirm'];
                        
                        
                        if($wishlistTable->addToWishlist($userID,$prodCode)){
                            $this->panelContent_1='Product has been added to your wishlist.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_1='Item already in wishlist.'; //Unable to delete user record - there may be some dependencies
                                }
                        }
                        }
                        
                        
                        else{
                            $this->panelContent_1='No product records found'; //table may be empty
                        }
                }
                
                break;
                
            case "viewCart":
                
                $cartTable=new CartTable($this->db); 
                $orderTable=new OrdersTable($this->db);
                $userTable=new UserTable($this->db);
                
                //query all records
                $rs=$cartTable->getCartbyID($this->user->getUserID()); 
                
                //construct the content based on the query result
                if ($rs){
                    //$this->panelContent_1= HelperHTML::generateTABLE($rs); //use the helper class to generate the table
                                          
                        if($rs->num_rows){
                            $this->panelContent_1= HelperHTML::generateRemoveFromCartTABLE($rs, $this->pageID, 'ProdCode');
                            $this->panelContent_1.= '<br><p style="font-size:medium; font-weight: bold"> Total: €'.$cartTable->getCartTotal($this->user->getUserID());'</p>';
                            $this->panelContent_1.= Form::form_emptyCart($this->pageID, 'Empty Cart',$this->user->getUserID());
                            $this->panelContent_1.= '<br>'.Form::form_createOrder($this->pageID, 'Create Order',$this->user->getUserID());
                           
                        if(isset($this->postArray['btnConfirm'])){
                            $prodCode = $this->postArray['btnConfirm'];
                        
                                if($cartTable->checkItemQuantity($this->user->getUserID(),$prodCode)=== false){
                                    if($cartTable->removeProductItemFromCart($this->user->getUserID(),$prodCode)){

                                    $this->panelContent_1='Product has been removed your cart.';  //record successfully deleted
                                        }
                                        else{
                                            $this->panelContent_1='Unable to remove product from cart.'; 
                                        }
                                }
                        else {
                        if($cartTable->reduceProductQuantityCart($this->user->getUserID(),$prodCode)){
                            
                            $this->panelContent_1='Product has been removed your cart.';  //record successfully deleted
                                }
                                else{
                                    $this->panelContent_1='Unable to remove product from cart.';
                                }
                        }
                        }//end of remove
                        if(isset($this->postArray['btnEmpty'])){
                        
                        if($cartTable->emptyCart($this->user->getUserID())){  
                            $this->panelContent_1='Cart is empty.';  
                            }
                            else{
                                $this->panelContent_1='Unable empty cart - please try again later.'; 
                            }     
                }//end of empty
                if(isset($this->postArray['btnOrder'])){
                        if($orderTable->createOrder($this->user->getUserID())){
                            
                            $this->panelContent_1='Order has been created.';  
                            }
                            else{
                                $this->panelContent_1='Unable to create order - please try again later.'; 
                            }
                        
                        if($userTable->updateUserPointBalance($this->user->getUserID())){
                            $this->panelContent_1='Order has been created.';
                        }
                        else{
                                $this->panelContent_1='Unable to add points - please try again later.'; 
                            }
                        
                        if($cartTable->emptyCart($this->user->getUserID())){
                            
                            $this->panelContent_1='Order has been created.';  
                            }
                            else{
                                $this->panelContent_1='Unable to create order - please try again later.'; 
                            }
                        
                        }//end of order
                        
                        }
                     
                }
                else{
                            $this->panelContent_1='Cart is currently empty.'; 
                        }
                break;
            case "checkBalance":
                $userTable=new UserTable($this->db);
                $currentBalance=$userTable->getUserPointBalance($this->user->getUserID());
                
                $this->panelContent_1='Your current point balance is: '.$currentBalance.'.'; 
                break;
            default:
                $this->panelContent_1='Manage My Account'; 
                break;
            }//end switch  
    }       

    /**
     * Set the Panel 2 heading 
     */
    public function setPanelHead_2(){ 
        switch ($this->pageID) {
            case "myAccount":
                $this->panelHead_2='<h3>Manage My Account</h3>'; 
                break;
            case "editAccount":

                $this->panelHead_2='<h3>Edit Account Result</h3>'; 
                break;
            case "changePassword":
                $this->panelHead_2='<h3>Password Change Result</h3>'; 
                break;
            case "checkBalance":
                $this->panelHead_2='<h3>Discount</h3>'; 
                break;
            default:
                $this->panelHead_2='<h3>Manage My Account</h3>'; 
                break;
            }//end switch
    }    
    
    /**
    * Set the Panel 2 text content 
    */     
    public function setPanelContent_2(){
        switch ($this->pageID) {

            case "myAccount":
                $this->panelContent_2='myAccount'; 
                break;
            case "editAccount":
                if (isset($this->postArray['btnUpdateAccount'])){
                    $userTable=new UserTable($this->db);  
                    if($userTable->updateRecord($this->postArray, $this->user->getUserID())){
                        $this->panelContent_2='Record Updated';
                        $this->setPanelContent_1();  //refresh panel 1 data after change
                    }
                    else{
                        $this->panelContent_2='Unable to update';
                    }
                    
                }
                else{
                    $this->panelContent_2='';  
                }               
                break;
            case "changePassword":
                if (isset($this->postArray['btnChangePW'])){
                    
                    if($this->postArray['pass1']===$this->postArray['pass2']){
                        $userTable=new UserTable($this->db);              
                        if($userTable->changePassword($this->postArray,$this->user)){
                            $this->panelContent_2='Password changed';
                        }
                        else{
                            $this->panelContent_2='Unable to change password';
                        }                        
                        
                    }
                    else{
                        $this->panelContent_2="OLD Passwords entered DON'T match - please retry.";
                    }
                }
                else{
                    $this->panelContent_2='To change your password - enter the new password TWICE along with your OLD password for authorisation.';  
                }
                break;
                case "checkBalance":
                $userTable=new UserTable($this->db);
                $currentBalance=$userTable->getUserPointBalance($this->user->getUserID());
                $currentDiscount = $currentBalance * 0.01;
                $this->panelContent_2='This translates to €'.$currentDiscount.' euro off your next purchase.'; 
                break;
            default:
                $this->panelContent_2='myAccount'; 
                break;
            }//end switch
    } 

    /**
     * Set the Panel 3 heading 
     */
    public function setPanelHead_3(){ 
        if($this->loggedin){
            $this->panelHead_3='<h3>Panel 3</h3>';   
        }
        else{        
            $this->panelHead_3='<h3>Panel 3</h3>'; 
        }
    } 
    
    /**
    * Set the Panel 3 text content 
    */     
    public function setPanelContent_3(){ //set the panel 2 content
        $this->panelContent_3="Panel 3 content for <b>$this->pageHeading</b> menu item is under construction/not in use.";;
    }         


        
        
}
        