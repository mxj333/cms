<div class="scaffold-action scaffold-action-add scaffold-controller-columns scaffold-columns-add">

    <?= $this->Form->create($article, ['type' => 'file']) ?>
    <div class="row">
        <legend><?= __('Add Article') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('user_id', ['type' => 'hidden', 'value' => $user_id]);
            echo $this->Form->input('column_id');
            echo $this->Form->input('art_title');
            echo $this->Form->input('art_url_alias');
            echo $this->Form->textarea('art_body', ['id' => 'container']);
        ?>
        <img src="<?= $article->art_cover?>">
        <?php echo $this->Form->input('art_cover', ['type' => 'file']); ?>
        <?php echo $this->Form->input('art_cover_path', ['type' => 'hidden']); ?>
        <?php echo $this->Form->input('art_video', ['type' => 'file']); ?>
        <?php echo $this->Form->input('art_video_path', ['type' => 'hidden']); ?>
    </div>
    <div class="row">
        <div class="col-lg-<?= $this->exists('form.sidebar') ? '8' : '12' ?>">
           <div class="form-group">
                <div class="col pull-right">
                    <?php
                        echo $this->Form->button(__d('crud', 'Save'), ['class' => 'btn btn-primary', 'name' => '_save']);
                        echo $this->Html->link(__d('crud', 'Back'), ['action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button', 'value' => true]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<script src="/Js/jquery.min.js" /></script>
<script src="/Js/ueditor/ueditor.config.js" /></script>
<script src="/Js/ueditor/ueditor.all.min.js" /></script>
<script type="text/javascript">
$(function(){

    //是否为视频栏目
    if (!$('#id').val()) {
        $('#art-video').parent().hide();
    }

    $('#column-id').change(function(){
        var column_id = $(this).children('option:selected').val();
        if (column_id != 3) {
            $('#art-video').parent().hide();
        } else {
            $('#art-video').parent().show();
        }
    });

    //设置富文本编辑器
    var ue = UE.getEditor('container');
})

</script>