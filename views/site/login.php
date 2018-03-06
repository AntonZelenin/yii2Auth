<h1>Вход</h1>

<?php
    use \yii\bootstrap\ActiveForm;

    $form = ActiveForm::begin(['class' => 'form-horizontal'])
?>

<?= $form->field($loginModel, 'email')->textInput(['autofocus' => true]) ?>

<?= $form->field($loginModel, 'password')->passwordInput() ?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
    ActiveForm::end()
?>
