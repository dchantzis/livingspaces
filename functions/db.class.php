<?php
//
if (!isset($_SESSION["SESSION"])) require ( "rpconfiginc.php");

class RPDBase
{
	function __construct()
	{
		$validationResult = NULL;
		$validateCredentials = 'unregistereduser';
	
		if((isset($_SESSION['ADMIN_LOGIN'])) && ($_SESSION['ADMIN_LOGIN']==TRUE) &&
			(isset($_SESSION['ADMIN_USERNAME'])) && ($_SESSION['ADMIN_USERNAME']!='') &&
			(isset($_SESSION['ADMIN_PASSWORD'])) && ($_SESSION['ADMIN_PASSWORD']!=''))
		{ $validateCredentials = "administrator"; }
	
		if((isset($_SESSION['RGUSER_LOGIN'])) && ($_SESSION['RGUSER_LOGIN']==TRUE) &&
			(isset($_SESSION['RGUSER_USERNAME'])) && ($_SESSION['RGUSER_USERNAME']!='') &&
			(isset($_SESSION['RGUSER_PASSWORD'])) && ($_SESSION['RGUSER_PASSWORD']!=''))
		{ $validateCredentials = "registereduser"; }
		
		switch($validateCredentials)
		{
			case 'administrator':
				$validationResult = validateLoginCredentialsAdmin();
				if($validationResult['usertype']!='administrator'){usersLogout();}
				break;
			case 'registereduser':
				
				//create a temp connection to the database
				@mysql_connect(RPDB_HOST,RPDB_COMMON_USER,RPDB_COMMON_PASSWORD);
				@mysql_select_db(RPDB_DATABASE);
				
				$validationResult = validateLoginCredentialsRegisteredUser();
				if($validationResult['usertype']!='registereduser'){usersLogout();}
				else
				{
					@mysql_close(); //close the temp connection to the database
					@mysql_connect(RPDB_HOST,RPDB_REGISTERED_USER,RPDB_REGISTERED_PASSWORD);
					@mysql_select_db(RPDB_DATABASE);
				}//
				break;
			case 'unregistereduser':
				@mysql_connect(RPDB_HOST,RPDB_COMMON_USER,RPDB_COMMON_PASSWORD);// or die('e?');
				@mysql_select_db(RPDB_DATABASE); // or die('a!');
				break;
			default:
				@mysql_connect(RPDB_HOST,RPDB_COMMON_USER,RPDB_COMMON_PASSWORD);
				@mysql_select_db(RPDB_DATABASE);
				break;
		}//switch
	}//construct()
	
	function __destruct() 
	{
		@mysql_close();//closes the connection to the DB
	}//destruct()
	
	public function createInsertQuery($DBtableName, $arrayValues)
	{
		$query = "INSERT INTO " . $DBtableName . " (";
		$i=0;
		while (list($key, $val) = each($arrayValues))
		{
			if($i==(count($arrayValues)-1))//don't add a comma after the table field name
			{
				$query .= $key . " ";
			}//
			else {$query .= $key . ", ";}
			$i++;
		}//while
		$query .=") VALUES (";
		
		reset ($arrayValues);
		$i=0;
		while (list($key, $val) = each($arrayValues))
		{
			if($i==(count($arrayValues)-1))//don't add a comma after the table field vale
			{
				$query .= $val . " ";
			}//
			else {$query .= $val . ", ";}
			$i++;
		}//while
		
		$query .=");";
		
		$_SESSION['query'] = $query;
		return $query;
	}//createInsertQuery
	
	
	public function executeInsertQuery($query)
	{
		@mysql_query($query); // or dbErrorHandler(802,mysql_error(),$query,'ajax','','','executeInsertQuery','false');
		return mysql_insert_id();
	}//executeInsertQuery()

	public function executeSelectQuery($query)
	{	
		//do be created
	}//executeSelectQuery($query)
	
}//RPDBase class

?>