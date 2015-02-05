<?php
	include_once("classes/data/configparameterdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameter
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class ConfigParameterBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for ConfigParameterBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertConfigParameter($configparameter)
		{
			$tContext = new AppTransaction();
			$configparameterDAL = new ConfigParameterDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$configparameterDAL->InsertConfigParameter($configparameter, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateConfigParameter($configparameter)
		{
			$tContext = new AppTransaction();
			$configparameterDAL = new ConfigParameterDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$configparameterDAL->UpdateConfigParameter($configparameter, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchConfigParameter($ParameterName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$configParameterDAL = new ConfigParameterDAL($this->_userinfo);
			return $configParameterDAL->SearchConfigParameter($ParameterName, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByParameterName
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterName($ParameterName)
		{
			$configParameterDAL = new ConfigParameterDAL($this->_userinfo);
			return $configParameterDAL->SelectByParameterName($ParameterName, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByParameterID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterID($ParameterID)
		{
			$configParameterDAL = new ConfigParameterDAL($this->_userinfo);
			return $configParameterDAL->SelectByParameterID($ParameterID, null);
		}


	}
?>
