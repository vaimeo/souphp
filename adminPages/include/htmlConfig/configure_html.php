<?php
	
class configure_html extends mysql
{
		public $view_html_master_head;
		public $view_html_master_tag1;
		public $view_html_master_tag2;
		public $view_html_master_tag3;
		public $view_html_master_tag4;
		public $view_html_master_foot;
		public $view_html_child_head;
		public $view_html_child_tag1;
		public $view_html_child_tag2;
		public $view_html_child_tag3;
		public $view_html_child_tag4;
		public $view_html_child_foot;
	
	
	public function set_html()
	{
		$this->_view_html_master="<table id='view_table' cellspacing=0 class='table'>";
		$this->_view_html_master_head="<thead>";
		$this->_view_html_master_tag1="<tr>";
		$this->_view_html_master_tag2="<th colspan=1 rowspan='1' class='sorting_desc'>";
		$this->_view_html_master_tag3="</th> ";
		$this->_view_html_master_tag4="</tr>";
		$this->_view_html_master_foot="</thead>";
		$this->_view_html_child_head="<tbody>";
		$this->_view_html_child_tag1="<tr>";
		$this->_view_html_child_tag2="<td>";
		$this->_view_html_child_tag3="</td> ";
		$this->_view_html_child_tag4="</tr>";
		$this->_view_html_child_foot="</tbody>";
		$this->_view_html_foot="</table>";
		
		$this->_view_html_master_tag2_1="<span><a href=''>";
		$this->_view_html_master_tag2_2="</a></span>";
		
		$this->_view_html_master_tag3_1="<input type=\"checkbox\" id=checkall >";
		$this->_view_html_master_tag3_2="<input type=\"checkbox\"   class='checkallelm' value=";
		$this->_view_html_master_tag3_3="<th  colspan=1 rowspan='1'  id=checkallth class='disabled'>";
		$this->_view_html_master_tag3_4="</th>";
	}
	
}

?>