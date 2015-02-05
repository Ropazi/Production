<?php
require_once("classes/utils/constants.php");

abstract class BaseController {
    
    protected $urlValues;
    protected $action;
    protected $model;
    protected $view;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
                
        //establish the view object
        $this->view = new View(get_class($this), $action);
    }
        
    //executes the requested method
    public function executeAction() {
        return $this->{$this->action}();
    }
    ///*****************************************************************
    ///<summary>
    ///Method Name: LogAccess
    ///Description: Log Access of an action
    ///</summary>
    ///*****************************************************************
    
    public function LogAccess($TaskCode)
    {
    		
    }
    
    
    ///*****************************************************************
    ///<summary>
    ///Method Name: Authorize
    ///Description: Authorize User Request
    ///</summary>
    ///*****************************************************************
    public function Authorize($TaskCode)
    {
    	$rVal = CommonUtils::verifyUserCookie();
    	if ($rVal == false){
    		return "LOGIN";
    	}
    	else {
    		return "OK";
    	}
    }
    ///*****************************************************************
    ///<summary>
    ///Method Name: IsCommandObjectDirty
    ///Description: Checks if PageIndex reset might be required
    ///</summary>
    ///*****************************************************************
    public function IsCommandObjectDirty($commandObjectRequest, $commandObject)
    {
    	return FALSE;
    }
    ///*****************************************************************
    ///<summary>
    ///Method Name: setCookie
    ///Description: Sets Auth Cookie
    ///</summary>
    ///*****************************************************************
    protected function setAdminCookie( $id, $remember = false ) {
    
    	if ( $remember ) {
    
    		$expiration = time() + 1209600; // 14 days
    
    	} else {
    
    		$expiration = time() + 1800; // 30 min
    
    	}
    
    	$cookie = CommonUtils::generateCookie( $id, $expiration );
    
    	if (!setcookie("ropaziadmin", $cookie, $expiration, "/") ) {
    
    		//do something
    
    	}
    
    }
    ///*****************************************************************
    ///<summary>
    ///Method Name: setCookie
    ///Description: Sets Auth Cookie
    ///</summary>
    ///*****************************************************************
    protected function setUserCookie( $id, $email, $firstName, $remember = false ) {
    
    	if ( $remember ) {
    
    		$expiration = time() + 1209600; // 14 days
    
    	} else {
    
    		$expiration = time() + 5184000; // 60 days
    
    	}
    
    	$cookie = CommonUtils::generateCookie( $id, $email, $firstName, $expiration );
    	if (Constants::$SERVERDOMAIN == "localhost"){
    		if (!setcookie("ropaziuser", $cookie, $expiration, "/") ) {
    			 
    			//do something
    			  
    		}
    	}
    	else {
	    	if (!setcookie("ropaziuser", $cookie, $expiration, "/", Constants::$SERVERDOMAIN) ) {
	    
	    		//do something
	    
	    	}
    	}
    
    }
}

?>
