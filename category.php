<!DOCTYPE html><?php
require_once("haderFiles.php");

$data_manupuator=new data_manupuator();
$php=new php_framework();

$data_manupuator->imagedir="images/category/";

if($_POST['add'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->add(0);
}

if($_POST['update'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->update(0);
}


$generate_data=new generate_data();


if($_GET['remove'])
{
	$id=mysql_real_escape_string($_GET['remove']);
	$data_manupuator->remove(0,$id,array('3'=>'picture','4'=>'picture','5'=>'picture'),array("3"=>"images/category/","4"=>"images/category/","5"=>"images/category/"));
}

?><head>
<title>
 	SouPHP
</title>
<link rel="stylesheet" href="css/style.css">
</head>

<div class="main_container shadow">


<form  method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
<td colspan="2">
<div class="headgrid"><h2>submit record</h2></div>
</td>
</tr><tr>
<td>
	<div id="contoler_container">
    		<div class="_25">
    		<label>name</label>
			    <input type="hidden" id="category_id" name="category_id">
        <input type="text" id="category_name" name="category_name">
           </div>
            	
		
			<div class="_25">
    			<label>isvisible</label>
				<input type="radio" name="category_isvisible" id="category_isvisible1" value="1">Yes
				<input type="radio" name="category_isvisible" id="category_isvisible0" value="0">No
			</div>		
		
        <div class="_25">
    			<label>Picture</label>
				<input type="file" name="category_picture">
				<div id="category_picture"></div>
		</div>
 </div>
 </td>
 
 <td>
<div class="footgrid"><input type="button"  value="submit"><input type="submit"  id="add"  value="add" name="add"><input type="submit"  style="display:none" id="update"  value="update" name="update"></div>
</td>
</tr>
</table>
    </form>

</div>
<br />
<div class="main_container shadow">
<div class="headgrid"><h2>Records List</h2></div>

        <?php
				$generate_data->_column_sequence_picture_prams=array("3"=>array("images/category/","100px","100px"));
				$generate_data->_column_sequence=array("0","1","2","3"=>"picture");
				$generate_data->edit_column_sequence=array("0","1","2","3");
				//$generate_data->_column_foregn_key_index=array(array("2","3"));
				$generate_data->allow_action=true;
        		$generate_data->action=array("edit","remove","checkbox");
				$generate_data->page_url="index.php?";
				$generate_data->touch_html(0);
			?>
            
            </div>
            
   
<script>
var s = "foo";


	function confirm_Remove(url)
	{
		if(confirm("are you sure?"))
		{
			window.location=url;
		}
	}
	
	
	
	
	function getarray(arrayval)
	{
		
		c=0;
		for(var i in arrayval)
		{
			av=Array (arrayval[c]);
			
			document.getElementById("add").style.display="none";
			document.getElementById("update").style.display="block";
		
			
				
				if(av[0][0]=="category_isvisible")
								{
									
									if(av[0][1]==1)
									{
										document.getElementById("category_isvisible0").checked=false;
										document.getElementById("category_isvisible1").checked=true;
									}
									else
									{
									
										document.getElementById("category_isvisible0").checked=true;
										document.getElementById("category_isvisible1").checked=false;
							
									}
			
								}else
								{
									if(av[0][0]=="category_picture")
									{
										document.getElementById(av[0][0]).innerHTML="<embed src='images/category/"+av[0][1]+"' width='150px' alt='images/category/"+av[0][1]+"'></embed>";
									}
									else
									{
										document.getElementById(av[0][0]).value=av[0][1];
									}
								}
								
			
			c++;
			
		}
	
		
	}
	
	
	
</script> 

