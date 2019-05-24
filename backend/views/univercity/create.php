<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\basemodels\Univercity */

$this->title = 'Create Univercity';
$this->params['breadcrumbs'][] = ['label' => 'Univercities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="univercity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
