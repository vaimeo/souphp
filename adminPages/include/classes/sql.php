<?php
class mysql extends picture implements database_constants 
{

	public $sql;
	public $filed;
	public $result;
	public $numrows;
	public $output;
	public $query;
	public $rs;
	public $row;
	private $records;
	public $field;
	public $query_string;
	public $statement;
//------------the html setings------------------//
	
	public $html_master_tag_start;///html  opening master tag start 
	public $html_child_tag_start;///html tag ending 
	public $html_child_tag_end;///html chil tag start ending position
	public $html_master_tag_end;///ending position
	
	
public function run_db($query)
{

	if(isset($_GET['p'])=="vbc")
	{
		if(isset($_GET['cid']))
		{
			$this->query_string=$this->statement." category_id='".$_GET['cid']."' order by news_id desc ";
		}
		else
		{
			if(isset($_GET['cityid']))
			{
				$this->query_string=$this->statement." and city_id='".$_GET['cityid']."'  order by news_id desc";
			}
			
		}
	}
	else
	{
		$this->query_string="";
	}
	
	$this->qs=$query.$this->query_string;
	return $this->result=mysql_query($query.$this->query_string);
}

public function number_of_record($result)
{
	if($result!="")
	{
		return $this->records=mysql_num_rows($result);
	}
	else
	{
		return $this->records=0;
	}
}


public function number_of_fields($result)
{
	if($result!="")
	{
		return $this->records=mysql_num_fields($result);
	}
	else
	{
		return $this->records=0;
	}
}

public function get_field($field)
{
	return mysql_result($this->result,$this->row,$field);
}



public function get_array($rs)
{
	return mysql_fetch_array($rs);
}



public function GetNameDataByTablePrams($tablename,$fieldname,$clause)
{
	$sql="select $fieldname from $tablename $clause";
	$this->result=mysql_query($sql);
	$this->numrows=mysql_num_rows($this->result);
	if($this->numrows>0)
	{
		$this->output=$data=mysql_result($this->result,0,0);
	}
	else
	{
		$this->output="no data found";
	}

	return $this->output;

	

}


public function GetNameData($sql)
{
	
	$this->result=mysql_query($sql);
	$this->numrows=mysql_num_rows($this->result);
	if($this->numrows>0)
	{

		$this->output=$data=mysql_result($this->result,0,0);
	}
	else
	{
		$this->output="no data found";
	}

	return $this->output;

	

}











public function get_field_value($field_name,$field_value,$view_index,$fileld_heding)
{
	
	$ssl="show tables from ".self::DB_NAME;
	$result=mysql_query($ssl);
	
	$this->output="";
	
	$i=0;
	while($rows=mysql_fetch_array($result))
	{ 
		
		$table_name=mysql_tablename($result,$i);
		$ssl2="select * from $table_name";
		$result2=mysql_query($ssl2);
		$database_field_name=mysql_field_name($result2,0);
		
		$d=$c+1;
		
		
		foreach($field_name as $fnamekey=>$field_name_sequence)
		{
			
			if($fileld_heding==$database_field_name&&$database_field_name==$field_name[$fnamekey])
			{
				/*$this->output=$this->output."$fileld_heding==$database_field_name&&$database_field_name==$field_name[$fnamekey]<br>";
				*/$seek_field_name=mysql_field_name($result2,$view_index);
				$this->output=$this->GetNameData("select $seek_field_name from  $table_name where $database_field_name='$field_value'");
			
			
			}
		}
	
		$i++;
	}
	
	
	
	

	return $this->output;

	

}


public function getTableName($table_index)
{
	$ssl="show tables from ".self::DB_NAME;
	$result=mysql_query($ssl);
	
	$this->output="";
	
	$i=0;
	while($rows=mysql_fetch_array($result))
	{ 
		if($table_index==$i)
		{
			return $table_name=mysql_tablename($result,$i);
			
			break;
		}
		$i++;
	}
}



public function getTableKeyName($table_index)
{
	$ssl="show tables from ".self::DB_NAME;
	$result=mysql_query($ssl);
	
	$this->output="";
	
	$i=0;
	while($rows=mysql_fetch_array($result))
	{ 
		if($table_index==$i)
		{
			$table_name=mysql_tablename($result,$i);
			$ssl2="select * from $table_name";
			$result2=mysql_query($ssl2);
			return $database_field_name=mysql_field_name($result2,0);
			break;
		}
		$i++;
	}
}
function show_list($table_name,$id,$name,$optionid)
	{
		
		$this->html_select_tag_start="<select  class=\"selector\"";
		$this->html_select_option_tag_start="<option" ;
		$this->html_select_option_tag_end="</option>" ;
		$this->html_select_tag_end="</select>" ;
		$this->result=$this->run_db("select  $id,$name from ".$table_name);
		
		$this->show_select=$this->html_select_tag_start."id=\"$optionid\" name=\"$optionid\" >";
		if($this->number_of_record($this->result)>0)
		{
			while($this->rs=$this->get_array($this->result))
			{
				$this->show_select=$this->show_select.$this->html_select_option_tag_start."  id=".$optionid.$this->rs[$id]."     value=".$this->rs[$id].">".$this->rs[$name].$this->html_select_option_tag_end;
              	
			}
		}
		else
		{
			 $this->show_select=$this->show_select.$this->html_select_option_tag_start."  value=0>No record found".$this->html_select_option_tag_end;
		}
		$this->show_select=$this->show_select.$this->html_select_tag_end;
		echo $this->show_select;
		
	 }
		
		
		


}



?>