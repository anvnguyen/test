<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Payment_date'); ?>
		<?php echo $form->textField($model,'Payment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personId'); ?>
		<?php echo $form->textField($model,'personId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'playingCurrency'); ?>
		<?php echo $form->textField($model,'playingCurrency',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'playingOriginalAmount'); ?>
		<?php echo $form->textField($model,'playingOriginalAmount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->