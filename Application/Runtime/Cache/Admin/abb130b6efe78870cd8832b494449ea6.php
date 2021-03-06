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
                        <a target="_self" href="/index.php/Admin/Userside/Usersidezhxx?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab">综合信息</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidepm?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab">报表及排名</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidereport?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>" class="onetab selected">分项报表</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidetbhb?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab">同比环比</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
            </div>
            <div class="row row-lg">
                <div class="col-sm-12">
                    <div id="atpbiztoolbar">
                        <form onkeydown="if(event.keyCode==13){return false;}"  id="sys_dlg_search_form" role="form" class="form-horizontal">
                            <input  id="us_start" type="hidden" class="form-control" value="<?php echo ($start); ?>"  style="width: 120px; display:inline-block;" >
                            <input id="us_end" type="hidden" class="form-control"  value="<?php echo ($end); ?>" style="width: 120px; display:inline-block;">
                            <input type="hidden"  id="us_atpid"  value="<?php echo ($us_atpid); ?>">
                            <input type="hidden"  id="rgn_atpid"  value="<?php echo ($rgn_atpid); ?>">
                            <label class="control-label">&emsp;查询范围：
                                <?php if(empty($start)): echo ($lyear); ?>年&nbsp;-&nbsp;<?php echo ($tyear); ?>年&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php else: ?>
                                    <?php echo ($start); ?>&nbsp;-&nbsp;<?php echo ($end); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
                            </label>
                            <label>
                                <span>查询类型：</span>
                                <select name="option" id="select" onchange="choice()" class="chosen-select">
                                    <option value="year" selected="">年报表</option>
                                    <option value="month">月报表</option>
                                    <option value="day">日报表</option>
                                </select>
                            </label>
                            <label class="control-label">开始时间：</label>
                            <label class="control-label">
                                <input id="startyear" type="text" class="form-control year" style="cursor: pointer; width: 150px;" onClick="WdatePicker({dateFmt:'yyyy'})"  onchange="onyearsta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                                <input id="startmonth" type="text" class="form-control month" style="display: none;cursor: pointer; width: 150px;" onClick="WdatePicker({dateFmt:'yyyy-MM'})" onchange="onmonthsta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                                 <input id="startday" type="text" class="form-control day" style="display: none;cursor: pointer;width: 150px;" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" onchange="ondaysta()" required placeholder="点击选择日期" value="<?php echo ($start); ?>">
                            </label>
                            <label class="control-label">结束时间：</label>
                            <label class="control-label">
                                <input id="endyear" type="text" class="form-control year" style="cursor: pointer; width: 150px;" onClick="WdatePicker({dateFmt:'yyyy'})" onchange="onyearend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                                <input id="endmonth" type="text" class="form-control month" style="display: none;cursor: pointer; width: 150px;" onClick="WdatePicker({dateFmt:'yyyy-MM'})" onchange="onmonthend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                                <input id="endday" type="text" class="form-control day" style="display: none;cursor: pointer; width: 150px;" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" onchange="ondayend()" required placeholder="点击选择日期" value="<?php echo ($end); ?>">
                            </label>
                            <br>
                            <label class="control-label">&emsp;统计参数选择：</label>
                            <select class="chosen-select_long" name="param[]" id="param" multiple>
                                <?php if(is_array($param)): foreach($param as $emk=>$emv): if(('是' == $emv['aux_selected'])): ?><option value="<?php echo ($emv["p_atpid"]); ?>" selected ><?php echo ($emv["p_name"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($emv["p_atpid"]); ?>" ><?php echo ($emv["p_name"]); ?></option><?php endif; endforeach; endif; ?>
                            </select>
                            <button class="btn btn-warning " type="button" id="sys_index_search"><i class="fa fa-search"></i>&emsp;查询</button>
                        </form>
                    </div>
                    <table id="atpbiztable"></table>
                    <div id="highchart" style="border:1px solid #ccc;margin-top: 20px"></div>
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
<script>
    var currenttab=2;
    jumptab(currenttab);

    $(function () {
        $(".chosen-select2").chosen({disable_search_threshold: 10, search_contains: true, width:'150px'});
        $(".chosen-select").chosen({disable_search_threshold: 10, search_contains: false, width:'120px'});
    });
    $(function () {
        $(".chosen-select2").chosen({disable_search_threshold: 10, search_contains: true, width:'150px'});
        $("#param").chosen({disable_search_threshold: 10, search_contains: true,width:'380px'});
    });
    var num = $("#us_start").val();
    // alert(num.length);
    if(num.length == 4){
        $('#select option:eq(0)').attr('selected','selected');
    }else if(num.length == 7){
        $('#select option:eq(1)').attr('selected','selected');
    }else if(num.length == 10){
        $('#select option:eq(2)').attr('selected','selected');
    }
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
        $('#us_start').val(onyearsta);
    }
    function onmonthsta(){
        onmonthsta = $("#startmonth").val();
        $('#us_start').val(onmonthsta);
    }
    function ondaysta(){
        ondaysta = $("#startday").val();
        $('#us_start').val(ondaysta);
    }
    function onyearend(){
        onyearend = $("#endyear").val();
        $('#us_end').val(onyearend);
    }
    function onmonthend(){
        onmonthend = $("#endmonth").val();
        $('#us_end').val(onmonthend);
    }
    function ondayend(){
        ondayend = $("#endday").val();
        $('#us_end').val(ondayend);
    }
</script>
<script>
    GLOBAL_SEARCHNAME = "用户名称";
    $(function () {
        $('#atpbiztable').bootstrapTable({
            url: '/index.php/Admin/Userside/getDatareport?rgn_atpid=<?php echo ($rgn_atpid); ?>&start=<?php echo ($start); ?>&end=<?php echo ($end); ?>&param=<?php echo ($selectparam); ?>&us_atpid=<?php echo ($us_atpid); ?>',         //请求后台的URL（*）
            method: 'post',                      //请求方式（*）
            toolbar: '#atpbiztoolbar',                //工具按钮用哪个容器
            striped: true,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: false,                   //是否显示分页（*）
            iconSize: 'outline',
            sortable: false,                     //是否启用排序
            sortName:"",
            sortOrder: "",                   //排序方式
            queryParams: queryParams,//传递参数（*）
            sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,                       //初始化加载第一页，默认第一页
            pageSize: 10,                       //每页的记录行数（*）
            pageList: [5,10, 25, 50, 100],        //可供选择的每页的行数（*）
            search: false,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
//            strictSearch: true,
//            showColumns: true,                  //是否显示所有的列
            showRefresh: false,                  //是否显示刷新按钮
            minimumCountColumns: 2,             //最少允许的列数
            clickToSelect: false,                //是否启用点击选中行
//            height: 600,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "us_atpid",                     //每一行的唯一标识，一般为主键列
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
                    {field: 'time', title: '时间',align:'center', valign:'middle', sortable: true,width: 140},
                    <?php if(is_array($columns)): foreach($columns as $k=>$vo): ?>{field: '<?php echo ($vo["field"]); ?>', title: '<?php echo ($vo["title"]); ?>',align:'center', valign:'middle', sortable: true,width: 140},<?php endforeach; endif; ?>

                    {field:'us_atpid',title:'主键',visible:false},
                    {field:'us_atpcreatedatetime',title:'创建时间',visible:false},
                    {field:'us_atpcreateuser',title:'创建人',visible:false},
                    {field:'us_atplastmodifydatetime',title:'最后修改时间',visible:false},
                    {field:'us_atplastmodifyuser',title:'最后修改人',visible:false},
                    {field:'us_atpstatus',title:'数据状态',visible:false},
                    {field:'us_atpsort',title:'数据排序',visible:false},
                    {field:'us_atpremark',title:'数据备注',visible:false},

                ]
            ],
            onDblClickRow: function (row) {
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
            sort: params.sort,  //排序列名
            start: $("#us_start").val(),
            end: $("#us_end").val(),
            us_atpid:$('#us_atpid').val(),
            rgn_atpid:$('#rgn_atpid').val(),
            param:$('#param').val(),
            sortOrder: params.order//排位命令（desc，asc）
        };
        return temp;
    }

    $('#sys_search').on('click', function () {
        $('#atpbiztable').bootstrapTable('refresh')
    });

    $('#sys_dlg_search_submit').on('click', function () {
        $('#atpbiztable').bootstrapTable('refresh')
    });
    $('#sys_index_search').on('click', function () {
        var start = $('#us_start').val();
        var end = $('#us_end').val();
        var us_atpid = $('#us_atpid').val();
        var rgn_atpid = $('#rgn_atpid').val();
        var param = $('#param').val();
        var endparam = param.join(",");
        window.location.href='/index.php/Admin/Userside/Usersidereport?start='+start + '&end='+end+'&rgn_atpid='+ rgn_atpid+'&us_atpid='+us_atpid+'&param='+endparam;
    });
</script>
<script src="/Public/vendor/echarts-2.2.7/build/dist/echarts-all.js"></script>
<script src="/Public/vendor/echarts-2.2.7/build/dist/echarts-all.js"></script>
<script src="/Public/vendor/ueditor/third-party/highcharts/highcharts.js"></script>
<script src="/Public/vendor/ueditor/third-party/highcharts/highcharts-3d.js"></script>
<script>
    $(function () {
        $.ajax({
            type: "GET",
            url: "/index.php/Admin/Userside/getDatareport?rgn_atpid=<?php echo ($rgn_atpid); ?>&start=<?php echo ($start); ?>&end=<?php echo ($end); ?>&param=<?php echo ($selectparam); ?>&us_atpid=<?php echo ($us_atpid); ?>",
            dataType: "json",
            success: function (data) {
                var categories =[];
                var yslvalue = [];
                var dglvalue = [];
                var yllvalue = [];
                var ynlvalue = [];
                $.each(data.rows,function (i,v) {
                    categories.push(v.time);
                    dglvalue.push(parseInt(v.dgl));
                    yslvalue.push(parseInt(v.ysl));
                    yllvalue.push(parseInt(v.yll));
                    ynlvalue.push(parseInt(v.ynl));
                });
                console.log(categories);
                console.log(dglvalue);
                console.log(yslvalue);
                console.log(yllvalue);
                console.log(ynlvalue);
                $('#highchart').highcharts({
                    chart: {
                        type: 'column',
                        options3d: {
                            enabled: true,
                            alpha: 5,
                            beta: 5,
                            viewDistance: 25,
                            depth: 60
                        },
                        marginRight: 40
                    },
                    title: {
                        text: data.category +'报表及排名'
                    },
                    xAxis: {
                        categories: categories
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
                    series: [{
                        name: '用水量',
                        data: yslvalue,
                        color:'#0099cc',
                        stack: '1'
                    }, {
                        name: '电量值',
                        color:'#3366cc',
                        data: dglvalue,
                        stack: '2'
                    }, {
                        name: '用冷量',
                        data: yllvalue,
                        color:'#40e0d0',
                        stack: '3'
                    },{
                        name: '用暖量',
                        data: ynlvalue,
                        color:'#ff6347',
                        stack: '4'
                    }]
                });
            }
        });
    });
</script>
</body>
</html>