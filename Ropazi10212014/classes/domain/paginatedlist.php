<?php
	class PaginatedList
	{
		private $_PageIndex;
		private $_PageSize;
		private $_TotalCount;
		private $_TotalPages;
		private $_StartRecord;
		private $_EndRecord;
		private $_SortExpression;
		private $_SortDirection;
		private $_RequestState = array();
		private $_aList;
		
		
		public function getList()
		{
			return $this->_aList;
		}
		public function getPageIndex()
		{
			return $this->_PageIndex;
		}
		public function setPageIndex($pageIndex)
		{
			$this->_PageIndex = $pageIndex;
		}
		public function getCurrentPage()
		{
			return $this->_PageIndex + 1;
		}
		public function getPageSize()
		{
			return $this->_PageSize;
		}
		public function setPageSize($pageSize)
		{
			$this->_PageSize = $pageSize;
		}
		public function getTotalCount()
		{
			return $this->_TotalCount;
		}
		public function setTotalCount($totalCount)
		{
			$this->_TotalCount = $totalCount;
		}
		public function getTotalPages()
		{
			return $this->_TotalPages;
		}
		public function setTotalPages($totalPages)
		{
			$this->_TotalPages = $totalPages;
		}
		public function getStartRecord()
		{
			return $this->_StartRecord;
		}
		public function setStartRecord($startRecord)
		{
			$this->_StartRecord = $startRecord;
		}
		public function getEndRecord()
		{
			return $this->_EndRecord;
		}
		public function setEndRecord($endRecord)
		{
			$this->_EndRecord = $endRecord;
		}
		public function getSortExpression()
		{
			if ($this->_SortExpression == null)
			{
				$this->_SortExpression = "";
			}
			return $this->_SortExpression;
		}
		public function setSortExpression($sortExpression)
		{
			$this->_SortExpression = $sortExpression;
		}
		public function getSortDirection()
		{
			if ($this->_SortDirection == null)
			{
				$_this->SortDirection = "";
			}
			return $this->_SortDirection;
		}
		public function setSortDirection($sortDirection)
		{
			$this->_SortDirection = $sortDirection;
		}
		///*****************************************************************
		///<summary>
		///Method Name: getRequestStateDictionary
		///Description: Get RequestStateDictionary
		///</summary>
		///*****************************************************************
		
		public function getRequestStateDictionary()
		{
			return $this->_RequestState;
		}
		///*****************************************************************
		///<summary>
		///Method Name: setRequestStateDictionary
		///Description: Set RequestStateDictionary
		///</summary>
		///*****************************************************************
		
		public function setRequestStateDictionary($requestState)
		{
			$this->_RequestState = $requestState;
		}
		///*****************************************************************
		///<summary>
		///Method Name: AddRequest
		///Description: Add to Request Collection
		///</summary>
		///*****************************************************************
		
		public function SetRequestState($Name, $Value)
		{
			$this->_RequestState[$Name] = $Value;
		}
		///*****************************************************************
		///<summary>
		///Method Name: RequestState
		///Description: Returns value of a field in Request State
		///</summary>
		///*****************************************************************
		
		public function GetRequestState($Name)
		{
			if (array_key_exists($Name, $this->_RequestState))
			{
				return $this->_RequestState[$Name];
			}
			return "";
		}

		///*****************************************************************
		///<summary>
		///Method Name: Constructor
		///Description: PaginatedList Constructor
		///</summary>
		///*****************************************************************

		public function __construct($source, $counter, $pageSize, $pageIndex, $sortExpression, $sortDirection)
		{
			$this->_aList = $source;
			$this->setPageIndex($pageIndex);
			$this->setPageSize($pageSize);
			$this->setTotalCount($counter);
			$this->setSortExpression($sortExpression);
			$this->setSortDirection($sortDirection);
			$this->setTotalPages(round($this->getTotalCount() / $this->getPageSize()));
			$this->_StartRecord = 1 + ($pageIndex * $pageSize);
			$this->_LastRecord = $pageSize + ($pageIndex * $pageSize);
			if ($this->getTotalCount() < $this->_LastRecord)
			{
				$this->_EndRecord = $this->getTotalCount();
			}
			else
			{
				$this->_EndRecord = $this->_LastRecord;
			}
		}
	}
?>
