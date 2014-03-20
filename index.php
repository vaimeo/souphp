<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>
 	SouPHP The Custom FrameWork :)
</title>
<link rel="stylesheet" href="css/indexstyle.css">
</head>




<form  method="post" enctype="multipart/form-data">
<img src="http://cdn5.iconfinder.com/data/icons//BrushedMetalIcons_meBaze/128/Vimeo-01.png" style="position:absolute;right:10px;width:100px;z-index:00;top:10px">
<table width="100%" border="0" height="auto"  cellspacing="0x" >
<tr>
<td colspan="5" class="headgrid">

	<ul class="vmenu">
    <li>
    	<a href="index.php"> Home</a>
	</li>

    <li>
   	 <a href="how_to_develop.html" target="left_frame"> Documentation </a>
	</li>

    <li>
   	 <a href="#">Test</a>
	</li>
    <li>
   	 <a href="#">How to Use</a>
	</li>
	
    <li>
   	 <a href="getTables.php"  target="left_frame">Smart Tool</a>
	</li>
	
	
    <li>
    	<a href="#">Buy It</a>
	</li>
    </ul></td>
</tr>

<?php
if(isset($_GET['f']))
{
	if(file_exists($_GET['f']))
	{
		include($_GET['f']);

	}
	else
	{
		include("default.html");
	}
}
else
{
	include("default.html");
}
?>
<tr>
	<td colspan="2" align="center"  >
    <div class="headgrid" style="color:white">&copy <b>vajid </b></div>
    </td>
</tr>
</table>
    </form>

