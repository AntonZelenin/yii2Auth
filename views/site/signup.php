<h1>Регистрация</h1>

<?php
    $form = \yii\bootstrap\ActiveForm::begin(['class' => 'form-horizontal'])
?>

<?= $form->field($signUpModel, 'email')->textInput(['autofocus' => true]) ?>

<?= $form->field($signUpModel, 'username')->textInput() ?>

<?= $form->field($signUpModel, 'password')->passwordInput() ?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
    \yii\bootstrap\ActiveForm::end()
?>
