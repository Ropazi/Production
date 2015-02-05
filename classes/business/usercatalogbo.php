<?php
	include_once("classes/data/usercatalogdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalog
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class UserCatalogBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for UserCatalogBO
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

		public function InsertUserCatalog($usercatalog)
		{
			$tContext = new AppTransaction();
			$usercatalogDAL = new UserCatalogDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$usercatalogDAL->InsertUserCatalog($usercatalog, $tContext);
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

		public function UpdateUserCatalog($usercatalog)
		{
			$tContext = new AppTransaction();
			$usercatalogDAL = new UserCatalogDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$usercatalogDAL->UpdateUserCatalog($usercatalog, $tContext);
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
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$userCatalogDAL = new UserCatalogDAL($this->_userinfo);
			return $userCatalogDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByName
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByName($AppUserID, $CatalogName)
		{
			$userCatalogDAL = new UserCatalogDAL($this->_userinfo);
			return $userCatalogDAL->SelectByName($AppUserID, $CatalogName, null);
		}


	}
?>
