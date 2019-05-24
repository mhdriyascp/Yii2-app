<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\basemodels\Univercity */

$this->title = 'Update Univercity: ' . $model->univercity_id;
$this->params['breadcrumbs'][] = ['label' => 'Univercities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->univercity_id, 'url' => ['view', 'id' => $model->univercity_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="univercity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
