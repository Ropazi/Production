<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/configparameter.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameterValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class ConfigParameterValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateConfigParameterEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateConfigParameterEditControl($_ConfigParameter, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_ConfigParameter->getValidationMessages());
			$this->ValidateString(1, 50, "ParameterName", "Parameter Name", $_ConfigParameter->getParameterName());
			$this->ValidateString(1, 150, "ParameterValue", "Parameter Value", $_ConfigParameter->getParameterValue());
			$this->ValidateString(0, 500, "Comments", "Comments", $_ConfigParameter->getComments());
			$_ConfigParameter->setValidationMessages($this->getValidationMessages());
			$_ConfigParameter->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
