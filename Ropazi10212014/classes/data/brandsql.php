<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class BrandSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for BrandSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertBrand
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertBrand($_brand)
		{
			$query = "insert into brands(";
			$query .= "brandname,";
			$query .= "brandcode,";
			$query .= "website,";
			$query .= "brandcategoryid,";
			$query .= "brandlogo,";
			$query .= "isapproved,";
			$query .= "createdate,";
			$query .= "lastupdatedate,";
			$query .= "tier,";
			$query .= "isfeatured";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_brand->getBrandName()) . "', ";
			$query .= "'" . $this->CheckString($_brand->getBrandCode()) . "', ";
			$query .= "'" . $this->CheckString($_brand->getWebsite()) . "', ";
			$query .= $_brand->getBrandCategoryID() . ",  ";
			$query .= "'" . $this->CheckString($_brand->getBrandLogo()) . "', ";
			$query .= $this->CheckBoolean($_brand->getIsApproved()) . " , ";
			$query .= $this->CheckDate($_brand->getCreateDate()). " , ";
			$query .= $this->CheckDate($_brand->getLastUpdateDate()). " , ";
			$query .= $_brand->getTier() . ",  ";
			$query .= $this->CheckBoolean($_brand->getIsFeatured()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateBrand
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateBrand($_brand)
		{
			$query = "update brands set ";
			$query .= "brandname = '" . $this->CheckString($_brand->getBrandName()) . "', ";
			$query .= "website = '" . $this->CheckString($_brand->getWebsite()) . "', ";
			$query .= "brandcategoryid = " . $_brand->getBrandCategoryID() . ",  ";
			$query .= "isapproved = " . $_brand->getIsApproved() . " , ";
			$query .= "lastupdatedate = " . $this->CheckDate($_brand->getLastUpdateDate()) . ", ";
			$query .= "tier = " . $_brand->getTier() . ",  ";
			$query .= "isfeatured = " . $_brand->getIsFeatured() ;
			$query .= " where brandid = " . $_brand->getBrandID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$query = "select * from brands where brandid = '" . $BrandID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandCode
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCode($BrandCode)
		{
			$query = "select * from brands where brandcode = '" . $BrandCode . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchBrand
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchBrand($BrandName, $BrandCode, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from brands";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByWebsite
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByWebsite($Website)
		{
			$query = "select * from brands where website = '" . $Website . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateClips
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateClips($_brand)
		{
			$query = "update brands set ";
			$query .= "clips = " . $_brand->getClips() . " ";
			$query .= " where brandid = " . $_brand->getBrandID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateHearts
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateHearts($_brand)
		{
			$query = "update brands set ";
			$query .= "hearts = " . $_brand->getHearts() . " ";
			$query .= " where brandid = " . $_brand->getBrandID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateFollowers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($_brand)
		{
			$query = "update brands set ";
			$query .= "followers = " . $_brand->getFollowers() . " ";
			$query .= " where brandid = " . $_brand->getBrandID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandIDAndAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandIDAndAppUserID($BrandID, $AppUserID)
		{
			$query = "select t1.*, (select brandheartid from brandhearts where brandid = t1.brandid and appuserid = " . $AppUserID . " and isvalid = 1) as heartbyuser from brands t1 where t1.brandid = " . $BrandID;
			return $query;
		}
	}
?>
