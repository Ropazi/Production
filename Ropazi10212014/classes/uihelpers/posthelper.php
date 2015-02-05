<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/post.php");
	include_once("classes/business/postbo.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: PostHelper
	///Description: PostHelper utils
	///</summary>
	///*****************************************************************

	class PostHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getUserPosts
        ///Description: getUserPosts
        ///</summary>
        ///*****************************************************************

        public static function getUserPosts($appUserID)
        {
        	$rVal = "";
        	$postBO = new PostBO(NULL);
        	$posts = $postBO->SelectByAppUserID($appUserID);
        	$i = 0;
        	foreach($posts as $post){
        		if ($i <= 5){
        			$rVal .= '<img src="/uploads/thumb_' . $post->getLocalImageURL() . '" style="cursor:pointer;height:42px;width:42px;"  onclick="javascript:showmodal(\'/post/postlightboxget/' . $post->getPostID() . '\', \'5\');return false;"/>';
        		}
        		$i++;
        	}
        	return $rVal;
           
        }
		
	}
?>