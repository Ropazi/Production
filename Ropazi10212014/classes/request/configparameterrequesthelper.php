<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/configparameter.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameterRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class ConfigParameterRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleConfigParameterEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleConfigParameterEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_ConfigParameter = new ConfigParameter();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_ConfigParameter->setParameterName($this->CleanInput($_POST["ParameterName"]));
				$_ConfigParameter->setParameterValue($this->CleanInput($_POST["ParameterValue"]));
				$_ConfigParameter->setComments($this->CleanInput($_POST["Comments"]));
			}
			$logger->debug("END");
			return $_ConfigParameter;
		}
	}
?>
