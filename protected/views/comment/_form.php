<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<?php if (!Yii::app()->user->isGuest && Yii::app()->user->name === 'admin'): ?>
		<div class="row">
			<?php echo $form->labelEx($model, 'status'); ?>
			<?php echo $form->dropDownList($model, 'status', Lookup::items('CommentStatus')); ?>
			<?php echo $form->error($model, 'status'); ?>
		</div>
	<?php endif; ?>


	<div class="row">
		<?php //echo $form->labelEx($model,'create_time'); ?>
		<?php //echo $form->textField($model,'create_time'); ?>
		<?php //echo $form->error($model,'create_time'); ?>
		<?php echo $form->hiddenField($model, 'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'post_id'); ?>
		<?php //echo $form->textField($model,'post_id'); ?>
		<?php //echo $form->error($model,'post_id'); ?>
		<?php
		if (isset($post)) {
			echo $form->hiddenField($model, 'post_id', array('value' => $post->id));
		} elseif (!$model->isNewRecord) {
			echo $form->hiddenField($model, 'post_id', array('value' => $model->post_id)); // Use existing post_id
		} else {
			echo CHtml::hiddenField('post_id', ''); // Fallback to avoid errors
		}
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->