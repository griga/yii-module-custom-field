<?php /** @var $form \yg\tb\ActiveForm */
/** @var Config $model */

$this->breadcrumbs = array(
    t('Custom Field')=>'/admin/customfield',
    t($model->isNewRecord ? 'New record' : 'Update record'),
);

$form = $this->beginWidget('\yg\tb\ActiveForm', array(
    'id' => 'custom-field-config-form',
)); ?>
<h3><?= t($model->isNewRecord ? 'New record' : 'Update record') ?></h3>
<hr/>
<div class="well">
    <h4><?= t('Model\'s custom field') ?></h4>
    <?= $form->hiddenField($model, 'id') ?>
    <?= $form->textControl($model, 'entity') ?>
    <?= $form->textControl($model, 'title') ?>
    <?= $form->textControl($model, 'key') ?>
    <?= $form->textAreaControl($model, 'meta') ?>


</div>
<?= $form->actionButtons($model); ?>
<?php $this->endWidget(); ?>
