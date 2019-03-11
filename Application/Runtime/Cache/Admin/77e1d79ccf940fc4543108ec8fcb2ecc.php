<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link href="/Public/vendor/bootstrap-table/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<link href="/Public/adminframework/css/font-awesome.css?v=4.4.0" rel="stylesheet">
	<link href="/Public/adminframework/css/plugins/chosen/chosen.css" rel="stylesheet">
	<link href="/Public/adminframework/css/plugins/switchery/switchery.css" rel="stylesheet">
	<link href="/Public/vendor/bootstrap-table/bootstrap-table/src/bootstrap-table.css" rel="stylesheet" >
	<link href="/Public/adminframework/css/animate.css" rel="stylesheet">
	<link href="/Public/adminframework/css/style.css?v=4.0.0" rel="stylesheet">
	<link rel="stylesheet" href="/Public/vendor/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
	<link href="/Public/vendor/diy_component/func_scrolltab/atppagetab.css" rel="stylesheet">
	<base target="_blank">
	<style>
		.wrapper-content {
			padding: 0px;
		}
		.wrapper {
			padding: 0px;
		}

		.ibox-content {
			border-width: 0px 0px;
			padding: 0px 0px 0px 0px
		}
		.gray-bg {
			background-color: #ffffff;
		}
		.table
		{
			max-width: none;;
		}
		* {
			margin: 0;
			padding: 0;
		}
		.tabs .atp-nav {
			border-left: 1px solid #F8F7EE;
			height: 40px;
		}
		.tabs .atp-nav li {
			float: left;
			width: 100px;
			border-top: 1px solid #F8F7EE;
			border-right: 1px solid #F8F7EE;
			list-style: none;
		}
		.tabs .atp-nav li a {
			display: inline-block;
			width: 100%;
			height: 40px;
			background-color: #F8F7EE;
			text-align: center;
			line-height: 40px;
			font-size: 16px;
			color: #ccc;
			text-decoration: none;
		}
		.tabs .atp-nav li a:hover {
			background-color: #fff;
			color: #000;
		}

		.tabs .atp-nav li a.selected {
			background-color: #fff;
			color: #000;
			font-size: 18px;
		}

        .table
        {
            max-width: none;
        }
        .form-control
        {
            display: inline-block;
            margin-bottom: 5px;
        }
        .float-e-margins .btn
        {
            margin-bottom: 1px;
        }
        .control-label
        {
            display: inline-block;
            /*margin-bottom: 5px;;*/
        }
        #atpbiztable tr:hover{
        	cursor: pointer;
        }
	</style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox float-e-margins">
		<div class="ibox-content">
            <?php if($_GET['regiontype']== 'rg'): if($_GET['tabshow']!= 'false'): ?><div class="content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i></button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <?php if($_GET['regionlevel']== 'regionroot'): ?><!--根节点-->
                    <a href='/index.php/Admin/RgGeneral/indexregionroot?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>
                <?php if($_GET['regionlevel']== 'region'): ?><!--非根节点-->
                    <a href='/index.php/Admin/RgGeneral/indexregion?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>
                <?php if($_GET['regionlevel']== 'devicepoint'): ?><!--设备点-->
                    <a href='/index.php/Admin/RgGeneral/indexdevicepoint?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>

                <a href='/index.php/Admin/RgDev?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=1&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>设备状态</a>
                <?php if($_SESSION['is_hnwl']!= ''): ?><a href='/index.php/Admin/RgItemAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=2&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>分项报表</a>
                    <a href='/index.php/Admin/RgAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=3&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a>
                    <a href='/index.php/Admin/RgReport?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=4&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>报表</a>
                    <a href='/index.php/Admin/RgContrastAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=5&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>同比环比</a>
                    <a href='/index.php/Admin/RgOriginalData/Twicedatad?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=6&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史采集数据</a>

                    <?php else: ?>
                    <?php if($_SESSION['role_iskfs']== false): ?><a href='/index.php/Admin/RgAlarmConfirm?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=2&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self"  class='J_menuTab'>待确认报警</a>
                        <a href='/index.php/Admin/RgRepairAdd?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=3&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>添加维修单</a>
                        <a href='/index.php/Admin/RgRepairDist?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=4&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>待接维修单</a>
                        <a href='/index.php/Admin/RgRepairProcess?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=5&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>待处理维修单</a>
                        <a href='/index.php/Admin/RgAlarmHistory?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=6&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史报警记录</a>
                        <a href='/index.php/Admin/RgRepairHistory?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=7&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史维修记录</a>
                        <a href='/index.php/Admin/RgItemAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=8&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>分项报表</a>
                        <!-- <?php if($_GET['regtype']== 'DEVICE'): else: ?>
                            <a href='/index.php/Admin/RgAnalyzes?regtype=<?php echo ($_GET['regtype']); ?>&tabindex=9&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a><?php endif; ?> -->
                        <a href='/index.php/Admin/RgAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=9&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a>
                        <a href='/index.php/Admin/RgReport?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=10&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>报表</a>
                        <a href='/index.php/Admin/RgContrastAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=11&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>同比环比</a>
                        <a href='/index.php/Admin/RgEngeryPlan?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=12&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>能源计划</a>
                        <a href='/index.php/Admin/RgExceptionDayQs?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=13&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>日报缺失</a>
                        <a href='/index.php/Admin/RgExceptionDayEc?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=14&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>日报异常</a>
                        <a href='/index.php/Admin/RgExceptionHourQs?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=15&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>时报缺失</a>
                        <a href='/index.php/Admin/RgExceptionHourEc?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=16&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>时报异常</a>
                        <a href='/index.php/Admin/RgOriginalData/Twicedatad?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=17&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史采集数据</a>
                        <!--<a href='/index.php/Admin/RgSample/index?regtype=<?php echo ($_GET['regtype']); ?>&tabindex=18&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>示例:雇员管理</a>--><?php endif; endif; ?>

            </div>
        </nav>
        <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
    </div><?php endif; endif; ?>
