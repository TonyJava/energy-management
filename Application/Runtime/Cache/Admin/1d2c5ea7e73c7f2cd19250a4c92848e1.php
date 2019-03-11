<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>统计查看</title>
    <link rel="stylesheet" href="/Public/vendor/diy_component/yuanqu_page/css/bootstrap.css">
    <style>
		.nav-tabs {
			margin-bottom: 5px;
		}
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-8 col-sm-6 m-b-xs">
            <div data-toggle="buttons" class="btn-group nav-tabs">
                <label class="btn btn-sm btn-white active" data-target="0">
                    <input type="radio" id="option1" name="options">用水量</label>
                <label class="btn btn-sm btn-white" data-target="1">
                    <input type="radio" id="option2" name="options">电量值</label>
                <label class="btn btn-sm btn-white" data-target="2">
                    <input type="radio" id="option3" name="options">暖能用量</label>
                <label class="btn btn-sm btn-white" data-target="3">
                    <input type="radio" id="option4" name="options">冷能用量</label>
            </div>
       <!--      <div class="col-lg-3 col-sm-4">
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control data1" name="start" value="2014-11-10" />
                    <span class="input-group-addon">到</span>
                    <input type="text" class="input-sm form-control data1" name="end" value="2014-11-17" />
                </div>
            </div> -->
         <!--    <div class="col-lg-1 col-sm-2">
                <button type="button" class="btn btn-sm btn-primary"> 查找</button>
            </div> -->
        </div>
        <div class="ctab cbody tab-content">
            <div class="ctab content " id="mycharts" style="height: 200px;">
            </div>
            <div class="ctab content active" id="charts2" style="display: none;height: 200px;">
            </div>
            <div class="ctab content " id="charts3" style="display: none;height: 200px;">
            </div>
            <div class="ctab content " id="charts4" style="display:none;height: 200px;">
            </div>
        </div>
    </div>
    <script src="/Public/vendor/diy_component/yuanqu_page/js/jquery-1.12.4.js"></script>
    <script src="/Public/vendor/diy_component/yuanqu_page/js/bootstrap.js"></script>
    <script src="/Public/vendor/diy_component/yuanqu_page/js/echarts.js"></script>
    <script>
    var charts = [];
    var opts = [{
        color:['#0099cc'],
        title: {
            text: ''
        },
        tooltip: {
             trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['用水量']
        },
        toolbox: {
            show: false,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: true },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        xAxis: {
            data: ["0时", "1时", "2时", "3时", "4时", "5时", "6时","7时", "8时", "9时", "10时", "10时","12时", "13时", "14时", "15时", "16时", "17时", "18时","19时", "20时", "21时", "22时", "23时"]
        },
        yAxis: {},
        series: [{
            name: '用水量',
            type: 'bar',
            data: [<?php echo ($dayaccu[0]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[1]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[2]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[3]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[4]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[5]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[6]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[7]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[8]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[9]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[10]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[11]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[12]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[13]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[14]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[15]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[16]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[17]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[18]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[19]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[20]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[21]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[22]["d2h_syslaccu"]); ?>, <?php echo ($dayaccu[23]["d2h_syslaccu"]); ?>]
        }]
    }, {
        color:['#3366cc'],
        title: {
            text: ''
        },
        tooltip: {
             trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['电量值']
        },
        toolbox: {
            show: false,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: true },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        xAxis: {
            data: ["0时", "1时", "2时", "3时", "4时", "5时", "6时","7时", "8时", "9时", "10时", "10时","12时", "13时", "14时", "15时", "16时", "17时", "18时","19时", "20时", "21时", "22时", "23时"]
        },
        yAxis: {},
        series: [{
            name: '电量值',
            type: 'bar',
            data: [<?php echo ($dayaccu[0]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[1]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[2]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[3]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[4]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[5]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[6]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[7]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[8]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[9]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[10]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[11]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[12]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[13]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[14]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[15]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[16]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[17]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[18]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[19]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[20]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[21]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[22]["d2h_dglaccu"]); ?>, <?php echo ($dayaccu[23]["d2h_dglaccu"]); ?>]
        }]
    }, {
        color:['#ff6347'],
        title: {
            text: ''
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['暖能用量']
        },
        toolbox: {
            show: false,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: true },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        xAxis: [{
            type: 'category',
            data: ["0时", "1时", "2时", "3时", "4时", "5时", "6时","7时", "8时", "9时", "10时", "10时","12时", "13时", "14时", "15时", "16时", "17时", "18时","19时", "20时", "21时", "22时", "23时"]
        }],
        yAxis: [{
            // type: 'value'
        }],
        // visualMap: {
            // show: false,
            // min: 0,
            // max: 400,
            // range: [0, 370],
            // inRange: { color: ['red', 'blue', 'green'] },
            // outOfRange: {
                // color: ['red', 'rgba(3,4,5,0.4)', 'yellow'],
                // symbolSize: [30, 100]
            // }
        // },
        series: [{
            name: '暖能用量',
            type: 'bar',
            data: [<?php echo ($dayaccu[0]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[1]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[2]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[3]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[4]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[5]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[6]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[7]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[8]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[9]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[10]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[11]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[12]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[13]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[14]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[15]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[16]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[17]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[18]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[19]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[20]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[21]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[22]["d2h_ynlaccu"]); ?>, <?php echo ($dayaccu[23]["d2h_ynlaccu"]); ?>]
        }]
    }, {
        color:['#40e0d0'],
        title: {
            text: ''
        },
        tooltip: {
             trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['冷能用量']
        },
        toolbox: {
            show: false,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: true },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        xAxis: {
            type: 'category',
            data: ["0时", "1时", "2时", "3时", "4时", "5时", "6时","7时", "8时", "9时", "10时", "10时","12时", "13时", "14时", "15时", "16时", "17时", "18时","19时", "20时", "21时", "22时", "23时"]
        },
        yAxis: {},
        series: [{
            name: '冷能用量',
            type: 'bar',
            data: [<?php echo ($dayaccu[0]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[1]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[2]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[3]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[4]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[5]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[6]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[7]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[8]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[9]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[10]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[11]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[12]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[13]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[14]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[15]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[16]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[17]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[18]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[19]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[20]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[21]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[22]["d2h_yllaccu"]); ?>, <?php echo ($dayaccu[23]["d2h_yllaccu"]); ?>]
        }]
    }];
    </script>
    <script>
    $(function() {
        $(".cbody>.content:gt(0)").hide();
        $(".nav-tabs ").delegate('label', 'click', function(e) {
            if ($(this).hasClass("active")) {
                return;
            }
            $(this).addClass('active').siblings('label').removeClass("active");
            var index = $(this).data('target');
            $('.cbody>.content:eq(' + index + ')').show(function() {
                charts[index].setOption(opts[index]);
                charts[index].resize();
            }).siblings().hide();

        });
        $(".cbody>.content").each(function() {
            charts.push(echarts.init($(this).get(0)));
        });
        charts[0].setOption(opts[0]);
    });
    $(window).resize(function() {
        $(charts).each(function(index, chart) {
            chart.resize();
        });
    });
    </script>
</body>

</html>