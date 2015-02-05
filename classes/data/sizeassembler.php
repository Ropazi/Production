<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: Size
	///Description: Assembles Size
	///</summary>
	///*****************************************************************

	class SizeAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for Size
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Size
		///Description: Assembles List of Size
		///</summary>
		///*****************************************************************

		public function AssemblePaginatedList($result, $PageSize, $PageIndex, $sortExpression, $sortDirection)
		{
			$this->logger->debug("START");
			$aList = array();
			$counter = 0;
			try
			{
				if (!mysqli_num_rows($result))
				{
					return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
				}
				while ($row = mysqli_fetch_array($result))
				{
					if (($counter >= ($PageIndex * $PageSize)) && ($counter < (($PageIndex * $PageSize) + $PageSize)))
					{
						$size = new Size();
						$size->setSizeID($row['sizeid']);
						$size->setSizeName($row['sizename']);
						$aList[] = $size;
					}
					$counter++;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Size
		///Description: Assembles List of Size from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$size = new Size();
					$size->setSizeID($row['sizeid']);
					$size->setSizeName($row['sizename']);
					$aList[] = $size;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssembleSize
		///Description: Assembles Size from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleSize($result)
		{
			$this->logger->debug("START");
			$size = new Size();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $size;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$size->setSizeID($row['sizeid']);
					$size->setSizeName($row['sizename']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $size;
		}


	}
?>
