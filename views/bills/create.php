<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bills */

$this->title = 'Criar Conta';
$this->params['breadcrumbs'][] = ['label' => 'Contas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bills-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
