<?php
/**
* This file contains the NavigationAdmin Class
* 
*/

/**
 * 
 * NavigationAdmin class is a model class that implements the content generation for the
 * page navigation bar for a logged in ADMIN user.  
 * 
 * @author Gerry Guinane
 * 
 */


class NavigationAdmin implements NavigationInterface {
    
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
            $this->modelType='NavigationAdmin';
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
            
             //dropdown menu items for MANAGE CUSTOMERS
                        $dropdownMenuManageCustomers='<li class="dropdown">';
                        $dropdownMenuManageCustomers.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Customers<span class="caret"></span></a>';
                        $dropdownMenuManageCustomers.='<ul class="dropdown-menu">';
                        $dropdownMenuManageCustomers.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewUsers">View Users</a></li>';
                        $dropdownMenuManageCustomers.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=editUsers">Search Users</a></li>';
                        $dropdownMenuManageCustomers.='</ul></li>';
                        
             //dropdown menu items for MANAGE PRODUCTS
                        $dropdownMenuManageProducts='<li class="dropdown">';
                        $dropdownMenuManageProducts.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Products<span class="caret"></span></a>';
                        $dropdownMenuManageProducts.='<ul class="dropdown-menu">';
                        $dropdownMenuManageProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=viewProducts">View Products</a></li>';
                        $dropdownMenuManageProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=editProduct">Edit Product</a></li>';
                        $dropdownMenuManageProducts.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=addProduct">Add Product</a></li>';
                        $dropdownMenuManageProducts.='</ul></li>';
            
            //empty string for menu items
            $this->menuNav='';

            if($this->loggedin){ 
                //handlers for logged in user
                switch ($this->pageID) {
                    //home navigation
                    case "home":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "logout":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    
                    //manage users navigation
                    case "manageUsers":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "registerUsers":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "viewUsers":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "editUsers":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                      
                    case "deleteUsers":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                        
                    
                    //manage products handlers
                    case "manageProducts":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;

                    case "viewProducts":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;

                    case "editProduct":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;

                    case "addProduct":
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break; 
                     
                   
                    default:
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.="$dropdownMenuManageCustomers";
                        $this->menuNav.="$dropdownMenuManageProducts";
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

            echo '<!-- NAVIGATION ADMIN CLASS PROPERTY SECTION  -->';
                echo '<div class="container-fluid"   style="background-color: #AAAAAA">'; //outer DIV
                    
                    echo '<h3>NAVIGATION ADMIN (CLASS) properties</h3>';
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
        