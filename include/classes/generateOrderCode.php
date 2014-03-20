<?php
class generateOrderCode
{
	public $orderCode;

 public function Find_len($value,$len)
	{
		if($len==1)
		{
			$retval="00000".$value;
		}
		if($len==2)
		{
			$retval="0000".$value;
		}
		if($len==3)
		{
			$retval="000".$value;
		}
		if($len==4)
		{
			$retval="00".$value;
		}
		if($len==5)
		{
			$retval="0".$value;
		}
		if($len==6)
		{
			$retval=$value;
		}
		 return $retval;
		
	}
 function GetOrderSerial()
{

		 $sql="select temp_order_code from temp_orders  where temp_order_code!='' order by temp_order_id desc limit 0,1";
		$result=mysql_query($sql);
	
				$result=mysql_query($sql);
		if(mysql_num_rows($result)>0)
		{
			$string=mysql_result($result,0,'temp_order_code');
	
			//$varsp=explode('-',$string);
	
				$varsp=explode('-',$string);
	
			$varoc_serial=$varsp[1];
			$fval=$varoc_serial+1;
	
			$val_len=strlen($fval);
	
			$fval_final=$this->Find_len($fval,$val_len);
		}
		else
		{
	
			$fval_final="000001";
		}
		//O$fval_final="000001";

	$this->orderCode= "OC-".$fval_final;
		
}	

}
?>