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
                        <button class="btn btn-success " type="button" id="sys_search"><i class="fa fa-search"></i>&nbsp;更多搜索</button>
                        <input type="hidden" value="<?php echo ($rgn_atpid); ?>" id="rgn_atpid">
                    </div>
                    <table id="atpbiztable" style="width: 1600px;"></table>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="sys_dlg" role="dialog" class="modal fade "></div>
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
    window.parent.ATP_BOX_INIT();
    window.parent.ATP_BOX_SEARCHINIT();
    GLOBAL_SEARCHNAME = "搜索设备点";
    $(function () {
        $('#atpbiztable').bootstrapTable({
            url: '/index.php/Admin/RgAlarmHistory/getData?regiontype=<?php echo ($_GET['regiontype']); ?>&snname=<?php echo ($_GET['snname']); ?>&regionlevel=<?php echo ($_GET['regionlevel']); ?>&tabindex=<?php echo ($_GET['tabindex']); ?>&rgn_atpid=<?php echo ($_GET['rgn_atpid']); ?>',         //请求后台的URL（*）
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
            search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
//            strictSearch: true,
//            showColumns: true,                  //是否显示所有的列
            showRefresh: true,                  //是否显示刷新按钮
            minimumCountColumns: 2,             //最少允许的列数
            clickToSelect: false,                //是否启用点击选中行
//            height: 600,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "alm_atpid",                     //每一行的唯一标识，一般为主键列
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
                    {field: 'rgn_name', title: '设备点',align:'center', valign:'middle', sortable: true},
//                    {field: 'dev_acquisition', title: '采集号',align:'center', valign:'middle', sortable: false},
//                    {field: 'dev_name', title: '设备类别',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_datetime', title: '报警时间',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_category', title: '能源类别',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_level', title: '报警等级',align:'center', valign:'middle', sortable: true},
                    {field: 'almc_name', title: '报警类型',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_content', title: '事件详情',align:'center', valign:'middle', sortable: true},
                    {field: 'value_param', title: '上下限',align:'center', valign:'middle', sortable: false},
                    {field: 'emp_name', title: '处理人',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_confirmstatus', title: '报警状态',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_confirmdate', title: '操作时间',align:'center', valign:'middle', sortable: true},
                    {field: 'alm_confirmremark', title: '操作描述',align:'center', valign:'middle', sortable: true},

                    {field:'alm_atpid',title:'主键',visible:false},
                    {field:'dev_atpcreatedatetime',title:'创建时间',visible:false},
                    {field:'alm_atpcreateuser',title:'创建人',visible:false},
                    {field:'dev_atplastmodifydatetime',title:'最后修改时间',visible:false},
                    {field:'alm_atplastmodifyuser',title:'最后修改人',visible:false},
                    {field:'alm_atpstatus',title:'数据状态',visible:false},
                    {field:'alm_atpsort',title:'数据排序',visible:false},
                    {field:'alm_atpremark',title:'数据备注',visible:false},
//                    {field: 'alm_atpid', title: '操作',align:'center', sortable: false,width:120,
//                        formatter: function (value, row, index) {
//                            if ('待确认' == row['alm_confirmstatus']) {
//                                var inp = "'" + value + "'";
//                                var a = '<a class="btn btn-success btn-xs" onclick="dealInRow(' + inp + ')">处理</a>&nbsp;';
//                                a += '<a  class="btn btn-danger btn-xs" onclick="ignoreInRow(' + inp + ')">忽略</a>';
//                                return a;
//                            }
//                            else {
//                                return "";
//                            }
//                        }
//                    },
                ]
            ],
             onDblClickRow: function (row) {

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
            disposestatus: $("#search_disposestatus").val(),
            rgn_atpid:$('#rgn_atpid').val(),
            sort: params.sort,  //排序列名
            sortOrder: params.order,//排位命令（desc，asc） dev_name rgn_name alm_level alm_category alm_content
            dev_name:$('#dev_name',parent.document).val(),
            alm_confirmstatus:$('#alm_confirmstatus',parent.document).val(),
            alm_datetime_start:$('#alm_datetime_start',parent.document).val(),
            alm_datetime_end:$('#alm_datetime_end',parent.document).val(),
            rgn_name:$('#rgn_name',parent.document).val(),
            alm_level:$('#alm_level',parent.document).val(),
            alm_content:$('#alm_content',parent.document).val(),
            almp_upper:$('#almp_upper',parent.document).val(),
            almp_floor:$('#almp_floor',parent.document).val(),
            alm_category:$('#alm_category',parent.document).val()
        };
        return temp;
    }

    $('#sys_search').on('click',function() {
        window.parent.ATP_BOX_SEARCHOPEN("/index.php/Admin/RgAlarmHistory/advancedsearch?rgn_name=" + $(".input-outline").val(), submitsearchdata, 'rgn_name', $(".input-outline").val());
    });

    function submitsearchdata()
    {
        window.parent.ATP_BOX_SEARCHCLOSE();
        if(null!=$('#rgn_name',parent.document).val()){
            $('#atpbiztable').bootstrapTable('resetSearch',$('#rgn_name',parent.document).val());
    	}
        $('#atpbiztable').bootstrapTable('refresh');
    }

    function dealInRow(id) {
        window.parent.ATP_BOX_OPEN("/index.php/Admin/RgAlarmHistory/deal?alm_atpid="+id,dealCallback);
    }

    function dealCallback()
    {
        if (window.parent.ATP_BOX_VALIDATE()) {
            window.parent.ATP_BOX_CLOSE();
            $("#sys_dlg_form",parent.document).submit(function(e)
            {
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: '/index.php/Admin/RgAlarmHistory/dealsubmit',
                    type: 'POST',
                    data:  formData,
                    mimeType:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR)
                    {
                        $('#atpbiztable').bootstrapTable('refresh')
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $('#atpbiztable').bootstrapTable('refresh')
                    }
                });
                e.preventDefault();
            });
            $("#sys_dlg_form",parent.document).submit();
        }
    }

    function ignoreInRow(id)
    {
        window.parent.ATP_BOX_OPEN("/index.php/Admin/RgAlarmHistory/ignore?alm_atpid="+id,ignoreCallback);
    }

    function ignoreCallback()
    {
        if (window.parent.ATP_BOX_VALIDATE()) {
            window.parent.ATP_BOX_CLOSE();
            $("#sys_dlg_form",parent.document).submit(function(e)
            {
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: '/index.php/Admin/RgAlarmHistory/ignoresubmit',
                    type: 'POST',
                    data:  formData,
                    mimeType:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR)
                    {
                        $('#atpbiztable').bootstrapTable('refresh')
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $('#atpbiztable').bootstrapTable('refresh')
                    }
                });
                e.preventDefault();
            });
            $("#sys_dlg_form",parent.document).submit();
        }
    }

    function ATP_FRAME_SECOND_ENTER_CALLBACK()
    {
        $('#atpbiztable').bootstrapTable('refresh');
    }

</script>
</body>
</html>