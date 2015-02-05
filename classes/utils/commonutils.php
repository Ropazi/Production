<?php




	///*****************************************************************
	///<summary>
	///Class Name: CommonUtils
	///Description: Application Utilities
	///</summary>
	///*****************************************************************

	class CommonUtils
	{
		private static $_key = "0fC45x2T2xJCW7brk8Xrsw==";
		
		///*****************************************************************
		///<summary>
		///Method Name: TripleDESEncrypt
		///Description: Return Base 64 Encoded 3DES String
		///</summary>
		///*****************************************************************
		public static function EncryptTripleDES($plainText)
		{
			//Generate a key from a hash
			  $key = md5(utf8_encode(CommonUtils::$_key), true);

			  //Take first 8 bytes of $key and append them to the end of $key.
			  $key .= substr($key, 0, 8);

			  //Pad for PKCS7
			  $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
			  $len = strlen($plainText);
			  $pad = $blockSize - ($len % $blockSize);
			  $plainText .= str_repeat(chr($pad), $pad);

			  //Encrypt data
			  $encData = mcrypt_encrypt('tripledes', $key, $plainText, 'ecb');

			  return base64_encode($encData);
		}


		
        ///*****************************************************************
        ///<summary>
        ///Method Name: DecryptTripleDES
        ///Description: Return plain String
        ///</summary>
        ///*****************************************************************
        public static function DecryptTripleDES($cipherText)
        {
            //Generate a key from a hash
			$key = md5(utf8_encode(CommonUtils::$_key), true);

			//Take first 8 bytes of $key and append them to the end of $key.
			$key .= substr($key, 0, 8);

			$cipherText = base64_decode($cipherText);

			$cipherText = mcrypt_decrypt('tripledes', $key, $cipherText, 'ecb');

			$block = mcrypt_get_block_size('tripledes', 'ecb');
			$len = strlen($cipherText);
			$pad = ord($cipherText[$len-1]);

			return substr($cipherText, 0, strlen($cipherText) - $pad);
        }

        ///*****************************************************************
        ///<summary>
        ///Method Name: startsWith
        ///Description: string util function
        ///</summary>
        ///*****************************************************************
        private static function startsWith($string, $stringToMatch)
        {
        	return $string === "" || strpos($string, $stringToMatch) === 0;
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: startsWith
        ///Description: string util function
        ///</summary>
        ///*****************************************************************
        private static function getScrapeRule($key, $rules)
        {
        	foreach($rules as $rule){
        		if ($rule == $key){
        			return $rules[$key];
        		}
        	}
        	return "";
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: generateCookie
        ///Description: Cookie Generation
        ///</summary>
        ///*****************************************************************
        public static function generateCookie($id, $email, $firstName, $expiration) 
        {
        
        	$key = hash_hmac( 'md5', $id . $email . $expiration, "izapor" );
        	$hash = hash_hmac( 'md5', $id . $email. $expiration, $key );
        
        	$cookie = $id . '|' . $email . '|' . $firstName . '|' . $expiration . '|' . $hash;
        
        	return $cookie;
        
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: verifyCookie
        ///Description: Cookie Generation
        ///</summary>
        ///*****************************************************************
        public static function verifyCookie() 
        {
        
        	if ( empty($_COOKIE["ropaziadmin"]) )
        		return false;
        
        	list( $id, $expiration, $hmac ) = explode( '|', $_COOKIE["ropaziadmin"] );
        
        	$expired = $expiration;
        
        	if ( $expired < time() )
        		return false;
        
        	$key = hash_hmac( 'md5', $id . $expiration, "izapor" );
        	$hash = hash_hmac( 'md5', $id . $expiration, $key );
        
        	if ( $hmac != $hash )
        		return false;
        
        	return true;
        
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: verifyCookie
        ///Description: Cookie Generation
        ///</summary>
        ///*****************************************************************
        public static function getUserFirstNameFromCookie()
        {
        
        	if ( empty($_COOKIE["ropaziuser"]) )
        		return "";
        
        	list( $id, $email, $firstName, $expiration, $hmac ) = explode( '|', $_COOKIE["ropaziuser"] );
        
        	$expired = $expiration;
        
        	if ( $expired < time() )
        		return "";
        
        	$key = hash_hmac( 'md5', $id . $email . $expiration, "izapor" );
        	$hash = hash_hmac( 'md5', $id . $email . $expiration, $key );
        
        	if ( $hmac != $hash )
        		return "";
        
        	return $firstName;
        
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: verifyCookie
        ///Description: Cookie Generation
        ///</summary>
        ///*****************************************************************
        public static function verifyUserCookie() 
        {
        
        	if ( empty($_COOKIE["ropaziuser"]) )
        		return false;
        
        	list( $id, $email, $firstName, $expiration, $hmac ) = explode( '|', $_COOKIE["ropaziuser"] );
        
        	$expired = $expiration;
        
        	if ( $expired < time() )
        		return "";
        
        	$key = hash_hmac( 'md5', $id . $email . $expiration, "izapor" );
        	$hash = hash_hmac( 'md5', $id . $email . $expiration, $key );
        
        	if ( $hmac != $hash )
        		return "";
        
        	return $id;
        
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: getDays
        ///Description: Gets number of days between days
        ///</summary>
        ///*****************************************************************
        public static function getDays($givenDate){
        	$now = time(); // or your date as well
        	$datediff = $now - strtotime($givenDate);
        	return floor($datediff/(60*60*24));
        }
	}
?>
