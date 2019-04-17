<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enrolments */

$this->title = 'Create Enrolments';
$this->params['breadcrumbs'][] = ['label' => 'Enrolments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrolments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
