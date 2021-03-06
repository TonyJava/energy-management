<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="/Public/vendor/bootstrap-table/bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link href="/Public/adminframework/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/adminframework/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/Public/adminframework/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/Public/vendor/bootstrap-table/bootstrap-table/src/bootstrap-table.css" rel="stylesheet" >
    <link href="/Public/adminframework/css/animate.css" rel="stylesheet">
    <link href="/Public/adminframework/css/style.css?v=4.0.0" rel="stylesheet">
    <link rel="stylesheet" href="/Public/vendor/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <base target="_blank">
    <style>
        .table
        {
            max-width: none;
        }
        /*.main-left{width: 20%;float: left;background-color: #fff}*/
        /*.main-right{width: 79%;float: left; margin-left:1%}*/

        .main-left{width: 200px;float: left;background-color: #fff}
        .main-right{ margin-left:220px;overflow: hidden;}

        .fixed-table-container tbody .selected td {
            /*background-color: yellow;*/
        }

        .table-hover > tbody > tr:hover > td,
        .table-hover > tbody > tr:hover > th {
            /*background-color: yellow;*/
        }
        .bootstrap-table .table:not(.table-condensed),
        .bootstrap-table .table:not(.table-condensed) > tbody > tr > th,
        .bootstrap-table .table:not(.table-condensed) > tfoot > tr > th,
        .bootstrap-table .table:not(.table-condensed) > thead > tr > td,
        .bootstrap-table .table:not(.table-condensed) > tbody > tr > td,
        .bootstrap-table .table:not(.table-condensed) > tfoot > tr > td {
            padding: 4px 8px 4px 8px;
        }
        .fixed-table-container thead th .th-inner,
        .fixed-table-container tbody td .th-inner {
            padding: 4px 8px 4px 8px;
            line-height: 24px;
            vertical-align: top;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .fixed-table-container .bs-checkbox .th-inner {
            padding: 8px 0;
        }
        #treesearchcontent{width: 130px;float: left;;margin-left: 10px;}
        #treesearch{width: 50px;border:0;height: 25.5px;background-color: #009688;line-height: 24px;color: #fff}

        /*.chosen-disabled{*/
            /*border: 1px solid red;*/
            /*background-color: #eee;*/
        /*}*/
        /*.chosen-container-single .chosen-single{*/
            /*background-color: #eee;*/
        /*}*/
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-content" style="padding: 10px 10px 10px 10px;margin-bottom: -15px;">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <i class="fa fa-hand-o-right"></i>&nbsp;当前位置:【设备管理】/【关联园区设备】
                </div>
            </div>
        </div>
    </div>
    <div class="main-left">
        <div class="content_wrap" style="width: 100%;max-height: 700px;overflow: auto">
            <!--<div style="margin-top: 4px;width: 99%">-->
                <!--<input type="text" id="treesearchcontent" placeholder="请输入筛选内容" >-->
                <!--<input type="button" id="treesearch" value="搜索" >-->
            <!--</div>-->
            <ul id="treeDemo" class="ztree"></ul>
        </div>
    </div>
    <div class="main-right">
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <div id="atpbiztoolbar">
                        <!--<button class="btn btn-success" type="button" id="sys_add_root"><i class="fa fa-pencil"></i>&nbsp;添加根节点</button>-->
                        <!--<button class="btn btn-success" type="button" id="sys_add_child"><i class="fa fa-pencil"></i>&nbsp;添加子节点</button>-->
                        <button class="btn btn-info" type="button" id="sys_add"><i class="fa fa-pencil"></i>&nbsp;添加</button>
                        <!--<button class="btn btn-info" type="button" onclick="refreashtree()"><i class="fa fa-pencil"></i>&nbsp;测试刷新</button>-->


                        <!--<button class="btn btn-info" type="button" id="sys_update"><i class="fa fa-pencil-square"></i>&nbsp;编辑</button>-->
                        <!-- <button class="btn btn-danger" type="button" id="sys_del"><i class="fa fa-eraser"></i>&nbsp;批量删除</button> -->
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
<script type="text/javascript" src="/Public/vendor/zTree_v3/js/jquery.ztree.core.js"></script>
<script src="/Public/vendor/html5Validate/src/jquery-html5Validate.js"></script>

<SCRIPT type="text/javascript">
    <!--
    RGN_ATPID="";
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: false
        },
        data: {
            simpleData: {
                enable: true,
                idKey: "id",
                pIdKey: "pid",
                rootPId: null
            }
        },
        callback: {
            beforeExpand: beforeExpand,
            onExpand: onExpand,
            onClick: onClick
        }
    };
    zNodes = <?php echo ($treedatas); ?>;
    selectzNodes = null;

    var curExpandNode = null;
    function beforeExpand(treeId, treeNode) {
        var pNode = curExpandNode ? curExpandNode.getParentNode():null;
        var treeNodeP = treeNode.parentTId ? treeNode.getParentNode():null;
        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
        for(var i=0, l=!treeNodeP ? 0:treeNodeP.children.length; i<l; i++ ) {
            if (treeNode !== treeNodeP.children[i]) {
                zTree.expandNode(treeNodeP.children[i], false);
            }
        }
        while (pNode) {
            if (pNode === treeNode) {
                break;
            }
            pNode = pNode.getParentNode();
        }
        if (!pNode) {
            singlePath(treeNode);
        }

    }
    function singlePath(newNode) {
        if (newNode === curExpandNode) return;

        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            rootNodes, tmpRoot, tmpTId, i, j, n;

        if (!curExpandNode) {
            tmpRoot = newNode;
            while (tmpRoot) {
                tmpTId = tmpRoot.tId;
                tmpRoot = tmpRoot.getParentNode();
            }
            rootNodes = zTree.getNodes();
            for (i=0, j=rootNodes.length; i<j; i++) {
                n = rootNodes[i];
                if (n.tId != tmpTId) {
                    zTree.expandNode(n, false);
                }
            }
        } else if (curExpandNode && curExpandNode.open) {
            if (newNode.parentTId === curExpandNode.parentTId) {
                zTree.expandNode(curExpandNode, false);
            } else {
                var newParents = [];
                while (newNode) {
                    newNode = newNode.getParentNode();
                    if (newNode === curExpandNode) {
                        newParents = null;
                        break;
                    } else if (newNode) {
                        newParents.push(newNode);
                    }
                }
                if (newParents!=null) {
                    var oldNode = curExpandNode;
                    var oldParents = [];
                    while (oldNode) {
                        oldNode = oldNode.getParentNode();
                        if (oldNode) {
                            oldParents.push(oldNode);
                        }
                    }
                    if (newParents.length>0) {
                        zTree.expandNode(oldParents[Math.abs(oldParents.length-newParents.length)-1], false);
                    } else {
                        zTree.expandNode(oldParents[oldParents.length-1], false);
                    }
                }
            }
        }
        curExpandNode = newNode;
    }
    function onExpand(event, treeId, treeNode) {
        curExpandNode = treeNode;
    }
    function onClick(e,treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
        zTree.expandNode(treeNode, null, null, null, true);
        selectzNodes = treeNode;
        if ('园区' == treeNode.type) {
            RGN_ATPID = treeNode.id;
            $('#atpbiztable').bootstrapTable('refresh')
        }
    }

    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
    });
    //-->
