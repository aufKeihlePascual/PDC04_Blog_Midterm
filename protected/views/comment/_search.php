<?php
/* @var $this CommentController */
/* @var $model Comment */
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
        <?php echo $form->label($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList(
            $model,
            'status',
            array('' => '-', 1 => 'Pending Approval', 2 => 'Approved'), // ✅ Fixed status filter
            array('class' => 'form-control')
        ); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'create_time'); ?>
        <?php echo $form->textField($model,'create_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'author'); ?>
        <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'url'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'post_id'); ?>
        <?php echo $form->textField($model,'post_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
