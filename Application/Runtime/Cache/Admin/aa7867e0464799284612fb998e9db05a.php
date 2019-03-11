<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>楼层首页</title>
    <link rel="stylesheet" href="/Public/vendor/diy_component/yuanqu_page/css/reset.css">
    <link rel="stylesheet" href="/Public/vendor/diy_component/yuanqu_page/css/house1.css">
    <style>

        .alarmdian1_current {  left: 38.5%;  top: 15.5%;  position: absolute;  }
        .alarmdev1_current {  left: 50%;  top: 29%;  position: absolute;  }
        .alarmdev2_current {  left: 51.5%;  top: 31%;  position: absolute;  }
        .alarmdev3_current {  left: 53.5%;  top: 34%;  position: absolute;  }
        .alarmdev4_current {  left: 41%;  top: 36%;  position: absolute;  }
        .alarmdev5_current {  left: 44%;  top: 36%;  position: absolute;  }
        .alarmdev6_current {  left: 46%;  top: 36%;  position: absolute;  }
        .alarmdev7_current {  left: 50%;  top: 36%;  position: absolute;  }
        .alarmdev8_current {  left: 53%;  top: 4%;  position: absolute;  }
        .alarmdev9_current {  left: 56%;  top: 42%;  position: absolute;  }
        .alarmdev10_current {  left: 60%;  top: 36%;  position: absolute;  }
        .alarmdev11_current {  left: 62%;  top: 36%;  position: absolute;  }
        .alarmdev12_current {  left: 64%;  top: 36%;  position: absolute;  }
        .alarmdev13_current {  left: 66%;  top: 4%;  position: absolute;  }

        .alarmdian1 {  left: 38.5%;  top: 22.5%;  position: absolute;  }
        .alarmdev1 {  left: 50%;  top: 36%;  position: absolute;  }
        .alarmdev2 {  left: 51.5%;  top: 38%;  position: absolute;  }
        .alarmdev3 {  left: 53.5%;  top: 41%;  position: absolute;  }
        .alarmdev4 {  left: 41%;  top: 43%;  position: absolute;  }
        .alarmdev5 {  left: 44%;  top: 43%;  position: absolute;  }
        .alarmdev6 {  left: 46%;  top: 43%;  position: absolute;  }
        .alarmdev7 {  left: 50%;  top: 43%;  position: absolute;  }
        .alarmdev8 {  left: 53%;  top: 10%;  position: absolute;  }
        .alarmdev9 {  left: 56%;  top: 48%;  position: absolute;  }
        .alarmdev10 {  left: 60%;  top: 43%;  position: absolute;  }
        .alarmdev11 {  left: 62%;  top: 43%;  position: absolute;  }
        .alarmdev12 {  left: 64%;  top: 43%;  position: absolute;  }
        .alarmdev13 {  left: 66%;  top: 10%;  position: absolute;  }
    </style>
</head>
<body>

