<!DOCTYPE html><html><head>
<title>
 	SouPHP
</title>
<link rel="stylesheet" href="css/style.css">
</head><?php

 require_once("haderFiles.php");
 $data_manupuator=new data_manupuator();

$php=new php_framework();
 if($_POST['add'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->add(0);
	echo "<script>alert('record added');</script>";
}

if($_POST['update'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->update(0);
	echo "<script>alert('record Updated');</script>";
}
 $generate_data=new generate_data();
?>
 <div class="main_container shadow">

 <form  method="post" enctype="multipart/form-data">
<table width="100%"><tr>
<td colspan="2">
<div class="headgrid"><h2>category</h2></div>
</td>
</tr>

			
						<input type="hidden" name="category_id"  id="category_id"  >
				   		
				
			

			<tr>
			 <td>
				<div id="contoler_container">
					<div class="_25">
						<label>name</label>
						<input type="text" name="category_name"  id="category_name"  >
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





<div class="main_container shadow">
<div class="headgrid"><h2>category Records List</h2></div>
<?php
 $generate_data->_column_sequence=array();
				
 $generate_data->edit_column_sequence=array();
				
 $generate_data->allow_action=true;
        		
 $generate_data->action=array("edit","remove","checkbox");
				
 $generate_data->page_url="index.php?";
				
 $generate_data->touch_html(0); 
 ?> </div>





<div class="main_container shadow">
<div class="headgrid"><h2>category Records List</h2></div>
<?php
 $generate_data->_column_sequence=array(1,2);
				
 $generate_data->edit_column_sequence=array(1,2);
				
 $generate_data->allow_action=true;
        		
 $generate_data->action=array("edit","remove","checkbox");
				
 $generate_data->page_url="index.php?";
				
 $generate_data->touch_html(0); 
 ?> </div>