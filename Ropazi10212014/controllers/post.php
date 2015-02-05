<?php
	include_once("classes/business/postcommentbo.php");
	include_once("classes/domain/postcomment.php");
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/business/postbo.php");
	include_once("classes/domain/post.php");
	include_once("classes/business/userpostbo.php");
	include_once("classes/domain/userpost.php");
	include_once("classes/business/appuserbo.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/business/brandbo.php");
	include_once("classes/domain/brand.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/postrequesthelper.php");
	include_once("classes/validators/postvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostController
	///Description: PostController
	///</summary>
	///*****************************************************************

	class PostController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: searchpost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function searchpost()
		{
			try
			{
				$taskCode = "searchpost";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "Title");
				$commandObject->SetParameter("SortDirection", "ASC");
				$_PostBO = new PostBO($this->_UserInfo);
				$paginatedlist = $_PostBO->SearchPost("","Title", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "searchpost");
				$paginatedlist->SetRequestState("ModalIndex", "2");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "post/updatepostget");
				return $this->view->output($paginatedlist, "admintemplate");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createpostget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "createpost";
				$this->LogAccess($taskCode);
				$_Post = new Post();
				$this->model = $_Post;
				ob_start();
				include('views/post/_createpostedit.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "createpost";
				$this->LogAccess($taskCode);
				$_PostRequestHelper = new PostRequestHelper();
				$_Post = $_PostRequestHelper->AssemblePostEditControl();
				$logger->debug("Post Price Text::" . $_Post->getPriceText());
				$logger->debug("Post Title::" . $_Post->getTitle());
				$logger->debug("Post Description::" . $_Post->getDetailText());
				$price = str_replace("$", "", $_Post->getPriceText());
				if (is_numeric($price)){
					$_Post->setPrice($price);
					$logger->debug("Price Value::" . $_Post->getPrice());
				}
				$_PostBO = new PostBO($this->_UserInfo);
				if (strlen($_Post->getDetailText()) > 2000){
					$logger->debug("Large Detail::" . strlen($_Post->getDetailText()));
					$detailText = substr($_Post->getDetailText(), 0, 2000);
					$_Post->setDetailText($detailText);
					
				}
				if (strlen($_Post->getTitle()) > 500){
					$logger->debug("Large Title::" . strlen($_Post->getTitle()));
					$title = substr($_Post->getTitle(), 0, 500);
					$_Post->setTitle($title);
				}
				$_PostValidator = new PostValidator();
				$_PostValidator->ValidatePostEditControl($_Post, $this->_UserInfo);
				if (!$_Post->getIsValid())
				{
					$logger->debug("Post invalid");
					return $this->view->outputJson(Constants::$VALERROR, "", $_Post->getErrors());
				}
				else
				{
					$userid = 0;
					if (isset($_COOKIE["ropaziuser"])){
						$logger->debug("Got user cookie");
						$logger->debug($_COOKIE["ropaziuser"]);
						$userid = CommonUtils::verifyUserCookie();
						$_Post->setAppUserID($userid);
					}
					else {
						$logger->debug("Not Got user cookie");
					}
  					try {
  						$domain = parse_url($_Post->getPostURL(),PHP_URL_HOST);
  						$logger->debug("I got the host as::" . $domain);
  						$brandBO = new BrandBO($this->_UserInfo);
  						$brand = $brandBO->SelectByWebsite($domain);
  						$_Post->setBrandID($brand->getBrandID());
  						
  					}
  					catch (Exception $ex){
  						$logger->debug("Couldn't parse domain");
  					}
  					$post = $_PostBO->SelectByPostURL($_Post->getPostURL());
  					if ($post->getPostID() > 0){
  						$userPostBO = new UserPostBO($this->_UserInfo);
  						$userPost = $userPostBO->SelectExistingPost($_Post->getPostID(), $_Post->getAppUserID());
  						if ($userPost->getUserPostID() == 0){
  							$_Post->setClips($_Post->getClips() + 1);
  							$_Post->setLastUpdateDate(new DateTime());
  							$_PostBO->UpdateClips($_Post);
  						}
  						else {
  							$logger->debug("Post exists, skipping");
  						}
  					}
  					else {
  						$logger->debug("Post does not exist, adding");
  						
  						$_Post->setCreateDate(new DateTime());
  						$_Post->setLastUpdateDate(new DateTime());
  						$_Post->setClips(1);
  						$_Post->setCurrency("USD");
  						$fileName = $this->saveImage($_Post->getOriginalImageURL());
  						$_Post->setLocalImageURL($fileName);
  						$_PostBO->InsertPost($_Post);
  						
  					}
					$output = "";
					return $this->view->outputJsonp(Constants::$REFRESHCONTENT, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		
		public function createpostextended()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "createpost";
				$this->LogAccess($taskCode);
				$_PostRequestHelper = new PostRequestHelper();
				$_Post = $_PostRequestHelper->AssemblePostEditControlExtended();
				$logger->debug("Post Price Text::" . $_Post->getPriceText());
				$logger->debug("Post Title::" . $_Post->getTitle());
				$logger->debug("Post Description::" . $_Post->getDetailText());
				$price = str_replace("$", "", $_Post->getPriceText());
				if (is_numeric($price)){
					$_Post->setPrice($price);
					$logger->debug("Price Value::" . $_Post->getPrice());
				}
				$_PostBO = new PostBO($this->_UserInfo);
				if (strlen($_Post->getDetailText()) > 2000){
					$logger->debug("Large Detail::" . strlen($_Post->getDetailText()));
					$detailText = substr($_Post->getDetailText(), 0, 2000);
					$_Post->setDetailText($detailText);
						
				}
				if (strlen($_Post->getTitle()) > 500){
					$logger->debug("Large Title::" . strlen($_Post->getTitle()));
					$title = substr($_Post->getTitle(), 0, 500);
					$_Post->setTitle($title);
				}
				$_PostValidator = new PostValidator();
				$_PostValidator->ValidatePostEditControl($_Post, $this->_UserInfo);
				if (!$_Post->getIsValid())
				{
					$logger->debug("Post invalid");
					return $this->view->outputJson(Constants::$VALERROR, "", $_Post->getErrors());
				}
				else
				{
					$userID = 0;
					if (isset($_COOKIE["ropaziuser"])){
						$logger->debug("Got user cookie");
						$logger->debug($_COOKIE["ropaziuser"]);
						$userid = CommonUtils::verifyUserCookie();
						$_Post->setAppUserID($userid);
					}
					else {
						$logger->debug("Not Got user cookie");
					}
					try {
						$domain = parse_url($_Post->getPostURL(),PHP_URL_HOST);
						$logger->debug("I got the host as::" . $domain);
						$brandBO = new BrandBO($this->_UserInfo);
						$brand = $brandBO->SelectByWebsite($domain);
						$_Post->setBrandID($brand->getBrandID());
		
					}
					catch (Exception $ex){
						$logger->debug("Couldn't parse domain");
					}
					$post = $_PostBO->SelectByPostURL($_Post->getPostURL());
					if ($post->getPostID() > 0){
						$userPostBO = new UserPostBO($this->_UserInfo);
						$userPost = $userPostBO->SelectExistingPost($_Post->getPostID(), $_Post->getAppUserID());
						if ($userPost->getUserPostID() == 0){
							$_Post->setClips($_Post->getClips() + 1);
							$_Post->setLastUpdateDate(new DateTime());
							$_PostBO->UpdateClips($_Post);
						}
						else {
							$logger->debug("Post exists, skipping");
						}
					}
					else {
						$logger->debug("Post does not exist, adding");
						$_Post->setCreateDate(new DateTime());
						$_Post->setLastUpdateDate(new DateTime());
						$_Post->setClips(1);
						$_Post->setCurrency("USD");
						$fileName = $this->saveImage($_Post->getOriginalImageURL());
						$_Post->setLocalImageURL($fileName);
						$_PostBO->InsertPost($_Post);
		
					}
					$output = "";
					return $this->view->outputJsonp(Constants::$REFRESHCONTENT, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		private function saveImage($url){
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("In saveImage");
			
			
			$ThumbSquareSize        = 63; //Thumbnail will be 200x200
			$BigImageMaxSize        = 236; //Image Maximum height or width
			$LargeImageMaxSize = 546;
			$ThumbPrefix            = "thumb_"; //Normal thumb Prefix
			$LargePrefix = "large_";
			$DestinationDirectory   =  Constants::$IMAGEDIRECTORY; //specify upload directory ends with / (slash)
			$Quality                = 90; //jpeg quality
			$ImageExt = "";
			
			// Random number will be added after image name
			$RandomNumber   = rand(0, 9999999999);
			$fileName = $this->getfileName($url);
			$ImageName      = str_replace(' ','-',strtolower($fileName)); //get image name
			$ImageSize      = getimagesize($url); // get original image size
			//$TempSrc        = $_FILES['ImageFile']['tmp_name']; // Temp name of image file stored in PHP tmp folder
			$ImageType      = $ImageSize[2]; //get file type, returns "image/png", image/jpeg, text/plain etc.
			
			$logger->debug("Image Name::" . $fileName);
			$logger->debug("Image Size::" . $ImageSize[0] . $ImageSize[1]);
			$logger->debug("Image Type::" . $ImageType);
			//Let's check allowed $ImageType, we use PHP SWITCH statement here
			switch(strtolower($ImageType))
			{
				case 1:
					//Create a new image from file
					$CreatedImage =  imagecreatefromgif($url);
					break;
				case 2:
					$CreatedImage =  imagecreatefromjpeg($url);
					break;
				case 3:
					$CreatedImage = imagecreatefrompng($url);
					break;
				default:
					die('Unsupported File!'); //output error and exit
			}
			switch(strtolower($ImageType))
			{
				case 1:
					//Create a new image from file
					$ImageExt =  "gif";
					break;
				case 2:
					$ImageExt =  "jpg";
					break;
				case 3:
					$ImageExt =  "png";
					break;
				default:
					die('Unsupported File!'); //output error and exit
			}
			//PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
			//Get first two values from image, width and height.
			//list assign svalues to $CurWidth,$CurHeight
			//list($CurWidth,$CurHeight)=getimagesize($TempSrc);
			$CurWidth = $ImageSize[0];
			$CurHeight = $ImageSize[1];
			$logger->debug("Current Width::" . $CurWidth);
			$logger->debug("Current Height::" . $CurHeight);
			
			//Get file extension from Image name, this will be added after random name
			
			//remove extension from filename
			$ImageName      = preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName);
			
			//Construct a new name with random number and extension.
			$NewImageName = $RandomNumber.'.'.$ImageExt;
			
			//set the Destination Image
			$thumb_DestRandImageName    = $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumbnail name with destination directory
			$large_DestRandImageName    = $DestinationDirectory.$LargePrefix.$NewImageName; //Thumbnail name with destination directory
			$DestRandImageName          = $DestinationDirectory.$NewImageName; // Image with destination directory
			$logger->debug("Going to resize now");
			//Resize image to Specified Size by calling resizeImage function.
			if($this->resizeImage($CurWidth,$CurHeight,$LargeImageMaxSize,$large_DestRandImageName,$CreatedImage,$Quality,$ImageType))
			{
				if($this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType)){
					if($this->resizeImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
					{
					}
					else {
						$logger->debug("Thumbnail save error");
					}
				}
				else {
					$logger->debug("Regular Save error");
				}
				//Create a square Thumbnail right after, this time we are using cropImage() function
				
				
				/*
				 We have succesfully resized and created thumbnail image
				We can now output image to user's browser or store information in the database
				*/
				$output = '';
				$output .= '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
				$output .= '<tr>';
				$output .= '<td align="center"><img src="/uploads/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail"></td>';
				$output .= '</tr><tr>';
				$output .= '<td align="center"><img src="/uploads/'.$NewImageName.'" alt="Resized Image"></td>';
				$output .= '</tr>';
				$output .= '</table>';
			
				/*
				 // Insert info into database table!
				mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
						VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
				*/
			
			}else{
				$logger->debug("Large Resize Error");
				//die('Resize Error'); //output error
			}
			$logger->debug($output);
			$logger->debug("Completed Upload");
			return $NewImageName;
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		private function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("In resize Image");
			//Check Image size is not 0
			if($CurWidth <= 0 || $CurHeight <= 0)
			{
				return false;
			}
		
			//Construct a proportional size of new image
			$ImageScale         = max($MaxSize/$CurWidth, $MaxSize/$CurHeight);
			$NewWidth           = $MaxSize == 63 ? $MaxSize : ceil($ImageScale*$CurWidth);
			$NewHeight          = $MaxSize == 63 ? $MaxSize : ceil($ImageScale*$CurHeight);
			$NewCanves          = imagecreatetruecolor($NewWidth, $NewHeight);
			$logger->debug("MaxSize::CurWidth::CurHeight::ImageScale::NewWidth::NewHeight::" .$MaxSize . "::" . $CurWidth . "::" . $CurHeight . "::" . $ImageScale . "::" . $NewWidth . "::" . $NewHeight);
			// Resize Image
			if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
			{
				$logger->debug("In resize Image:: ImageType" . $ImageType);
				switch(strtolower($ImageType))
				{
					case 1:
						imagegif($NewCanves,$DestFolder);
						break;
					case 2:
						imagejpeg($NewCanves,$DestFolder, $Quality);
						break;
					case 3:
						imagepng($NewCanves,$DestFolder);
						break;
					default:
						return false;
				}
				//Destroy image, frees memory
				if(is_resource($NewCanves)) {imagedestroy($NewCanves);}
				return true;
			}
		
		}
		
		///*****************************************************************
		///<summary>
		///Method Name:
		///Description: This function corps image to create exact square images, no matter what its original size!
		///</summary>
		///*****************************************************************
		private function getfileName($filePath)
		{
			$path_parts = pathinfo($filePath);
			return $path_parts['basename'];
		}
		///*****************************************************************
		///<summary>
		///Method Name: userpost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function userpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$userid = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$userid = CommonUtils::verifyUserCookie();
				}
				$taskCode = "";
				$this->LogAccess($taskCode);
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "Title");
				$commandObject->SetParameter("SortDirection", "ASC");
				$postBO = new PostBO($this->_UserInfo);
				$paginatedlist = $postBO->SearchUserPost($userid,"","","","","","","Title", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "userpost");
				$paginatedlist->SetRequestState("ModalIndex", "2");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "post/updatepostget");
				
				$userCatalogBO = new UserCatalogBO($this->_UserInfo);
				$userCatalogs = $userCatalogBO->SelectByAppUserID($userid);
				$logger->debug("Got Catalogs::". sizeof($userCatalogs));
				$submodels = array();
				$submodels[] = $userCatalogs;
				$this->view->setSubmodels($submodels);
				return $this->view->output($paginatedlist);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function userpostpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$commandObject = new CommandObject();
				$title = $_POST["txtTitle"];
				$priceText =  $_POST["txtPrice"];
				$gender = $_POST["txtItemGender"];
				$size = $_POST["txtItemSize"];
				$category = $_POST["txtCategoryName"];
				$pageIndex = $_POST["txtPageIndex"];
				$logger->debug("Title::" . $title . "::Price::" . $priceText . "::gender::" . $gender . "::size::" . $size . "::category::" . $category . "::PageIndex::" . $pageIndex);
				$userid = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$userid = CommonUtils::verifyUserCookie();
				}
				$logger->debug("Going to get new posts");
				$postBO = new PostBO($this->_UserInfo);
				//$AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex
				$paginatedList = $postBO->SearchUserPost($userid, $title, $priceText, $gender, $size,"",$category,"Title", "ASC", 20, $pageIndex);
				$logger->debug("Got new list::" . sizeof($paginatedList));
				$paginatedList->SetRequestState("ContextName", "userpost");
				$paginatedList->SetRequestState("ModalIndex", "2");
				$paginatedList->SetRequestState("UpdateTarget", "post/Updateuserpost");
				$this->model = $paginatedList;
				$posts = $this->model->getList();
				ob_start();
				include('views/post/_postlistcontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function postlightboxget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "postlightbox";
				$this->LogAccess($taskCode);
				$postid = $_GET["id"];
				$logger->debug("id::" . $postid);
				$appuserid = 0;
				$postBO = new PostBO($this->_UserInfo);
				$postCommentBO = new PostCommentBO($this->_UserInfo);
				
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$userid = CommonUtils::verifyUserCookie();
					$appUserBO = new AppUserBO($this->_UserInfo);
					$appUser = $appUserBO->SelectByAppUserID($userid);
					if ($appUser->getAppUserID() > 0){
						$this->submodels[] = $appUser;
						$appuserid = $appUser->getAppUserID();
					}
					else {
						//need to fix this
						$this->submodels[] = new AppUser();
					}
				}
				else {
					$this->submodels[] = new AppUser();
				}
				
				$post = $postBO->SelectByUserAndPostID($postid, $appuserid);
				$logger->debug("Got Post::" . $post->getLocalImageURL());
				$this->model = $post;
				
				$relatedPosts = $postBO->SelectBySubCategoryID($post->getSubCategoryID());
				$this->submodels[] = $relatedPosts;
				
				$userPosts = $postBO->SelectByAppUserID($post->getAppUserID());
				$this->submodels[] = $userPosts;
				
				$brandPosts = $postBO->SelectByBrandID($post->getBrandID());
				$this->submodels[] = $brandPosts;
				
				$postComments = $postCommentBO->SelectByPostID($post->getPostID());
				$this->submodels[] = $postComments;
				
				ob_start();
				include('views/post/_postlightboxcontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function postlightboxrefreshget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "postlightbox";
				$this->LogAccess($taskCode);
				$postid = $_GET["id"];
				$logger->debug("id::" . $postid);
		
				$postBO = new PostBO($this->_UserInfo);
				$post = $postBO->SelectByPostID($postid);
				$logger->debug("Got Post::" . $post->getLocalImageURL());
				$this->model = $post;
		
				$relatedPosts = $postBO->SelectBySubCategoryID($post->getSubCategoryID());
				$this->submodels[] = $relatedPosts;
		
				$userPosts = $postBO->SelectByAppUserID($post->getAppUserID());
				$this->submodels[] = $userPosts;
		
				$brandPosts = $postBO->SelectByBrandID($post->getBrandID());
				$this->submodels[] = $brandPosts;
		
				ob_start();
				include('views/post/_postlightboxcontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$REFRESHCONTENT, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		

	}
?>
