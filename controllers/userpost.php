<?php
	include_once("classes/business/userpostbo.php");
	include_once("classes/domain/userpost.php");
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/request/usercatalogrequesthelper.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/userpostrequesthelper.php");
	include_once("classes/validators/userpostvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPostController
	///Description: User PostsController
	///</summary>
	///*****************************************************************

	class UserPostController extends BaseController
	{
		private $_UserInfo;


		

		///*****************************************************************
		///<summary>
		///Method Name: createuserpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createuserpostpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$userPostRequestHelper = new UserPostRequestHelper();
				$userPost = $userPostRequestHelper->AssembleUserPostEditControl();
				$userPostBO = new UserPostBO($this->_UserInfo);
				$userPostValidator = new UserPostValidator();
				$userPostValidator->ValidateUserPostEditControl($userPost, $this->_UserInfo);
				if (!$userPost->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $userPost->getErrors());
				}
				else
				{
					$logger->debug("adding user clipping");
					$userid = CommonUtils::verifyUserCookie();
					$userPost->setAppUserID($userid);
					$userPost->setCreateDate(new DateTime());
					$userPost->setIsValid(1);
					
					$existingPost = $userPostBO->SelectExistingPost($userPost->getPostID(), $userPost->getAppUserID());
					if ($existingPost->getUserPostID() > 0) {
						$clips = 0;
						return $this->view->outputJson(Constants::$OK, $clips, "");
					}
					else {
						$clips = $userPostBO->InsertUserPost($userPost);
						return $this->view->outputJson(Constants::$REFRESHCONTENT, $clips, "");
					}
					
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: createuserpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		
		public function createuserpostwithcatalog()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$userCatalogRequestHelper = new UserCatalogRequestHelper();
				$userCatalog = $userCatalogRequestHelper->AssembleUserCatalogEditControl();
				$userPostRequestHelper = new UserPostRequestHelper();
				$userPost = $userPostRequestHelper->AssembleUserPostEditControl();
				$userPostBO = new UserPostBO($this->_UserInfo);
				$userCatalogBO = new UserCatalogBO($this->_UserInfo);
				$userPostValidator = new UserPostValidator();
				$userPostValidator->ValidateUserPostEditControl($userPost, $this->_UserInfo);
				if (!$userPost->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $userPost->getErrors());
				}
				else
				{
					$userid = CommonUtils::verifyUserCookie();
					
					$logger->debug("adding user clipping");
					
					$userPost->setAppUserID($userid);
					$userPost->setCreateDate(new DateTime());
					$userPost->setIsValid(1);
						
					$existingPost = $userPostBO->SelectExistingPost($userPost->getPostID(), $userPost->getAppUserID());
					if ($existingPost->getUserPostID() > 0) {
						$clips = 0;
						return $this->view->outputJson(Constants::$OK, $clips, "");
					}
					else {
						$existingUserCatalog = $userCatalogBO->SelectByName($userid, $userCatalog->getCatalogName());
						if ($existingUserCatalog->getUserCatalogID() > 0) {
							$userPost->setUserCatalogID($existingUserCatalog->getUserCatalogID());
							$existingUserCatalog->setClips($existingUserCatalog->getClips() + 1);
							$userCatalogBO->UpdateUserCatalog($existingUserCatalog);
						}
						else{
							$userCatalog->setAppUserID($userid);
							$userCatalog->setClips(1);
							$userCatalog->setCreateDate(new DateTime());
							$userCatalogBO->InsertUserCatalog($userCatalog);
							$userPost->setUserCatalogID($userCatalog->getUserCatalogID());
						}
						$clips = $userPostBO->InsertUserPost($userPost);
						return $this->view->outputJson(Constants::$REFRESHCONTENT, $clips, "");
					}
						
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}


	}
?>
