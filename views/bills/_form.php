<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bills */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bills-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(app\models\Categories::getOptions(), [
        'prompt' => ':: selecione ::'
    ]) ?>

    <?= $form->field($model, 'type')->dropDownList(app\models\Bills::getTypeOptions(), [
        'prompt' => ':: selecione ::'
    ]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(app\models\Bills::getStatusOptions(), [
        'prompt' => ':: selecione ::'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
