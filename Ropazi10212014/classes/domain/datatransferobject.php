<?php


	///*****************************************************************
	///<summary>
	///Class Name: DataTransferObject
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	
	class DataTransferObject
	{
		private $_IsValid = true;
		private $_PageMessage = "";
		private $_PageHeading = "";
		private $_RequestState;
		private $_ValidationMessages = array();


		///*****************************************************************
		///<summary>
		///Constructor for DataTransferObject
		///</summary>
		///*****************************************************************

		public function __construct()
		{
			$this->_RequestState = array("rstate"=>"");
		}


		

		///*****************************************************************
		///<summary>
		///Method Name: IsValid
		///Description: Returns if object is valid
		///</summary>
		///*****************************************************************

		public function getIsValid()
		{
			return $this->_IsValid;
		}

		///*****************************************************************
		///<summary>
		///Method Name: IsValid
		///Description: Sets if object is valid
		///</summary>
		///*****************************************************************
		
		public function setIsValid($valid)
		{
			$this->_IsValid = $valid;
		}
		

		///*****************************************************************
		///<summary>
		///Method Name: PageMessage
		///Description: Returns Page Message
		///</summary>
		///*****************************************************************

		public function getPageMessage()
		{
			return $this->_PageMessage;
		}

		///*****************************************************************
		///<summary>
		///Method Name: PageMessage
		///Description: Returns Page Message
		///</summary>
		///*****************************************************************
		
		public function setPageMessage($pageMessage)
		{
			$this->_PageMessage = $pageMessage;
		}
		



		///*****************************************************************
		///<summary>
		///Method Name: PageHeading
		///Description: Returns Page Heading
		///</summary>
		///*****************************************************************

		public function getPageHeading()
		{
			return $this->_PageHeading;
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: getRequestStateDictionary
		///Description: Get RequestStateDictionary
		///</summary>
		///*****************************************************************
		
		public function getRequestStateDictionary()
		{
			return $this->_RequestState;
		}
		///*****************************************************************
		///<summary>
		///Method Name: setRequestStateDictionary
		///Description: Set RequestStateDictionary
		///</summary>
		///*****************************************************************
		
		public function setRequestStateDictionary($requestState)
		{
			$this->_RequestState = $requestState;
		}
		///*****************************************************************
		///<summary>
		///Method Name: getValidationMessages
		///Description: Returns ValidationMessages
		///</summary>
		///*****************************************************************
		
		public function getValidationMessages()
		{
			return $this->_ValidationMessages;
		}
		///*****************************************************************
		///<summary>
		///Method Name: setValidationMessages
		///Description: Set ValidationMessages
		///</summary>
		///*****************************************************************
		
		public function setValidationMessages($validationMessages)
		{
			$this->_ValidationMessages = $validationMessages;
		}

		///*****************************************************************
		///<summary>
		///Method Name: Errors
		///Description: Returns string of all errors
		///</summary>
		///*****************************************************************
		
		public function getErrors()
		{
			$errors = '';
			foreach ($this->_ValidationMessages as $error)
			{
				$errors .= $error . '<br />';
			}
			return $errors;
		}
		///*****************************************************************
		///<summary>
		///Method Name: AddRequest
		///Description: Add to Request Collection
		///</summary>
		///*****************************************************************
		
		public function SetRequestState($Name, $Value)
		{
			$this->_RequestState[$Name] = $Value;
		}
		///*****************************************************************
		///<summary>
		///Method Name: RequestState
		///Description: Returns value of a field in Request State
		///</summary>
		///*****************************************************************
		
		public function GetRequestState($Name)
		{
			if (array_key_exists($Name, $this->_RequestState))
			{
				return $this->_RequestState[$Name];
			}
			return "";
		}

	}
?>
