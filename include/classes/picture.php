<?php 

class picture
{
	public $pic;
	public $oldfile;
	public $upload_dir;
	public $extlimit;
	private $file;
	private $size;
	private $size_bytes;
	private $ext;
	private $limitedext;
	public $newpicname;
	private $filename;
	
	
	function save($pic,$oldfile,$upload_dir)
		{
			       
			$size_bytes = 9388608;
		
			$extlimit = "yes";
			$limitedext = array(".gif",".jpg",".GIF",".JPG",".png",".jpeg",".swf",".png",".Png",".PNG",".SWF",".swf");
				  if (!is_dir("$upload_dir")) { 
				 die ("<center>The directory<b>($upload_dir)</b> doesn't exist"); 
				  } 
				  if (!is_writeable("$upload_dir")){ 
					 die ("<center>The directory <b>($upload_dir)</b> is NOT writable, Please CHMOD (777)"); 
				  }
					
					  $size = $pic['size']; 
					  if ($size > $size_bytes) 
					  { 
							$kb = $size_bytes / 1024; 
							echo "<center>File Too Large. File must be <b>$kb</b> KB. <br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>"; 
							exit(); 
					  } 
					  $ext = strrchr($pic['name'],'.'); 
					  if (($extlimit == "yes") && (!in_array($ext,$limitedext))) { 
							echo("<center>Wrong file extension. ");
							echo "<br><a href='javascript:history.go(-1)'>  $ext</a>"; 
							exit(); 
					  } 
					  $filename =  $pic['name']; 
					  if(file_exists($upload_dir.$filename)){ 
							echo "<center>A image with the name <b>$filename </b>already exists change the name of your Image. <br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>"; 
							exit(); 
					  }  
					  if (move_uploaded_file($pic['tmp_name'],$upload_dir.$filename))
					  {
						  chmod($upload_dir.$filename, 0644);
						  	$file =  $oldfile; 
					  if(file_exists($upload_dir.$file)){ 
						@unlink($upload_dir."/".$oldfile);//delete the previous file
						
						}
					  
					 		 $rendname=rand()*1000;
							$ext=strtolower(strrchr($pic['name'],'.'));
							$this->newpicname=$rendname.$ext;
							rename($upload_dir."/".$pic['name'],$upload_dir."/".$this->newpicname);
					  } 
						  else 
						  { 
						  //$this->newpicname=$oldfile;
						  echo "<center>There was a problem saving your file.<br>please try again later <br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>"; 
						   
					  }
					  
					  		
					  
		}
		
		
		function unlink_file($pic)
		{
			if(file_exists($pic))
			{
				@unlink($pic);
				$var="ok";
			}
			else
			{
				$var="err";
			}
			return $var;
		}
}

 
/*
* File: SimpleImage.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 08/11/06
* Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details:
* http://www.gnu.org/licenses/gpl.html
*
*/
 
class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}

/*
how to use

$image = new SimpleImage();
   $image->load('picture.jpg');
   $image->resize(250,400);
   $image->save('picture2.jpg');*/
?>




