<script type="text/javascript" src="<?= Yii::$app->homeUrl ?>/public/js/jquery.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading"><?= $this->title; ?></div>
<div class="products-form panel-body">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

    <div class="col-md-2"> 
    	<div id="image_preview" class="thumbnail"><img id="previewing" src="<?= Yii::$app->homeUrl ?>public/images/noimg.png" /></div>
    <?= $form->field($model, 'image')->fileInput(['required' => true,'id'=> 'file']) ?>
    </div>

    <div class="col-md-2">
    <div id="image_preview" class="thumbnail"><img id="previewing2" src="<?= Yii::$app->homeUrl ?>public/images/noimg.png" /></div>
     <?= $form->field($model, 'image2')->fileInput(['id'=> 'file2']) ?>
     </div>


        <div class="col-md-2">
    <div id="image_preview" class="thumbnail"><img id="previewing3" src="<?= Yii::$app->homeUrl ?>public/images/noimg.png" /></div>
     <?= $form->field($model, 'image3')->fileInput(['id'=> 'file3']) ?>
     </div>

       <div class="col-md-2">
    <div id="image_preview" class="thumbnail"><img id="previewing4" src="<?= Yii::$app->homeUrl ?>public/images/noimg.png" /></div>
     <?= $form->field($model, 'image4')->fileInput(['id'=> 'file4']) ?>
     </div>

 
 	  <div class="col-md-2">
    <div id="image_preview" class="thumbnail"><img id="previewing5" src="<?= Yii::$app->homeUrl ?>public/images/noimg.png" /></div>
     <?= $form->field($model, 'image5')->fileInput(['id'=> 'file5']) ?>
     </div>


    <div class="col-md-12"><?= $form->field($model, 'product_name')->textInput(['maxlength' => true])->label('* Product Name') ?></div>

    <div class="col-md-7"><?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(\app\models\Categories::find()->asArray()->all(), 'category', 'category'), ['prompt' => '-- Select Category --'])->label('* Category') ?></div>

    <div class="col-md-5"><?= $form->field($model, 'product_condition')->dropDownList([ 'new' => 'New', 'second' => 'Second', ])->label('* Product Condition') ?></div>

    <div class="col-md-4"><?= $form->field($model, 'weight_unit')->dropDownList([ 'gram' => 'Gram', 'kilogram' => 'Kilogram', ])->label('* Unit') ?></div>

    <div class="col-md-8"><?= $form->field($model, 'weight')->textInput(['type'=>'number'])->label('* Weight') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'price')->textInput(['type'=>'number'])->label('* Price') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'stock')->textInput(['type'=>'number'])->label('* Stock') ?></div>

    <div class="col-md-12"><?= $form->field($model, 'description')->textarea(['rows' => 6])->label('* Description') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'sku')->textInput(['maxlength' => true])->label('SKU (Opsional)') ?></div>

    
    <div class="col-md-6"><?= $form->field($model, 'discount')->textInput()->label('Discount % (Opsional)') ?></div>

    
    
    

    <div class="col-md-12">
        <?= Html::submitButton('Publish', ['class' =>'btn btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>


<style type="text/css" rel="stylesheet"> /* Style untuk tampilan Form upload gambar */
  
    #image_preview {
      
   width: 100%;
   height: 100%;
      
      text-align: center;
      color: #C0C0C0;
      background-color: #FFFFFF;
      overflow: hidden;
    }
   
   
  </style>
  <script> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimg.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview');
      $('#previewing').attr('src', e.target.result);
    }

</script>


<script>


        $(function() {
      $("#file2").change(function() {
        $("#message2").empty(); // To remove the previous error message
        var file2 = this.files[0];
        var imagefile = file2.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing2').attr('src','noimg.png');
          $("#message2").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader2 = new FileReader();
          reader2.onload = imageIsLoadedTwo;
          reader2.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedTwo(e) {
      $("#file2").css("color","green");
      $('#image_preview');
      $('#previewing2').attr('src', e.target.result);
    }
  </script>


  <script>


        $(function() {
      $("#file3").change(function() {
        $("#message3").empty(); // To remove the previous error message
        var file3 = this.files[0];
        var imagefile = file3.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing3').attr('src','noimg.png');
          $("#message3").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader3 = new FileReader();
          reader3.onload = imageIsLoadedThree;
          reader3.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedThree(e) {
      $("#file3").css("color","green");
      $('#image_preview');
      $('#previewing3').attr('src', e.target.result);
    }
  </script>

  <script>


        $(function() {
      $("#file4").change(function() {
        $("#message4").empty(); // To remove the previous error message
        var file4 = this.files[0];
        var imagefile = file4.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing4').attr('src','noimg.png');
          $("#message4").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader4 = new FileReader();
          reader4.onload = imageIsLoadedFour;
          reader4.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedFour(e) {
      $("#file4").css("color","green");
      $('#image_preview');
      $('#previewing4').attr('src', e.target.result);
    }
  </script>



  <script>


        $(function() {
      $("#file5").change(function() {
        $("#message5").empty(); // To remove the previous error message
        var file5 = this.files[0];
        var imagefile = file5.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing5').attr('src','noimg.png');
          $("#message5").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader5 = new FileReader();
          reader5.onload = imageIsLoadedFive;
          reader5.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedFive(e) {
      $("#file5").css("color","green");
      $('#image_preview');
      $('#previewing5').attr('src', e.target.result);
    }
  </script>