<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Conta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'date',
                'format' => 'date',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'description',
            [
                'attribute' => 'category_id',
                'filter' => app\models\Categories::getOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 145px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function($model, $key, $index, $column){
                    return $model->category->name;
                }
            ],
            [
                'attribute' => 'type',
                'filter' => app\models\Bills::getTypeOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function($model, $key, $index, $column){
                    return $model->getTypeText();
                }
            ],
            [
                'attribute' => 'amount',
                'format' => 'currency',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 100px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'status',
                'filter' => app\models\Bills::getStatusOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function($model, $key, $index, $column){
                    $labelClass = ($model->isOpened() ? 'label-warning' : 'label-success');
                    return '<span class="label '. $labelClass .'">'. $model->getStatusText() .' </span>';
                }
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 90px'],
                'contentOptions' => ['class' => 'text-center'],
                'header' => 'Ações',
            ],
            
        ],
    ]); ?>


</div>
