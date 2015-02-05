<?php
	include_once("classes/business/postcommentbo.php");
	include_once("classes/domain/postcomment.php");
	include_once("classes/business/appuserbo.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/postcommentrequesthelper.php");
	include_once("classes/validators/postcommentvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");
	include_once("views/post/_postcommenthelper.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostCommentController
	///Description: CommentsController
	///</summary>
	///*****************************************************************

	class PostCommentController extends BaseController
	{
		private $_UserInfo;


		

		///*****************************************************************
		///<summary>
		///Method Name: createpostcomment
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createpostcommentpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$_PostCommentRequestHelper = new PostCommentRequestHelper();
				$_PostComment = $_PostCommentRequestHelper->AssemblePostCommentEditControl();
				$_PostCommentBO = new PostCommentBO($this->_UserInfo);
				$_PostCommentValidator = new PostCommentValidator();
				$_PostCommentValidator->ValidatePostCommentEditControl($_PostComment, $this->_UserInfo);
				if (!$_PostComment->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $_PostComment->getErrors());
				}
				else
				{
					$_PostComment->setCreateDate(new DateTime());
					$_PostCommentBO->InsertPostComment($_PostComment);
					$postComments = $_PostCommentBO->SelectByPostID($_PostComment->getPostID());
					$_AppUserBO = new AppUserBO($this->_UserInfo);
					$appUser = $_AppUserBO->SelectByAppUserID($_PostComment->getAppUserID());
					$output = PostCommentHelper::ProductCommentThreadControl($postComments, $appUser);
					return $this->view->outputJson(Constants::$REFRESHCONTENT, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}


	}
?>
