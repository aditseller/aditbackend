<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model,'image');
            $model->image2 = UploadedFile::getInstance($model,'image2');
            $model->image3 = UploadedFile::getInstance($model,'image3');
            $model->image4 = UploadedFile::getInstance($model,'image4');
            $model->image5 = UploadedFile::getInstance($model,'image5');

            if($model->save()) {

                $model->image->saveAs('public/uploads/product/'.sha1($model->id_product).'1.jpg');
                    
                    //watermark img1
                /*
                Image::watermark('public/uploads/product/'.$model->id_product.'1.jpg','public/watermark.jpg')
                ->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'1.jpg'));
                    */
                    
                   //create thumbnail and Resizing Image Product
                Image::thumbnail('public/uploads/product/'.sha1($model->id_product).'1.jpg',150,150)
                ->save(Yii::getAlias('public/uploads/product/thumb-'.sha1($model->id_product).'1.jpg'));
            
                    
                    
        if(!empty($model->image2)) {
                    
                    $model->image2->saveAs('public/uploads/product/'.sha1($model->id_product).'2.jpg');
                    
                    //watermark img2
                    /*
                Image::watermark('public/uploads/product/'.$model->id_product.'2.jpg','public/watermark.jpg')
                ->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'2.jpg'));
                    */
        }
        
        if(!empty($model->image3)) {
        
                    $model->image3->saveAs('public/uploads/product/'.sha1($model->id_product).'3.jpg');
                    
                            //watermark img3
                    /*
                Image::watermark('public/uploads/product/'.$model->id_product.'3.jpg','public/watermark.jpg')
                ->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'3.jpg'));
                    */
                    
                    
                    
        } 

          if(!empty($model->image4)) {
        
                    $model->image4->saveAs('public/uploads/product/'.sha1($model->id_product).'4.jpg');
                    
                            //watermark img4
                    /*
                Image::watermark('public/uploads/product/'.$model->id_product.'4.jpg','public/watermark.jpg')
                ->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'4.jpg'));
                */
                    
                    
                    
                    
        }

          if(!empty($model->image5)) {
        
                    $model->image5->saveAs('public/uploads/product/'.sha1($model->id_product).'5.jpg');
                    
                            //watermark img5
                    /*
                Image::watermark('public/uploads/product/'.$model->id_product.'5.jpg','public/watermark.jpg')
                ->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'5.jpg'));
                    */
                    
                    
                    
        }

            }
           
            return $this->redirect(['view', 'id' => $model->id_product]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_product]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
