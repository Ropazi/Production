<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class ScrapeRuleSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for ScrapeRuleSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SearchScrapeRule
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchScrapeRule($BrandID, $RuleType, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from scraperules";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByScrapeRuleID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByScrapeRuleID($ScrapeRuleID)
		{
			$query = "select * from scraperules where scraperuleid = '" . $ScrapeRuleID . "'";
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
			$query = "select * from scraperules where brandid = '" . $BrandID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: InsertScrapeRule
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertScrapeRule($_scraperule)
		{
			$query = "insert into scraperules(";
			$query .= "brandid,";
			$query .= "ruletype,";
			$query .= "selector,";
			$query .= "elementtype,";
			$query .= "notes";
			$query .= ")";
			$query .= " values (";
			$query .= $_scraperule->getBrandID() . ",  ";
			$query .= "'" . $this->CheckString($_scraperule->getRuleType()) . "', ";
			$query .= "'" . $this->CheckString($_scraperule->getSelector()) . "', ";
			$query .= "'" . $this->CheckString($_scraperule->getElementType()) . "', ";
			$query .= "'" . $this->CheckString($_scraperule->getNotes()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateScrapeRule
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateScrapeRule($_scraperule)
		{
			$query = "update scraperules set ";
			$query .= "ruletype = '" . $this->CheckString($_scraperule->getRuleType()) . "', ";
			$query .= "selector = '" . $this->CheckString($_scraperule->getSelector()) . "', ";
			$query .= "elementtype = '" . $this->CheckString($_scraperule->getElementType()) . "', ";
			$query .= "notes = '" . $this->CheckString($_scraperule->getNotes()) . "'";
			$query .= " where scraperuleid = " . $_scraperule->getScrapeRuleID();
			return $query;
		}
	}
?>
