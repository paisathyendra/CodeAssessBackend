<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnrolmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enrolments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'school_name') ?>

    <?= $form->field($model, 'y2004') ?>

    <?= $form->field($model, 'y2005') ?>

    <?php // echo $form->field($model, 'y2006') ?>

    <?php // echo $form->field($model, 'y2007') ?>

    <?php // echo $form->field($model, 'y2008') ?>

    <?php // echo $form->field($model, 'y2009') ?>

    <?php // echo $form->field($model, 'y2010') ?>

    <?php // echo $form->field($model, 'y2011') ?>

    <?php // echo $form->field($model, 'y2012') ?>

    <?php // echo $form->field($model, 'y2013') ?>

    <?php // echo $form->field($model, 'y2014') ?>

    <?php // echo $form->field($model, 'y2015') ?>

    <?php // echo $form->field($model, 'y2016') ?>

    <?php // echo $form->field($model, 'y2017') ?>

    <?php // echo $form->field($model, 'y2018') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