</SCRIPT>
<script>
/*************************************************************************************/
    $(function () {
        $('#treesearchcontent').bind("keypress",function(){
            if(event.keyCode == '13')
            {
                var content = $("#treesearchcontent").val();
                alert('回车事件'+ content);
            }
        });
        $('#treesearch').on("click",function()
        {
            var content = $("#treesearchcontent").val();
            alert('树搜索事件'+ content);
        });
        function getName() {

        }
        GLOBAL_SEARCHNAME = "设备名称搜索";
        $('#atpbiztable').bootstrapTable({
            url: '/index.php/Admin/Deviceregion/getData',         //请求后台的URL（*）
            method: 'post',                      //请求方式（*）
            toolbar: '#atpbiztoolbar',                //工具按钮用哪个容器
            striped: false,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,                   //是否显示分页（*）
            iconSize: 'outline',
            sortable: true,                     //是否启用排序
            sortName:"dev_code",
            sortOrder: "desc",                   //排序方式
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
            clickToSelect: true,                //是否启用点击选中行
//            height: 600,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "dev_atpid",                     //每一行的唯一标识，一般为主键列
//            showToggle: true,                    //是否显示详细视图和列表视图的切换按钮
//            cardView: true,                    //是否显示详细视图
            detailView: false,                   //是否显示父子表
            detailFormatter: "detailFormatter",
            height:510,
            columns: [
                [
                    // {checkbox: true},
                    {title: '序号', width: 50,align:'center',
                        formatter: function (value, row, index)
                        {
                            var option =  $('#atpbiztable').bootstrapTable("getOptions");
                            return option.pageSize * (option.pageNumber - 1) + index + 1;
                        }
                    },
                    
                    {field: 'dm_name', title: '设备卡名称',width: 150, align:'center', valign:'middle',sortable: true,
                        formatter: function (value, row, index) {
                            var inp = "'"+  row.dm_atpid +"'";
                            var value = value;
                            if (null != value){
                                var a = '<a onclick="check ('+ inp +')">'+value+'</a>&nbsp;<br>';
                            }
                            return a;
                        }
                    },
                    {field: 'dev_name', title: '设备类型', align:'center',width: 100, valign:'middle',sortable: true},
                    {field: 'rgn_name', title: '园区位置', align:'center',width: 150, valign:'middle',sortable: true},
//                    {field: 'rgn_name', title: '园区位置',width: 150, align:'center', valign:'middle',sortable: true,
//                        formatter: function (value, row, index) {
//                            var inp = "'"+  row.rgn_atpid +"'";
//                            var value = value;
//                            if (null != value){
//                                var a = '<a onclick="checkregion ('+ inp +')">'+value+'</a>&nbsp;<br>';
//                            }
//                            return a;
//                        }
//                    },

                    {field: 'dev_code', title: '设备卡编号',width: 100, align:'center', valign:'middle',sortable: true},
                    {field: 'dpm_name', title: '设备卡所属部门',width: 120, align:'center', valign:'middle',sortable: true,
                        // formatter: function (value, row, index) {
                        //     var inp = "'"+  row.dpm_atpid +"'";
                        //     var value = value;
                        //     if (null != value){
                        //         var a = '<a onclick="checkdepartment ('+ inp +')">'+value+'</a>&nbsp;<br>';
                        //     }
                        //     return a;
                        // }
                    },
                    {field: 'dpm_usename', title: '设备卡使用部门',width: 120, align:'center', valign:'middle',sortable: true,
                        // formatter: function (value, row, index) {
                        //     var inp = "'"+  row.dpm_atpid1 +"'";
                        //     var value = value;
                        //     if (null != value){
                        //         var a = '<a onclick="checkdepartment ('+ inp +')">'+value+'</a>&nbsp;<br>';
                        //     }
                        //     return a;
                        // }
                    },
                    {field: 'dev_linkphone', title: '设备卡联系电话',width: 120, align:'center', valign:'middle',sortable: true},
                    {field: 'dev_status', title: '状态',width: 50, align:'center', valign:'middle',sortable: true},
                 //   {field: 'dev_arrivedatetime', title: '到货日期',width: 150, align:'center', valign:'middle',sortable: true},
                //    {field: 'dev_startdatetime', title: '安装日期',width: 150, align:'center', valign:'middle',sortable: true},
                //    {field: 'dev_stopdatetime', title: '停用日期',width: 150, align:'center', valign:'middle',sortable: true},
                    {field: 'dev_equipmentprice', title: '设备价格',width: 100, align:'center', valign:'middle',sortable: true,
                        formatter: function (value, row, index) {
                            var a = row['dev_equipmentprice'] + '元';
                            if (null == value || '' == value) {
                                return '';
                            }
                            else {
                                return a;
                            }
                        }
                    },
              //      {field: 'dev_produceddate', title: '生产日期',width: 150, align:'center', valign:'middle',sortable: true},
                //    {field: 'dev_guaranteetime', title: '保修期',width: 150, align:'center', valign:'middle',sortable: true},
                    {field: 'dev_acquisition', title: '设备卡采集号',width: 100, align:'center', valign:'middle',sortable: true},
                    {field: 'dev_ip', title: 'IP地址', align:'center',width: 100, valign:'middle',sortable: true},
                    {field: 'dev_lastuploadtime', title: '最后上传时间',width: 150, align:'center', valign:'middle',sortable: true},
                    // {field: 'dev_unuploadlegth', title: '未上传时长', align:'center', valign:'middle',sortable: true,
                    //     formatter: function (value, row, index) {
                    //         var a = row['dev_unuploadlegth'] + '小时';
                    //         if (null == value || '' == value) {
                    //             return '';
                    //         }
                    //         else {
                    //             return a;
                    //         }
                    //     }
                    // },

                    {field:'dev_atpid',title:'主键',visible:false},
                    {field:'dev_atpcreatedatetime',title:'创建时间',visible:false},
                    {field:'dev_atpcreateuser',title:'创建人',visible:false},
                    {field:'dev_atplastmodifydatetime',title:'最后修改时间',visible:false},
                    {field:'dev_atplastmodifyuser',title:'最后修改人',visible:false},
                    {field:'dev_atpstatus',title:'数据状态',visible:false},
                    {field:'dev_atpsort',title:'数据排序',visible:false},
                    {field:'dev_atpremark',title:'数据备注',visible:false},
                    {field: 'dev_atpid', title: '操作',align:'center', sortable: false,
                        formatter: function (value, row, index) {
                            var inp = "'"+  value +"'";
                            // var a = '<a  class="btn btn-info btn-xs" onclick="updateInRow('+ inp +')">编辑</a>&nbsp;';
                            var a = '<a  class="btn btn-danger btn-xs" onclick="delInRow('+ inp +')">删除</a>';
                            return a;
                        }
                    },
                ]
            ],
            onDblClickRow: function (row) {
                // $("#sys_dlg").load('/index.php/Admin/Deviceregion/edit?id=' + row['dev_atpid'], function() {
                //     $('#sys_dlg_submit').on('click',submitdata);
                //     $("#sys_dlg").modal({backdrop: false});
                // });
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
            rgn_atpid: RGN_ATPID,
            sort: params.sort,  //排序列名
            sortOrder: params.order//排位命令（desc，asc）
        };
        return temp;
    }

    $('#sys_add').on('click',function(){
        if(null==RGN_ATPID || ''==RGN_ATPID) {
            alert("请先选所在设备点后再进行添加操作！");
        }
        else{
            $.post('/index.php/Admin/Deviceregion/isPosition',{'rgn_atpid':RGN_ATPID},function(data){   //是否是设备点
                if('1' == data){
                    $.post('/index.php/Admin/Deviceregion/isOne',{'rgn_atpid':RGN_ATPID},function(data){
                        if ('1' == data)
                        {
                            alert('该位置点下已经存在使用中的设备！');
                        }else{
                           // $.post('/index.php/Admin/Deviceregion/isHasDevice',{'rgn_atpid':RGN_ATPID},function (data) {
                              //  if('1' == data){
                                    $("#sys_dlg").load('/index.php/Admin/Deviceregion/adddevice?rgn_atpid='+RGN_ATPID, function() {
                                        $("button[name ='bc']").attr("data-dismiss","");
                                        $('#sys_dlg_device_submit').on('click', submitdevicedata);
                                        $("#sys_dlg").modal({backdrop: false});
                                    });
                             //   }else{
                                  //  alert('没有符合条件的待安装设备卡【能源类型不匹配】，请先去库存中出库！');
                            //    }
                          //  });
                        }
                    })
                }else{
                    alert('只有设备点才能添加设备卡片！');
                }
            })
        }
    });

    function submitdevicedata()
    {
        var tablerow = $('#atpbiztable_device').bootstrapTable('getSelections');//console.log(tablerow);
        if(tablerow.length!=1)
        {
            alert("您已多选或者少选，仅能对一条数据进行操作");
        }
        else {
            $("#sys_dlg_device_form").submit(function(e)
            {
                $("button[name ='bc']").attr("data-dismiss","modal");
                var dev_atpid = [];
                $.each(tablerow, function () {
                    dev_atpid.push(this['dev_atpid']);
                });
                $.ajax({
                    url: '/index.php/Admin/Deviceregion/tablesubmit',
                    type: 'POST',
                    data:  {'dev_atpid':dev_atpid.join(','),'rgn_atpid':RGN_ATPID},
                    success: function(data, textStatus, jqXHR)
                    {
                        alert('添加设备卡成功！');
//                        location.reload();
                        refreashtree();
                        $('#atpbiztable').bootstrapTable('refresh');
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        alert('添加设备卡失败！');
                        $('#atpbiztable').bootstrapTable('refresh')
                    }
                });
                e.preventDefault();
            });
            $("#sys_dlg_device_form").submit();
        }
    }

    function refreashtree()
    {
        $.ajax({
            url: '/index.php/Admin/Deviceregion/regiontree',
            type: 'POST',
            data:  null,
            success: function(data, textStatus, jqXHR)
            {
                var tzNodes = $.parseJSON( data );
                $.fn.zTree.init($("#treeDemo"), setting, tzNodes);
                zTree = $.fn.zTree.getZTreeObj("treeDemo");
//                var node = zTree.getNodeByParam("id","guidEAADAB5F-707E-44A6-A04E-803D1B2716DF");
//                console.log(selectzNodes);
                var node = selectzNodes;
                var parent = node.getParentNode();
                zTree.expandNode(parent,true,true);
                zTree.selectNode(node);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    }

    function delInRow(id)
    {
        if (confirm('确认删除数据?')) {
            var ids = [];
            ids.push(id);
            $.post('/index.php/Admin/Deviceregion/del', {ids: ids.join(',')}, function (rep, status) {
                if ('' == rep) {
                    // location.reload();
                    refreashtree();
                   $('#atpbiztable').bootstrapTable('refresh');
                }
                else {
                    alert('删除失败' + "可能是因为数据存在关联无法删除<br>错误详情：" + rep);
                }
            });
        }
    }


    function check(id){
        $("#sys_dlg").load('/index.php/Admin/Deviceregion/check?id=' + id, function() {
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