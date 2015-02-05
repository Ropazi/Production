<?php
	include_once("classes/business/appuserbo.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/request/appuserrequesthelper.php");
	include_once("classes/utils/constants.php");

class HelpController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        //require("models/home.php");
        //$this->model = new HomeModel();
    }
    protected function help()
    {
		$appUserID = 0;
		if (isset($_COOKIE["ropaziuser"])){
			$appUserID = CommonUtils::verifyUserCookie();
		}
		$_AppUserBOInstance = new AppUserBO();
    	$appUser = $_AppUserBOInstance->SelectByAppUserID($appUserID);
    	$this->model = $appUser;
		return $this->view->output($appUser, "maintemplate");
    }
    
    protected function about()
    {
		$appUserID = 0;
		if (isset($_COOKIE["ropaziuser"])){
			$appUserID = CommonUtils::verifyUserCookie();
		}
		$_AppUserBOInstance = new AppUserBO();
    	$appUser = $_AppUserBOInstance->SelectByAppUserID($appUserID);
    	$this->model = $appUser;
				/*ob_start();
				include('views/help/about.php');
				$output = ob_get_contents();
				ob_end_clean();*/
		return $this->view->output($appUser, "maintemplate");
    }
}


?>
