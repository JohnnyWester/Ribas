<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<!--BLOG-->
<section class="grey-bg" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-small-center text-center">
                    <span>Your search results: <?= Html::encode($q); ?></span>
                </h3>
                <div class="row">
                </div>
                <!--GRID BLOG-->
                <div class="grid">
                    <?php if(!empty($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <div class="grid-item">
                                <div class="wrap-article">
                                    <a href="<?= Url::to(['site/single', 'id' => $article->id ]); ?>">
                                        <img alt="Image" class="img-circle text-center" src="<?= $article->getImage() ?>">
                                    </a>
                                    <p class="subtitle fancy">
                                        <span><?= $article->date ?></span>
                                    </p>
                                    <a href="<?= Url::to(['site/single', 'id' => $article->id ]); ?>">
                                        <h3 class="title"><?= $article->title ?></h3>
                                    </a>
                                    <p class="content-blog"><?= $article->text ?></p>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By <a href="#"><?= $article->author; ?></a> On <?= $article->date; ?> </span>
                                        <ul class="text-center pull-right">
                                            <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i><?= (int) $article->viewed ?></a></li>
                                        </ul>
                                    </div>

                                    <div class="btn-continue-reading text-uppercase">
                                        <a href="<?= Url::to(['site/single', 'id' => $article->id ]); ?>" class="more-link">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3 class="title-small-center text-center">
                            <span>Not one article was found.</span>
                        </h3>
                    <?php endif; ?>
                </div>
                <?php
                echo LinkPager::widget(['pagination' => $pagination,]);
                ?>
                <!--/.GRID BLOG END-->
            </div>
        </div>
    </div>
</section>
<!--/.BLOG END-->