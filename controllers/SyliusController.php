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

use kartik\form\ActiveForm;

use app\helpers\SyliusHelper;

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
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
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
        $customerModel = $this->findCustomerModel($customerModelId);

        $customerGroupModelId = $customerModel->customer_group_id;
        $customerGroupModel = $this->findCustomerGroupModel($customerGroupModelId);
        $customerAddressModel = $this->findAddressModel($customerGroupModelId);


        return $this->render('view', [
            'shopUserModel' => $shopUserModel,
            'customerModel' => $customerModel,
            'customerGroupModel' => $customerGroupModel,
            'addressModel' => $customerAddressModel

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
        $syliusHelper = new SyliusHelper();

        $request = Yii::$app->request;



        if ($request->isPost) {

            $isCustomerLoaded = $customerModel->load(Yii::$app->request->post());
            $isLoadedShopUser = $shopUserModel->load(Yii::$app->request->post());
            $isLoadedAddress = $addressModel->load(Yii::$app->request->post());
            $isLoadedCustomerGroupAddress = $customerGroupModel->load(Yii::$app->request->post());

            $customerGroupModel = $syliusHelper->prepareCustomerGroupModel($customerGroupModel);
            $customerGroupId = $customerGroupModel->id;
            $customerModel = $syliusHelper->prepareCustomerModel($customerModel, $customerGroupId);

            $customerModelId = $customerModel->id;

            if (!is_null($customerModelId)) {
                $addressModel = $syliusHelper->prepareAddressModel($addressModel, $customerModelId);
                $shopUserModel = $syliusHelper->prepareUserShopModel($shopUserModel, $customerModelId);
                $customerModel = $syliusHelper->setCustomerGroupForCustomerModel($customerModel, $customerGroupId);

                if (count(ActiveForm::validate($addressModel)) == 0 &&  count(ActiveForm::validate($customerGroupModel)) == 0 && count(ActiveForm::validate($customerModel)) == 0 && count(ActiveForm::validate($shopUserModel)) == 0) {
                    return $this->redirect(['view', 'id' => $shopUserModel->id]);
                }
            }
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

        $shopUserModel = $this->findShopUserModel($id);
        $customerModelId = $shopUserModel->id;
        $customerModel = $this->findCustomerModel($customerModelId);
        $customerGroupModelId = $customerModel->customer_group_id;

        $customerGroupModel = $this->findCustomerGroupModel($customerGroupModelId);
        $addressModel = $this->findAddressModel($customerGroupModelId);
        


        $syliusHelper = new SyliusHelper();

        $request = Yii::$app->request;

       //dd($shopUserModel,$customerModel);

        if ($request->isPost) {

            $customerModel->load(Yii::$app->request->post());
            $shopUserModel->load(Yii::$app->request->post());
            $addressModel->load(Yii::$app->request->post());
            $customerGroupModel->load(Yii::$app->request->post());
       
            $customerGroupModel = $syliusHelper->prepareCustomerGroupModel($customerGroupModel);
            $customerGroupId = $customerGroupModel->id;
            $customerModel = $syliusHelper->prepareCustomerModel($customerModel, $customerGroupId);
          //  dd($customerModel);
            $customerModelId = $customerModel->id;
            
            if (!is_null($customerModelId)) {
                $addressModel = $syliusHelper->prepareAddressModel($addressModel, $customerModelId);
            
                $shopUserModel = $syliusHelper->prepareUserShopModel($shopUserModel, $customerModelId);
                $customerModel = $syliusHelper->setCustomerGroupForCustomerModel($customerModel, $customerGroupId);
                
                if (count(ActiveForm::validate($addressModel)) == 0 &&  count(ActiveForm::validate($customerGroupModel)) == 0 && count(ActiveForm::validate($customerModel)) == 0 && count(ActiveForm::validate($shopUserModel)) == 0) {
                    return $this->redirect(['view', 'id' => $shopUserModel->id]);
                }
            }
        }


        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }


        // $shopUserModel = $this->findShopUserModel($id);
        // $customerModelId = $shopUserModel->id;
        // $customerModel = $this->findCustomerModel($customerModelId);
        // $customerGroupModelId = $customerModel->customer_group_id;
        // $customerGroupModel = $this->findCustomerGroupModel($customerGroupModelId);
        // $customerAddressModel = $this->findAddressModel($customerGroupModelId);

        return $this->render('update', [
            'shopUserModel' => $shopUserModel,
            'customerModel' => $customerModel,
            'customerGroupModel' => $customerGroupModel,
            'addressModel' => $addressModel
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

        throw new NotFoundHttpException('The requested page does not exist - user.');
    }

    protected function findModel($id)
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

        throw new NotFoundHttpException('The requested page does not exist - customer.');
    }



    protected function findAddressModel($id)
    {
        if (($model = SyliusAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist - address.');
    }

    protected function findCustomerGroupModel($id)
    {
        if (($model = SyliusCustomerGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist - customer group.');
    }
}
