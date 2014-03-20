<!DOCTYPE html><html><head>
<title>
 	SouPHP
</title>
<link rel="stylesheet" href="../css/style.css">
</head><?php

 /*in this selction you can include desired files*/ ?>
 <div class="main_container shadow">

 <form  method="post" enctype="multipart/form-data">
<table width="100%"><tr>
<td colspan="2">
<div class="headgrid"><h2>fruits</h2></div>
</td>
</tr>

			
						<input type="hidden" name="fruits_id"  id="fruits_id"  >
				   		
				
			

			<tr>
			 <td>
				<div id="contoler_container">
					<div class="_25">
						<label>name</label>
						<input type="text" name="fruits_name"  id="fruits_name"  >
				    </div>
				</div>
			 </td>
			</tr>				
				
			

			<tr>
			 <td>
				<div id="contoler_container">
					<div class="_25">
						<label>category</label>
						<input type="file" name="fruits_category"    >
						<div id="fruits_category"></div>
				    </div>
				</div>
			 </td>
			</tr>				
				
			
 
 <td>
<div class="footgrid"><input type="button"  value="submit"><input type="submit"  id="add"  value="add" name="add"><input type="submit"  style="display:none" id="update"  value="update" name="update"></div>
</td>
</tr>
</table>
    
</form>
</div>
<?php
 if($_POST['add'])
{
			
	
$fruits_id=$_POST['fruits_id'];
$fruits_name=$_POST['fruits_name'];
$fruits_category=$_FILES['name']['fruits_category'];;
	mysql_query('insert into fruits  set ,fruits_id=$fruits_id,fruits_name=$fruits_name,fruits_category=$fruits_category');
	echo "<script>alert('record added');</script>";
}

if($_POST['update'])
{
	
$fruits_id=$_POST['fruits_id'];
$fruits_name=$_POST['fruits_name'];
$fruits_category=$_FILES['name']['fruits_category'];;
	mysql_query('update fruits  set ,fruits_id=$fruits_id,fruits_name=$fruits_name,fruits_category=$fruits_category where fruits_id=$fruits_id');
	
	echo "<script>alert('record Updated');</script>";
}
?>