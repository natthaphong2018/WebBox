<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'ลงทะเบียน';
?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Registere', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>