<?php
define('BASE_DIR', '/Applications/XAMPP/xamppfiles/htdocs/NEC/');
	
class users extends dbConnect
{
	var $result		        = array();
	var $errPath = BASE_DIR."error.log";

	
	public function users()
	{
		$this->mysqlConnect = parent::dbMysqlConnect();
	}//function users() end

	/**
	 * Retrieve and display users from the 'admin' table.
	 * 
	 * @return array An array containing the user data retrieved from the database.
	 */
	public function displayUsers()
	{
		try {
			$sql = "SELECT * FROM admin";
			
			$comp = $this->mysqlConnect->query($sql);
			
			if ($comp) {
				foreach ($comp as $data) {
					$this->result[] = $data;
				}
			} else {
				// Handle empty result or other specific cases
				$this->result = []; // Set result as empty array or handle it accordingly
			}
			
			return $this->result;
		} catch (Exception $e) {
			// Handle the exception, you can log it or return an error message
			// Log the error
			error_log('Error in displayUsers: ' . $e->getMessage());
			
			// You can return an empty array or false, or throw a new exception as needed
			return [];
		}//try catch end
	}

	/**
	 * Insert a new user into the 'admin' table.
	 * 
	 * @param string $name The name of the user.
	 * @param string $email The email of the user.
	 * @param string $phone The phone number of the user.
	 * @param string $passwordEncrypt The encrypted password of the user.
	 * @param string $profileName The profile picture name of the user.
	 * @return int The ID of the inserted user or 0 if an error occurs.
	 */
	public function insertuser($name, $email, $phone, $Password_encrypt, $profilName)
	{
		$time = time();
		$sql = "INSERT INTO admin(name, email, password, profile_pic, mobile, created_at, updated_at)
		values('".$name."','".$email."','".$Password_encrypt."','".$profilName."',$phone, $time, $time)";
		
		try
		{
			$insert  = $this->mysqlConnect->exec($sql);
			$this->UserId = $this->mysqlConnect->lastInsertId();
			return $this->UserId;
		}
		catch(Exception $Ex)
		{
			error_log('Error while inserting the user: ' . $e->getMessage(), 3, '/path/to/error.log');
			return 0;
		}
	}

	/**
	 * Check if a mobile number already exists in the 'admin' table.
	 * 
	 * @param string $mobile The mobile number to check.
	 * @return string The mobile number if it exists, otherwise an empty string.
	 */
	public function checkMobileExist($mobile)
	{
		try {
			$sql = "SELECT mobile FROM admin WHERE mobile = '".$mobile."'";
			$comp = $this->mysqlConnect->query($sql);
			$rstmobile = "";
			foreach ($comp as $data) {
				$rstmobile = $data['mobile'];
			}
			return $rstmobile;
		} catch (Exception $e) {
			// Log the error message to the error log file
			error_log('Error in checkMobileExist function: ' . $e->getMessage(), 3, '/path/to/error.log');
			// You can also throw the exception if you want to handle it elsewhere
			return 0;
		}
	}

	/**
	 * Check if an email address already exists in the 'admin' table.
	 * 
	 * @param string $email The email address to check.
	 * @return string The email address if it exists, otherwise an empty string.
	 */
	public function checkemail($email)
	{
		try {
			$sql = "SELECT email FROM admin WHERE email = '".$email."'";
			$comp = $this->mysqlConnect->query($sql);
			$count = "";
			foreach ($comp as $data) {
				$count = $data['email'];
			}
			return $count;
		} catch (Exception $e) {
			// Log the error message to the error log file
			error_log('Error in checkEmail function: ' . $e->getMessage(), 3, $this->errPath);
			// You can also throw the exception if you want to handle it elsewhere
			return 0;
		}
	}
}
?>