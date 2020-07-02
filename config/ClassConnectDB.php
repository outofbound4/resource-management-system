<?php
/*******************************************************************************
* Php class for creating mysqli Object                                         *
*                                                                              *
*******************************************************************************/
require_once("config.php");

class ConnectDatabase
{
	var $DB_CONNECTION;
	
	public function __construct()
	{
		$this->DB_CONNECTION = new mysqli(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
		$this->DB_CONNECTION->set_charset('utf8');
		
		if (mysqli_connect_errno()) 
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	public function __destruct()
	{
		$this->DB_CONNECTION->close();
		$this->DB_CONNECTION = null;
		unset($this->DB_CONNECTION);
	}
	
	public function query($sql)
	{
		return $this->DB_CONNECTION->query($sql);
	}
	
	public function error()
	{
		return "DataBase Error ::==>> " . $this->DB_CONNECTION->error;
	}
	
	function get_recent_inserted_id()
	{
		$sql = "SELECT last_insert_id()";
		$result = $this->query($sql);
		$id = ($row = $result->fetch_array()) ? $row[0] : 0;
		$result->close();
		return $id;
	}
	
	function get_insert_sql($table)
	{
		$field_list = " (";
		$value_list = " VALUES(";
		$sql = "SELECT * from $table";
		$result = $this->query($sql);
		if(!($result)) return "error";
	
		$finfo = $result->fetch_fields();
		$first=0;
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			foreach($_POST as $key => $value)
			{
				foreach ($finfo as $val)
				{
					if($key == $val->name)
					{
						$first++;
						if($first>1) { 
							$field_list = $field_list . ","; 
							$value_list = $value_list . ","; 
						}
						$field_list =  $field_list . $key;
						$value_list = $value_list . "'" . self::sanitizeData($value) . "'";
					}		
				}
			}
		}
		else if($_SERVER['REQUEST_METHOD']=='GET')
		{
			foreach($_GET as $key => $value)
			{
				foreach ($finfo as $val)
				{
					if($key == $val->name)
					{
						$first++;
						if($first>1) { $field_list = $field_list . ","; $value_list = $value_list . ","; }
						$field_list =  $field_list . $key;
						$value_list = $value_list . "'" . self::sanitizeData($value) . "'";
					}		
				}
			}
		}

		$field_list = $field_list . ")"; 
		$value_list = $value_list . ")"; 
		$sql = "INSERT INTO " . $table. $field_list . $value_list;
		return $sql;
	}

	public function sanitizeData($value)
	{
      $data = trim($value);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
	
	public function create_comma_sepatrated_record($sql)
	{
		$record = "";
		$result =  $this->query($sql);
		if($items =  $result->fetch_array())
		{
			for($i = 0; $i < $result->field_count; $i++)
			{
				if($record != "") $record .=",";
				$record .= $items[$i];
			}
		}
		return $record;
	}
}

$DB_CONN = new ConnectDatabase();
?> 
