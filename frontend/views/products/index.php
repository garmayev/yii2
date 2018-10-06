<?php
use yii\helpers\Html;
use yii\data\ActiveDataProvider;

use frontend\models\Products;
$this->title = Yii::t('app', 'Products');

$carouselItems = [
	[
		'content' => Html::img('/images/1c_tree.png'),
		'caption' => Html::img('/images/ibm.png', ['alt'=>'LirpoDRIVE']).Html::tag('h2', 'LirpoDRIVE').Html::tag('h3', 'Умное хранилище для файлов ваших проектов').Html::tag('span', 'Теперь вы можете быстро находить и редактировать свои файлы, без проблем выдавать задание на печать, делиться со своими заказчиками через облако или по электронной почте.'),
	],
	[
		'content' => Html::img('/images/cube.png'),
		'caption' => Html::img('/images/1c.png').Html::tag('h2', 'Продукты 1С').Html::tag('h3', 'Типовые и отраслевые решения для автоматизации').Html::tag('span', '1С - это программные продукты для автоматизации управления и учета в компаниях  различных отраслей, видов деятельности и типов финансирования.'),
	],
	[
		'content' => Html::img('/images/web.png'),
		'caption' => Html::img('/images/Lirpo-logo.png').Html::tag('h2', 'LirpoCAD').Html::tag('h3', '​Прикладное решение для AUTOCAD').Html::tag('span', 'Теперь печатать в AutoCAD стала быстрее. Вы можете распечатать все свои чертежи в один клик на принтеры или в PDF из пространства модели или листа.'),
	]
];

echo yii\bootstrap\Carousel::widget([
	'items' => $carouselItems,
	'options' => ['class' => 'carousel slide', 'data-interval' => '10000'],
	'controls' => [
		'<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
		'<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
	]
]);
$data = $data->getModels();
foreach ($data as $item) {
	echo Html::beginTag('div', ['class' => 'block']).Html::tag('div', $item->title, ['class' => 'spoiler']);
	echo Html::beginTag('div', ['class' => 'products-list container']);
	$models = new ActiveDataProvider([
		'query' => Products::find()->where(['cath' => $item->id, 'parent' => 0]),
	]);
    $models->pagination = false;
	if ($models->getModels()) {
		echo yii\widgets\ListView::widget([
			'dataProvider' => $models,
			'itemView' => '_post',
			'itemOptions' => [
				'class' => 'col-2',
			],
			'layout' => '{items}',
			'options' => [
				'class' => 'row',
			]
		]);
	}
	echo Html::endTag('div');
	echo Html::endTag('div');
}
?>