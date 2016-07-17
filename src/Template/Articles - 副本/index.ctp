<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="users index large-9 medium-8 columns content">
<?php echo $this->Form->input('column_id', ['options' => $columns]);?>
<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>标题</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody id=listData>
        <?php foreach($articles as $key => $list) {?>
        <tr>
            <td><?=$list['id']?></td>
            <td><?=$list['title']?></td>
            <td>ipsum</td>
            <td>dolor</td>
        </tr>
        <?php }?>
    </tbody>
</table>
<div class="paginator">
    <?php echo $this->element('paging_links');  ?>
</div>
<!-- <div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div> -->
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    $('#column-id').change(function(){
        //这就是selected的值
        var column_id = $(this).children('option:selected').val();
        
        // $("body").load(this.href);
        // return false;
        //var p2=$('#param2').val();//获取本页面其他标签的值
        window.location.href="/articles/index/" + column_id;//页面跳转并传参
    });

    // $(".pagination a").click(function(){
    //        $("body").load(this.href);
    //        return false;
    // })
});
</script> 