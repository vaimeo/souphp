<?php
$str="<!DOCTYPE html><html><head>
<title>
 	SouPHP
</title>
<link rel=\"stylesheet\" href=\"../css/style.css\">
</head><?php\n";
$str=$str."\n /*in this selction you can include desired files*/ ?>";







require_once("haderFiles.php");

$tableName=$_GET['table'];

$tableindex=$_GET['tableindex'];


if(isset($_POST['createform']))
{
	$filelds=$_POST['fields'];
	
	$d=0;
	$str=$str."\n <div class=\"main_container shadow\">
\n <form  method=\"post\" enctype=\"multipart/form-data\">
<table width=\"100%\"><tr>
<td colspan=\"2\">
<div class=\"headgrid\"><h2>$tableName</h2></div>
</td>
</tr>";

	foreach($filelds as $fvalue)
	{
		 $fvalue;
		$f=explode("-",$fvalue);
		$fieldname=$f[0];
		$fieldIndex=$f[2];
		
		$inputType=$_POST['inputType'][$fieldIndex];
		$fieldnamefull=explode("_",$f[0]);
		$fieldname1=$fieldnamefull[1];
		
		
		
		
		
		if($inputType=="Hidden")
		{
			$wherequery="where $fieldname="."$"."$fieldname";
			$postVariables	=	$postVariables."\n$"."$fieldname="."$"."_POST['$fieldname'];";
			$SqlpostVariables	=	$SqlpostVariables.",$fieldname="."$"."$fieldname";
			
			$str=$str."\n
			
						<input type=\"hidden\" name=\"$fieldname\"  id=\"$fieldname\"  >
				   		
				
			";	
		}
		
		
		if($inputType=="Text")
		{
			$postVariables	=	$postVariables."\n$"."$fieldname="."$"."_POST['$fieldname'];";
			$SqlpostVariables	=	$SqlpostVariables.",$fieldname="."$"."$fieldname";
			
			$str=$str."\n
			<tr>
			 <td>
				<div id=\"contoler_container\">
					<div class=\"_25\">
						<label>$fieldname1</label>
						<input type=\"text\" name=\"$fieldname\"  id=\"$fieldname\"  >
				    </div>
				</div>
			 </td>
			</tr>				
				
			";	
		}
		
			
	
		if($inputType=="File")
		{
			$postVariables	=	$postVariables."\n$"."$fieldname="."$"."_FILES['name']['$fieldname'];";
			$SqlpostVariables	=	$SqlpostVariables.",$fieldname="."$"."$fieldname";
			
			$str=$str."\n
			<tr>
			 <td>
				<div id=\"contoler_container\">
					<div class=\"_25\">
						<label>$fieldname1</label>
						<input type=\"file\" name=\"$fieldname\"    >
						<div id=\"$fieldname\"></div>
				    </div>
				</div>
			 </td>
			</tr>				
				
			";	
		}
				
				
				
		if($inputType=="Select")
		{
			$postVariables	=	$postVariables."\n$"."$fieldname="."$"."_POST['$fieldname'];";
			$SqlpostVariables	=	$SqlpostVariables.",$fieldname="."$"."$fieldname";
			$ftablename=explode("_",$fieldname);
			$ftablename1=$ftablename[0];
			$ftablefieldname=$ftablename[0]."_name";
			$str=$str."\n
			<tr>
			 <td>
				<div id=\"contoler_container\">
					<div class=\"_25\">
						<label>$ftablename1</label>
						<?php \n $"."generate_data->show_list(\"$ftablename1\",\"$fieldname\",\"$ftablefieldname\",\"$fieldname\");?>
					</div>
				</div>
			 </td>
			</tr>				
				
			";	
		}
			
			
			
			
		
		
		
		
		
		$d++;
	}
	
	$str=$str."\n 
 <td>
<div class=\"footgrid\"><input type=\"button\"  value=\"submit\"><input type=\"submit\"  id=\"add\"  value=\"add\" name=\"add\"><input type=\"submit\"  style=\"display:none\" id=\"update\"  value=\"update\" name=\"update\"></div>
</td>
</tr>\n</table>
    \n</form>\n</div>";
	
	
	
$str=$str."\n<?php\n if($"."_POST['add'])
{
			
	$postVariables;
	mysql_query('insert into $tableName  set $SqlpostVariables');
	echo \"<script>alert('record added');</script>\";
}

if($"."_POST['update'])
{
	$postVariables;
	mysql_query('update $tableName  set $SqlpostVariables $wherequery');
	
	echo \"<script>alert('record Updated');</script>\";
}\n?>";

	
	if(!file_exists("adminPages/Procedure/".$tableName.".php"))
	{
		touch("adminPages/Procedure/".$tableName.".php");
	}
	
	
	file_put_contents("adminPages/Procedure/".$tableName.".php",$str);

	$filedone=true;

}










if(isset($_POST['createRecordView']))
{
	
	
	$filelds=$_POST['fields'];
	
	$d=0;
	$str="\n\n\n\n\n\n<div class=\"main_container shadow\">
<div class=\"headgrid\"><h2>$tableName Records List</h2></div>";
	
	foreach($filelds as $fvalue)
	{
		$inputType	=	$_POST['inputType'][$d];
		echo $fieldIndex	=	$_POST['fieldIndex'][$d];
		
		if($fieldIndex!=0)
			{
			
		if($d==1)
		{
			$sequenceArray=$fieldIndex;
		}
		else
		{
				$sequenceArray=$sequenceArray.",".$fieldIndex;
		}
			}
		$d++;
	}
	
			$str=$str."\n<?php\n $"."generate_data->_column_sequence=array($sequenceArray);
				\n $"."generate_data->edit_column_sequence=array($sequenceArray);
				\n $"."generate_data->allow_action=true;
        		\n $"."generate_data->action=array(\"edit\",\"remove\",\"checkbox\");
				\n $"."generate_data->page_url=\"index.php?\";
				\n $"."generate_data->touch_html($tableindex); \n ?> </div>";
		
	
	$fileName="adminPages/".$tableName.".php";
	if(!file_exists($fileName))
	{
		touch($fileName);
	}
	
		$fopen=fopen($fileName,"a")or die("can't open file");
		fwrite($fopen,$str);
		fclose($fopen);
		$filedone=true;
	
	
}



?>
<link rel="stylesheet" href="css/style.css">
</head>

<div class="main_container shadow">

<form  method="post" enctype="multipart/form-data">
<table width="100%" >
<tr>
<td colspan="2">
<div class="headgrid"><h2>Create smart Forms (<?php echo $tableName;?>)</h2>
</div>
<?php
if($filedone)
{
	?>
    Form created <a href="adminPages/Procedure/<?php echo $tableName;?>.php">view page</a>
    <?php
}
?>
</td>
</tr>


<tr>

<td>


<div id="contoler_container">
   
<?php

$ssl="SHOW COLUMNS from $tableName";
	$result=mysql_query($ssl);
	$i=0;
	while($rows=mysql_fetch_array($result))
	{
				$ftype=explode("(",$rows['Type']);	

	?>
           <div class="_100" style="width:97%">

    	<table border="0" width="100%" id="view_table" cellpadding="0" cellspacing="0">
       
        <tr>
        <td width="2%">
        <input type="checkbox" name="fields[]"  value="<?php 
		   echo $rows[0]."-".$ftype[0]."-".$i;
			?>" style="float:left" >
        	
              <input type="hidden" name="fieldIndex[]" value="<?php echo $i; ?>" />
            </td>
        	<td >
        	<label style="float:left"><?php 
		   echo $rows[0]."(".$ftype[0].")";
			?></label>
		</td>

        <td width="20%">
        <select name="inputType[]">
        	<option>Text</option>
        	<option>Hidden</option>
        	<option>File</option>
        	<option>Select</option>
        	<option>Radio</option>
        	<option>Checkbox</option>
            <option>Textarea</option>
        </select>	
        </td>
            
            
        </tr>
        
        </table>
           </div>
      
      <?php
	  $i++;
	}
	  ?>  
</div>
</td>
</tr>
 <tr>
        	<td>
            <input type="text"  placeholder="Files Dir Example folder1/foder1/"  name="filesdir" style="width:52%;">
          
            <input type="submit"  value="Create Form" name="createform">
            <input type="submit"  value="Create Record view " style="width:200px" name="createRecordView">
            </td>
        </tr>
       

</table>

</form>
</div>