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
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <span style="color:red;">*</span>
                        分类：
                    </label>
                    <div class="col-sm-4">
                        <select name="cfg_category" class="chosen-select" required>
                            <!--<option value="">&nbsp;==请选择==</option>-->
                            <option value="系统" <?php if(($data["cfg_category"] == '系统')): ?>selected<?php else: endif; ?> >系统</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <span style="color:red;">*</span>
                        配置项：
                    </label>
                    <div class="col-sm-4">
                        <input name="cfg_key" type="text"  value="<?php echo ($data["cfg_key"]); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        配置值：
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control"  id="cfg_value" name="cfg_value" cols="37" rows="3" ><?php echo ($data["cfg_value"]); ?></textarea>
                    </div>
                    <input name="cfg_atpid" type="hidden" value="<?php echo ($data["cfg_atpid"]); ?>" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">关闭</button>
            <button type="button" name="bc"  data-dismiss="" id="sys_dlg_submit" class="btn btn-primary">保存</button>
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

    $(".chosen-select").chosen({disable_search_threshold: 10, search_contains: true,width:'288px'});

});

</script>