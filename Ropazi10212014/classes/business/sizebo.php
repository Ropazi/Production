<?php
	include_once("classes/data/sizedal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: Size
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class SizeBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for SizeBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchSize($SizeName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$sizeDAL = new SizeDAL($this->_userinfo);
			return $sizeDAL->SearchSize($SizeName, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertSize($size)
		{
			$tContext = new AppTransaction();
			$sizeDAL = new SizeDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$sizeDAL->InsertSize($size, $tContext);
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

		public function UpdateSize($size)
		{
			$tContext = new AppTransaction();
			$sizeDAL = new SizeDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$sizeDAL->UpdateSize($size, $tContext);
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
		///Method Name: SelectBySizeID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectBySizeID($SizeID)
		{
			$sizeDAL = new SizeDAL($this->_userinfo);
			return $sizeDAL->SelectBySizeID($SizeID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllSize
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllSize()
		{
			$sizeDAL = new SizeDAL($this->_userinfo);
			return $sizeDAL->SelectAllSize(null);
		}


	}
?>
