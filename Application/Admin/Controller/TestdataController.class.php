<?php
namespace Admin\Controller;
use Think\Controller;
class TestdataController extends BaseAuthController
{
    public function index()
    {
		
		$Model=M();
		
        echo "开始执行".date('Y-m-d H:i:s',time())."<br/>";
		
		/*
		 
		$j=200000;
		for($i=0;$i<$j;$i++){
		   $data=$Model->query("select * from szny_emp t
where t.emp_atpstatus is null");
          echo $i."<br/>";
		}
		
	*/
	  $data=$Model->query("select t.*,t1.dev_code,t2.rgn_name from szny_data t left join szny_device t1 on t1.dev_atpid=t.data_deviceid left join szny_region t2 on t2.rgn_atpid=t.data_regionid where t.data_atpstatus is null and t1.dev_atpstatus is null and t2.rgn_atpstatus is null and t.data_regionid='guidE300531E-963D-44B2-A2A0-2A010316' and t.data_dt>='2019-01-03 13:57:25' order by data_dt desc limit 0,10 ");
	//
	echo "ok";
	echo "结束执行".date('Y-m-d H:i:s',time())."<br/>";
	}
}