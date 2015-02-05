<?php
	include_once("classes/data/userchildrendal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserChildren
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class UserChildrenBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for UserChildrenBO
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

		public function InsertUserChildren($userchildren)
		{
			$tContext = new AppTransaction();
			$userchildrenDAL = new UserChildrenDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userchildrenDAL->InsertUserChildren($userchildren, $tContext);
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

		public function UpdateUserChildren($userchildren)
		{
			$tContext = new AppTransaction();
			$userchildrenDAL = new UserChildrenDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userchildrenDAL->UpdateUserChildren($userchildren, $tContext);
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
			$userChildrenDAL = new UserChildrenDAL($this->_userinfo);
			return $userChildrenDAL->SelectByAppUserID($AppUserID, null);
		}


	}
?>
