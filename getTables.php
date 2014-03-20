<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main_container shadow">

<form  method="post" enctype="multipart/form-data">
<table width="100%" height="50px">
<tr>
<td colspan="2">
<div class="headgrid"><h2>Create Table</h2></div>
</td>
</tr>
<?php 
require_once("haderFiles.php");


if(isset($_POST['next']))
{
	$table_name=$_POST['table_name'];
	$field_number=$_POST['field_number'];
	
	$field_name=$_POST['field_name'];
	
	$field_type=$_POST['field_type'];
	$field_length=$_POST['field_length'];
	
	$primary=$_POST['pkeyindex'];
	
	$sql="CREATE TABLE IF NOT EXISTS `$table_name` (";
	$sn=0;
	$field_count=count($field_name);
	foreach($field_name as $fn)
	{
	
	
	$field_type1=explode("-",$field_type[$sn]);
	
	$field_type2=$field_type1[0];
	
	
	$field_length1=$field_length[$sn];
	
	
	if($primary[$sn]==$sn)
	{
		$primaryFieldname="$fn";
		$ain="AUTO_INCREMENT";
	}
	else
	{
		$ain="";
	}
	
	
	if($sn==$field_count)
	{
		
	}
	else
	{
		$comma=",";
	}
  
			$sql=$sql."
  `$fn` $field_type2($field_length1) NOT NULL $ain $comma
  ";
  
  
  $sn++;
	}


$sql=$sql."  PRIMARY KEY (`$primaryFieldname`)
) 
ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
";

mysql_query($sql);



	
}



if(isset($_POST['create']))
{
	$table_name=$_POST['table_name'];
	$field_number=$_POST['field_number'];
	$i=0;
	for($i=0;$i<$field_number;$i++)
{
?>
<tr>
<td>
	<div id="contoler_container">
    
    		<div class="_25">
    		<label>Field Name</label>
        <input type="text" id="field_name[<?php echo $i;?>]" name="field_name[<?php echo $i;?>]" required value="<?php echo $table_name."_";?>">
           </div>
  		<div class="_25">
    		<label>datatype</label>
			<select onChange="putlengthvalue(this.value,<?php echo $i;?>)" name="field_type[<?php echo $i;?>]" required>
            	<option>
                 Select One
                </option>
                <option value="varchar-55">
                	varchar
                </option>
            	<option value="int-11">
                	int
                </option>
				            	<option value="enum-'0','1'">
	enum
                </option>

            </select>
           </div>

  		<div class="_25">
    		<label>length</label>
		<input type="text" id="field_lengt<?php echo $i;?>" name="field_length[<?php echo $i;?>]" required>
           </div>
<div class="_25">
    	<table>
        <tr>
        	<td>
        	<label style="float:left">Primary</label>
		</td>
        <td>
        <input type="radio" name="pkeyindex" style="float:left" value="<?php echo $i;?>">
        	</td>
        </tr>
        </table>
        
        
           </div>
           
           <div class="_25">
    	<table>
        <tr>
        	<td>
        	<label style="float:left">foregin</label>
		</td>
        <td>
        <input type="radio" name="foregin[<?php echo $i;?>]" style="float:left">
        	</td>
        </tr>
        </table>
        
           </div>

	</div>
</td>
</tr>


<?php
}
?>



<tr>
     <td>
    <input type="hidden" id="table_name" name="table_name"  value="<?php echo $table_name; ?>">
    	<input type="hidden" id="field_number" name="field_number" value="<?php echo $field_number; ?>">
    <br>
    <input type="submit"  id="next"  value="next" name="next" style="float:left;position:relative;top:15px;left:85px"/>
    </td>
</tr>
<?php
	
}
else
{

?>
<tr>
<td>
	<div id="contoler_container">
    		<div class="_65">
    		<label>Table Name</label>
        <input type="text" id="table_name" name="table_name">
           </div>
  		<div class="_25">
    		<label># of Fields</label>
		<input type="text" id="field_number" name="field_number">
           </div>

	</div>
</td>
</tr>

<tr>
    
 <td>
<input type="submit"  id="create"  value="create" name="create" style="float:left;position:relative;top:15px;left:85px"/>
</td>
</tr>
<?php
}
?>
</table>
</form>
</div>
<br>
<div class="main_container shadow">
<div class="headgrid"><h2>Table List</h2></div>

<table id='view_table' cellspacing=0 class='table'>

<thead>
<tr>
	<th>
    	table name
    </th>
    
	<th>
    	Edit
    </th>
</tr>
</thead>

<tbody>


<?php

	
	$ssl="show tables from souphp";
	$result=mysql_query($ssl);
	$i=0;
	while($rows=mysql_fetch_array($result))
	{
		?>
        <tr>
<td>
	<?php
    	echo $rows[0];
	?>
   </td>
   <td>
    <a href="makepage.php?table=<?php echo $rows[0];?>&tableindex=<?php echo $i; ?>"  target="right_frame">OOP</a>
    <a href="makeProceduralpage.php?table=<?php echo $rows[0];?>&tableindex=<?php echo $i; ?>"  target="right_frame">Procedure
    </a>
</td>
</tr>
	<?php
	$i++;
    }
	
	
?>
</tbody>

</table>
</body>


</div>

<script>
	function putlengthvalue(lengthValue,fileldindexvalue)
	{
			value=lengthValue.split("-");
				document.getElementById("field_lengt"+fileldindexvalue).value=value[1];
	}
</script>