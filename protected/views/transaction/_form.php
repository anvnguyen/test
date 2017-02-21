<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaction-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Payment_date'); ?>
		<?php echo $form->textField($model,'Payment_date'); ?>
		<?php echo $form->error($model,'Payment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personId'); ?>
		<?php echo $form->textField($model,'personId'); ?>
		<?php echo $form->error($model,'personId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'playingCurrency'); ?>
		<?php echo $form->textField($model,'playingCurrency',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'playingCurrency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'playingOriginalAmount'); ?>
		<?php echo $form->textField($model,'playingOriginalAmount'); ?>
		<?php echo $form->error($model,'playingOriginalAmount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->