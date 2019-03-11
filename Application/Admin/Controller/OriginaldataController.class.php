<?php
namespace Admin\Controller;
use Think\Controller;
class OriginaldataController extends BaseAuthController
{
    public function index()
    {
        $this->logSys(session('emp_atpid'),"访问日志","访问页面：【数据管理】 / 【原始数据管理】");
        $Model = M();
        $sql_select ="
        select 
        * 
        from szny_region t
        left join szny_energytyperegion t1 on t.rgn_atpid = t1.etr_regionid
        left join szny_energytype t2 on t2.et_atpid = t1.etr_energytypeid
        where t.rgn_atpstatus is null and t1.etr_atpstatus is null and t2.et_atpstatus is null
        group by t.rgn_atpid
         order by t.rgn_name asc
        ";
        $data_org = $Model->query($sql_select);
//        dump($data_org);
        $treedatas = array();
        foreach ($data_org as $key_org => $value_org) {
            $tdata = array();
            $tdata['id'] = $value_org['rgn_atpid'];
            $tdata['pid'] = $value_org['rgn_pregionid'];
            $tdata['name'] = $value_org['rgn_name'];
            $tdata['open'] = true;
            if('园区' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/park.png";
                $tdata['type'] = '园区';
            }elseif ('楼' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/build.png";
                $tdata['type'] = '楼';
            }elseif ('座' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/floor.png";
                $tdata['type'] = '座';
            }elseif ('单元' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/unit.png";
                $tdata['type'] = '单元';
            }elseif ('层' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/storey.png";
                $tdata['open'] = false;
                $tdata['type'] = '层';
            }elseif ('设备点' == $value_org['rgn_category']){
                if ('电能' == $value_org['et_name']){
                    $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/ele_meter.png";
                }elseif ('水能' == $value_org['et_name']){
                    $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/water_meter.png";
                }elseif ('冷能' == $value_org['et_name']){
                    $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/coldhotmeter.png";
                }elseif ('暖能' == $value_org['et_name']){
                    $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/coldhotmeter.png";
                }
                else{
                    $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/energywater.png";
                }
                $tdata['type'] = '设备点';
            }elseif ('专项能源' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/specialenergy.png";
            }elseif ('制冷机房' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/Refrigerationroom.png";
            }elseif ('配电室' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/Switchroom.png";
            }elseif ('充电桩' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/Chargestation.png";
            }elseif ('锅炉房' == $value_org['rgn_category']){
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/Boilerroom.png";
            }
            else{
                $tdata['icon'] = $this->makeICONPath()."/Public/vendor/zTree_v3/css/zTreeStyle/img/diy/unit.png";
            }
            array_push($treedatas, $tdata);
        }

//        dump($treedatas);
        $this->assign('treedatas',json_encode($treedatas));
        $this->display();
    }
    public function info(){
        $this->logSys(session('emp_atpid'),"访问日志","访问页面：【数据管理】 / 【原始数据管理】 / 【查看】");
        $regionid = I('get.regionid');
        $Model = M();
        //取设备参数
        $colwhere = "";
        if ($regionid) {
            $colwhere="and t3.etr_regionid = '$regionid'";
        }
        $equipmentparameter = $Model->query("
                        select distinct t.dmp_name,t.dmp_shortname from szny_devicemodelparam t
                        left join szny_energytypemodel t1 on t.dmp_devicemodelid = t1.etm_devicemodelid
                        left join szny_energytyperegion t3 on t1.etm_energytypeid = t3.etr_energytypeid
                        where dmp_atpstatus is null $colwhere
                        order by t.dmp_name desc");
        $arr = array();
        foreach ($equipmentparameter as $parkey => $parval) {
            $dataarr = array();
            $dataarr['name'] = $parval['dmp_name'];
            $dataarr['value'] = $parval['dmp_shortname'];
            array_push($arr, $dataarr);
        }
        $this->assign('rgn_atpid',$regionid);
        $this->assign('arr',$arr);
        $this->display();
    }
    public function getInofo(){
        $id= I('get.regionid');
        $queryparam = json_decode(file_get_contents("php://input"), true);
        $Model = M();
        /*  $Result_tree = $this->regionrecursive("guid1A15CA6C-E3D2-4779-BF6B-F6C2D4706C9D");
          foreach($Result_tree as $key=>$val){
             $arr .=$val['id'].',';
          }
    */
        $WhereConditionArray = array();
        $sql_select = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data t
                 left join szny_device t1 on t1.dev_atpid=t.data_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.data_regionid
                ";
        $sql_count = "
                select
                count(1) c
                from szny_data t
                left join szny_device t1 on t1.dev_atpid=t.data_deviceid
                left join szny_region t2 on t2.rgn_atpid=t.data_regionid";


        $sql_select = $this->buildSql($sql_select, "t.data_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t.data_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t1.dev_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t1.dev_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t2.rgn_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t2.rgn_atpstatus is null");
        if($id){
            $sql_select = $this->buildSql($sql_select, "t.data_atpid='$id'");
            $sql_count = $this->buildSql($sql_count, "t.data_atpid ='$id'");
        }else{
            // $sql_select = $this->buildSql($sql_select, "t.data_regionid in('".$arr."')");
            //  $sql_count = $this->buildSql($sql_count, "t.data_regionid  in('".$arr."')");
        }
        if (null != $queryparam['search']) {
            $searchcontent = trim($queryparam['search']);
            $sql_select = $this->buildSql($sql_select, "t2.rgn_name like '%s'");
            $sql_count = $this->buildSql($sql_count, "t2.rgn_name like '%s'");
            array_push($WhereConditionArray, $this->buildSqlLikeContain($searchcontent));
        }

        if (null != $queryparam['sort']) {
            $sql_select = $sql_select . " order by " . $queryparam['sort'] . ' ' . $queryparam['sortOrder'] . ' ';
        } else {
            $sql_select = $sql_select . " order by t.data_atpcreatedatetime asc ";
        }
        if (null != $queryparam['limit']) {

            if ('0' == $queryparam['offset']) {
                $sql_select = $sql_select . " limit " . '0' . ',' . $queryparam['limit'] . ' ';
            } else {
                $sql_select = $sql_select . " limit " . $queryparam['offset'] . ',' . $queryparam['limit'] . ' ';
            }
        }

        $Result = $Model->query($sql_select, $WhereConditionArray);
        //  $this->assign('arr',$arr);
        $Count = $Model->query($sql_count, $WhereConditionArray);

        echo json_encode(array('total' => $Count[0]['c'], 'rows' => $Result));

    }
    public function tableindex()
    {
        $id = I('get.regionid');
        $endtime = $_GET['endtime'];
        $starttime =$_GET['starttime'];
        $Model = M();
        //取设备参数
        $colwhere = "";
        /*if ($id) {
            $colwhere="and t3.etr_regionid = '$id'";
        }*/
       $equipmentparameter = $Model->query("
                                select distinct t.p_name,t.p_shortname,t.p_unit from szny_param t
                                left join szny_energytyperegion t3 on t.p_energytypeid = t3.etr_energytypeid
                                where p_atpstatus is null $colwhere
                                order by t.p_name desc");
        
		$arr = array();
        foreach ($equipmentparameter as $parkey => $parval) {
            $dataarr = array();
            $dataarr['name'] = $parval['p_name']."-".$parval['p_unit'];
            $dataarr['value'] = "value_".$parval['p_shortname'];
            array_push($arr, $dataarr);
        }

       $otherFields=['dbav','dbbv','dbcv','dbsyje','dbzgdje','dbgdcs','dbjcje','dbjcdlsy'];

        $this->assign('rgn_atpid', $id);
        $this->assign('otherFields', $otherFields);
        $this->assign('endtime',$endtime);
        $this->assign('starttime',$starttime);
        $this->assign('arr', $arr);
        $this->display();
    }
    public function getData()
    {
       $regionid = I('get.regionid');
        $queryparam = json_decode(file_get_contents("php://input"), true);
        $Model = M();
        $Model_region = M("region");
        $endtime = $queryparam['endtime'];
        $starttime = $queryparam['starttime'];
        $WhereConditionArray = array();
        $regiondata=$Model_region->where("rgn_atpid='%s'",array($regionid))->find();

      $res = $this->getRegionDevicePoint('rg', $regiondata['rgn_atpid'],'');
   
      foreach ($res as $key => $value) {
            $trgn_atpid[] = "'" . $value['rgn_atpid'] . "'";
      }

      $rgn_atpidlist = implode(',', $trgn_atpid);
	  
        $sql_select = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data2dayexport t
                 left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid
                ";
        $sql_count = "
                select
                count(1) c
                from szny_data2dayexport t
                left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid";

        $sql_select = $this->buildSql($sql_select, "t.d2de_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t.d2de_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t1.dev_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t1.dev_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t2.rgn_atpstatus is null");
        $sql_count = $this->buildSql($sql_count, "t2.rgn_atpstatus is null");

		if($rgn_atpidlist){
			$sql_select = $this->buildSql($sql_select, "t.d2de_regionid in(".$rgn_atpidlist.")");
			$sql_count = $this->buildSql($sql_count, "t.d2de_regionid  in(".$rgn_atpidlist.")");
		}elseif($regionid) {
			$sql_select = $this->buildSql($sql_select, "t.d2de_regionid='$regionid'");
			$sql_count = $this->buildSql($sql_count, "t.d2de_regionid ='$regionid'");
		}
            //$sql_select = $this->buildSql($sql_select, "t.d2de_regionid='$regionid'");
            //$sql_count = $this->buildSql($sql_count, "t.d2de_regionid ='$regionid'");
            
		if (null != $queryparam['search']) {
            $searchcontent = trim($queryparam['search']);
            $sql_select = $this->buildSql($sql_select, "t2.rgn_name like '%s'");
            $sql_count = $this->buildSql($sql_count, "t2.rgn_name like '%s'");
            array_push($WhereConditionArray, $this->buildSqlLikeContain($searchcontent));
        }

        if($endtime && $starttime){
            $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$starttime."' and t.d2de_dt<='".$endtime."'");
            $sql_count = $this->buildSql($sql_count, "t.d2de_dt>='".$starttime."' and t.d2de_dt<='".$endtime."'");
        }else{
            $olddata=date('Y-m-d',strtotime("-3 month"));		
            $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$olddata."'");
           $sql_count = $this->buildSql($sql_count, "t.d2de_dt>='".$olddata."'");
        }

        if (null != $queryparam['sort']) {
            $sql_select = $sql_select . " order by " . $queryparam['sort'] . ' ' . $queryparam['sortOrder'] . ' ';
        } else {
            $sql_select = $sql_select . " order by t.d2de_dt desc ";
        }
		
        if (null != $queryparam['limit']) {

            if ('0' == $queryparam['offset']) {
                $sql_select = $sql_select . " limit " . '0' . ',' . $queryparam['limit'] . ' ';
            } else {
                $sql_select = $sql_select . " limit " . $queryparam['offset'] . ',' . $queryparam['limit'] . ' ';
            }
        }

		$Count = $Model->query($sql_count, $WhereConditionArray);
        if($Count[0]['c']>0){
			
			$Result = $Model->query($sql_select, $WhereConditionArray);
			
			$sql_select_rel = "
select * from szny_param t where t.p_atpstatus is null
order by t.p_atpsort asc ";

        $Result_rel = $Model->query($sql_select_rel);

        foreach ($Result as $k => &$v) {
            foreach ($Result_rel as $rmk => $rmv) {
                if ("累计值" == $rmv['p_category']) {
                    $v['value_' . $rmv['p_shortname']] =
                        "累积:<font color='red'>" . $v['d2de_' . $rmv['p_shortname'] . "accu"] . "</font>";
                } else {
                    $v['value_' . $rmv['p_shortname']] =
                        "最小:<font color='red'>" . $v['d2de_' . $rmv['p_shortname'] . "min"] . "</font><br/>" .
                        "最大:<font color='red'>" . $v['d2de_' . $rmv['p_shortname'] . "max"] . "</font><br/>" .
                        "均值:<font color='red'>" . $v['d2de_' . $rmv['p_shortname'] . "avg"] . "</font><br/>";
                }
            }
        }

	}else{
		$Result=[];
    }
        echo json_encode(array('total' => $Count[0]['c'], 'rows' => $Result));
    }

/*public function exp()
    {
        $regionid = I('get.rgn_atpid');
        $queryparam = json_decode(file_get_contents("php://input"), true);
        $Model = M();
		$Model_region = M("region");
		ini_set("memory_limit", "-1"); 
        set_time_limit(0); 
		
		$regiondata=$Model_region->where("rgn_atpid='%s'",array($regionid))->find();

        $res = $this->getRegionDevicePoint('rg', $regiondata['rgn_atpid'],'');
        
        foreach ($res as $key => $value) {
            $trgn_atpid[] = "'" . $value['rgn_atpid'] . "'";
        }
        $rgn_atpidlist = implode(',', $trgn_atpid);
		
		$naem='原始数据导出'.date('Y-m-d',time());
        $endtime = $_GET['endtime'];
        $starttime = $_GET['starttime'];
        $WhereConditionArray = array();
        $sql_select = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data2dayexport t
                 left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid
                ";
      
        $sql_select = $this->buildSql($sql_select, "t.d2de_atpstatus is null");
        
        $sql_select = $this->buildSql($sql_select, "t1.dev_atpstatus is null");
       
        $sql_select = $this->buildSql($sql_select, "t2.rgn_atpstatus is null");
       
    
        if($rgn_atpidlist){
            $sql_select = $this->buildSql($sql_select, "t.d2de_regionid in(".$rgn_atpidlist.")");
        }elseif($regionid) {
            $sql_select = $this->buildSql($sql_select, "t.d2de_regionid='$regionid'");
        }
		
        if($endtime && $starttime){
             $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$starttime."' and t.d2de_dt<='".$endtime."'");       
        }else{
             $olddata=date('Y-m-d',strtotime("-3 month"));	
             $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$olddata."'");
        }
 
        $sql_select = $sql_select . " order by t.d2de_dt desc ";

		$Result = $Model->query($sql_select, $WhereConditioArray);
	
		   $sql_select_rel = "
select * from szny_param t where t.p_atpstatus is null
order by t.p_atpsort asc ";
        $Result_rel = $Model->query($sql_select_rel);
     
//        dump($Result_rel);
       foreach ($Result as $k => &$v) {
            foreach ($Result_rel as $rmk => $rmv) {
                if ("累计值" == $rmv['p_category']) {
                    $v['value_' . $rmv['p_shortname']] =
                        "累积:" . $v['d2d_' . $rmv['p_shortname'] . "accu"];
                } else {
                    $v['value_' . $rmv['p_shortname']] =
                        "最小:" .$v['d2d_' . $rmv['p_shortname'] . "min"].
                        "最大:" .$v['d2d_' . $rmv['p_shortname'] . "max"].
                        "均值:" . $v['d2d_' . $rmv['p_shortname'] . "avg"];
                }
            }
       }
echo "<pre>";
var_dump($Result);
die;
	   $data=array();
       foreach($Result as $orderkey=>$orderval){
            $data[$orderkey]['rgn_name']=$orderval['rgn_name'];
            $data[$orderkey]['dev_code']=$orderval['dev_code'];
            $data[$orderkey]['d2d_dt']=$orderval['d2d_dt'];

            $data[$orderkey]['value_sysl']=$orderval['value_sysl'];
            $data[$orderkey]['value_ynl']=$orderval['value_ynl'];
            $data[$orderkey]['value_yll']=$orderval['value_yll'];

            $data[$orderkey]['value_df']=$orderval['value_df'];
            $data[$orderkey]['value_da']=$orderval['value_da'];
            $data[$orderkey]['value_dgl']=$orderval['value_dgl'];
        }

       $array=array(
                'rgn_name'=>'设备名',
                'dev_code'=>'设备编号',
                'd2d_dt'=>'时间',
                'value_sysl'=>'用水量-吨(T)',
                'value_ynl'=>'用暖量-千瓦时(Kwh)',
                'value_yll'=>'用冷量-千瓦时(Kwh)',
                'value_df'=>'电压-伏特(V)',
                'value_da'=>'电流-安培(A)',
                'value_dgl'=>'电量值-千瓦时(Kwh)'
             );
        array_unshift($data,$array);
        foreach ($data as $i => $row) {
            foreach ($row as $j => $v) {
               // $row[$j] = iconv('utf-8', 'gb2312', $v);
                 $row[$j] =  $v;
            }
            $data[$i] = $row;
        }

        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename='.$naem.'.csv');
        $output = fopen('php://output', 'w');
        foreach($data as $row)
        {
            fputcsv($output, $row);
        }
        exit();
		
    }
	*/
	function exp(){
		$regionid = I('get.rgn_atpid');
        $queryparam = json_decode(file_get_contents("php://input"), true);
        $Model = M();
        $Model_region = M("region");
        $endtime = $queryparam['endtime'];
        $starttime = $queryparam['starttime'];
        $WhereConditionArray = array();
        $regiondata=$Model_region->where("rgn_atpid='%s'",array($regionid))->find();

        $res = $this->getRegionDevicePoint('rg', $regiondata['rgn_atpid'],'');
   
		foreach ($res as $key => $value) {
            $trgn_atpid[] = "'" . $value['rgn_atpid'] . "'";
		}

		$rgn_atpidlist = implode(',', $trgn_atpid);
	    
		$naem='原始数据导出'.date('Y-m-d',time());
	  
        $sql_select = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data2dayexport t
                 left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid
                ";
        
        $sql_select = $this->buildSql($sql_select, "t.d2de_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t1.dev_atpstatus is null");
        $sql_select = $this->buildSql($sql_select, "t2.rgn_atpstatus is null");

		if($rgn_atpidlist){
			$sql_select = $this->buildSql($sql_select, "t.d2de_regionid in(".$rgn_atpidlist.")");
		}elseif($regionid) {
			$sql_select = $this->buildSql($sql_select, "t.d2de_regionid='$regionid'");
		}

        if($endtime && $starttime){
            $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$starttime."' and t.d2de_dt<='".$endtime."'");
            $sql_count = $this->buildSql($sql_count, "t.d2de_dt>='".$starttime."' and t.d2de_dt<='".$endtime."'");
        }else{
            $olddata=date('Y-m-d',strtotime("-3 month"));		
            $sql_select = $this->buildSql($sql_select, "t.d2de_dt>='".$olddata."'");
           $sql_count = $this->buildSql($sql_count, "t.d2de_dt>='".$olddata."'");
        }

