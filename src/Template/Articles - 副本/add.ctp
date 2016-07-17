<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add Article') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('title');
            echo $this->Form->textarea('body', ['id' => 'container']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script src="/Js/jquery.min.js" /></script>
<script src="/Js/ueditor/ueditor.config.js" /></script>
<script src="/Js/ueditor/ueditor.all.min.js" /></script>
<script type="text/javascript">
$(function(){
    var ue = UE.getEditor('container');
})
</script>