<?php if($_GET['regiontype']== 'sn'): if($_GET['tabshow']!= 'false'): ?><div class="content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i></button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">



                <?php if($_GET['regionlevel']== 'regionroot'): ?><!--根节点-->
                    <a href='/index.php/Admin/RgGeneral/indexregionroot?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>
                <?php if($_GET['regionlevel']== 'region'): ?><!--非根节点-->
                    <a href='/index.php/Admin/RgGeneral/indexregion?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>
                <?php if($_GET['regionlevel']== 'devicepoint'): ?><!--设备点-->
                    <a href='/index.php/Admin/RgGeneral/indexdevicepoint?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=0&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>综合信息</a><?php endif; ?>
                <!--<a href='/index.php/Admin/RgGeneral/indexsn?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=1&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>能源鸟瞰</a>-->
                <a href='/index.php/Admin/RgDev?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=1&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>设备状态</a>

                <?php if($_SESSION['is_hnwl']!= ''): ?><a href='/index.php/Admin/RgItemAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=2&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>分项报表</a>
                    <a href='/index.php/Admin/RgAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=3&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a>
                    <a href='/index.php/Admin/RgReport?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=4&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>报表</a>
                    <a href='/index.php/Admin/RgContrastAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=5&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>同比环比</a>
                    <a href='/index.php/Admin/RgOriginalData/Twicedatad?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=6&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史采集数据</a>

                    <?php else: ?>
                    <?php if($_SESSION['role_iskfs']== false): ?><a href='/index.php/Admin/RgAlarmConfirm?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=2&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self"  class='J_menuTab'>待确认报警</a>
                        <a href='/index.php/Admin/RgRepairAdd?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=3&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>添加维修单</a>
                        <a href='/index.php/Admin/RgRepairDist?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=4&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>待接维修单</a>
                        <a href='/index.php/Admin/RgRepairProcess?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=5&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>待处理维修单</a>
                        <a href='/index.php/Admin/RgAlarmHistory?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=6&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史报警记录</a>
                        <a href='/index.php/Admin/RgRepairHistory?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=7&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史维修记录</a>
                        <a href='/index.php/Admin/RgItemAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=8&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>分项报表</a>
                        <!-- <?php if($_GET['regtype']== 'DEVICE'): else: ?>
                            <a href='/index.php/Admin/RgAnalyzes?regtype=<?php echo ($_GET['regtype']); ?>&tabindex=9&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a><?php endif; ?> -->
                        <a href='/index.php/Admin/RgAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=9&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>数据分析</a>
                        <a href='/index.php/Admin/RgReport?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=10&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>报表</a>
                        <a href='/index.php/Admin/RgContrastAnalyzes?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=11&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>同比环比</a>
                        <a href='/index.php/Admin/RgEngeryPlan?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=12&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>能源计划</a>
                        <a href='/index.php/Admin/RgExceptionDayQs?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=13&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>日报缺失</a>
                        <a href='/index.php/Admin/RgExceptionDayEc?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=14&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>日报异常</a>
                        <a href='/index.php/Admin/RgExceptionHourQs?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=15&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>时报缺失</a>
                        <a href='/index.php/Admin/RgExceptionHourEc?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=16&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>时报异常</a>
                        <a href='/index.php/Admin/RgOriginalData/Twicedatad?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=17&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>历史采集数据</a>
                        <!--<a href='/index.php/Admin/RgSample/index?regtype=<?php echo ($_GET['regtype']); ?>&tabindex=18&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>' target="_self" class='J_menuTab'>示例:雇员管理</a>--><?php endif; endif; ?>

            </div>
        </nav>
        <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
    </div><?php endif; endif; ?>

			<div class="row row-lg">
				<div class="col-sm-12">
					<div id="atpbiztoolbar">
                        <div style="float:right;" >
                            <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;处理状态选择：</label>
                              <select id="rl_status" name="rl_status" class="chosen-select" >
                                 <option value="">全部维修单</option>
                                 <option value="待接单">待接单</option>
                                <option value="已接单">已接单</option>
                                <option value="已处理">已处理</option>
                            </select>
                            <button class="btn btn-success" type="button" id="sys_index_search"><i class="fa fa-search"></i>&nbsp;查询</button>
                        </div>
                    </div>
                    <table id="atpbiztable" style="width: 2500px;"></table>
                </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/Public/vendor/bootstrap-table/jquery.min.js"></script>
