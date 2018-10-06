<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Products;
use frontend\models\Category;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class ProductsController extends Controller
{
	public function actionIndex() {
		$dataProvider = new ActiveDataProvider([
			'query' => Category::find(),
		]);
        return $this->render('index', [
        	'data' => $dataProvider,
        ]);
	}
	
	public function actionView($id) {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['parent' => $id]),
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'children' => $dataProvider,
        ]);
	}

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}