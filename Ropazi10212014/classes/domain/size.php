<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: Size
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class Size extends DataTransferObject
	{
		private $_SizeID;
		private $_SizeName;


		public function getSizeID()
		{
			if ($this->_SizeID == NULL)
			{
				$this->_SizeID = 0;
			}
			return $this->_SizeID;
		}
		public function setSizeID($SizeID)
		{
			$this->_SizeID = $SizeID;
		}
		public function getSizeName()
		{
			return $this->_SizeName;
		}
		public function setSizeName($SizeName)
		{
			$this->_SizeName = $SizeName;
		}
	}
?>
