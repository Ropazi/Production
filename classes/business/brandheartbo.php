<?php
	include_once("classes/domain/brand.php");
	include_once("classes/data/branddal.php");
	include_once("classes/data/brandheartdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeart
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class BrandHeartBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for BrandHeartBO
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

		public function InsertBrandHeart($brandheart)
		{
			$tContext = new AppTransaction();
			$brandheartDAL = new BrandHeartDAL($this->_userinfo);
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandheartDAL->InsertBrandHeart($brandheart, $tContext);
				
				$brand = $brandDAL->SelectByBrandID($brandheart->getBrandID(), $tContext);
				if ($brand->getFollowers() > 0){
					$brand->setFollowers($brand->getFollowers() + 1);
				}
				else {
					$brand->setFollowers(1);
				}
				$brandDAL->UpdateFollowers($brand, $tContext);
				
				$tContext->CommitTransaction();
				return $brand->getFollowers();
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

		public function UpdateBrandHeart($brandheart)
		{
			$tContext = new AppTransaction();
			$brandheartDAL = new BrandHeartDAL($this->_userinfo);
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandheartDAL->UpdateBrandHeart($brandheart, $tContext);
				$brand = $brandDAL->SelectByBrandID($brandheart->getBrandID(), $tContext);
				if ($brand->getFollowers() > 0){
					if ($brandheart->getIsValid() == TRUE) {
						$brand->setFollowers($brand->getFollowers() + 1);
					}
					else {
						$brand->setFollowers($brand->getFollowers() - 1);
					}
				}
				else {
					if ($brandheart->getIsValid() == TRUE) {
						$brand->setFollowers(1);
					}
					else {
						$brand->setFollowers(0);
					}
				}
				$brandDAL->UpdateFollowers($brand, $tContext);
				$tContext->CommitTransaction();
				return $brand->getFollowers();
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
			$brandHeartDAL = new BrandHeartDAL($this->_userinfo);
			return $brandHeartDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$brandHeartDAL = new BrandHeartDAL($this->_userinfo);
			return $brandHeartDAL->SelectByBrandID($BrandID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndBrand
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndBrand($AppUserID, $BrandID)
		{
			$brandHeartDAL = new BrandHeartDAL($this->_userinfo);
			return $brandHeartDAL->SelectByAppUserAndBrand($AppUserID, $BrandID, null);
		}


	}
?>