        if (null != $queryparam['sort']) {
            $sql_select = $sql_select . " order by " . $queryparam['sort'] . ' ' . $queryparam['sortOrder'] . ' ';
        } else {
            $sql_select = $sql_select . " order by t.d2de_dt desc ";
        }
		
        if (null != $queryparam['limit']) {

            if ('0' == $queryparam['offset']) {
                $sql_select = $sql_select . " limit " . '0' . ',' . $queryparam['limit'] . ' ';
            } else {
                $sql_select = $sql_select . " limit " . $queryparam['offset'] . ',' . $queryparam['limit'] . ' ';
            }
        }
		
		$Result = $Model->query($sql_select, $WhereConditionArray);
			
			$sql_select_rel = "
select * from szny_param t where t.p_atpstatus is null
order by t.p_atpsort asc ";

        $Result_rel = $Model->query($sql_select_rel);

        foreach ($Result as $k => &$v) {
            foreach ($Result_rel as $rmk => $rmv) {
                if ("累计值" == $rmv['p_category']) {
                    $v['value_' . $rmv['p_shortname']] =
                        "累积:" . $v['d2de_' . $rmv['p_shortname'] . "accu"];
                } else {
                    $v['value_' . $rmv['p_shortname']] =
                        "最小:" . $v['d2de_' . $rmv['p_shortname'] . "min"] . 
                        "最大:" . $v['d2de_' . $rmv['p_shortname'] . "max"] . 
                        "均值:" . $v['d2de_' . $rmv['p_shortname'] . "avg"];
                }
            }
        }
        $data=array();
    foreach($Result as $orderkey=>$orderval){
            $data[$orderkey]['rgn_name']=$orderval['rgn_name'];
            $data[$orderkey]['dev_code']=$orderval['dev_code'];
            $data[$orderkey]['d2d_dt']=$orderval['d2d_dt'];

            $data[$orderkey]['value_sysl']=$orderval['value_sysl'];
            $data[$orderkey]['value_ynl']=$orderval['value_ynl'];
            $data[$orderkey]['value_yll']=$orderval['value_yll'];

            $data[$orderkey]['value_df']=$orderval['value_df'];
            $data[$orderkey]['value_da']=$orderval['value_da'];
            $data[$orderkey]['value_dgl']=$orderval['value_dgl'];
    }

