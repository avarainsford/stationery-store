<?php
/**
* This file contains the NavigationCustomer Class
* 
*/

/**
 * 
 * NavigationCustomer class is a model class that implements the content generation for the
 * page navigation bar for a logged in CUSTOMER user.  
 * 
 * @author Gerry Guinane
 * 
 */

class NavigationCustomer implements NavigationInterface {
    
        /**
         *
         * @var boolean $loggedin User logged in state 
         */
        protected $loggedin; 

        /**
         *
         * @var String $modelType Identifues this navigation model type  
         */
        protected $modelType; 

        /**
         *
         * @var String $pageID The currently selected page
         */
        protected $pageID;   

        /**
         *
         * @var array $menuNav An array of menu items  
         */
        protected $menuNav;    

        /**
         *
         * @var User $user  The current user object. 
         */
        protected $user;     

        
	/**
         * Class constructor. 
         * 
         * @param User $user The current user object.
         * @param string $pageID The currently selected page
         */
	function __construct($user,$pageID) {               
            $this->loggedin=$user->getLoggedInState();
            $this->modelType='NavigationCustomer';
            $this->user=$user;
            $this->pageID=$pageID;
            $this->setmenuNav();
	}

        /**
         * Method to prepare the navigation menu depending on the currently selected page ID. 
         * 
         * This method implements handlers for each page ID.  It prepares a HTML list item string
         * containing the menu items that will appear in the view. This string may be returned using the 
         * getMenuNav() method of this class.
         * 
         * If a user is not properly logged in it force redirects to the website home page. 
         * 
         */
        public function setmenuNav(){//set the menu items depending on the users selected page ID
            
            //empty string for menu items
            $this->menuNav='';
            
            //dropdown menu items for MANAGE ACCOUNT
                        $dropdownMenuMyAccount='<li class="dropdown">';
                        $dropdownMenuMyAccount.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Account<span class="caret"></span></a>';
                        $dropdownMenuMyAccount.='<ul class="dropdown-menu">';
                        $dropdownMenuMyAccount.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=editAccount">Edit Details</a></li>';
                        $dropdownMenuMyAccount.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=changePassword">Change Password</a></li>';
                        $dropdownMenuMyAccount.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=checkBalance">Check Point Balance</a></li>';
                        $dropdownMenuMyAccount.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewOrderHistory">View Order History</a></li>';
                        $dropdownMenuMyAccount.='</ul></li>';
                        
            //dropdown menu items for Browsing Products
                        $dropdownMenuBrowseProducts='<li class="dropdown">';
                        $dropdownMenuBrowseProducts.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Shop Products<span class="caret"></span></a>';
                        $dropdownMenuBrowseProducts.='<ul class="dropdown-menu">';
                        $dropdownMenuBrowseProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProducts">Browse All</a></li>';
                        $dropdownMenuBrowseProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProductsCategory">Browse by Category</a></li>';
                        $dropdownMenuBrowseProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProductsPrice">Browse by Price</a></li>';
                        $dropdownMenuBrowseProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProductsBrands">Browse by Brand</a></li>';
                        $dropdownMenuBrowseProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProductsSale">Browse Sale Items</a></li>';
                        $dropdownMenuBrowseProducts.='</ul></li>';
                        
            //dropdown menu items for Wishlist
                        $dropdownMenuWishlist='<li class="dropdown">';
                        $dropdownMenuWishlist.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Wishlist<span class="caret"></span></a>';
                        $dropdownMenuWishlist.='<ul class="dropdown-menu">';
                        $dropdownMenuWishlist.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewWishlists">View Wishlist</a></li>';
                        $dropdownMenuWishlist.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=addToWishlist">Add Product to Wishlist</a></li>';
                        $dropdownMenuWishlist.='</ul></li>';


            if($this->loggedin){ 
                //handlers for logged in user
                switch ($this->pageID) {
                    case "home":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;

                    //My Account 
                    case "myAccount":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                    case "viewProducts":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                    case "viewCart":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                    case "editAccount":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "changePassword":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                

                    
                    //Messages
//                    case "messages":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=livechat">Live Chat</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewMsgs">View</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=sendMsg">Send</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=deleteMsg">Delete</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;
//                    case "livechat":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=livechat">Live Chat</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewMsgs">View</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=sendMsg">Send</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=deleteMsg">Delete</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;
//                    case "viewMsgs":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=livechat">Live Chat</a></li>';
//                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewMsgs">View</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=sendMsg">Send</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=deleteMsg">Delete</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;
//                    case "sendMsg":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=livechat">Live Chat</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewMsgs">View</a></li>';
//                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=sendMsg">Send</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=deleteMsg">Delete</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;
//                    case "deleteMsg":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=livechat">Live Chat</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewMsgs">View</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=sendMsg">Send</a></li>';
//                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=deleteMsg">Delete</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;
                    
                    case "checkBalance":
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                    default:
                        $this->menuNav.="$dropdownMenuBrowseProducts"; //view products
                        $this->menuNav.="$dropdownMenuMyAccount";  //the MANAGE My Account drop down menu                 
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';
                        $this->menuNav.="$dropdownMenuWishlist";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewCart">View Cart</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    }//end switch                
            }
            else{
                //redirect to main index.php page
                header("Location:". $_SERVER['PHP_SELF']);
            }        
        } 

        /**
         * Getter to return the HTML menu string. 
         * 
         * @return string Containing  a HTML list item string containing the menu items that will appear in the view.
         */        
        public function getMenuNav(){return $this->menuNav;}    

        /**
         * Dumps diagnostic information in HTML format relating to the class properties
         */        
        public function getDiagnosticInfo(){

            echo '<!-- NAVIGATION CUSTOMER CLASS PROPERTY SECTION  -->';
                echo '<div class="container-fluid"   style="background-color: #AAAAAA">'; //outer DIV
                    
                    echo '<h3>NAVIGATION CUSTOMER (CLASS) properties</h3>';
                    echo '<table border=1 border-style: dashed; style="background-color: #EEEEEE" >';
                    echo '<tr><th>PROPERTY</th><th>VALUE</th></tr>';                        
                    echo "<tr><td>pageID</td>   <td>$this->pageID</td></tr>";
                    echo "<tr><td>menuNav</td>  <td>$this->menuNav      </td></tr>";
                    echo '</table>';
                    echo '<p><hr>';
                echo '</div>';            
            echo '<!-- END NAVIGATION CLASS PROPERTY SECTION  -->';
            
 }      

 
}
        