<div class="full_building">


    <!--  当前层报警信息霍尼韦尔不可操作-->



    <?php if(!empty($$bjdata[0]["dev_name"])): ?><div class="unusual1 unusual" style="z-index:9999;">
            <p>表类型：<?php echo ($bjdata[0]["dev_name"]); ?></p>
            <p>报警等级：<?php echo ($bjdata[0]["alm_level"]); ?></p>
            <p>报警信息：<?php echo ($bjdata[0]["alm_content"]); ?></p>
            <p>设备采集号：<?php echo ($bjdata[0]["dev_acquisition"]); ?></p>
            <p>设备位置点：<?php echo ($bjdata[0]["rgn_name"]); ?></p>
            <?php if($_SESSION['is_hnwl']== ''): ?><p>报警确认状态： <button onclick="dodetail()">待确认</button>&nbsp;<button onclick="domiss()">关闭</button></p><?php endif; ?>
        </div><?php endif; ?>







    <!-- 这里一层用的二层的图到时在替换-->

    <img src="/Public/vendor/diy_component/yuanqu_page/images/2/2D-8F.png" width="60%" style="margin-top: 50px">





    <!--别的页面跳转过来该设备的的时候在该设备上面加一个向下的图标-->
    <?php if(is_array($sbdstatus)): foreach($sbdstatus as $key=>$dvdetail): ?><!--一个电表对应多个设备点-->
        <?php if($key == 'dian'): if (in_array($currentid, $dvdetail['rgnids'])) { ?>
            <img class="alarmimg alarmdian1_current" src="/Public/vendor/diy_component/yuanqu_page/images/arrow.gif" />

            <?php  } ?>

            <!--  /index.php/Admin/Rg/indexparkoverviewshell?regionlevel=devicepoint&rgn_atpid=<?php echo ($dvdetail["dev_regionid"]); ?>-->
            <!-- 每个设备点的图片与悬浮框信息有报警误报警图片不同-->
            <a href="#" id="sys_checkone"
               class="alarmimg alarmdian1"
               data-mtpis='
                   <?php if(is_array($dvdetail["data"])): foreach($dvdetail["data"] as $key=>$item): ?><p>型号:<span><?php echo ($item["dev_name"]); ?></span>&nbsp;&nbsp;&nbsp;采集号:<?php echo ($item["dev_acquisition"]); ?>&nbsp;&nbsp;&nbsp;报警数目:<font color="red"><?php echo ($item["alarmcount"]); ?></font>个</p><?php endforeach; endif; ?>
                 '>
                <?php if($dvdetail['bj'] != '0'): ?><img src="/Public/vendor/diy_component/yuanqu_page/images/dian1.png"  />
                    <?php else: ?>
                    <img src="/Public/vendor/diy_component/yuanqu_page/images/dian.png"  /><?php endif; ?>

            </a>

            <?php else: ?>
            <?php if(($_GET['rgn_atpidcurrent']!= null ) and ($_GET['rgn_atpidcurrent']== $dvdetail['dev_regionid'])): ?><img class="alarmimg alarmdev<?php echo ($key); ?>_current" src="/Public/vendor/diy_component/yuanqu_page/images/arrow.gif" />
                <?php else: endif; ?>

            <!-- 每个设备点的图片与悬浮框信息有报警误报警图片不同-->
            <a href="/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=devicepoint&rgn_atpid=<?php echo ($dvdetail["dev_regionid"]); ?>"
               class="alarmimg alarmdev<?php echo ($key); ?>"
               data-mtpis='
               <p>型号:<?php echo ($dvdetail["dev_name"]); ?></p>
               <p>采集号:<?php echo ($dvdetail["dev_acquisition"]); ?></p>
               <p>报警数目:<font color="red"><?php echo ($dvdetail["alarmcount"]); ?></font>个
               </p>'
                    >

                <?php if(($dvdetail['dev_name'] == '水表')): if($dvdetail['alarmcount'] != '0'): ?><img src="/Public/vendor/diy_component/yuanqu_page/images/shui1.png"  />
                        <?php else: ?>
                        <img src="/Public/vendor/diy_component/yuanqu_page/images/shui.png"  /><?php endif; ?>
                    <?php else: endif; ?>
                <?php if(($dvdetail['dev_name'] == '冷暖表')): if($dvdetail['alarmcount'] != '0'): ?><img src="/Public/vendor/diy_component/yuanqu_page/images/nuan1.png"  />
                        <?php else: ?>
                        <img src="/Public/vendor/diy_component/yuanqu_page/images/nuan.png"  /><?php endif; ?>
                    <?php else: endif; ?>
            </a><?php endif; endforeach; endif; ?>

</div>

