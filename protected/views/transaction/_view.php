<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->Payment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personId')); ?>:</b>
	<?php echo CHtml::encode($data->personId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('playingCurrency')); ?>:</b>
	<?php echo CHtml::encode($data->playingCurrency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('playingOriginalAmount')); ?>:</b>
	<?php echo CHtml::encode($data->playingOriginalAmount); ?>
	<br />


</div>