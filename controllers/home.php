<?php

require("classes/domain/appuser.php");


class HomeController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        //require("models/home.php");
        //$this->model = new HomeModel();
    }
    
    //default method
    protected function index()
    {
		$_AppUser = new AppUser();
		$this->model = $_AppUser;
        $this->view->output($_AppUser, "plaintemplate");
    }
    protected function bookmarklet()
    {
    	$_AppUser = new AppUser();
    	$this->model = $_AppUser;
    	$this->view->output($_AppUser);
    }
    protected function fblogin()
    {
    	$_AppUser = new AppUser();
    	$this->model = $_AppUser;
    	$this->view->output($_AppUser);
    }
    
    protected function fblogout(){
    	$logger = Logger::getLogger(__CLASS__);
    	$token = $_SESSION["fb_token"];
    	$logger->debug("Token::" . $token);
    	if($token)
    	{
    		$graph_url = "https://graph.facebook.com/me/permissions?method=delete&access_token=".$token;
    		$result = json_decode(file_get_contents($graph_url));
    	}
    	else
    	{
    		echo("User already logged out.");
    	}
    }
	public function test(){
		
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = "tls"; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->IsHTML(true);
		$mail->Username = "vertisentest@gmail.com";
		$mail->Password = "vertisen123";
		$mail->SetFrom("vertisentest@gmail.com");
		$mail->Subject = "Test";
		$mail->Body = "hello";
		$mail->AddAddress("arif.m.mahmood@gmail.com");
		if(!$mail->Send())
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
			echo "Message has been sent";
		}
		
	}
}

?>
