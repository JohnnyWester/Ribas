<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>



<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <article class="post">
                    <div class="post-thumb">
                        <header class="entry-header text-center text-uppercase">
                            <h1 class="entry-title"><?= $article->title ?></h1>
                        </header>
                        <img src="<?= $article->getImage() ?>" alt="Image">
                    </div>
                    <div class="post-content">
                        <div class="entry-content">
                            <p><?= $article->text ?></p>
                        </div>

                        <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">By <?= $article->author ?> On  <?= $article->date ?></span>
                        </div>
                    </div>
                </article>

                <?php if(!empty($comments)):?>
                <?php foreach($comments as $comment):?>
                    <div class="bottom-comment"><!--bottom comment-->
                        <div class="comment-text">
                            <a href="<?= Url::to(['/admin/user']); ?>"><h5><?= $comment->user->name;?> <?= $comment->user->surname;?></h5></a>
                            <a href="<?= Url::to(['/admin/article']) ?>"><p class="comment-article">Article name: <?= $comment->article->title ?></p></a>
                            <p class="comment-date"><?= $comment->date ?></p>
                            <p class="para"><?= $comment->text; ?></p>
                        </div>
                    </div>
                <?php endforeach;?>

                <?php endif;?>


                <?php if(!Yii::$app->user->isGuest):?>
                    <div class="leave-comment"><!--leave comment-->
                        <h4>Leave a reply</h4>
                        <?php if(Yii::$app->session->getFlash('comment')):?>
                            <div class="alert alert-success" role="alert">
                                <?= Yii::$app->session->getFlash('comment'); ?>
                            </div>
                        <?php endif;?>
                        <?php $form = ActiveForm::begin([
                            'action'=>['site/comment', 'id'=>$article->id],
                            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form',  ['enctype' => 'multipart/form-data']],
                            ])?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Post Comment</button>
                        <?php ActiveForm::end();?>
                    </div><!--end leave comment-->
                <?php endif;?>
            </div>

                <div class="col-md-4" data-sticky_column>
                    <div class="primary-sidebar">
                        <aside class="widget">
                            <h3 class="widget-title text-center">Popular Posts</h3>
                            <?php
                            foreach ($posts as $post): ?>
                                <div class="popular-post">


                                    <a href="<?= Url::to(['site/single', 'id' => $post->id]); ?>" class="popular-img"><img src="<?= $post->getImage() ?>" alt="">
                                    </a>

                                    <div class="p-content">
                                        <a href="<?= Url::to(['site/single', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
                                        <span class="p-date"><?= $post->date; ?></span>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </aside>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- end main content-->