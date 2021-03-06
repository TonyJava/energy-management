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
    <link rel="stylesheet" href="/Public/vendor/diy_component/yuanqu_page/css/reset.css">
    <link rel="stylesheet" href="/Public/vendor/diy_component/yuanqu_page/css/tenant-new.css">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i></button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a target="_self" href="/index.php/Admin/Userside/Usersidezhxx?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab selected">综合信息</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidepm?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab">报表及排名</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidereport?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>" class="onetab">分项报表</a>
                        <a target="_self" href="/index.php/Admin/Userside/Usersidetbhb?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>"  class="onetab">同比环比</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
            </div>
            <div class="backimg clearfix">
                <div class="left-yibiao">
                    <div class="msgtitle">仪表读数</div>
                    <div class="yibiao-top clearfix">
                        <div class="onechart">
                            <div id="water" style="width: 50%; height: 140px;float: left;"></div>
                            <div class="chartmsg">
                                <div class="leftmsg">
                                    <p>今日用水</p><p class="color_one"><span class="font16"><?php echo ($dayaccu["d2d_syslaccu"]); ?></span>T</p>
                                </div>
                                <div class="horizontal_line"></div>
                                <div class="rightmsg">
                                    <p>本月用水</p><p class="color_one"><span class="font16"><?php echo ($monthaccu["month_ysl"]); ?></span>T</p>
                                </div>
                            </div>
                        </div>
                        <div class="onechart">
                            <div id="electricity" style="width: 50%; height: 140px;float: left;"></div>
                            <div class="chartmsg">
                                <div class="leftmsg">
                                    <p>今日用电</p><p class="color_two"><span class="font16"><?php echo ($dayaccu["d2d_dglaccu"]); ?></span>Kwh</p>
                                </div>
                                <div class="horizontal_line"></div>
                                <div class="rightmsg">
                                    <p>本月用电</p><p class="color_two"><span class="font16"><?php echo ($monthaccu["month_ydl"]); ?></span>Kwh</p>
                                </div>
                            </div>
                        </div>
                        <div class="onechart">
                            <div id="hot" style="width: 50%; height: 140px;float: left;"></div>
                            <div class="chartmsg">
                                <div class="leftmsg">
                                    <p>今日用暖</p><p class="color_three"><span class="font16"><?php echo ($dayaccu["d2d_ynlaccu"]); ?></span>Kwh</p>
                                </div>
                                <div class="horizontal_line"></div>
                                <div class="rightmsg">
                                    <p>本月用暖</p><p class="color_three"><span class="font16"><?php echo ($monthaccu["month_ynl"]); ?></span>Kwh</p>
                                </div>
                            </div>
                        </div>
                        <div class="onechart">
                            <div id="cold" style="width: 50%; height: 140px;float: left;"></div>
                            <div class="chartmsg">
                                <div class="leftmsg">
                                    <p>今日用冷</p><p class="color_four"><span class="font16"><?php echo ($dayaccu["d2d_yllaccu"]); ?></span>Kwh</p>
                                </div>
                                <div class="horizontal_line"></div>
                                <div class="rightmsg">
                                    <p>本月用冷</p><p class="color_four"><span class="font16"><?php echo ($monthaccu["month_yll"]); ?></span>Kwh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="msgtitle" style="border-top: 1px solid #ddd;margin-top: 15px">详情</div>
                    <div class="tablebox">
                        <div class="two_columns">
                            <div class="flex_1">
                                <p>负责人姓名：<span class="color_black"><?php echo ($user["us_name"]); ?></span></p>
                                <!--<p>其他联系人：<span class="color_black">暂无</span></p>-->
                            </div>
                            <div class="flex_1">
                                <p>手机号码：<span class="color_black"><?php echo ($user["us_linkphone"]); ?></span></p>
                                <!--<p>报警总数量：<span class="color_black"><?php echo ($countalarm["count"]); ?></span></p>-->
                                <!--<p>待确认报警：<span class="color_black"><?php echo ($bj1["count"]); ?></span></p>-->
                                <!--<p>手机号码：<span class="color_black">暂无</span></p>-->
                                <!--<p>座机：<span class="color_black">暂无</span></p>-->
                                <!--<p>入住时间：<span class="color_black"><?php echo ($user["us_atpcreatedatetime"]); ?></span></p>-->
                            </div>
                        </div>
                        <iframe frameborder=0 width=100% height=260 marginheight=0 marginwidth=0 scrolling=no src='/index.php/Admin/Userside/table_tenant?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>&rgn_category=<?php echo ($rgn_category); ?>'></iframe>
                    </div>
                </div>
                <div class="ecahrt">
                    <div class="msgtitle">日用量</div>
                    <div class="tablebox">
                        <iframe frameborder=0 width=100% height=200 marginheight=0 marginwidth=0 scrolling=no src='/index.php/Admin/Userside/yibiao_day?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>&rgn_category=<?php echo ($rgn_category); ?>'></iframe>
                    </div>

                    <div class="msgtitle" style="border-top: 1px solid #ddd">月用量</div>
                    <div class="tablebox">
                        <iframe frameborder=0 width=100% height=200 marginheight=0 marginwidth=0 scrolling=no src='/index.php/Admin/Userside/yibiao_month?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>&rgn_category=<?php echo ($rgn_category); ?>'></iframe>
                    </div>

                    <div class="msgtitle" style="border-top: 1px solid #ddd">年用量</div>
                    <div class="tablebox">
                        <iframe frameborder=0 width=100% height=200 marginheight=0 marginwidth=0 scrolling=no src='/index.php/Admin/Userside/yibiao_year?rgn_atpid=<?php echo ($rgn_atpid); ?>&us_atpid=<?php echo ($us_atpid); ?>&rgn_category=<?php echo ($rgn_category); ?>'></iframe>
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
<script src="/Public/vendor/bootstrap-table/bootstrap-table/src/locale/bootstrap-table-zh-CN.js"></script>
<script src="/Public/vendor/html5Validate/src/jquery-html5Validate.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.excheck.js"></script>
<script src="/Public/vendor/diy_component/func_scrolltab/atppagetab.js"></script>

