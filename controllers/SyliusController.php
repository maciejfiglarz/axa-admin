<?php

namespace app\controllers;

use Yii;
use app\models\SyliusShopUser;
use app\models\SyliusCustomer;
use app\models\SyliusAddress;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SyliusController implements the CRUD actions for SyliusShopUser model.
 */
class SyliusController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all SyliusShopUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SyliusShopUser::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SyliusShopUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SyliusShopUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $shopUserModel = new SyliusShopUser();
        $customerModel = new SyliusCustomer();
        $addressModel  = new SyliusAddress();

        $request = Yii::$app->request;

        if ($request->isPost) {

        $isCustomerLoaded = $customerModel->load(Yii::$app->request->post());
        $isLoadedShopUser = $shopUserModel->load(Yii::$app->request->post());
        $isLoadedAddress = $addressModel->load(Yii::$app->request->post());

        $isCustomerSave =  $customerModel->save();

        $customerModel->refresh();
        $customerId = $customerModel->id;
         // dd($customerModel->errors);
        $shopUserModel->customer_id = $customerId;

        
      //  $shopUserModel->refresh();
    //dd($shopUserModel);
   // dd($customerId,$isLoadedAddress);
  //  var_dump($isCustomerLoaded , $isLoadedShopUser , $shopUserModel->save(),$shopUserModel->customer_id,$shopUserModel->errors,$isLoadedAddress);

        if ($isCustomerLoaded &&  $isLoadedShopUser && $isLoadedAddress && $shopUserModel->save()) {
         
            return $this->redirect(['view', 'id' => $shopUserModel->id]);
        }
        var_dump($isCustomerLoaded , $isLoadedShopUser , $shopUserModel->save(),$shopUserModel->customer_id,$shopUserModel->errors,$isLoadedAddress);

      }



        return $this->render('create', [
            'shopUserModel' => $shopUserModel,
            'customerModel' => $customerModel,
            'addressModel' => $addressModel 
        ]);
    }

    /**
     * Updates an existing SyliusShopUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SyliusShopUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SyliusShopUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SyliusShopUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SyliusShopUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
