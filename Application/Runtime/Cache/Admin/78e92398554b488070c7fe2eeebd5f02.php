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
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="content-tabs">
                    <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i></button>
                    <nav class="page-tabs J_menuTabs">
                        <div class="page-tabs-content">
                            <a target="_self" href="/index.php/Admin/Datacontrastreport/index?ids=<?php echo ($ids); ?>"  class="onetab">报表</a>
                            <a target="_self" href="/index.php/Admin/Datacontrastrank/index?ids=<?php echo ($ids); ?>"  class="onetab">排名</a>
                            <a target="_self" href="/index.php/Admin/Datacontrastanalyze/index?ids=<?php echo ($ids); ?>" class="onetab">同比环比</a>
                            <a target="_self" href="/index.php/Admin/Datacontrastitem/index?ids=<?php echo ($ids); ?>" class="onetab">分项报表</a>
                            <a target="_self" href="/index.php/Admin/Datacontrastenergy/index?ids=<?php echo ($ids); ?>" class="onetab">单面积能耗</a>
                        </div>
                    </nav>
                    <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
                </div>
                <div class="row row-lg">
                <div class="col-sm-12">
                    <div id="atpbiztoolbar">
                        <div>
                            <label class="control-label">
                                &nbsp;&nbsp;&nbsp;&nbsp;查询范围：
                                <?php if(('' == $start)): echo ($lyear); ?>年&nbsp;-&nbsp;<?php echo ($tyear); ?>年&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php else: ?>
                                    <?php echo ($start); ?>&nbsp;-&nbsp;<?php echo ($end); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
                            </label>
                            <input type="hidden" id = "ids" value="<?php echo ($ids); ?>">
                            <input type="hidden" id = "start" value="<?php echo ($start); ?>">
                            <input type="hidden" id = "end" value="<?php echo ($end); ?>">

                            <label>
                                <span>查询类型：</span>
                                <select name="option" id="select" class="chosen-select" onchange="choice()">
                                    <option value="year" <?php if(($_GET['timerange']== 'year')): ?>selected<?php endif; ?> >按年查询</option>
                                    <option value="month" <?php if(($_GET['timerange']== 'month')): ?>selected<?php endif; ?> >按月查询</option>
                                    <option value="day" <?php if(($_GET['timerange']== 'day')): ?>selected<?php endif; ?> >按日查询</option>
                                </select>
                            </label>
                            <label class="control-label">开始时间：</label>
                            <label class="control-label">
                                <input id="startyear" type="text" class="form-control year" <?php if(($_GET['timerange']== 'year') OR ($_GET['timerange']== '')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy'})"  onchange="onyearsta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                                <input id="startmonth" type="text" class="form-control month" <?php if(($_GET['timerange']== 'month')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy-MM'})" onchange="onmonthsta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                                <input id="startday" type="text" class="form-control day" <?php if(($_GET['timerange']== 'day')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" onchange="ondaysta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                            </label>
                            <label class="control-label">结束时间：</label>
                            <label class="control-label">
                                <input id="endyear" type="text" class="form-control year" <?php if(($_GET['timerange']== 'year') OR ($_GET['timerange']== '')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy'})" onchange="onyearend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                                <input id="endmonth" type="text" class="form-control month" <?php if(($_GET['timerange']== 'month')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy-MM'})" onchange="onmonthend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                                <input id="endday" type="text" class="form-control day" <?php if(($_GET['timerange']== 'day')): ?>style="cursor: pointer; width: 120px;"<?php else: ?>style="display: none;cursor: pointer; width: 120px;"<?php endif; ?> onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" onchange="ondayend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                            </label>
                            <br/>

                            <label class="control-label">统计参数选择：</label>
                            <select class="chosen-select_long" name="param[]" id="param" multiple>
                                <?php if(is_array($param)): foreach($param as $emk=>$emv): if(('是' == $emv['aux_selected'])): ?><option value="<?php echo ($emv["p_atpid"]); ?>" selected ><?php echo ($emv["p_name"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($emv["p_atpid"]); ?>" ><?php echo ($emv["p_name"]); ?></option><?php endif; endforeach; endif; ?>
                            </select>
                            <button class="btn btn-warning " type="button" id="sys_index_search"><i class="fa fa-search"></i>&nbsp;查询</button>
                        </div>
                    </div>
                    <table id="atpbiztable"></table>
                    <div id="highchart" style="border:1px solid #ccc;margin-top: 20px"></div>
                </div>
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
<script src="/Public/vendor/bootstrap-table/bootstrap-table/src/locale/bootstrap-table-zh-CN.js"></script>
<script src="/Public/vendor/html5Validate/src/jquery-html5Validate.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.excheck.js"></script>
<script src="/Public/vendor/diy_component/func_scrolltab/atppagetab.js"></script>
<script src="/Public/vendor/ueditor/third-party/highcharts/highcharts.js"></script>
<script src="/Public/vendor/ueditor/third-party/highcharts/highcharts-3d.js"></script>
<script>
    var currenttab=3;
    jumptab(currenttab);
    $(function () {
        $(".chosen-select2").chosen({disable_search_threshold: 10, search_contains: true, width:'150px'});
        $(".chosen-select").chosen({disable_search_threshold: 10, search_contains: true, width:'120px'});
        $(".chosen-select_long").chosen({disable_search_threshold: 10, search_contains: true,width:'380px'});
    });
</script>
<script>
    $(function () {
        $('#atpbiztable').bootstrapTable({
            url: '/index.php/Admin/Datacontrastitem/getData?ids=<?php echo ($ids); ?>&selectParam=<?php echo ($selectParam); ?>&start=<?php echo ($start); ?>&end=<?php echo ($end); ?>',         //请求后台的URL（*）
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
//            showRefresh: true,                  //是否显示刷新按钮
            minimumCountColumns: 2,             //最少允许的列数
            clickToSelect: true,                //是否启用点击选中行
//            height: 600,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "rgn_atpid",                     //每一行的唯一标识，一般为主键列
//            showToggle: true,                    //是否显示详细视图和列表视图的切换按钮
//            cardView: true,                    //是否显示详细视图
            detailView: false,                   //是否显示父子表
            detailFormatter: "detailFormatter",
            height:510,
            columns: [
                [
//                    {checkbox: true},
                    {title: '序号', width: 40,align:'center',
                        formatter: function (value, row, index)
                        {
                            var option =  $('#atpbiztable').bootstrapTable("getOptions");
                            return option.pageSize * (option.pageNumber - 1) + index + 1;
                        }
                    },
                    {field: 'rgn_name', title: '位置', align:'center', valign:'middle',sortable: false, width: 140},
                <?php if(is_array($columns)): foreach($columns as $k=>$vo): ?>{field: '<?php echo ($vo["field"]); ?>', title: '<?php echo ($vo["title"]); ?>',align:'center', valign:'middle', sortable: false},<?php endforeach; endif; ?>
            ]
        ],
        onDblClickRow: function (row) {
//                $("#sys_dlg").load('/index.php/Admin/Datacontrastitem/edit?id=' + row['emp_atpid'], function() {
//                    $('#sys_dlg_submit').on('click',submitdata);
//                    $("#sys_dlg").modal({backdrop: false});
//                });
        },
        onSort: function (name, order) {
//                console.log(name+order);
        },
        });
    });
    function queryParams(params) {  //配置参数
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            limit: params.limit,   //页面大小
            offset: params.offset,  //页码
            search: params.search,
            u_name: $("#search_u_name").val(),
            u_type: $("#search_u_type").val(),
            sort: params.sort,  //排序列名
            sortOrder: params.order//排位命令（desc，asc）
        };
        return temp;
    }
    $('#sys_index_search').on('click', function () {
        var selectedtree = window.parent.ATP_SELECTED_TREE_ELEMENT();
        var ids = [];
        $.each(selectedtree, function () {
            ids.push(this['id']);
        });
        var idstrings = ids.toString();

        var start = $('#start').val();
        var end = $('#end').val();
//        var ids = $("#ids").val();
        var param = $('#param').val();
        var endparam = param.join(',');
        var timerange = $("#select").val();
        window.location.href='/index.php/Admin/Datacontrastitem/index?timerange=' + timerange + '&start='+start + '&end='+end+'&selectParam='+endparam +'&ids='+idstrings;
    });
</script>
<script>
    function choice(){
        var val = $("#select").val();
        if(val == 'year'){
            $(".day").hide();
            $(".day").val();
            $(".month").val();
            $(".month").hide();
            $(".year").show();
            $("#startyear").val('');
            $("#endyear").val('');
        }
        if(val == 'month'){
            $(".day").hide();
            $(".month").show();
            $(".year").hide();
            $(".day").val('');
            $(".year").val('');
            $("#startmonth").val('');
            $("#endmonth").val('');
        }
        if(val == 'day'){
            $(".day").show();
            $(".month").hide();
            $(".year").hide();
            $(".month").val('');
            $(".year").val('');
            $("#startday").val('');
            $("#endday").val('');
        }
    }
    function onyearsta(){
        onyearsta = $("#startyear").val();
        $('#start').val(onyearsta);
    }
    function onmonthsta(){
        onmonthsta = $("#startmonth").val();
        $('#start').val(onmonthsta);
    }
    function ondaysta(){
        ondaysta = $("#startday").val();
        $('#start').val(ondaysta);
    }
    function onyearend(){
        onyearend = $("#endyear").val();
        $('#end').val(onyearend);
    }
    function onmonthend(){
        onmonthend = $("#endmonth").val();
        $('#end').val(onmonthend);
    }
    function ondayend(){
        ondayend = $("#endday").val();
        $('#end').val(ondayend);
    }
</script>
<script>
$(function () {
    $.ajax({
        type: "GET",
        url: "/index.php/Admin/Datacontrastitem/getData?ids=<?php echo ($ids); ?>&selectParam=<?php echo ($selectParam); ?>&start=<?php echo ($start); ?>&end=<?php echo ($end); ?>",
        dataType: "json",
        success: function (data){
            var categories =[];
            var series = [];
            $.each(data.rows,function (i,v) {
                categories.push(v.time);
                series.push(v.series);
            });
            var timearray = categories[0].split(",");
            var data_series_json = JSON.stringify(series);
            var data_array = $.parseJSON(data_series_json);
            $('#highchart').highcharts({
                chart: {
                    type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 5,
                        viewDistance: 25,
                        depth: 60
                    },
                    marginRight: 40
                },
                title: {
                    text: '分项对比'
                },
                xAxis: {
                    categories: timearray
                },
                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: '能量消耗量'
                    }
                },
                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        depth: 40
                    }
                },
                series:data_array
            });
        }
    });
});
</script>
</body>
</html>