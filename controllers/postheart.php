<?php
	include_once("classes/business/postheartbo.php");
	include_once("classes/domain/postheart.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/postheartrequesthelper.php");
	include_once("classes/validators/postheartvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeartController
	///Description: BookmarksController
	///</summary>
	///*****************************************************************

	class PostHeartController extends BaseController
	{
		private $_UserInfo;


		
		///*****************************************************************
		///<summary>
		///Method Name: createpostheart
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createpostheartpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$postHeartRequestHelper = new PostHeartRequestHelper();
				$postHeart = $postHeartRequestHelper->AssemblePostHeartEditControl();
				$postHeartBO = new PostHeartBO($this->_UserInfo);
				$postHeartValidator = new PostHeartValidator();
				$postHeartValidator->ValidatePostHeartEditControl($postHeart, $this->_UserInfo);
				if (!$postHeart->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $postHeart->getErrors());
				}
				else
				{
					$logger->debug("adding user clipping");
					$userid = CommonUtils::verifyUserCookie();
					$postHeart->setAppUserID($userid);
					$postHeart->setCreateDate(new DateTime());
					$postHeart->setIsValid(1);
					
					$existingPost = $postHeartBO->SelectByAppUserAndPost($postHeart->getAppUserID(), $postHeart->getPostID());
					if ($existingPost->getHeartID() > 0) {
						$hearts = 0;
						return $this->view->outputJson(Constants::$OK, $hearts, "");
					}
					else {
						$hearts = $postHeartBO->InsertPostHeart($postHeart);
						return $this->view->outputJson(Constants::$REFRESHCONTENT, $hearts, "");
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
