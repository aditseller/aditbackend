<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admins */

$this->title = $model->id_admin;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admins-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_admin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_admin], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_admin',
            'email:email',
            'password',
            'fullname',
            'phone',
            'level',
            'authKey',
            'accessToken',
        ],
    ]) ?>

</div>
