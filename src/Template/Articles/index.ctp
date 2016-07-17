<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header">
        ZenCMS.CN
        <small>基于CakePHP 3</small>
    </h1>

    <!-- First Blog Post -->
    <?php foreach ($articles as $article): ?>
        <h2>
            <?= $this->Html->link(h($article->art_title), ['action' => 'view', $article->id]) ?>
        </h2>
        <p>
            <span class="glyphicon glyphicon-time"></span> <?= h($article->created) ?>
            <span class="glyphicon glyphicon-user"></span> ZenCMS
        </p>
        <hr>
        <?= $this->Html->image('default.png', ['alt' => h($article->title), 'class' => 'img-responsive']) ?>
        <hr>
        <p><?= getShortTitle($article->art_body, 200)?></p>
        <a class="btn btn-primary" href="/articles/view/<?= $article->id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
    <?php endforeach; ?>

    <!-- Pager -->
    <ul class="pager">
        <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'previous']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <!-- <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li> -->
    </ul>

</div>

<!-- Blog Sidebar Widgets Column -->
<?php echo $this->element('home_sidebar');?>