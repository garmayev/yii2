<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<div class="item-view-child">
	<?= (!empty($model->image)) ? Html::img($model->image) : Html::img($model->thumbs) ?>
	<div class="item-view-child-info">
		<?= Html::tag('a', $model->title, ['href'=>Url::toRoute(['products/view', 'id'=>$model->id]), 'class' => 'item-view-child-title']) ?>
		<?= Html::tag('div', $model->info, ['class' => 'item-view-child-info']) ?>
	</div>
	<div class="item-view-child-control">
		<?= Html::tag('a', 'Подробнее...', ['href'=>Url::toRoute(['products/view', 'id'=>$model->id]), 'class' => 'col-md-6']) ?>
		<?= Html::tag('span', $model->price.' рублей', ['class' => 'col-md-2']); ?>
		<?= Html::tag('button', 'Заказать'); ?>
	</div>
</div>