<?php
	use yii\helpers\Html;
	$this->title = $model->title;
?>
<div class="item-view">
	<?= Html::tag('h1', $model->title, ['class' => 'item-title']) ?>
	<?php
		if (!empty($model->image)) {
			echo Html::beginTag('div', ['class' => 'item-mini']);
			echo Html::img($model->image, ['class' => 'item-image']).Html::tag('div', $model->info, ['class' => 'item-info']);
			if (!empty($model->price)) {
				echo Html::tag('div', Html::tag('span', $model->price)." рублей", ['class' => 'item-price']);
			}
			echo Html::endTag('div');
		}
		echo Html::tag('div', $model->description, ['class'=>'item-description']);
		if ($children->getModels()) {
			echo yii\widgets\ListView::widget([
				'dataProvider' => $children,
				'itemView' => '_child',
				'itemOptions' => [
					'class' => 'item',
				],
				'layout' => '{items}',
				'options' => [
					'class' => 'row',
				]
			]);
		}
	?>

</div>