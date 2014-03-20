<?php
class php_framework 
{
	private $page;
	private $number;
	private $type;
	public $isvisible;
	public $isvisible_yes;
	public $picture_name;
	public $default_picture;
	public $picture_dir;
	public $getpage;
	public $pageheading;
	public $pagetitle;
	public $metadata;
	
	
	
	
	function check_picture($picture)
	{
		if(file_exists($this->picture_dir.$picture))
		{
			$this->picture_name=$this->picture_dir.$picture;
		}
		else
		{
			$this->picture_name=$this->picture_dir.$this->default_picture;
		}
		
		
	}
	
	
	function get_page_values($arrayindex)
	{
		$pageheading=array(array('heading'=>'Dashboard','title'=>"Dashboard :: Grape - Professional &amp; Flexible Admin Template",'meta'=>"Dashboardmeta :: Grapemeta - Professionalmeta &amp; Flexible Admin Template"),array('heading'=>'model','title'=>"model :: Grape - Professional &amp; Flexible Admin Template"),array('heading'=>'category','title'=>"category:: Grape - Professional &amp; Flexible Admin Template"));
		$innerkey=$pageheading[$arrayindex];
		$this->pageheading=$innerkey['heading'];
		$this->pagetitle=$innerkey['title'];
		$this->metadata=$innerkey['meta'];
	}
	
	
	function include_page()
	{
		if($this->getpage!="")
		{
			$viewpage=$this->getpage.".php";
		}
		else
		{
				$viewpage=$this->makepage($this->getpage);
	 }
		
		return include($viewpage);
	}
	
	public function makepage($getpage)
	{
		return $getpage.".php";
	}
	
	function isvisible_status($number,$type)
	{
		if($type=="view")
		{
			if($number=="1")
			{
				$this->isvisible="yes";
			}
			else
			{
				$this->isvisible="No";
			}
		}
		
		if($type=="edit")
		{
			if($number=="1")
			{
				$this->isvisible_yes="checked";
			}
			else
			{
				$this->isvisible_no="checked";
			}
		}
	}
}
?>