<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUser
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class AppUser extends DataTransferObject
	{
		private $_AppUserID;
		private $_Email;
		private $_Username;
		private $_OldPassword;
		private $_Password;
		private $_ConfirmPassword;
		private $_FirstName;
		private $_LastName;
		private $_ProfileImage;
		private $_AboutMe;
		private $_City;
		private $_State;
		private $_Website;
		private $_Facebook;
		private $_Twitter;
		private $_LastLogin;
		private $_UserType;
		private $_RememberMe;
		private $_CreateDate;
		private $_LastUpdateDate;
		private $_Disabled;
		private $_EmailVerified;
		private $_Source;
		private $_Clips;
		private $_Hearts;
		private $_HeartedByUser;
		private $_Followers;
		private $_Following;
		private $_Buys;
		private $_LoggedInAppUserID;
		private $_Posts = array();
		private $_UserNotifications = array();
		private $_UserChildren = array();
		private $_FacebookId;


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
		public function getEmail()
		{
			return $this->_Email;
		}
		public function setEmail($Email)
		{
			$this->_Email = $Email;
		}
		public function getUsername()
		{
			return $this->_Username;
		}
		public function setUsername($Username)
		{
			$this->_Username = $Username;
		}
		public function getOldPassword()
		{
			return $this->_OldPassword;
		}
		public function setOldPassword($OldPassword)
		{
			$this->_OldPassword = $OldPassword;
		}
		public function getPassword()
		{
			return $this->_Password;
		}
		public function setPassword($Password)
		{
			$this->_Password = $Password;
		}
		public function getConfirmPassword()
		{
			return $this->_ConfirmPassword;
		}
		public function setConfirmPassword($ConfirmPassword)
		{
			$this->_ConfirmPassword = $ConfirmPassword;
		}
		public function getFirstName()
		{
			return $this->_FirstName;
		}
		public function setFirstName($FirstName)
		{
			$this->_FirstName = $FirstName;
		}
		public function getLastName()
		{
			return $this->_LastName;
		}
		public function setLastName($LastName)
		{
			$this->_LastName = $LastName;
		}
		public function getProfileImage()
		{
			return $this->_ProfileImage;
		}
		public function setProfileImage($ProfileImage)
		{
			$this->_ProfileImage = $ProfileImage;
		}
		public function getFacebookId()
		{
		    return $this->_FacebookId;
		}
		public function setFacebookId($FacebookId)
		{
			$this->_FacebookId = $FacebookId;
		}
		
		public function getAboutMe()
		{
			return $this->_AboutMe;
		}
		public function setAboutMe($AboutMe)
		{
			$this->_AboutMe = $AboutMe;
		}
		public function getCity()
		{
			return $this->_City;
		}
		public function setCity($City)
		{
			$this->_City = $City;
		}
		public function getState()
		{
			return $this->_State;
		}
		public function setState($State)
		{
			$this->_State = $State;
		}
		public function getWebsite()
		{
			return $this->_Website;
		}
		public function setWebsite($Website)
		{
			$this->_Website = $Website;
		}
		public function getFacebook()
		{
			return $this->_Facebook;
		}
		public function setFacebook($Facebook)
		{
			$this->_Facebook = $Facebook;
		}
		public function getTwitter()
		{
			return $this->_Twitter;
		}
		public function setTwitter($Twitter)
		{
			$this->_Twitter = $Twitter;
		}
		public function getLastLogin()
		{
			return $this->_LastLogin;
		}
		public function setLastLogin($LastLogin)
		{
			$this->_LastLogin = $LastLogin;
		}
		public function getUserType()
		{
			return $this->_UserType;
		}
		public function setUserType($UserType)
		{
			$this->_UserType = $UserType;
		}
		public function getRememberMe()
		{
			return $this->_RememberMe;
		}
		public function setRememberMe($RememberMe)
		{
			$this->_RememberMe = $RememberMe;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getLastUpdateDate()
		{
			return $this->_LastUpdateDate;
		}
		public function setLastUpdateDate($LastUpdateDate)
		{
			$this->_LastUpdateDate = $LastUpdateDate;
		}
		public function getDisabled()
		{
			return $this->_Disabled;
		}
		public function setDisabled($Disabled)
		{
			$this->_Disabled = $Disabled;
		}
		public function getEmailVerified()
		{
			return $this->_EmailVerified;
		}
		public function setEmailVerified($EmailVerified)
		{
			$this->_EmailVerified = $EmailVerified;
		}
		public function getSource()
		{
			return $this->_Source;
		}
		public function setSource($Source)
		{
			$this->_Source = $Source;
		}
		public function getClips()
		{
			if ($this->_Clips == NULL)
			{
				$this->_Clips = 0;
			}
			return $this->_Clips;
		}
		public function setClips($Clips)
		{
			$this->_Clips = $Clips;
		}
		public function getHearts()
		{
			if ($this->_Hearts == NULL)
			{
				$this->_Hearts = 0;
			}
			return $this->_Hearts;
		}
		public function setHearts($Hearts)
		{
			$this->_Hearts = $Hearts;
		}
		public function getHeartedByUser()
		{
			return $this->_HeartedByUser;
		}
		public function setHeartedByUser($HeartedByUser)
		{
			$this->_HeartedByUser = $HeartedByUser;
		}
		public function getFollowers()
		{
			if ($this->_Followers == NULL)
			{
				$this->_Followers = 0;
			}
			return $this->_Followers;
		}
		public function setFollowers($Followers)
		{
			$this->_Followers = $Followers;
		}
		public function getFollowing()
		{
			if ($this->_Following == NULL)
			{
				$this->_Following = 0;
			}
			return $this->_Following;
		}
		public function setFollowing($Following)
		{
			$this->_Following = $Following;
		}
		public function getBuys()
		{
			if ($this->_Buys == NULL)
			{
				$this->_Buys = 0;
			}
			return $this->_Buys;
		}
		public function setBuys($Buys)
		{
			$this->_Buys = $Buys;
		}
		public function getLoggedInAppUserID()
		{
			if ($this->_LoggedInAppUserID == NULL)
			{
				$this->_LoggedInAppUserID = 0;
			}
			return $this->_LoggedInAppUserID;
		}
		public function setLoggedInAppUserID($LoggedInAppUserID)
		{
			$this->_LoggedInAppUserID = $LoggedInAppUserID;
		}
		public function getPosts()
		{
			if ($this->_Posts == NULL)
			{
				$this->_Posts = array();
			}
			return $this->_Posts;
		}
		public function setPosts($posts)
		{
			if ($posts == NULL)
			{
				$posts = array();
			}
			return $this->_Posts = $posts;
		}
		public function getUserNotifications()
		{
			if ($this->_UserNotifications == NULL)
			{
				$this->_UserNotifications = array();
			}
			return $this->_UserNotifications;
		}
		public function setUserNotifications($userNotifications)
		{
			if ($userNotifications == NULL)
			{
				$userNotifications = array();
			}
			return $this->_UserNotifications = $userNotifications;
		}
		public function getUserChildren()
		{
			if ($this->_UserChildren == NULL)
			{
				$this->_UserChildren = array();
			}
			return $this->_UserChildren;
		}
		public function setUserChildren($userChildren)
		{
			if ($userChildren == NULL)
			{
				$userChildren = array();
			}
			return $this->_UserChildren = $userChildren;
		}
	}
?>
