<?php


	///*****************************************************************
	///<summary>
	///Class Name: Validator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class BaseRequestHelper
	{
		///*****************************************************************
		///<summary>
		///Method Name: CleanInput
		///Description: Clean Form Input
		///</summary>
		///*****************************************************************

		public function CleanInput($input) 
		{
			  $input = trim($input);
			  $input = stripslashes($input);
			  $input = htmlspecialchars($input);
			  return $input;
		}



	}
?>
