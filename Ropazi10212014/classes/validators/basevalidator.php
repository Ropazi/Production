<?php


	///*****************************************************************
	///<summary>
	///Class Name: Validator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class BaseValidator
	{
		private $_ValidationMessages;
		private $_IsValid = true;




		///*****************************************************************
		///<summary>
		///Method Name: ValidateString
		///Description: Validates a string to be within bounds
		///</summary>
		///*****************************************************************

		public function ValidateString($minValue, $maxValue, $FieldName, $DisplayName, $UserInput)
		{
			if ($UserInput == NULL)
			{
				if ($minValue > 0)
				{
					$this->AddError($FieldName, $DisplayName . " is missing.");
				}
			}
			else if (strlen($UserInput) < $minValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be at least " . $minValue . " characters.");
			}
			else if (strlen($UserInput) > $maxValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be less than " . $maxValue . " characters.");
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: CompareString
		///Description: Validates two string to be equal
		///</summary>
		///*****************************************************************

		public function CompareStrings($minValue, $maxValue, $FieldName1, $DisplayName1, $UserInput1, $FieldName2, $DisplayName2, $UserInput2)
		{
			if ($UserInput1 == NULL)
			{
				if ($minValue > 0)
				{
					$this->AddError($FieldName1, $DisplayName1 . " is missing.");
				}
			}
			else if (strlen($UserInput1) < $minValue)
			{
				$this->AddError($FieldName1, $DisplayName1 . " should be at least " . $minValue . " characters.");
			}
			else if (strlen($UserInput1) > $maxValue)
			{
				$this->AddError($FieldName1, $DisplayName1 . " should be less than " . $maxValue . " characters.");
			}
			if ($UserInput2 == null)
			{
				if ($minValue > 0)
				{
					$this->AddError($FieldName2, $DisplayName2 . " is missing.");
				}
			}
			else if (strlen($UserInput2) < $minValue)
			{
				$this->AddError($FieldName2, $DisplayName2 . " should be at least " . $minValue . " characters.");
			}
			else if (strlen($UserInput2) > $maxValue)
			{
				$this->AddError($FieldName2, $DisplayName2 . " should be less than " . $maxValue . " characters.");
			}
			if ($UserInput1 != NULL && $UserInput2 != NULL)
			{
				if ($UserInput1 != $UserInput2)
				{
					$this->AddError($FieldName1, $DisplayName1 . " and " . $DisplayName2 . " do not match.");
				}
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: ValidateInteger
		///Description: Validates integer to be within bounds
		///</summary>
		///*****************************************************************

		public function ValidateInteger($minValue, $maxValue, $FieldName, $DisplayName, $UserInput)
		{
			if ($UserInput < $minValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be at least " . $minValue . ".");
			}
			else if ($UserInput > $maxValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be less than " . $maxValue . ".");
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: ValidateEmail
		///Description: Validates email to be within bounds
		///</summary>
		///*****************************************************************

		public function ValidateEmail($minValue, $maxValue, $FieldName, $DisplayName, $UserInput)
		{
			if ($UserInput == null)
			{
				if ($minValue > 0)
				{
					$this->AddError($FieldName, $DisplayName . " is missing.");
				}
			}
			else if (strlen($UserInput) < $minValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be at least " . $minValue . ".");
			}
			else if (strlen($UserInput) > $maxValue)
			{
				$this->AddError($FieldName, $DisplayName . " should be less than " . $maxValue . ".");
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: ValidateDate
		///Description: Validates date to be within bounds
		///</summary>
		///*****************************************************************

		public function ValidateDate($FieldName, $DisplayName, $UserInput)
		{
			$test_arr  = explode('/', $UserInput);
			if (count($test_arr) == 3) {
				if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
					// valid date ...
				} else {
					$this->AddError($FieldName, $DisplayName . " is not a valid date.");
				}
			} else {
				$this->AddError($FieldName, $DisplayName . " is not a valid date.");
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: AddError
		///Description: Adds Error Message to Collection
		///</summary>
		///*****************************************************************

		public function AddError($FieldName, $Message)
		{
			$this->_ValidationMessages[$FieldName] = $Message;
			$this->_IsValid = FALSE;
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
		///Method Name: ValidationMessages
		///Description: Gets and Sets Error Messages
		///</summary>
		///*****************************************************************

		public function setValidationMessages($valMessages)
		{
			$this->_ValidationMessages = $valMessages;
			
		}
		///*****************************************************************
		///<summary>
		///Method Name: ValidationMessages
		///Description: Gets and Sets Error Messages
		///</summary>
		///*****************************************************************
		
		public function getValidationMessages()
		{
			return $this->_ValidationMessages;
				
		}
	}
?>
