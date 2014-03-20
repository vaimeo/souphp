<?php


class data_manupuator extends mysql
{
	public $_post;
	public $_file;
	public $table_name;
	public $savedPictureName;
	
	
	function correct_encoding($text) {
   // $current_encoding = mb_detect_encoding($text, 'auto');
    $text = iconv($current_encoding, 'UTF-8', $text);
    return $text;
		}

	////////////////////////////////////////***********************ADD*********************************************//////////////////////////
	function add($table_index)
	{
		$this->table_name=$this->table_name=$this->getTableName($table_index);
		$b=0;
foreach($this->_files as $m)
	{
		 $formfilename=key($this->_files);
		 $formfilevalue=$this->_files[$formfilename]['name'];
		 if($formfilevalue!="")
		 {
			 $pic_obj=new picture();
			 $txtpicture=$this->_files[$formfilename];
			$pic_obj->save($txtpicture,"",$this->imagedir);
			$pname=$pic_obj->newpicname;
			
		  if($b==0)
				 {
	 				$picdatabasefieldname=$formfilename;
				 	$picfieldvalue="'".$pname."'";
				 }
				 else
				 {
				 	$picdatabasefieldname=$picdatabasefieldname.",".$formfilename."";
				 	$picfieldvalue=$picfieldvalue.",'".$pname."'";
   			 	}
		
		 }
		 
		 next($this->_files);
		$b++;
	}
	
	
	
	$c=0;
   foreach($this->_post as $p)
	{
	$p	=	$this->correct_encoding($p);
	$formfieldname=key($this->_post);
		if($formfieldname!="update"&&$formfieldname!="add")
   			 {
				
				 if($c==0)
				 {
	 				$databasefieldname=$formfieldname;
				 	$fieldvalue="'".$p."'";
				 }
				 else
				 {
				 	$databasefieldname=$databasefieldname.",".$formfieldname."";
				 	$fieldvalue=$fieldvalue.",'".$p."'";
   			 	}
			 }
			 
		
   			 next($this->_post);
			 $c++;
	}
		
	$sql="insert into ".$this->table_name." (".$databasefieldname.",".$picdatabasefieldname.") values(".$fieldvalue.",".$picfieldvalue.")";
	$mastersql=str_replace(",,",",",$sql);
	$mastersql=str_replace(",)",")",$mastersql);
	$this->run_db($mastersql);
	$this->sql_insert_id=mysql_insert_id();
	
}










































	////////////////////////////////////////***********************Update*********************************************//////////////////////////
	function update($table_index)
	{
		$this->table_name=$this->table_name=$this->getTableName($table_index);








	
	$c=0;
   foreach($this->_post as $p)
	{
$p	=	$this->correct_encoding($p);
	
	$formfieldname=key($this->_post);
	 		if($formfieldname!="update"&&$formfieldname!="add")
   			 {
				
				if($c==1)
				 {
	 				 $databasefieldname=$formfieldname."='".$p."'";
				 }
				 else
				 {
					if($c==0)
					 {
					  	$databasefieldwhere="where ".$formfieldname."='".$p."'";
					 }
					 else
					 {
						$databasefieldname=$databasefieldname.",".$formfieldname."='".$p."'";
					 }
				}
			 }
			 
		
		
   			 next($this->_post);
			 $c++;
	}
		


















$b=0;
		$pic_obj	=	new picture();
		$sqlPic		=	new mysql();
				
	
foreach($this->_files as $m)
	{
		
		
		 $formfilename=key($this->_files);
		 $formfilevalue=$this->_files[$formfilename]['name'];
		 
		 if($formfilevalue!="")
		 {
			 
			 $allpicsname	= array();
			 $oldPicname=$sqlPic->GetNameData("select ".$formfilename." from ".$this->table_name."  ".$databasefieldwhere);
			
					$txtpicture=$this->_files[$formfilename];
					$pic_obj->save($txtpicture,$oldPicname,$this->imagedir);
					$pname=$pic_obj->newpicname;
					$allpicsname[]=$pname;
	
						if($b==0)
						{
							if($this->_files)
							{
									$picdatabasefieldname=",".$formfilename."='".$pname."'";
							}
							else
							{
									$picdatabasefieldname=$formfilename."='".$pname."'";
							}
						}
						else
						{
									$picdatabasefieldname=$picdatabasefieldname.",".$formfilename."='".$pname."'";
						}
	
	
		 }
		 
		 next($this->_files);
		$b++;
	}
	
	

		
	
	
	
	
		
		
		
		
		
		
		
		$sql="update ".$this->table_name." set ".$databasefieldname." ".$picdatabasefieldname." ".$databasefieldwhere;
		
/*	$sql="update ".$this->table_name."set ".$databasefieldname.",".$picdatabasefieldname.") values(".$fieldvalue.",".$picfieldvalue.")";
*/

$mastersql=str_replace(",,",",",$sql);
 	 $mastersql=str_replace(",)",")",$mastersql);
	 $this->run_db($mastersql);
		$this->savedPictureName=$allpicsname;
return $this->savedPictureName;	
}








	
	











 function remove($tableIndex,$unique_id,$fileArray,$fileUrl)
 {
	 $this->table_name=$this->getTableName($tableIndex);
	 $sql="select * from $this->table_name";
	 $result=$this->run_db($sql);
	  $uniqueFieldName=mysql_field_name($result,0); 
	 foreach($fileArray as $tn=>$datatype)
	 {
	 	 $fieldName=mysql_field_name($result,$tn); 
		 $fieldValue=$this->GetNameData("select $fieldName from $this->table_name where $uniqueFieldName='$unique_id' ");
		 
		 
			if(file_exists($fileUrl[$tn].$fieldValue))
		 {
				 unlink($fileUrl[$tn].$fieldValue);
		 }
			 
	 }
 	 $removeSql="delete from $this->table_name where $uniqueFieldName='$unique_id'";
	 $this->run_db($removeSql);

 }

}

?>