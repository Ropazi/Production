<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserChildren
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class UserChildren extends DataTransferObject
	{
		private $_UserChildrenID;
		private $_AppUserID;
		private $_Gender;
		private $_DateOfBirth;
		private $_DisplayAge;
		private $_Age;


		public function getUserChildrenID()
		{
			if ($this->_UserChildrenID == NULL)
			{
				$this->_UserChildrenID = 0;
			}
			return $this->_UserChildrenID;
		}
		public function setUserChildrenID($UserChildrenID)
		{
			$this->_UserChildrenID = $UserChildrenID;
		}
		public function getAppUserID()
		{
			if ($this->_AppUserID == NULL)
			{
				$this->_AppUserID = 0;
			}
			return $this->_AppUserID;
		}
		public function setAppUserID($AppUserID)
		{
			$this->_AppUserID = $AppUserID;
		}
		public function getGender()
		{
			return $this->_Gender;
		}
		public function setGender($Gender)
		{
			$this->_Gender = $Gender;
		}
		public function getDateOfBirth()
		{
			return $this->_DateOfBirth;
		}
		public function setDateOfBirth($DateOfBirth)
		{
			$this->_DateOfBirth = $DateOfBirth;
		}
		public function getDisplayAge()
		{
			return $this->_DisplayAge;
		}
		public function setDisplayAge($DisplayAge)
		{
			$this->_DisplayAge = $DisplayAge;
		}
		public function getAge()
		{
			if ($this->_Age == NULL)
			{
				$this->_Age = 0;
			}
			return $this->_Age;
		}
		public function setAge($Age)
		{
			$this->_Age = $Age;
		}
	}
?>
