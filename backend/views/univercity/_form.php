<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\basemodels\Univercity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="univercity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'univercity_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'univercity_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
