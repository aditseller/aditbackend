<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteName'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to <?= Yii::$app->params['siteName'] ?></h1>

        <hr/>

    
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3" align="center">
                

                <p><?= Html::a('<button  class="btn btn-warning productsbutton"></button>',['/products']) ?></p>

                <h4>Products</h4>
            </div>


             <div class="col-lg-3" align="center">
                

                <p><?= Html::a('<button  class="btn btn-danger salesbutton"></button>',['/sales']) ?></p>

                <h4>Sales</h4>
            </div>

             <div class="col-lg-3" align="center">
                

                <p><?= Html::a('<button  class="btn btn-info incomebutton"></button>',['/income']) ?></p>

                <h4>Income</h4>
            </div>
            
             <div class="col-lg-3" align="center">
                

                <p><?= Html::a('<button  class="btn btn-primary settingsbutton"></button>',['/settings']) ?></a></p>

                <h4>Settings</h4>
            </div>
            
        </div>

    </div>
</div>
