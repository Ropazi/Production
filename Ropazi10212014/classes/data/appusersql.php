<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class AppUserSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for AppUserSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertAppUser
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertAppUser($_appuser)
		{
			$query = "insert into appusers(";
			$query .= "email,";
			$query .= "password,";
			$query .= "firstname,";
			$query .= "lastname,";
			$query .= "lastlogin,";
			$query .= "usertype,";
			$query .= "createdate,";
			$query .= "lastupdatedate,";
			$query .= "emailverified,";
			$query .= "source,";
			$query .= "profileimage";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_appuser->getEmail()) . "', ";
			$query .= "'" . $this->CheckString($_appuser->getPassword()) . "', ";
			$query .= "'" . $this->CheckString($_appuser->getFirstName()) . "', ";
			$query .= "'" . $this->CheckString($_appuser->getLastName()) . "', ";
			$query .= $this->CheckDate($_appuser->getLastLogin()). " , ";
			$query .= "'" . $this->CheckString($_appuser->getUserType()) . "', ";
			$query .= $this->CheckDate($_appuser->getCreateDate()). " , ";
			$query .= $this->CheckDate($_appuser->getLastUpdateDate()). " , ";
			$query .= $this->CheckBoolean($_appuser->getEmailVerified()) . " , ";
			$query .= "'" . $this->CheckString($_appuser->getSource()) . "', ";
			$query .= "'" . $this->CheckString($_appuser->getProfileImage()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateAppUser
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateAppUser($_appuser)
		{
		    $logger = Logger::getLogger(__CLASS__);
			$query = "update appusers set ";
			$query .= "firstname = '" . $this->CheckString($_appuser->getFirstName()) . "', ";
			$query .= "lastname = '" . $this->CheckString($_appuser->getLastName()) . "', ";
			$query .= "profileimage = '" . $this->CheckString($_appuser->getProfileImage()) . "', ";
			$query .= "aboutme = '" . $this->CheckString($_appuser->getAboutMe()) . "', ";
			$query .= "city = '" . $this->CheckString($_appuser->getCity()) . "', ";
			$query .= "state = '" . $this->CheckString($_appuser->getState()) . "', ";
			$query .= "website = '" . $this->CheckString($_appuser->getWebsite()) . "', ";
			$query .= "facebook = '" . $this->CheckString($_appuser->getFacebook()) . "', ";
			$query .= "twitter = '" . $this->CheckString($_appuser->getTwitter()) . "', ";
			$query .= "lastlogin = " . $this->CheckDate($_appuser->getLastLogin()) . ", ";
			$query .= "lastupdatedate = " . $this->CheckDate($_appuser->getLastUpdateDate()) . ", ";
			$query .= "source = '" . $this->CheckString($_appuser->getSource()) . "'";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchAppUser
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchAppUser($Email, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from appusers";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$query = "select * from appusers where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByUsername
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByUsername($Username)
		{
			$query = "select * from appusers where username = '" . $Username . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByEmail
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByEmail($Email)
		{
			$query = "select * from appusers where email = '" . $Email . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateProfile
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateProfile($_appuser)
		{
			$query = "update appusers set ";
			$query .= "email = '" . $this->CheckString($_appuser->getEmail()) . "', ";
			$query .= "username = '" . $this->CheckString($_appuser->getUsername()) . "', ";
			$query .= "firstname = '" . $this->CheckString($_appuser->getFirstName()) . "', ";
			$query .= "lastname = '" . $this->CheckString($_appuser->getLastName()) . "', ";
			$query .= "aboutme = '" . $this->CheckString($_appuser->getAboutMe()) . "', ";
			$query .= "city = '" . $this->CheckString($_appuser->getCity()) . "', ";
			$query .= "state = '" . $this->CheckString($_appuser->getState()) . "', ";
			$query .= "website = '" . $this->CheckString($_appuser->getWebsite()) . "', ";
			$query .= "facebook = '" . $this->CheckString($_appuser->getFacebook()) . "', ";
			$query .= "twitter = '" . $this->CheckString($_appuser->getTwitter()) . "', ";
			$query .= "lastupdatedate = " . $this->CheckDate($_appuser->getLastUpdateDate()) . "";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectAllAppUser
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectAllAppUser()
		{
			$query = "select * from appusers w";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateClips
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateClips($_appuser)
		{
			$query = "update appusers set ";
			$query .= "clips = " . $_appuser->getClips() . " ";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateHearts
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateHearts($_appuser)
		{
			$query = "update appusers set ";
			$query .= "hearts = " . $_appuser->getHearts() . " ";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectFollowers($AppUserID, $LoggedInAppUserID)
		{
			$query = "select t1.*, (select userheartid from userhearts where appuserid = t1.appuserid and heartedbyappuserid = '" . $LoggedInAppUserID . "' and isvalid = 1) as heartedbyuser from appusers t1 where appuserid in (select heartedbyappuserid from userhearts where appuserid = '" . $AppUserID . "')";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowing
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectFollowing($AppUserID, $LoggedInAppUserID)
		{
			$query = "select t1.*, (select userheartid from userhearts where appuserid = t1.appuserid and heartedbyappuserid = '" . $LoggedInAppUserID . "' and isvalid = 1) as heartedbyuser from appusers t1 where appuserid in (select appuserid from userhearts where heartedbyappuserid = '" . $AppUserID . "')";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateFollowers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($_appuser)
		{
			$query = "update appusers set ";
			$query .= "followers = " . $_appuser->getFollowers() . " ";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateFollowing
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateFollowing($_appuser)
		{
			$query = "update appusers set ";
			$query .= "following = " . $_appuser->getFollowing() . " ";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectWhoToFollow
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectWhoToFollow($AppUserID)
		{
			$query = "select * from appusers where appuserid not in (select appuserid from userhearts where heartedbyappuserid = " . $AppUserID . " and isvalid = 1) and clips > 0 and appuserid != " . $AppUserID . " order by clips desc";
			return $query;
		}
		///*****************************************************************
		///<summary>
		///Method Name: UpdateBuys
		///Description: Search Method
		///</summary>
		///*****************************************************************
		public function UpdateBuys($_appuser)
		{
			$query = "update appusers set ";
			$query .= "buys = " . $_appuser->getBuys() . " ";
			$query .= " where appuserid = " . $_appuser->getAppUserID();
			return $query;
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserIDAndLoggedInAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserIDAndLoggedInAppUserID($AppUserID, $LoggedInAppUserID)
		{
			$query = "select t1.*, (select userheartid from userhearts where appuserid = '" . $AppUserID . "' and heartedbyappuserid = '" . $LoggedInAppUserID . "') as heartedbyuser from appusers t1 where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
