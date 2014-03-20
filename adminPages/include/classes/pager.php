<?php
class pager
{
	public $total_records;///ending position
	public $offset;///starting position
	public $limit;///ending position
	public $page;///ending position
	private $total_pages;///ending position
	private $next_page;///ending position
	private $back_page;///ending position
	public $loop;///ending position
	
	
	//------------the html setings------------------//
	
	public $html_master_tag_start;///ending position
	public $html_child_tag_start;///ending position
	public $html_child_tag_end;///ending position
	public $html_master_tag_end;///ending position
	
	
	
	function get_pages($total_records,$limit,$html_master_tag_start,$html_child_tag_start,$html_child_tag_end,$html_master_tag_end,$url,$active_class)
	{
			if($total_records > $limit)
			{
				if(isset($_GET['page']))
							{
								$this->page=$_GET['page'];
								$this->current_page=$_GET['page'];
								$this->offset=($this->page - 1) * $limit;
								
							}
							else
							{
								$this->page=1;
								$this->current_page=1;
								$this->offset=0;
								
							}
						
							
							if($this->offset<0)
							{
								$this->offset=0;
							}
					
					
					$this->back_page=(int)$this->page-(int)1;
	
							$this->limit=$limit;
							$this->total_pages=(int)$total_records/(int)$limit;
							$this->page=max($this->total_pages,1);
							$tp=$this->total_pages;
							$this->page=min(1,$tp);
							$this->next_page=(int)$this->page+(int)1;
			$this->loop=$html_master_tag_start;
		
			if($this->page+1==$this->total_pages)
			{
			
		
				$this->loop=$this->loop.$html_child_tag_start."<a  href=".$url."&limit=".$limit."&page=".$this->next_page.">Next</a>".$html_child_tag_end;
			}
		
		
	
		for($a=1;$a<=$this->total_pages;$a++)
		{
			
			if($this->current_page==$a)
			{
				$active_css="style='color:#f2f2f2;background:silver'";
				
			}
			else
			{
				$active_css="";
			
			}
			
			
			$this->loop=$this->loop.$html_child_tag_start."<a ".$active_css." href=".$url."&limit=".$limit."&page=".$a.">".$a."</a>".$html_child_tag_end;
			
		}
	
		
			
					$this->loop=$this->loop.$html_child_tag_start."<a href=".$url."&limit=".$limit."&page=".$this->back_page.">Back</a>".$html_child_tag_end.$html_master_tag_end;
		}
		else
		{
			$this->loop="";
			$this->page=1;
			$this->current_page=1;
			$this->offset=0;
			$this->limit=$limit;
		}
	
	
	}
	
	
	
	
}


?>

