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
}