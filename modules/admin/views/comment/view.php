<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php foreach($comments as $comment):?>
        <?php if([$comment->isAllowed()]):?>
            <a class="btn btn-warning" href="<?= Url::to(['comment/disallow', 'id'=>$comment->id]);?>">Disallow</a>
        <?php else:?>
            <a class="btn btn-success" href="<?= Url::to(['comment/allow', 'id'=>$comment->id]);?>">Allow</a>
        <?php endif?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endforeach;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'date',
            'user_id',
            'article_id',
            'status',
        ],
    ]) ?>

</div>
