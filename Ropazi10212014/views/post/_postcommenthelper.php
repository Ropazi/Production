<?php
	include_once("classes/domain/postcomment.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/utils/commonutils.php");
	class PostCommentHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: ProductCommentThreadControl
		///Description: ProductCommentThreadControl
		///</summary>
		///*****************************************************************

		public static function ProductCommentThreadControl($postComments, $appUser)
		{
			$comments = '<div class="row clear-padding-margin">';
			
			$comments .= PostCommentHelper::AppendCommentForm($appUser);
			
			if ($postComments != NULL){
				foreach ($postComments as $postComment) {
					$comments .= '<div class="large-12 columns comment-linebreak">';
					$comments .= '<table>';
					$comments .= '<tr>';
					$comments .= '<td style="width:46px;"><a href="javascript:void(0);"><img src="/content/images/roundpic.png" /></a></td>';
					$comments .= '<td style="width:34px;"><div class="heart-comment heart-light-comment">4</div></td>';
					$comments .= '<td><p>' . CommonUtils::getDays($postComment->getCreateDate()) .' Days - ' . $postComment->getComments() . '</p></td>';
					$comments .= '</tr>';
					$comments .= '</table>';
					$comments .= '</div>';
				}
			}
			$comments .= '</div>';
			return $comments;
		}



		

		///*****************************************************************
		///<summary>
		///Method Name: AppendCommentForm
		///Description: Append Comment Form
		///</summary>
		///*****************************************************************

		private static function AppendCommentForm($appUser)
		{
			$name = '';
			if ($appUser != NULL){
				$name = $appUser->getFirstName();
			}
			$form = '<div class="large-12 columns clear-padding-margin comment-linebreak">';
			$form .= '<div class="large-10 columns clear-padding-margin">';
			$form .= '<table>';
			$form .= '<tr>';
			$form .= '<td style="width:38px;"><a href="javascript:void(0);"><img src="/content/images/roundpic1.png" /></a></td>';
			$form .= '<td><input id="input-comment" type="text" placeholder="What\'s on your mind ' . $name . '?" /></td>';
			$form .= '</tr>';
			$form .= '</table>';
			$form .= '</div>';
			$form .= '<div class="large-2 columns clear-padding-margin" style="padding-left:10px !important;">';
			$form .= '<input id="btn-comment" type="button" value="Comment" onclick="javascript:addComment();" />';
			$form .= '</div>';
			$form .= '</div>';
			return $form;
		}


	}
?>
