<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<div class="modal-dialog" style="width: 1000px;z-index: 10;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">数据编辑</h4>
        </div>
        <div class="modal-body">
            <form onkeydown="if(event.keyCode==13){return false;}"  id="sys_dlg_form" role="form" class="form-horizontal">
                <div>
                    <!--<ul class="nav nav-tabs">-->
                        <!--&lt;!&ndash;<li class="active"><a data-toggle="tab" href="#tab-1">基础信息</a></li>&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class=""><a data-toggle="tab" href="#tab-2">球员/领队信息</a></li>&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class=""><a data-toggle="tab" href="#tab-3">裁判信息</a></li>&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class=""><a data-toggle="tab" href="#tab-4">保险信息</a></li>&ndash;&gt;-->
                    <!--</ul>-->
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <span style="color: red">*</span>
                                        名称：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="rgn_name" type="text"  value="<?php echo ($data["rgn_name"]); ?>" class="form-control" required>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        面积：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="rgn_area" type="number"  value="<?php echo ($data["rgn_area"]); ?>" class="form-control" pattern="^\d+$" placeholder="单位：平方米">
                                        <font color="red">数字整数格式（大于等于0）</font>
                                    </div>
                                    <!--<label class="col-sm-2 control-label">-->
                                        <!--代号：-->
                                    <!--</label>-->
                                    <!--<div class="col-sm-4">-->
                                        <!--<input name="rgn_codename" type="text"  value="<?php echo ($data["rgn_codename"]); ?>" class="form-control">-->
                                    <!--</div>-->
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        类别：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="rgn_category" id="rgn_category" class="chosen-select">
                                            <!--<option value="">&nbsp;==请选择==</option>-->
                                            <?php if(is_array($ds_category)): foreach($ds_category as $cg_k=>$cg_v): ?><option value="<?php echo ($cg_v); ?>" <?php if($data['rgn_category'] == $cg_v): ?>selected<?php else: endif; ?> ><?php echo ($cg_v); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        使用类别：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="rgn_buildstatus" id="rgn_buildstatus" class="chosen-select">
                                            <!--<option value="">&nbsp;==请选择==</option>-->
                                            <?php if(is_array($ds_buildstatus)): foreach($ds_buildstatus as $bs_k=>$bs_v): ?><option value="<?php echo ($bs_v); ?>" <?php if($data['rgn_buildstatus'] == $bs_v): ?>selected<?php else: endif; ?> ><?php echo ($bs_v); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        楼宇状态：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="rgn_floorstatus" id="rgn_floorstatus" class="chosen-select">
                                            <!--<option value="">&nbsp;==请选择==</option>-->
                                            <?php if(is_array($ds_floorstatus)): foreach($ds_floorstatus as $fs_k=>$fs_v): ?><option value="<?php echo ($fs_v); ?>" <?php if($data['rgn_floorstatus'] == $fs_v): ?>selected<?php else: endif; ?> ><?php echo ($fs_v); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        位置备注：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="rgn_location" type="text"  value="<?php echo ($data["rgn_location"]); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">能源类别：</label>
                                    <div class="col-sm-4">
                                        <select name="energytype[]" class="chosen-select" multiple id="energytype">
                                            <?php if(is_array($ds_energytype)): foreach($ds_energytype as $detk=>$detv): if(('是' == $detv['aux_selected'])): ?><option value="<?php echo ($detv["et_atpid"]); ?>" selected ><?php echo ($detv["et_name"]); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($detv["et_atpid"]); ?>" ><?php echo ($detv["et_name"]); ?></option><?php endif; endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <input name="rgn_pregionid" type="hidden" value="<?php echo ($_GET['rgn_atpid']); ?>" class="form-control">
                <input name="rgn_atpid" type="hidden" value="<?php echo ($data["rgn_atpid"]); ?>" class="form-control">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">关闭</button>
            <button type="button" data-dismiss="" id="sys_dlg_submit" class="btn btn-primary">保存</button>
        </div>
    </div>
</div>
<div class="modal-backdrop fade in" style="z-index: -101;"></div>
<script>
$(function () {
    $(".js-switch").each(function(){
        new Switchery(this, {color: '#1AB394'});
    });

    $(".file-pretty").prettyFile();

    $(".chosen-select").chosen({disable_search_threshold: 6, search_contains: true,width:'284px'});



});
</script>