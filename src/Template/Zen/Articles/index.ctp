<div class="scaffold-action scaffold-action-index scaffold-controller-columns scaffold-columns-index">
    <h2>Articles</h2>
    <div class="actions-wrapper">
        <a class="btn btn-default" href="/zen/articles/add">Add</a>
        <?php echo $this->Form->input('column_id', ['options' => $columns, 'value' => $column_id]);?>
    </div>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('art_title') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $this->Number->format($article->id) ?></td>
            <td><?= h($article->art_title) ?></td>
            <td><?= h($article->created) ?></td>
            <td><?= h($article->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?=$this->element('paging_links');?>
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    $('#column-id').change(function(){
        //这就是selected的值
        var column_id = $(this).children('option:selected').val();
        window.location.href="/zen/articles/index/" + column_id;//页面跳转并传参
    });
});
</script>