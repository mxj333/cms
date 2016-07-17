<!-- Blog Post Content Column -->
<div class="col-lg-8">
    <!-- Blog Post -->
    <!-- Title -->
    <h1><?php echo $articles->art_title; ?></h1>
    <!-- Author -->
    <p class="lead">
        <div class="ds-share" data-thread-key="articles_<?= h($articles->id) ?>" data-title="<?= h($articles->art_title) ?>" data-images="" data-content="<?= getShortTitle($articles->art_body, 300)?>" data-url="http://192.168.33.100:8081/articles/view/<?= h($articles->id) ?>">
            <div class="ds-share-inline">
                <ul  class="ds-share-icons-16">
                    <li data-toggle="ds-share-icons-more"><a class="ds-more" href="javascript:void(0);">分享到：</a></li>
                    <li><a class="ds-weibo" href="javascript:void(0);" data-service="weibo">微博</a></li>
                    <li><a class="ds-qzone" href="javascript:void(0);" data-service="qzone">QQ空间</a></li>
                    <li><a class="ds-qqt" href="javascript:void(0);" data-service="qqt">腾讯微博</a></li>
                    <li><a class="ds-wechat" href="javascript:void(0);" data-service="wechat">微信</a></li>
                </ul>
                <div class="ds-share-icons-more"></div>
            </div>
        </div>
    </p>
    <hr>
    <!-- Date/Time -->
    <p>
        <span class="glyphicon glyphicon-time"></span> <?= h($articles->created) ?>
        <span class="glyphicon glyphicon-user"></span> zencms
    </p>
    <hr>
    <!-- Preview Image -->
    <?php
        if ($articles->column_id == 3) {
            echo $this->element('video');
    ?>
    <?php } else {?>
    <!-- <p class="lead"><?= getShortTitle($articles->art_body, 200)?></p> -->
    <img class="img-responsive" src="<?= $articles->art_cover?>">
    <?php } ?>
    <hr>
    <!-- Post Content -->
    <p><?=$articles->art_body;?></p>
    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->
<!--     <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr> -->

    <!-- Posted Comments -->

    <!-- Comment -->
    <!-- <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>
 -->


</div>
<!-- Blog Sidebar Widgets Column -->
<?php echo $this->element('home_sidebar');?>

<!-- 多说评论框 start -->
    <div class="ds-thread" data-thread-key="articles_<?= h($articles->id) ?>" data-title="<?= h($articles->art_title) ?>" data-url="http://192.168.33.100:8081/articles/view/<?= h($articles->id) ?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"zencms"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
         || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
<!-- 多说公共JS代码 end -->
