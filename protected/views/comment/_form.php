<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="max-w-2xl mx-auto my-8 p-4 bg-[#242d4b] rounded shadow">
  <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'comment-form',
    'enableAjaxValidation' => false,
    // Add Tailwind utility classes to the form container if needed
    'htmlOptions' => array('class' => 'space-y-6')
  )); ?>

  <!-- Note about required fields -->
  <p class="text-sm text-[#e4e4e4]">
    Fields with <span class="text-red-500">*</span> are required.
  </p>

  <!-- Display any validation errors -->
  <?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500')); ?>

  <!-- Comment Content -->
  <div>
    <?php echo $form->labelEx($model, 'content', array('class' => 'block text-white font-semibold mb-1')); ?>
    <?php echo $form->textArea($model, 'content', array(
      'rows' => 6,
      'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
    )); ?>
    <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
  </div>

  <?php if (!Yii::app()->user->isGuest && Yii::app()->user->name === 'admin'): ?>
    <div>
      <?php echo $form->labelEx($model, 'status', array('class' => 'block text-white font-semibold mb-1')); ?>
      <?php echo $form->dropDownList($model, 'status', Lookup::items('CommentStatus'), array(
        'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
      )); ?>
      <?php echo $form->error($model, 'status', array('class' => 'text-red-500 text-sm')); ?>
    </div>
  <?php endif; ?>

  <?php echo $form->hiddenField($model, 'create_time'); ?>

  <div>
    <?php echo $form->labelEx($model, 'author', array('class' => 'block text-white font-semibold mb-1')); ?>
    <?php echo $form->textField($model, 'author', array(
      'size' => 60,
      'maxlength' => 128,
      'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
    )); ?>
    <?php echo $form->error($model, 'author', array('class' => 'text-red-500 text-sm')); ?>
  </div>

  <div>
    <?php echo $form->labelEx($model, 'email', array('class' => 'block text-white font-semibold mb-1')); ?>
    <?php echo $form->textField($model, 'email', array(
      'size' => 60,
      'maxlength' => 128,
      'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
    )); ?>
    <?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
  </div>

  <div>
    <?php echo $form->labelEx($model, 'url', array('class' => 'block text-white font-semibold mb-1')); ?>
    <?php echo $form->textField($model, 'url', array(
      'size' => 60,
      'maxlength' => 128,
      'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
    )); ?>
    <?php echo $form->error($model, 'url', array('class' => 'text-red-500 text-sm')); ?>
  </div>

  <!-- Post ID (Hidden) -->
  <?php
    if (isset($post)) {
      echo $form->hiddenField($model, 'post_id', array('value' => $post->id));
    } elseif (!$model->isNewRecord) {
      echo $form->hiddenField($model, 'post_id', array('value' => $model->post_id));
    } else {
      echo CHtml::hiddenField('post_id', '');
    }
  ?>

  <!-- Submit Button -->
  <div class="flex justify-end">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
      'class' => 'px-4 py-2 bg-[#f5539d] text-white rounded hover:bg-[#ff8bcf] transition-colors'
    )); ?>
  </div>

  <?php $this->endWidget(); ?>
</div>
