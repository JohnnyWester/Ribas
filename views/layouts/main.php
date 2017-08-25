<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use app\models\ArticleSearch;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

PublicAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/images/favicon.ico" type="image/png">
    <?= Html::csrfMetaTags() ?>
    <title>My Test for Ribas Hotel Group</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--HEADER -->
<div class="header">
    <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
            <a href="/"><img alt="logo" class="logo-nav" src="/public/images/logo.png"></a>
        </div>
        <!--/.LOGO END-->
    </div>
    <div class="menu-wrap">
        <div id="form_search">
            <div class="article-search">
                <form method="get" action="<?= Url::to(['site/search']); ?>">
                    <input  type="text" placeholder="Search" name="q">
                </form>
            </div>
        </div>
        <nav class="menu">
            <div class="menu-list">
                      <a href="<?=Url::to(['/index', '#' => 'home']); ?>">
                        <span>About me</span>
                      </a>
                <ul>
                    <li>
                        <a href="<?=Url::to(['/index', '#' => 'about']); ?>">
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/index', '#' => 'work']); ?>">
                            <span>My resume</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/index', '#' => 'employement']); ?>">
                            <span>Work history</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/index', '#' => 'skill']); ?>">
                            <span>Skills</span>
                        </a>
                    </li>
                </ul>
                <a href="<?= Url::to('/blog'); ?>">
                    <span>Blog</span>
                </a>
                <div class="menu-list">
                    <ul class="nav navbar-nav auth">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= Url::to(['auth/login'])?>">Login</a></li>
                            <li><a href="<?= Url::to(['auth/signup'])?>">Register</a></li>
                        <?php else: ?>
                            <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->name .' ' . Yii::$app->user->identity->surname .')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>
    <button class="menu-button" id="open-button">
        <span></span>
        <span></span>
        <span></span>
    </button><!--/.for-sticky-->
</div>
<!--/.HEADER END-->

<!--CONTENT WRAP-->
<div class="content-wrap">
    <!--CONTENT-->
    <div class="content">
        <!--HOME-->
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="wrap-hero-content">
                        <div class="hero-content">
                            <h1>Hello</h1>
                            <br>
                            <span class="typed"></span>
                        </div>
                    </div>
                    <div class="mouse-icon margin-20">
                        <div class="scroll"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.HOME END-->

        <?=$content?>

        <!--FOOTER-->
        <footer>
            <div class="footer-top">
                <ul class="socials">
                    <li class="facebook">
                        <a href="#" data-hover="Facebook">Facebook</a>
                    </li>
                    <li class="twitter">
                        <a href="#" data-hover="Twitter">Twitter</a>
                    </li>
                    <li class="gplus">
                        <a href="#" data-hover="Google +">Google +</a>
                    </li>
                </ul>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <img src="/public/images/logo-bottom.png" alt="logo bottom" class="center-block" />
                    </div>
                </div>
            </div>
        </footer>
        <!--/.FOOTER-END-->

        <!--/.CONTENT END-->
    </div>
    <!--/.CONTENT-WRAP END-->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
