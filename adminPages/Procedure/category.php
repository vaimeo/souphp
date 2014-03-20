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
<div class="headgrid"><h2>category</h2></div>
</td>
</tr>

			<tr>
			 <td>
				<div id="contoler_container">
					<div class="_25">
						<label>id</label>
						<input type="text" name="category_id"  id="category_id"  >
				    </div>
				</div>
			 </td>
			</tr>				
				
			

			<tr>
			 <td>
				<div id="contoler_container">
					<div class="_25">
						<label>picture</label>
						<input type="file" name="category_picture"    >
						<div id="category_picture"></div>
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
			
	
$category_id=$_POST['category_id'];
$category_picture=$_FILES['name']['category_picture'];;
	mysql_query('insert into category  set ,category_id=$category_id,category_picture=$category_picture');
	echo "<script>alert('record added');</script>";
}

if($_POST['update'])
{
	
$category_id=$_POST['category_id'];
$category_picture=$_FILES['name']['category_picture'];;
	mysql_query('update category  set ,category_id=$category_id,category_picture=$category_picture ');
	
	echo "<script>alert('record Updated');</script>";
}
?>