<script>
    var currenttab=0;
    jumptab(currenttab);
    $(function () {
//        $(".chosen-select2").chosen({disable_search_threshold: 10, search_contains: true, width:'150px'});
    });
</script>
<script src="/Public/vendor/diy_component/yuanqu_page/js/jquery-1.12.4.js"></script>
<!--<script src="/Public/vendor/diy_component/yuanqu_page/js/highcharts.js"></script>-->
<!--<script src="/Public/vendor/diy_component/yuanqu_page/js/highcharts-more.js"></script>-->
<script src="/Public/vendor/diy_component/yuanqu_page/js/echarts.js"></script>
<script>
    $('.onehouse').on('mouseenter',function() {
        $(this).css('opacity',1).siblings('.onehouse').css('opacity',0);
    })
</script>
<script>
    $(function () {

        var electricityChart = echarts.init(document.getElementById('electricity'));
        var electricityoption = {
            series : [
                {
                    name:'指标',
                    type:'gauge',
                    min:0,
                    max:1000,
        splitNumber: 4,       // 分割段数，默认为5
                axisLine: {            // 坐标轴线
            lineStyle: {       // 属性lineStyle控制线条样式
                color: [[0.2, '#228b22'],[0.8, '#48b'],[1, '#ff4500']],
                        width: 8
            }
        },
        axisTick: {            // 坐标轴小标记
            splitNumber: 5,   // 每份split细分多少段
                    length :6,        // 属性length控制线长
                    lineStyle: {       // 属性lineStyle控制线条样式
                color: 'auto'
            }
        },
        axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
            textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                color: 'auto',
                        fontSize: 10
            }
        },
        splitLine: {           // 分隔线
            show: true,        // 默认显示，属性show控制显示与否
                    length :1,         // 属性length控制线长
                    lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
                color: 'auto'
            }
        },
        pointer : {
            width : 3
        },
        title : {
            show : true,
                    offsetCenter: [0, '-40%'],       // x, y，单位px
                    textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                fontWeight: 'bolder',
                        fontSize: 10
            }
        },
        detail : {
            formatter:'{value}\r\nMwh',
                    textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                color: 'auto',
                        fontWeight: 'bolder',
                        fontSize: 10
            }
        },
        data:[{value: <?php if($$monthaccu["month_ydl"] == ''): ?>0<?php else: echo ($monthaccu["month_ydl"]); endif; ?>/1000, name: '用电量'}]

    }
    ]
    };
    electricityChart.setOption(electricityoption);
    //---------------------------------------------





    var waterChart = echarts.init(document.getElementById('water'));
    var wateroption = {
        series : [
            {
                name:'指标',
                type:'gauge',
                min:0,
                max:1000,
    splitNumber: 4,       // 分割段数，默认为5
            axisLine: {            // 坐标轴线
        lineStyle: {       // 属性lineStyle控制线条样式
            color: [[0.2, '#228b22'],[0.8, '#48b'],[1, '#ff4500']],
                    width: 8
        }
    },
    axisTick: {            // 坐标轴小标记
        splitNumber: 5,   // 每份split细分多少段
                length :6,        // 属性length控制线长
                lineStyle: {       // 属性lineStyle控制线条样式
            color: 'auto'
        }
    },
    axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
        textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontSize: 10
        }
    },
    splitLine: {           // 分隔线
        show: true,        // 默认显示，属性show控制显示与否
                length :5,         // 属性length控制线长
                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
            color: 'auto'
        }
    },
    pointer : {
        width : 3
    },
    title : {
        show : true,
                offsetCenter: [0, '-40%'],       // x, y，单位px
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    detail : {
        formatter:'{value}\r\nKt',
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    data:[{value: <?php if($$monthaccu["month_ysl"] == ''): ?>0<?php else: echo ($monthaccu["month_ysl"]); endif; ?>/1000, name: '用水量'}]
    }
    ]
    };
    waterChart.setOption(wateroption);


    //---------------------------------------------

    var hotChart = echarts.init(document.getElementById('hot'));
    var hotoption = {
        series : [
            {
                name:'指标',
                type:'gauge',
                min:0,
                max:1000,
    splitNumber: 4,       // 分割段数，默认为5
            axisLine: {            // 坐标轴线
        lineStyle: {       // 属性lineStyle控制线条样式
            color: [[0.2, '#228b22'],[0.8, '#48b'],[1, '#ff4500']],
                    width: 8
        }
    },
    axisTick: {            // 坐标轴小标记
        splitNumber: 5,   // 每份split细分多少段
                length :6,        // 属性length控制线长
                lineStyle: {       // 属性lineStyle控制线条样式
            color: 'auto'
        }
    },
    axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
        textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontSize: 10
        }
    },
    splitLine: {           // 分隔线
        show: true,        // 默认显示，属性show控制显示与否
                length :5,         // 属性length控制线长
                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
            color: 'auto'
        }
    },
    pointer : {
        width : 3
    },
    title : {
        show : true,
                offsetCenter: [0, '-40%'],       // x, y，单位px
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    detail : {
        formatter:'{value}\r\nMwh',
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    data:[{value: <?php if($$monthaccu["month_ynl"] == ''): ?>0<?php else: echo ($monthaccu["month_ynl"]); endif; ?>/1000, name: '用暖量'}]
    }
    ]
    };
    hotChart.setOption(hotoption);




    //---------------------------------------------

    var coldChart = echarts.init(document.getElementById('cold'));
    var coldoption = {
        series : [
            {
                name:'指标',
                type:'gauge',
                min:0,
                max:1000,
    splitNumber: 4,       // 分割段数，默认为5
            axisLine: {            // 坐标轴线
        lineStyle: {       // 属性lineStyle控制线条样式
            color: [[0.2, '#228b22'],[0.8, '#48b'],[1, '#ff4500']],
                    width: 8
        }
    },
    axisTick: {            // 坐标轴小标记
        splitNumber: 5,   // 每份split细分多少段
                length :6,        // 属性length控制线长
                lineStyle: {       // 属性lineStyle控制线条样式
            color: 'auto'
        }
    },
    axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
        textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontSize: 10
        }
    },
    splitLine: {           // 分隔线
        show: true,        // 默认显示，属性show控制显示与否
                length :5,         // 属性length控制线长
                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
            color: 'auto'
        }
    },
    pointer : {
        width : 3
    },
    title : {
        show : true,
                offsetCenter: [0, '-40%'],       // x, y，单位px
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    detail : {
        formatter:'{value}\r\nMwh',
                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
            color: 'auto',
                    fontWeight: 'bolder',
                    fontSize: 10
        }
    },
    data:[{value: <?php if($$monthaccu["month_yll"] == ''): ?>0<?php else: echo ($monthaccu["month_yll"]); endif; ?>/1000, name: '用冷量'}]
    }
    ]
    };
    coldChart.setOption(coldoption);

    });
</script>
</body>
</html>