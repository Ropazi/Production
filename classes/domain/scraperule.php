<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRule
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class ScrapeRule extends DataTransferObject
	{
		private $_ScrapeRuleID;
		private $_BrandID;
		private $_RuleType;
		private $_Selector;
		private $_ElementType;
		private $_Notes;


		public function getScrapeRuleID()
		{
			if ($this->_ScrapeRuleID == NULL)
			{
				$this->_ScrapeRuleID = 0;
			}
			return $this->_ScrapeRuleID;
		}
		public function setScrapeRuleID($ScrapeRuleID)
		{
			$this->_ScrapeRuleID = $ScrapeRuleID;
		}
		public function getBrandID()
		{
			if ($this->_BrandID == NULL)
			{
				$this->_BrandID = 0;
			}
			return $this->_BrandID;
		}
		public function setBrandID($BrandID)
		{
			$this->_BrandID = $BrandID;
		}
		public function getRuleType()
		{
			return $this->_RuleType;
		}
		public function setRuleType($RuleType)
		{
			$this->_RuleType = $RuleType;
		}
		public function getSelector()
		{
			return $this->_Selector;
		}
		public function setSelector($Selector)
		{
			$this->_Selector = $Selector;
		}
		public function getElementType()
		{
			return $this->_ElementType;
		}
		public function setElementType($ElementType)
		{
			$this->_ElementType = $ElementType;
		}
		public function getNotes()
		{
			return $this->_Notes;
		}
		public function setNotes($Notes)
		{
			$this->_Notes = $Notes;
		}
	}
?>