<div class="list-right">
    <a class="energy_message" target="_self">
        <?php if($b2d_flr_13 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng13F'"><p class="fl">13F（报警总数：<?php echo ($b2d_flr_13); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid3F2D1714-FF0E-4BB7-9160-FA06C93A53E2';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng13F'"><p class="fl">13F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid3F2D1714-FF0E-4BB7-9160-FA06C93A53E2';preventBubble();">更多</span></header><?php endif; ?>
    </a>
    <a class="energy_message" target="_self">
        <?php if($b2d_flr_12 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng12F'"><p class="fl">12F（报警总数：<?php echo ($b2d_flr_12); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidBAB98582-C86E-49D0-B23D-57B04F0F058B';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng12F'"><p class="fl">12F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidBAB98582-C86E-49D0-B23D-57B04F0F058B';preventBubble();">更多</span></header><?php endif; ?>
    </a>
    <a class="energy_message" target="_self">
        <?php if($b2d_flr_11 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng11F'"><p class="fl">11F（报警总数：<?php echo ($b2d_flr_11); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidB0C345F6-B146-4BF5-9CCD-914747E4A966';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng11F'"><p class="fl">11F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidB0C345F6-B146-4BF5-9CCD-914747E4A966';preventBubble();">更多</span></header><?php endif; ?>
    </a>
    <a class="energy_message" target="_self">
        <?php if($b2d_flr_10 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng10F'"><p class="fl">10F（报警总数：<?php echo ($b2d_flr_10); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidD7CEAC81-5E4A-4A3A-9C50-4D377A5082BD';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng10F'"><p class="fl">10F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidD7CEAC81-5E4A-4A3A-9C50-4D377A5082BD';preventBubble();">更多</span></header><?php endif; ?>
    </a>
    <a class="energy_message" target="_self">
        <?php if($b2d_flr_9 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng9F'"><p class="fl">9F（报警总数：<?php echo ($b2d_flr_9); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid84D6D793-7AC6-40BB-ACFC-FB6B7680B9DB';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng9F'"><p class="fl">9F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid84D6D793-7AC6-40BB-ACFC-FB6B7680B9DB';preventBubble();">更多</span></header><?php endif; ?>
    </a>
    <a class="energy_message  cur" target="_self">

        <!-- 需要注意一楼网上没有自动展开效果-->
        <!-- 有无报警总数展示不同的效果这里只是报警信息-->
        <?php if($b2d_flr_8 != 0): ?><!--头部调到相应层数控制器展示对应层信息-->
            <header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng8F'">
                <p class="fl">8F（报警总数：<?php echo ($b2d_flr_8); ?>）</p>
                <!-- 更多调到详情页-->
                <span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid7D97D89E-8649-4162-8469-9C6F1ADA9BF1';preventBubble();">更多</span>
            </header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng8F'">
                <p class="fl">8F</p>
                <span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid7D97D89E-8649-4162-8469-9C6F1ADA9BF1';preventBubble();">更多</span>
            </header><?php endif; ?>
        <div class="alarmlist">
            <ul>
                <!--  霍尼韦尔点击报警信息跳转的也是详细信息页面不会显示报警页面-->

                <?php if(is_array($bjdata)): foreach($bjdata as $key=>$bj): ?><li class="border_bottom clearfix" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid7D97D89E-8649-4162-8469-9C6F1ADA9BF1&rgn_atpidcurrent=<?php echo ($bj["rgn_atpid"]); ?>'">
                        <div class="fl tips"><?php echo ($bj["dev_name"]); ?></div>
                        <div class="ll content">
                            <div class="fl bold"><?php echo ($bj["rgn_name"]); ?></div>
                            <div class="fr text_right bold"><?php echo (substr($bj["alm_datetime"],5)); ?></div><br>
                            <div class="fl bold"><?php echo ($bj["alm_content"]); ?></div>
                        </div>
                    </li><?php endforeach; endif; ?>

            </ul>
            <div class="listfooter">
                <div><p>当日电能</p><p><?php if($dayused["ydl"] == ''): ?>0Kwh<?php else: echo ($dayused["ydl"]); ?>Kwh<?php endif; ?></p></div>
                <div><p>当日用水量</p><p><?php if($dayused["ysl"] == ''): ?>0T<?php else: echo ($dayused["ysl"]); ?>T<?php endif; ?></p></div>
                <div><p>当日热能</p><p><?php if($dayused["ynl"] == ''): ?>0Kwh<?php else: echo ($dayused["ynl"]); ?>Kwh<?php endif; ?></p></div>
                <div><p>当日冷能</p><p><?php if($dayused["yll"] == ''): ?>0Kwh<?php else: echo ($dayused["yll"]); ?>Kwh<?php endif; ?></p></div>
            </div>
        </div>

    </a>


    <a class="energy_message" target="_self">
        <?php if($b2d_flr_7 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng7F'"><p class="fl">7F（报警总数：<?php echo ($b2d_flr_7); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid0B52D431-23C3-4916-B5A0-6CA3986294D3';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng7F'"><p class="fl">7F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid0B52D431-23C3-4916-B5A0-6CA3986294D3';preventBubble();">更多</span></header><?php endif; ?>


    </a>




    <a class="energy_message " target="_self">
        <?php if($b2d_flr_6 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng6F'"><p class="fl">6F（报警总数：<?php echo ($b2d_flr_6); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidF62A9B01-DC6B-46C8-8C2A-3F325A92AD53';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng6F'"><p class="fl">6F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidF62A9B01-DC6B-46C8-8C2A-3F325A92AD53';preventBubble();">更多</span></header><?php endif; ?>

    </a>



    <a class="energy_message " target="_self">
        <?php if($b2d_flr_5 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng5F'"><p class="fl">5F（报警总数：<?php echo ($b2d_flr_5); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid22DA729D-A282-4ADF-A6D3-C5B823855569';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng5F'"><p class="fl">5F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid22DA729D-A282-4ADF-A6D3-C5B823855569';preventBubble();">更多</span></header><?php endif; ?>

    </a>
    <a class="energy_message " target="_self">
        <?php if($b2d_flr_4 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng4F'"><p class="fl">4F（报警总数：<?php echo ($b2d_flr_4); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidB5A029FD-E7E3-44C3-815A-31C728238F01';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng4F'"><p class="fl">4F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidB5A029FD-E7E3-44C3-815A-31C728238F01';preventBubble();">更多</span></header><?php endif; ?>

    </a>



    <a class="energy_message " target="_self">
        <?php if($b2d_flr_3 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng3F'"><p class="fl">3F（报警总数：<?php echo ($b2d_flr_3); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidA3C107AF-AB84-432E-A5D7-ECF4547B7F46';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng3F'"><p class="fl">3F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidA3C107AF-AB84-432E-A5D7-ECF4547B7F46';preventBubble();">更多</span></header><?php endif; ?>

    </a>



    <a class="energy_message " target="_self">
        <?php if($b2d_flr_2 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng2F'"><p class="fl">2F（报警总数：<?php echo ($b2d_flr_2); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid6CDB325F-458A-4E4E-ABF6-BAEEBC116273';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng2F'"><p class="fl">2F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid6CDB325F-458A-4E4E-ABF6-BAEEBC116273';preventBubble();">更多</span></header><?php endif; ?>

    </a>



    <a class="energy_message " target="_self">
        <?php if($b2d_flr_1 != 0): ?><header style="background: #fc9900;cursor: pointer;" onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng1F'"><p class="fl">1F（报警总数：<?php echo ($b2d_flr_1); ?>）</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidD471BC27-85B0-4E38-A408-B9AFE6DB267C';preventBubble();">更多</span></header>
            <?php else: ?>
            <header onclick="window.location.href='/index.php/Admin/Parkoverview/F2d_ceng1F'"><p class="fl">1F</p><span class="fr zhankai" onclick="window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guidD471BC27-85B0-4E38-A408-B9AFE6DB267C';preventBubble();">更多</span></header><?php endif; ?>

    </a>


</div>

<div class="total1">
    <header><p class="fl">2D#8层当月能耗&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 8px;"><?php echo '刷新时间:'.date('G:i:s').'(频率60秒)'; ?></span> </p><span class="fr zhankai"></span></header>
    <div class="totalcontent clearfix">
        <img src="/Public/vendor/diy_component/yuanqu_page/images/building.png" class="fl totalhouse">
        <div class="rightcontent fr">
            <ul>
                <li><i class="green"></i>电能消耗：<?php echo ($zydl); ?>Kwh</li>
                <li><i class="blue"></i>水能消耗：<?php echo ($zysl); ?>T</li>
                <li><i class="orange"></i>暖能消耗：<?php echo ($zynl); ?>Kwh</li>
                <li><i class="qing"></i>冷能消耗：<?php echo ($zyll); ?>Kwh</li><input type="hidden" id="rid" value="<?php echo ($rgnid); ?>">
            </ul>
        </div>
    </div>
</div>
<div id="sys_dlg" role="dialog" class="modal fade "></div>

<div class="legend">
    <header><p class="fl">报警图标说明</p></header>
    <div class="totalcontent clearfix">
        <ul>
            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/shui.png"></label>代表水表正常</li>
            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/shui1.png"></label>代表水表异常</li>

            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/dian.png"></label>代表电表正常</li>
            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/dian1.png"></label>代表电表异常</li>

            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/nuan.png"></label>代表冷暖表正常</li>
            <li><label for=""><img src="/Public/vendor/diy_component/yuanqu_page/images/nuan1.png"></label>代表冷暖表异常</li>


        </ul>
    </div>
</div>

<script src="/Public/vendor/diy_component/yuanqu_page/js/jquery-1.12.4.js"></script>
<script src="/Public/vendor/diy_component/yuanqu_page/js/layer/layer.js"></script>
<script src="/Public/vendor/diy_component/yuanqu_page/js/mTips.js"></script>
<script>
    $('#sys_checkone').on('click',function() {
        jsonstrig=$("#rid").val();
        /* $.post(url,{rgjson:jsonstring},function(result){ //通过Ajax发送请求到后台*/
        layer.open({
            type: 2,
            title:'点击查看详情',
            fix: false,
            maxmin: true,
            shadeClose: true,
            shade: 0.8,
            area: ['1000px', '700px'],
            content: "/index.php/Admin/Parkoverview/checkone?rgjson="+jsonstrig,
            end: function () {
                location.reload();
            }
        });
    });
    setInterval(function(){
        location.reload();
    },60*1000);

    function dodetail() {
        window.location.href='/index.php/Admin/Rg/indexparkoverviewshell?regionlevel=region&rgn_atpid=guid7D97D89E-8649-4162-8469-9C6F1ADA9BF1&rgn_atpidcurrent=<?php echo ($bjdata[0]["rgn_atpid"]); ?>';
    }

    function domiss() {
        $(".unusual1").remove();
    }

    function preventBubble(event){
        var e=arguments.callee.caller.arguments[0]||event; //若省略此句，下面的e改为event，IE运行可以，但是其他浏览器就不兼容
        if (e && e.stopPropagation) {
            e.stopPropagation();
        } else if (window.event) {
            window.event.cancelBubble = true;
        }
    }
</script>
</body>
</html>