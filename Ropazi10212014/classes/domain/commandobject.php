<?php	
	
	
	///*****************************************************************
	///<summary>
	///Class Name: CommandObject
	///Description: Generic Command Object
	///</summary>
	///*****************************************************************
	
	class CommandObject
	{
		private $_SearchParameters;
		
		
		
		
		///*****************************************************************
		///<summary>
		///Constructor for CommandObject
		///</summary>
		///*****************************************************************
		
		public function __construct()
		{
			$this->_SearchParameters = array();
			$this->_SearchParameters["PageIndex"] = 1;
			$this->_SearchParameters["PageSize"] = 20;
		}
		
		
		
		///*****************************************************************
		///<summary>
		///Method Name: SetParameter
		///Description: Sets Search Parameters
		///</summary>
		///*****************************************************************
		
		public function SetParameter($name, $value)
		{
			$this->_SearchParameters[$name] = $value;
		}
		
		
		
		///*****************************************************************
		///<summary>
		///Method Name: GetParameter
		///Description: Returns a Parameter if it exists or null otherwise
		///</summary>
		///*****************************************************************
		
		public function GetParameter($name)
		{
			if (array_key_exists($name, $this->_SearchParameters))
			{
				return $this->_SearchParameters[$name];
			}
			return "";
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: Serialize
		///Description: Serializes the CommandObject
		///</summary>
		///*****************************************************************
		
		public function Serialize()
		{
			$sString = "";
			foreach($this->_SearchParameters as $key => $value)
			{
				$sString .= $key . ';' . $value . '|';
			}
			return $sString;
		}
		///*****************************************************************
		///<summary>
		///Method Name: DeSerialize
		///Description: Serializes the CommandObject
		///</summary>
		///*****************************************************************
		
		public function DeSerialize($sString)
		{
			$pairs = explode('|', $sString);
			foreach($pairs as $pair) 
			{
				$keyvals = explode(';', $pair);
				if (sizeof($keyvals) == 2) {
					$this->_SearchParameters[$keyvals[0]] = $keyvals[1];
				}
			}
		}
	}
?>
