<?php
require_once("include/dataView/globalView.php");
require_once("include/htmlConfig/configure_html.php");

$data_manupuator=new data_manupuator();
$php=new php_framework();

$data_manupuator->imagedir="../products/custom_products/";

if($_POST['add'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->add(8);
}

if($_POST['update'])
{
	$data_manupuator->_files=$_FILES;
	$data_manupuator->_post=$_POST;
	$data_manupuator->update(8);
}
$generate_data=new generate_data();
?>
<!--<script>getarray(Array(Array('model_name','$model_name'),Array('model_width','300'),Array('model_height','800'),Array('model_date','28-12-2012'),Array('model_isvisible','0'),Array('brands_category_id','2'),Array('model_picture','iphone4.jpg')))</script>
-->


<div class="container_12" > <!--<div class="grid_12"> <h1>Forms</h1> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p> </div>-->
  <div class="grid_12">
    <div class="block-border">
    <div class="block-header">
      <h1>Ready Made Skins</h1>
      <span></span> </div>
    <form id="login-form" class="block-content form"  method="post" enctype="multipart/form-data">
      <input id="ready_skin_id" name="ready_skin_id"  type="hidden">
       <div class="_25">
        <p>
          <label for="model_id" id="model_id_err">Model</label>
    
            <?php $generate_data->show_list("model","model_id","model_name","model_id");?>
       </p>
      </div>
      
<!--     <div class="_25">
        <p>
          <label for="select">Skins</label>
             <?php $generate_data->show_list("skins","skin_id","skin_name","skin_id");?>
       
        </p>
     </div>
-->      
      <div class="_25">
        <p>
        
          <label for="textfield1">Price</label>
          <input id="price" name="price"  class="required text" type="text">
        </p>
      </div>
      <div class="_50">
        <p>
          <label for="modelpic" >Skin Picture</label>
        <div id="picture"> </div>
        <div id="uniform-undefined" class="required uploader">
          <input style="opacity: 0;" size="19" type="file" name="picture" id="picture" >
          <span style="-moz-user-select: none;" required="required" class="filename">No file selected</span><span style="-moz-user-select: none;" class="action">Choose File</span></div>
        </p>
      </div>
      <div class="clear"></div>
      <div class="block-actions">
        <ul class="actions-left">
          <li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Reset</a></li>
        </ul>
        <ul class="actions-right" >
          <li>
            <div id="add">
              <input class="button" value="Add" type="submit" name="add">
            </div>
            <div id="update" style="display:none">
              <input class="button" value="Update" type="submit" name="update">
            </div>
          </li>
        </ul>
      </div>
    </form>
  </div>
</div>
<!--<div class="grid_6"> <div class="block-border"> <div class="block-header"> <h1>Form with Fieldsets</h1><span></span> </div> <form id="form" class="block-content form" action="" method="post"> <fieldset> <legend>Fieldset #1</legend> <div class="_50"> <p><label for="textfield1">Textfield #1</label><input class="text" id="textfield1" type="text"></p> </div> <div class="_50"> <p><label for="textfield2">Textfield #2</label><input class="text" id="textfield2" type="text"></p> </div> <div class="_100"> <p><label for="textfield2">Textfield #3</label><input class="text" id="textfield2" type="text"></p> </div> </fieldset> <fieldset> <legend>Fieldset #2</legend> <p class="inline-small-label"> <label for="field4">Textfield #4</label> <input class="text" name="field4" type="text"> </p> <p class="inline-small-label"> <label for="field5">Textfield #5</label> <input class="text" name="field5" type="text"> </p> </fieldset> <fieldset> <legend>Fieldset #3</legend> <div class="_100"> <p class="inline-small-label"> <span class="label">Select #1</span> <div id="uniform-undefined" class="selector"><span style="-moz-user-select: none;">Lorem Ipsum</span><select style="opacity: 0;"> <option selected="selected">Lorem Ipsum</option> <option>Consetetur Sadipscing</option> <option>Eirmod Tempor</option> </select></div> </p> </div> </fieldset> <div class="block-actions"> <ul class="actions-left"> <li><a class="close-toolbox button red" href="javascript:void(0);">Reset</a></li> </ul> <ul class="actions-right"> <li><a class="close-toolbox button" href="javascript:void(0);">Create it!</a></li> </ul> </div> </form> </div> </div>-->
<div class="clear"></div>
<!--<<div class="grid_6"> <div class="block-border"> <div class="block-header"> <h1>Grid</h1><span></span> </div> <form id="form" class="block-content form" action="" method="post"> <div class="_100"> <p><label for="100">100%</label><input class="text" id="100" type="text"></p> </div> <div class="_50"> <p><label for="50">50%</label><input class="text" id="50" type="text"></p> </div> <div class="_50"> <p><label for="50">50%</label><input class="text" id="50" type="text"></p> </div> <div class="_25"> <p><label for="25">25%</label><input class="text" id="25" type="text"></p> </div> <div class="_75"> <p><label for="75">75%</label><input class="text" id="75" type="text"></p> </div> <div class="_25"> <p><label for="25">25%</label><input class="text" id="25" type="text"></p> </div> <div class="_25"> <p><label for="25">25%</label><input class="text" id="25" type="text"></p> </div> <div class="_25"> <p><label for="25">25%</label><input class="text" id="25" type="text"></p> </div> <div class="_25"> <p><label for="25">25%</label><input class="text" id="25" type="text"></p> </div> <div class="clear"></div> </form> </div> </div> div class="grid_6"> <div class="block-border"> <div class="block-header"> <h1>Inline Form</h1><span></span> </div> <form id="form" class="block-content form" action="" method="post"> <p class="inline-label"> <label for="field1">Inline Label</label> <input class="text" name="field1" type="text"> </p> <p class="inline-medium-label"> <label for="field2">Medium Label</label> <input class="text" name="field2" type="text"> </p> <p class="inline-small-label"> <label for="field3">Small Label</label> <input class="text" name="field3" type="text"> </p> </form> </div> </div>-->
<div class="container_12"> 
  <!--<div class="grid_12">
    <h1>Table</h1>
    <p>This template uses the <a href="http://datatables.net/" target="_blank">DataTables</a>-plugin.</p>
  </div>-->
  <div class="grid_12">
    <div class="block-border">
      <div class="block-header">
        <h1>Records</h1>
        <span></span> </div>
      <div class="block-content">
        <?php
	
'356a192b7913b04c54574d18c28d46e6395428ab';
    	
/*        $generate_data->_column_sequence=array("0","1","2");
		$generate_data->edit_column_sequence=array("0","1","2","3","4");
		$generate_data->_column_foregn_key_index=array(array("1","1"),array("2","1"));
*/	

        $generate_data->_column_sequence=array("1"=>"1","3"=>"picture","4");
		$generate_data->edit_column_sequence=array("0","1","2","3","4");
		$generate_data->_column_foregn_key_index=array(array("1","1"));


		$generate_data->allow_action=true;
        $generate_data->action=array("edit","remove","checkbox");
		$generate_data->touch_html(8);
?>
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
  </div>
</div>
</div>
<script>


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
		
			if(av[0][0]=="model_id")
			{
				
				if(document.getElementById(av[0][0]+av[0][1])==null)
				{
					$("<font color=red size=1px>&nbsp;&nbsp;&nbsp;model not found!</font>").appendTo("#model_id_err");
					
				}
				else
				{
						var sel=document.getElementById(av[0][0]+av[0][1]).selected=true;
				}
				 $.uniform.update("#model_id");
				
			}
			else
			{
				if(av[0][0]=="skin_id")
				{
					var sel=document.getElementById(av[0][0]+av[0][1]).selected=true;
					 $.uniform.update("#skin_id");
					
				}
				else
				{
					if(av[0][0]=="picture")
					{
						document.getElementById(av[0][0]).innerHTML="<img src='../products/custom_products/"+av[0][1]+"' width='150px' alt='../products/custom_products/"+av[0][1]+"'>";
					}
					else
					{
					//	alert(av[0][0]+"=="+av[0][1]);
						document.getElementById(av[0][0]).value=av[0][1];
					}
				}
			}
			
			c++;
			
		}
	
		
	}
	
	
	
</script> 
