<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="post-form-container" style="margin: 30px auto; max-width: 800px;">
  <h2 style="color: #ffffff; text-align: center; margin-bottom: 20px;">
    <?php echo $model->isNewRecord ? 'Create New Post' : 'Update Post'; ?>
  </h2>
  
  <div class="panel panel-default" style="background-color: #242d4b; border: none; border-radius: 5px;">
    <div class="panel-heading" style="background-color: #1a2036; border-bottom: none;">
      <h3 class="panel-title" style="color: #fff;">Post Details</h3>
    </div>
    <div class="panel-body">
      <?php $form = $this->beginWidget('CActiveForm', array(
          'id' => 'post-form',
          'enableAjaxValidation' => false,
          'htmlOptions' => array('class' => 'form-horizontal')
      )); ?>
      
      <p class="note" style="color: #e4e4e4;">Fields with <span class="required">*</span> are required.</p>
      
      <?php echo $form->errorSummary($model); ?>
      
      <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-10">
          <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'maxlength' => 128)); ?>
          <?php echo $form->error($model, 'title'); ?>
        </div>
      </div>
      
      <div class="form-group">
        <?php echo $form->labelEx($model, 'content', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-10">
          <?php echo $form->textArea($model, 'content', array('class' => 'form-control', 'rows' => 6)); ?>
          <?php echo $form->error($model, 'content'); ?>
        </div>
      </div>
      
      <div class="form-group">
        <?php echo $form->labelEx($model, 'tags', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-10">
          <?php echo $form->textArea($model, 'tags', array('class' => 'form-control', 'rows' => 3)); ?>
          <?php echo $form->error($model, 'tags'); ?>
        </div>
      </div>
      
      <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-10">
          <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'status'); ?>
        </div>
      </div>
      
      <?php // Hidden fields for create and update time ?>
      <?php echo $form->hiddenField($model, 'create_time'); ?>
      <?php echo $form->hiddenField($model, 'update_time'); ?>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
        </div>
      </div>
      
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
