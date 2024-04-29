<?php
class login extends dbConnect
{
	
	function login()
	{
		$this->mysqlConnect = parent::dbMysqlConnect();
	}//function login()

	function checkUserlogin($email,$password)
	{
		$activeUserData	= array();
		
		$sql = "SELECT * from admin where  email  = '".$email."' and password = '".$password."'";

		$query = $this->mysqlConnect->query($sql);
		foreach($query as $data)
		{
			$activeUserData[] = $data;
		}//foreach($res as $data)
		count($activeUserData);
		
		if(count($activeUserData) == 0)
		{
			echo 2;
		}
		else
		{		
			$_SESSION['sessUserId']		=	$activeUserData[0]['uid'];
			$_SESSION['sessUserEmail']	=	$activeUserData[0]['email'];
			$_SESSION['sessUserName']	=	$activeUserData[0]['name'];
			
			echo 1;
		}
	}
}