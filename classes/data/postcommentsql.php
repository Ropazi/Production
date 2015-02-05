<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class PostCommentSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for PostCommentSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertPostComment
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertPostComment($_postcomment)
		{
			$query = "insert into postcomments(";
			$query .= "postid,";
			$query .= "appuserid,";
			$query .= "threadid,";
			$query .= "createdate,";
			$query .= "comments,";
			$query .= "isremoved";
			$query .= ")";
			$query .= " values (";
			$query .= $_postcomment->getPostID() . ",  ";
			$query .= $_postcomment->getAppUserID() . ",  ";
			$query .= $_postcomment->getThreadID() . ",  ";
			$query .= $this->CheckDate($_postcomment->getCreateDate()). " , ";
			$query .= "'" . $this->CheckString($_postcomment->getComments()) . "', ";
			$query .= $this->CheckBoolean($_postcomment->getIsRemoved()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateProductCommentStatus
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateProductCommentStatus($_postcomment)
		{
			$query = "update postcomments set ";
			$query .= "isremoved = " . $this->CheckBoolean($_postcomment->getIsRemoved()) ;
			$query .= " where postcommentid = " . $_postcomment->getPostCommentID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostCommentID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByPostCommentID($PostCommentID)
		{
			$query = "select * from postcomments where postcommentid = '" . $PostCommentID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$query = "select * from postcomments where postid = '" . $PostID . "' order by createdate desc";
			return $query;
		}
	}
?>
