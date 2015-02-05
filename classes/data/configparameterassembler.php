<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameter
	///Description: Assembles ConfigParameter
	///</summary>
	///*****************************************************************

	class ConfigParameterAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for ConfigParameter
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of ConfigParameter
		///Description: Assembles List of ConfigParameter from Results
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
					$configParameter = new ConfigParameter();
					$configParameter->setParameterID($row['parameterid']);
					$configParameter->setParameterName($row['parametername']);
					$configParameter->setParameterValue($row['parametervalue']);
					$configParameter->setDateModified($row['datemodified']);
					$configParameter->setComments($row['comments']);
					$aList[] = $configParameter;
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
		///Method Name: AssembleConfigParameter
		///Description: Assembles ConfigParameter from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleConfigParameter($result)
		{
			$this->logger->debug("START");
			$configParameter = new ConfigParameter();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $configParameter;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$configParameter->setParameterID($row['parameterid']);
					$configParameter->setParameterName($row['parametername']);
					$configParameter->setParameterValue($row['parametervalue']);
					$configParameter->setDateModified($row['datemodified']);
					$configParameter->setComments($row['comments']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $configParameter;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of ConfigParameter
		///Description: Assembles List of ConfigParameter
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
						$configParameter = new ConfigParameter();
						$configParameter->setParameterID($row['parameterid']);
						$configParameter->setParameterName($row['parametername']);
						$configParameter->setParameterValue($row['parametervalue']);
						$configParameter->setDateModified($row['datemodified']);
						$configParameter->setComments($row['comments']);
						$aList[] = $configParameter;
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


	}
?>
