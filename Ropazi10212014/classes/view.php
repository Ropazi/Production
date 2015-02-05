<?php


class View {    
    
    protected $viewFile;
    protected $model;
    protected $submodels = array();
    //establish view location on object creation
    public function __construct($controllerClass, $action) {
        $controllerName = str_replace("Controller", "", $controllerClass);
        $controllerName = strtolower($controllerName);
        $this->viewFile = "views/" . $controllerName . "/" . $action . ".php";
    }
    public function outputRedirect($redirectUrl) {
    	echo header("Location: " . $redirectUrl);
 
		echo exit();
    
    }
    public function setSubmodels($submodels){
    	$this->submodels = $submodels;
    }     
    //output the view
    public function output($viewModel, $template = "maintemplate") {
    	
        $this->model = $viewModel;
        $templateFile = "views/".$template.".php";
        if (file_exists($this->viewFile)) {
            if ($template) {
                //include the full template
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("views/error/badtemplate.php");
                }
            } else {
                //we're not using a template view so just output the method's view directly
				
                require($this->viewFile);
            }
        } else {
            require("views/error/badview.php");
        }
        
    }
    public function outputPartial($viewModel) {
    	$model = $viewModel;
    	if (file_exists($this->viewFile)) {
    		require($this->viewFile);
    		
    	} else {
    		require("views/error/badview.php");
    	}
    
    }
    public function outputJson($code, $html, $errors, $more = "") {
    	$arr = array('code' => $code, 'data' => $html, 'errors' => $errors, 'more' => $more);
    	header('Content-Type: application/json');
    	echo json_encode($arr);
    
    }
    public function outputJsonp($code, $html, $errors) {
    	$arr = array('code' => $code, 'data' => $html, 'errors' => $errors);
    	header('Content-Type: application/json');
    	
    	if(array_key_exists('callback', $_GET)){
    	
    		header('Content-Type: text/javascript; charset=utf8');
    		$callback = $_GET['callback'];
    		echo $callback.'('.json_encode($arr).');';
    	
    	}else{
    		// normal JSON string
    		header('Content-Type: application/json; charset=utf8');
    	
    		echo json_encode($arr);
    	}
    	
    
    }
}

?>