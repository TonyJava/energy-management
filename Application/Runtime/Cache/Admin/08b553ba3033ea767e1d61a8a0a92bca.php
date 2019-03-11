<?php if (!defined('THINK_PATH')) exit();?><div class="modal-dialog" style="width: 1000px;z-index: 10;">
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
                                        姓名：
                                    </label>
                                    <div class="col-sm-4">
                                        <input name="usr_usersideid" type="hidden"  value="<?php echo ($userside["us_atpid"]); ?>" class="form-control">
                                        <input type="text"  value="<?php echo ($userside["us_name"]); ?>" class="form-control" readonly>
                                        <p class="help-block" id="role_name_p" style="color: #CD0200;display:none">必填项！</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">房间：</label>
                                    <div class="col-sm-10">
                                        <select name="region[]" class="chosen-select" multiple id="module">
                                            <?php if(is_array($treedatas)): foreach($treedatas as $emk=>$emv): if(('是' == $emv['aux_selected'])): ?><option value="<?php echo ($emv["rgn_atpid"]); ?>" selected ><?php echo ($emv["rgn_name"]); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($emv["rgn_atpid"]); ?>" ><?php echo ($emv["rgn_name"]); ?></option><?php endif; endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="usr_atpid" type="hidden" value="<?php echo ($data["usr_atpid"]); ?>" class="form-control">
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
    $("#module").chosen({disable_search_threshold: 6, search_contains: true,width:'750px'});
    $(".chosen-select").chosen({disable_search_threshold: 6, search_contains: true,width:'284px'});
});
</script>