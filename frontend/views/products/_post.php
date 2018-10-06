<?php
	use yii\helpers\Html;
	use yii\helpers\Url;

	echo Html::tag('a', Html::img($model->thumbs, ['style' => 'width: 60px']).'<br>'.Html::tag('span', $model->title), ['href'=>Url::toRoute(['products/view', 'id' => $model->id])]);
?>