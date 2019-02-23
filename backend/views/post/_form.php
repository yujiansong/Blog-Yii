<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
        /*
        //第一种方法
        $psObjs = \common\models\Poststatus::find()->all();
        $allStatus = \yii\helpers\ArrayHelper::map($psObjs, 'id', 'name');
        */
        $psArray = Yii::$app->db->createCommand('select id, name from poststatus')->queryAll();
        $allStatus = \yii\helpers\ArrayHelper::map($psArray, 'id', 'name');
    ?>
    <?= $form->field($model, 'status')->dropDownList($allStatus, ['prompt' => '请选择状态']); ?>
    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
