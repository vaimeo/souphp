<?php
class datediff
	{
	
	function getdatediff($condition,$tablename,$datecolumn)
		{ 
			$sqldate="select DATEDIFF(now(),$datecolumn)  AS daysago ,round( DATEDIFF(now(),$datecolumn)*12/365)   AS months  ,round(DATEDIFF(now(),$datecolumn)*24) as hours ,round(DATEDIFF(now(),$datecolumn)*24*60)    AS minuts ,round(DATEDIFF(now(),$datecolumn)*24*60*60)    AS seconds  from $tablename where $condition";
			$dateres=mysql_query($sqldate);
			
			$seconds=mysql_result($dateres,0,'seconds');
			$hours=mysql_result($dateres,0,'hours');
			$minuts=mysql_result($dateres,0,'minuts');
			$days=mysql_result($dateres,0,'daysago');
			$months=mysql_result($dateres,0,'months');
			
			if($days>30)
			{
				$val=$months." ago ";
			}
			else
			{
				
				$val=$days." days  ago";//.$hours." hours ".$minuts."minuts and ".$seconds."seconds ago ";
			}
			return $val;
			
			
			
		}
	}

?>