       $array=array(
                'rgn_name'=>'设备名',
                'dev_code'=>'设备编号',
                'd2d_dt'=>'时间',
                'value_sysl'=>'用水量-吨(T)',
                'value_ynl'=>'用暖量-千瓦时(Kwh)',
                'value_yll'=>'用冷量-千瓦时(Kwh)',
                'value_df'=>'电压-伏特(V)',
                'value_da'=>'电流-安培(A)',
                'value_dgl'=>'电量值-千瓦时(Kwh)'
             );
        array_unshift($data,$array);
        foreach ($data as $i => $row) {
            foreach ($row as $j => $v) {
               // $row[$j] = iconv('utf-8', 'gb2312', $v);
                 $row[$j] =  $v;
            }
            $data[$i] = $row;
        }

        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename='.$naem.'.csv');
        $output = fopen('php://output', 'w');
        foreach($data as $row)
        {
            fputcsv($output, $row);
        }
        exit();		
	}
	function monthexp(){
		$regionid = I('get.rgn_atpid');
        $queryparam = json_decode(file_get_contents("php://input"), true);
        $Model = M();
        $Model_region = M("region");
        $endtime = $_GET['endtime'];
        $starttime = $_GET['starttime'];
        $WhereConditionArraystart = array();
		$WhereConditionArrayend = array();
        $regiondata=$Model_region->where("rgn_atpid='%s'",array($regionid))->find();

        $res = $this->getRegionDevicePoint('rg', $regiondata['rgn_atpid'],'');
   
		foreach ($res as $key => $value) {
            $trgn_atpid[] = "'" . $value['rgn_atpid'] . "'";
		}

		$rgn_atpidlist = implode(',', $trgn_atpid);
		$naem='月统计数据导出'.date('Y-m-d',time());
	    
		$sql_endselect = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data2dayexport t
                 left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid
                ";
        
        $sql_endselect = $this->buildSql($sql_endselect, "t.d2de_atpstatus is null");
        $sql_endselect = $this->buildSql($sql_endselect, "t1.dev_atpstatus is null");
        $sql_endselect = $this->buildSql($sql_endselect, "t2.rgn_atpstatus is null");

		if($rgn_atpidlist){
			$sql_endselect = $this->buildSql($sql_endselect, "t.d2de_regionid in(".$rgn_atpidlist.")");
		}elseif($regionid) {
			$sql_endselect = $this->buildSql($sql_endselect, "t.d2de_regionid='$regionid'");
		}

        $sql_endselect = $this->buildSql($sql_endselect, "t.d2de_dt='".$endtime."'");
           
        if (null != $queryparam['sort']) {
            $sql_endselect = $sql_endselect . " order by " . $queryparam['sort'] . ' ' . $queryparam['sortOrder'] . ' ';
        } else {
            $sql_endselect = $sql_endselect . " order by t.d2de_dt desc ";
        }

		$Resultend = $Model->query($sql_endselect, $WhereConditionArrayend);


		$sql_startselect = "
                select
                 t.*,t1.dev_code,t2.rgn_name
                 from szny_data2dayexport t
                 left join szny_device t1 on t1.dev_atpid=t.d2de_deviceid
                 left join szny_region t2 on t2.rgn_atpid=t.d2de_regionid
                ";
        
        $sql_startselect = $this->buildSql($sql_startselect, "t.d2de_atpstatus is null");
        $sql_startselect = $this->buildSql($sql_startselect, "t1.dev_atpstatus is null");
        $sql_startselect = $this->buildSql($sql_startselect, "t2.rgn_atpstatus is null");

		if($rgn_atpidlist){
			$sql_startselect = $this->buildSql($sql_startselect, "t.d2de_regionid in(".$rgn_atpidlist.")");
		}elseif($regionid) {
			$sql_startselect = $this->buildSql($sql_startselect, "t.d2de_regionid='$regionid'");
		}

        $sql_startselect = $this->buildSql($sql_startselect, "t.d2de_dt='".$starttime."'");
           
        if (null != $queryparam['sort']) {
            $sql_startselect = $sql_startselect . " order by " . $queryparam['sort'] . ' ' . $queryparam['sortOrder'] . ' ';
        } else {
            $sql_startselect = $sql_startselect . " order by t.d2de_dt desc ";
        }
	
		$Resultstart = $Model->query($sql_startselect, $WhereConditionArray);

		
			$sql_select_rel = "
select * from szny_param t where t.p_atpstatus is null
order by t.p_atpsort asc ";

        $Result_rel = $Model->query($sql_select_rel);

        foreach ($Resultend as $k => &$v) {
            foreach ($Result_rel as $rmk => $rmv) {
                if ("累计值" == $rmv['p_category']) {
                    $v['value_' . $rmv['p_shortname']] = $v['d2de_' . $rmv['p_shortname'] . "accu"];
                }
            }
        }
		
		foreach ($Resultstart as $k => &$v) {
            foreach ($Result_rel as $rmk => $rmv) {
                if ("累计值" == $rmv['p_category']) {
                    $v['value_' . $rmv['p_shortname']] = $v['d2de_' . $rmv['p_shortname'] . "accu"];
                }
            }
        }

        $data=array();

		foreach($Resultstart as $startkey=>$startval){
			$datas=array();
			foreach($Resultend as $endkey=>$endval){
	
				if($startval['d2de_deviceid']==$endval['d2de_deviceid'] && $startval['d2de_regionid']==$endval['d2de_regionid']){
					$datas['rgn_name']=$startval['rgn_name'];
					$datas['dev_code']=$startval['dev_code'];
					$datas['d2de_dt']=$startval['d2de_dt']."到".$endval['d2de_dt'];    //日期
                    
					if(!empty($startval['value_sysl']) && !empty($endval['value_sysl'])){
						$datas['value_sysl']='起止数量:'.$startval['value_sysl']."终止数量:".$endval['value_sysl']; //用水量-吨 起止数量
					
						$datas['sumsysl']=$endval['value_sysl']-$startval['value_sysl']; //用水量-吨 总数量
					}else{
						$datas['value_sysl']="起止数量:0终止数量:0"; //用水量-吨 起止数量
						$datas['sumsysl']=0; //用水量-吨 总数量
					}
					if(!empty($startval['value_ynl']) && !empty($endval['value_ynl'])){
						$datas['value_ynl']='起止数量:'.$startval['value_ynl']."终止数量:".$endval['value_ynl']; //用暖量-千瓦时 起止数量
						$datas['sumynl']=$endval['value_ynl']-$startval['value_ynl']; //用暖量-千瓦时 总数量
					}else{
						$datas['value_ynl']="起止数量:0终止数量:0"; //用暖量-千瓦时 起止数量
						$datas['sumynl']=0; //用暖量-千瓦时 总数量
					}	
					if(!empty($startval['value_yll']) && !empty($endval['value_yll'])){
						$datas['value_yll']='起止数量:'.$startval['value_yll']."终止数量:".$endval['value_yll'];//用冷量-千瓦时 起止数量
						$datas['sumyll']=$endval['value_yll']-$startval['value_yll'];		//用冷总量-千瓦时
					}else{
						$datas['value_yll']="起止数量:0终止数量:0";//用冷量-千瓦时 起止数量
						$datas['sumyll']=0;		//用冷总量-千瓦时
					}
					if(!empty($startval['value_df']) && !empty($endval['value_df'])){
						$datas['value_df']='起止数量:'.$startval['value_df']."终止数量:".$endval['value_df']; //电压-伏特(V)起止数量
						$datas['sumdf']=$endval['value_df']-$startval['value_df']; //用电用量
					}else{
						$datas['value_df']="起止数量:0终止数量:0"; //电压-伏特(V)起止数量
						$datas['sumdf']=0; //用电用量
					}
					if(!empty($startval['value_da']) && !empty($endval['value_da'])){
						$datas['value_da']='起止数量:'.$startval['value_da']."终止数量:".$endval['value_da']; //电流-安培(A)
						$datas['sumda']=$endval['value_da']-$startval['value_da'];    //电流总量
					}else{
						$datas['value_da']="起止数量:0终止数量:0"; //电流-安培(A)
						$datas['sumda']=0;    //电流总量
					}
					if(!empty($startval['value_dgl']) && !empty($endval['value_dgl'])){ 
						$datas['value_dgl']='起止数量:'.$startval['value_dgl']."终止数量:".$endval['value_dgl'];	// 电量值 起止数量
						$datas['sumdgl']=$startval['value_dgl']."-".$endval['value_dgl'];	// 电量总值 
					}else{
						$datas['value_dgl']="起止数量:0终止数量:0";	// 电量值 起止数量
						$datas['sumdgl']=0;	// 电量总值 
					}
					
				}	
				
			}
	
			array_push($data,$datas);
		}

         $array=array(
                'rgn_name'=>'设备名',
                'dev_code'=>'设备编号',
                'd2de_dt'=>'起止时间',
				
                'value_sysl'=>'用水量起止吨数(T)',
				'sumsysl'=>'用水总量(T)',
				
                'value_ynl'=>'用暖量起止数(Kwh)',
				'sumynl'=>'用暖总量(Kwh)',
				
                'value_yll'=>'用冷量起止数(Kwh)',
				'sumyll'=>'用冷总量(Kwh)',
				
                'value_df'=>'电压起止数(V)',
				'sumdf'=>'电压总量(V)',

                'value_da'=>'电流起止数',
				'value_da'=>'电流总量',
				
                'value_dgl'=>'电量值起止数',
				'value_dgl'=>'电量总值'
             );
		array_unshift($data,$array);
		
        foreach ($data as $i => $row) {
            foreach ($row as $j => $v) {
               // $row[$j] = iconv('utf-8', 'gb2312', $v);
                 $row[$j] =  $v;
            }
            $data[$i] = $row;
        }

        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename='.$naem.'.csv');
        $output = fopen('php://output', 'w');
        foreach($data as $row)
        {
            fputcsv($output, $row);
        }
        exit();			 
			 
	}
}