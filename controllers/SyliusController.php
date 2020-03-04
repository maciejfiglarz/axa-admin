<?php

namespace app\controllers;

use Yii;
use app\models\SyliusShopUser;
use app\models\SyliusCustomer;
use app\models\SyliusCustomerGroup;
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

        $shopUserModel = $this->findShopUserModel($id);

        $customerModelId = $shopUserModel->id;
        $customerModel = $this->findCustomerModel($customerModelId );
   
        // $customerModelId = $shopUserModel->custroid;
     
        $customerGroupModelId = $customerModel->customer_group_id;
        $customerGroupModel = $this->findCustomerGroupModel($customerGroupModelId);
        
        $customerAddressModel = $this->findAddressModel($customerGroupModelId);
        // dd( $customerAddressModel);

        $customerGroupModel = $this->findAddressModel($customerModelId);


      //  dd($customerGroupModel);

        return $this->render('view', [
            'shopUserModel' => $shopUserModel,
            'customerModel' => $customerModel,
            'customerGroupModel' => $customerGroupModel,
            'customerAddressModel' => $customerAddressModel

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
        $customerGroupModel = new SyliusCustomerGroup();
        $addressModel  = new SyliusAddress();
        $today  = date('Y-m-d H:i:s');
        $request = Yii::$app->request;

        if ($request->isPost) {

            $isCustomerLoaded = $customerModel->load(Yii::$app->request->post());
            $isLoadedShopUser = $shopUserModel->load(Yii::$app->request->post());
            $isLoadedAddress = $addressModel->load(Yii::$app->request->post());
            $isCustomerGroupAddress = $customerGroupModel->load(Yii::$app->request->post());


            $isCustomerGroupAddress = $customerGroupModel->save();
            $customerGroupId = $customerGroupModel->id;


            $customerModel->subscribed_to_newsletter = 0;
            $customerModel->created_at = $today;
            $customerModel->customer_group_id = $customerGroupId;

            $isCustomerSave =  $customerModel->save();
            $customerModel->refresh();

            //var_dump($customerModel);
            $customerId = $customerModel->id;
            // dd($customerId);

            $addressModel->created_at = $today;
            $addressModel->customer_id = $customerId;
            $isAddressSave  = $addressModel->save();

                        
            $shopUserModel->customer_id = $customerId;
            $shopUserModel->created_at = $today;

            //  $shopUserModel->refresh();
            //dd($shopUserModel);
            // dd($customerId,$isLoadedAddress);
            //  var_dump($isCustomerLoaded , $isLoadedShopUser , $shopUserModel->save(),$shopUserModel->customer_id,$shopUserModel->errors,$isLoadedAddress);
             //   dd($shopUserModel->save());
            if ($isCustomerLoaded &&  $isLoadedShopUser && $isLoadedAddress && $shopUserModel->save()) {

                return $this->redirect(['view', 'id' => $shopUserModel->id]);
            }
            var_dump($isCustomerLoaded, $isLoadedShopUser, $shopUserModel->save(), $shopUserModel->customer_id, $shopUserModel->errors, $isLoadedAddress);
        }



        return $this->render('create', [
            'shopUserModel' => $shopUserModel,
            'customerModel' => $customerModel,
            'addressModel' => $addressModel,
            'customerGroupModel' => $customerGroupModel
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
    protected function findShopUserModel($id)
    {
        if (($model = SyliusShopUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCustomerModel($id)
    {
        if (($model = SyliusCustomer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function findAddressModel($id)
    {
        if (($model = SyliusAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCustomerGroupModel($id)
    {
        if (($model = SyliusCustomerGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
