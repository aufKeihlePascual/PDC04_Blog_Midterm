<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="max-w-3xl mx-auto my-8 p-4">
  <h2 class="text-center text-white text-2xl font-bold mb-6">
    <?php echo $model->isNewRecord ? 'Create New Post' : 'Update Post'; ?>
  </h2>

  <div class="bg-[#242d4b] rounded-lg shadow">
    <!-- Form Header -->
    <div class="bg-[#1a2036] rounded-t-lg px-4 py-3">
      <h3 class="text-white text-xl">Post Details</h3>
    </div>
    
    <!-- Form Body -->
    <div class="p-6 space-y-6">
      <?php $form = $this->beginWidget('CActiveForm', array(
          'id' => 'post-form',
          'enableAjaxValidation' => false,
          'htmlOptions' => array('class' => 'space-y-6')
      )); ?>
      
      <p class="text-sm text-[#e4e4e4]">
        Fields with <span class="text-red-500">*</span> are required.
      </p>
      
      <?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500')); ?>
      
      <!-- Title Field -->
      <div class="flex flex-col md:flex-row md:items-center">
        <?php echo $form->labelEx($model, 'title', array('class' => 'md:w-1/4 text-white font-semibold')); ?>
        <div class="md:w-3/4">
          <?php echo $form->textField($model, 'title', array(
              'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white',
              'maxlength' => 128
          )); ?>
          <?php echo $form->error($model, 'title', array('class' => 'text-red-500 text-sm')); ?>
        </div>
      </div>
      
      <!-- Content Field -->
      <div class="flex flex-col md:flex-row md:items-start">
        <?php echo $form->labelEx($model, 'content', array('class' => 'md:w-1/4 text-white font-semibold pt-2')); ?>
        <div class="md:w-3/4">
          <?php echo $form->textArea($model, 'content', array(
              'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white',
              'rows' => 6
          )); ?>
          <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
        </div>
      </div>
      
      <!-- Tags Field -->
      <div class="flex flex-col md:flex-row md:items-start">
        <?php echo $form->labelEx($model, 'tags', array('class' => 'md:w-1/4 text-white font-semibold pt-2')); ?>
        <div class="md:w-3/4">
          <?php echo $form->textArea($model, 'tags', array(
              'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white',
              'rows' => 3
          )); ?>
          <?php echo $form->error($model, 'tags', array('class' => 'text-red-500 text-sm')); ?>
        </div>
      </div>
      
      <!-- Status Field -->
      <div class="flex flex-col md:flex-row md:items-center">
        <?php echo $form->labelEx($model, 'status', array('class' => 'md:w-1/4 text-white font-semibold')); ?>
        <div class="md:w-3/4">
          <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array(
              'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white'
          )); ?>
          <?php echo $form->error($model, 'status', array('class' => 'text-red-500 text-sm')); ?>
        </div>
      </div>
      
      <!-- Hidden Fields for Timestamps -->
      <?php echo $form->hiddenField($model, 'create_time'); ?>
      <?php echo $form->hiddenField($model, 'update_time'); ?>
      
      <!-- Submit Button -->
      <div class="flex justify-end">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class' => 'px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700'
        )); ?>
      </div>
      
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
