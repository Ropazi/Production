<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameter
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class ConfigParameter extends DataTransferObject
	{
		private $_ParameterID;
		private $_ParameterName;
		private $_ParameterValue;
		private $_DateModified;
		private $_Comments;


		public function getParameterID()
		{
			if ($this->_ParameterID == NULL)
			{
				$this->_ParameterID = 0;
			}
			return $this->_ParameterID;
		}
		public function setParameterID($ParameterID)
		{
			$this->_ParameterID = $ParameterID;
		}
		public function getParameterName()
		{
			return $this->_ParameterName;
		}
		public function setParameterName($ParameterName)
		{
			$this->_ParameterName = $ParameterName;
		}
		public function getParameterValue()
		{
			return $this->_ParameterValue;
		}
		public function setParameterValue($ParameterValue)
		{
			$this->_ParameterValue = $ParameterValue;
		}
		public function getDateModified()
		{
			return $this->_DateModified;
		}
		public function setDateModified($DateModified)
		{
			$this->_DateModified = $DateModified;
		}
		public function getComments()
		{
			return $this->_Comments;
		}
		public function setComments($Comments)
		{
			$this->_Comments = $Comments;
		}
	}
?>
