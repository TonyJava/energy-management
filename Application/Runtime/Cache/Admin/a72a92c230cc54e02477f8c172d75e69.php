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
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <span style="color:red;">*</span>
                                        厂家设备：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="dev_devicemodelid" id="dev_devicemodelid" class="chosen-select" required>
                                            <option value="">&nbsp;==请选择==</option>
                                            <?php if(is_array($ds_devicemodel)): foreach($ds_devicemodel as $t_k=>$t_v): ?><option value="<?php echo ($t_v["dm_atpid"]); ?>" <?php if($data['dev_devicemodelid'] == $t_v['dm_atpid']): ?>selected<?php else: endif; ?>><?php echo ($t_v["dm_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        <span style="color:red;">*</span>
                                        设备卡所属部门：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="dev_departmentid" id="dev_department" class="chosen-select" required>
                                            <option value="">&nbsp;==请选择==</option>
                                            <?php if(is_array($ds_department)): foreach($ds_department as $dpm_k=>$dpm_v): ?><option value="<?php echo ($dpm_v["dpm_atpid"]); ?>" <?php if($data['dev_departmentid'] == $dpm_v['dpm_atpid']): ?>selected<?php else: endif; ?> ><?php echo ($dpm_v["dpm_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        设备卡联系电话：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_linkphone" type="telephone"  value="<?php echo ($data["dev_linkphone"]); ?>" class="form-control" pattern="^13\d{9}$">
                                        <font color="red">手机格式（11位）</font>
                                    </div>

                                    <label class="col-sm-2 control-label">
                                        <span style="color:red;">*</span>
                                        设备卡使用部门：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="dev_usedepartmentid" id="dev_usedepartment" class="chosen-select" required>
                                            <option value="">&nbsp;==请选择==</option>
                                            <?php if(is_array($ds_department)): foreach($ds_department as $dpm_k=>$dpm_v): ?><option value="<?php echo ($dpm_v["dpm_atpid"]); ?>" <?php if($data['dev_usedepartmentid'] == $dpm_v['dpm_atpid']): ?>selected<?php else: endif; ?> ><?php echo ($dpm_v["dpm_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">
                                        状态：
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="dev_status" class="chosen-select" >
                                            <?php if(is_array($ds_devstatus)): foreach($ds_devstatus as $ds_k=>$ds_v): ?><option value="<?php echo ($ds_v); ?>" <?php if($data['dev_status'] == $ds_v): ?>selected<?php else: endif; ?> ><?php echo ($ds_v); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        设备价格：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_equipmentprice" type="text" value="<?php echo ($data["dev_equipmentprice"]); ?>" class="form-control" pattern="^\d+$" placeholder="单位：元（人民币）">
                                        <font color="red">数字整数格式（大于等于0）</font>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <span style="color:red;">*</span>设备类型：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_name" type="text"  value="<?php echo ($data["dev_name"]); ?>"  class="form-control" required>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        保修时间：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_guaranteelastdate" type="text"  value="<?php echo ($data["dev_guaranteelastdate"]); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="form-control">
                                    </div>
                               </div>
                                <!-- <div class="form-group">

                                    <label class="col-sm-2 control-label">
                                        最后上传时间：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_lastuploadtime" type="text"  value="<?php echo ($data["dev_lastuploadtime"]); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="form-control">
                                    </div>

                                    <label class="col-sm-2 control-label">
                                        未上传时长：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_unuploadlegth" type="text" value="<?php echo ($data["dev_unuploadlegth"]); ?>" class="form-control" placeholder="单位：小时">
                                    </div>
                                </div> -->


                                <div class="form-group">

                                    <label class="col-sm-2 control-label">
                                        IP地址：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_ip" type="text" value="<?php echo ($data["dev_ip"]); ?>" class="form-control" pattern="((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)"  >
                                        <font color="red">IP地址格式</font>
                                    </div>
                                    <label class="col-sm-2 control-label">
                                        备注：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_kcremark" type="text" value="<?php echo ($data["dev_kcremark"]); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="col-sm-2 control-label">
                                        设备采集号：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="dev_acquisition" type="text" value="<?php echo ($data["dev_acquisition"]); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="dev_atpid" type="hidden" value="<?php echo ($data["dev_atpid"]); ?>" class="form-control">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">关闭</button>
            <button type="button" name="bc" id="sys_dlg_submit" class="btn btn-primary">保存</button>
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
    $("#role").chosen({disable_search_threshold: 6, search_contains: true,width:'750px'});
    $(".chosen-select").chosen({disable_search_threshold: 6, search_contains: true,width:'284px'});
});
</script>