<script src="/Public/vendor/bootstrap-table/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/vendor/My97DatePicker/WdatePicker.js"></script>
<script src="/Public/adminframework/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/Public/adminframework/js/plugins/prettyfile/bootstrap-prettyfile.js"></script>
<script src="/Public/adminframework/js/plugins/switchery/switchery.js"></script>
<script src="/Public/vendor/bootstrap-table/bootstrap-table/src/bootstrap-table.js"></script>
<script src="/Public/vendor/bootstrap-table/bootstrap-table/src/locale/bootstrap-table-zh-CN-atp.js"></script>
<script src="/Public/vendor/html5Validate/src/jquery-html5Validate.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.excheck.js"></script>
<script src="/Public/vendor/diy_component/func_scrolltab/atppagetab.js"></script>

<script>
	jumptab('<?php echo ($_GET['tabindex']); ?>');
	$(".chosen-select").chosen({disable_search_threshold: 10, search_contains: false,width:'120px'});
</script>
<script type="text/javascript">
	$(function () {
        $('#atpbiztable').bootstrapTable({
            url: '/index.php/Admin/RgRepairHistory/getData?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=<?php echo ($_GET['tabindex']); ?>&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>',         //请求后台的URL（*）
            method: 'post',                      //请求方式（*）
            toolbar: '#atpbiztoolbar',                //工具按钮用哪个容器
            striped: true,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,                   //是否显示分页（*）
            iconSize: 'outline',
            sortable: true,                     //是否启用排序
            sortName:"",
            sortOrder: "",                   //排序方式
            queryParams: queryParams,//传递参数（*）
            sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,                       //初始化加载第一页，默认第一页
            pageSize: 10,                       //每页的记录行数（*）
            pageList: [5,10, 25, 50, 100],        //可供选择的每页的行数（*）
//            search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
//            strictSearch: true,
//            showColumns: true,                  //是否显示所有的列
            showRefresh: true,                  //是否显示刷新按钮
            minimumCountColumns: 2,             //最少允许的列数
            clickToSelect: true,                //是否启用点击选中行
//            height: 600,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "rl_atpid",                     //每一行的唯一标识，一般为主键列
//            showToggle: true,                    //是否显示详细视图和列表视图的切换按钮
//            cardView: true,                    //是否显示详细视图
            detailView: false,                   //是否显示父子表
            detailFormatter: "detailFormatter",
            height:510,
            columns: [
                [
                    // {checkbox: true},
                    {title: '序号', width: 40,align:'center',
                        formatter: function (value, row, index)
                        {
                            var option =  $('#atpbiztable').bootstrapTable("getOptions");
                            return option.pageSize * (option.pageNumber - 1) + index + 1;
                        }
                    },
                    {field: 'rl_code', title: '编号', align:'center', valign:'middle',sortable: true},
                    {field: 'rl_name', title: '名称', align:'center', valign:'middle',sortable: true},
                    {field: 'dev_acquisition', title: '采集号',align:'center', valign:'middle', sortable: true},
                    {field: 'dev_name', title: '设备类型',align:'center', valign:'middle', sortable: false},
                    {field: 'rl_describe', title: '维修单描述',align:'center', valign:'middle', sortable: false},
                    {field: 'rl_startdatetime', title: '维修单发起时间', align:'center', valign:'middle',sortable: true},
                    {field: 'rl_plandate', title: '计划完成时间', align:'center', valign:'middle',sortable: true},
                    {field: 'distempname', title: '指派维修人', align:'center', valign:'middle',sortable: false},
                    {field: 'empuser', title: '配合人', align:'center', valign:'middle',sortable: false},

                    {field: 'rl_status', title: '状态', align:'center', valign:'middle',sortable: false},
                    {field: 'revempname', title: '接单人', align:'center', valign:'middle',sortable: false},
                    {field: 'rl_revdate', title: '接单时间', align:'center', valign:'middle',sortable: false},
                    {field: 'rl_revplandate', title: '接单人计划完成时间', align:'center', valign:'middle',sortable: false},
//                    {field: 'rl_revremark', title: '接单备注', align:'center', valign:'middle',sortable: false},
                    {field: 'empname', title: '处理人', align:'center', valign:'middle',sortable: false},
                    {field: 'rl_disposedate', title: '处理时间', align:'center', valign:'middle',sortable: false},
                    {field: 'rl_disposeresult', title: '处理结果', align:'center', valign:'middle',sortable: false},
                    {field: 'rl_disposemethod', title: '处理方法', align:'center', valign:'middle',sortable: false},
//                    {field: 'rl_disposeremark', title: '处理备注', align:'center', valign:'middle',sortable: false},



                    {field:'rl_atpid',title:'主键',visible:false},
                    {field:'rl_atpcreatedatetime',title:'创建时间',visible:false},
                    {field:'rl_atpcreateuser',title:'创建人',visible:false},
                    {field:'rl_atplastmodifydatetime',title:'最后修改时间',visible:false},
                    {field:'rl_atplastmodifyuser',title:'最后修改人',visible:false},
                    {field:'rl_atpstatus',title:'数据状态',visible:false},
                    {field:'rl_atpsort',title:'数据排序',visible:false},
                    {field:'rl_atpremark',title:'数据备注',visible:false},
                     {field: 'rl_atpid', title: '操作',align:'center', sortable: false,
                        formatter: function (value, row, index) {
                            var inp = "'"+  value +"'";
                            var a = '<a  class="btn btn-success btn-xs" onclick="detail('+ inp +')">详情</a>&nbsp;';
                            return a;
                        }
                    },
                ]
            ],
            onDblClickRow: function (row) {
                window.parent.ATP_BOX_OPEN('/index.php/Admin/RgRepairHistory/info?id=' + row['rl_atpid'], function () {
                    $("#sys_dlg").modal({backdrop: false});
                });
            },
            onSort: function (name, order) {
            },
        });
    });

    function queryParams(params) {  //配置参数
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            limit: params.limit,   //页面大小
            offset: params.offset,  //页码
            search: params.search,
            sort: params.sort,  //排序列名
            sortOrder: params.order,//排位命令（desc，asc）
            rl_status:$("#rl_status").val()
        };
        return temp;
    }

    $('#sys_index_search').on('click', function () {
        $('#atpbiztable').bootstrapTable('refresh')
    });

    function detail(a){
    	window.parent.ATP_BOX_OPEN('/index.php/Admin/RgRepairHistory/info?id=' + a, function () {
            $("#sys_dlg").modal({backdrop: false});
        });
    }

    function ATP_FRAME_SECOND_ENTER_CALLBACK()
    {
        $('#atpbiztable').bootstrapTable('refresh');
    }

</script>
</body>
</html>