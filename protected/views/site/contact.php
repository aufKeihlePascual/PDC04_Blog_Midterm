<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array('Contact');
?>

<div class="container mx-auto px-4 py-3">
  <?php if (Yii::app()->user->hasFlash('contact')): ?>
    <div class="bg-green-200 text-green-800 p-4 rounded mb-6">
      <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
  <?php else: ?>
  
    <h1 class="text-3xl font-bold text-white mb-6">Contact Us</h1>
    <p class="text-gray-300 mb-6">
      If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    
    <div class="max-w-2xl mx-auto p-6 bg-[#242d4b] rounded shadow">
      <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'enableClientValidation' => true,
        'clientOptions' => array('validateOnSubmit' => true),
        'htmlOptions' => array('class' => 'space-y-6'),
      )); ?>
      
      <p class="text-sm text-[#e4e4e4]">
        Fields with <span class="text-red-500">*</span> are required.
      </p>
      
      <?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500')); ?>
      
      <!-- Name Field -->
      <div>
        <?php echo $form->labelEx($model, 'name', array('class' => 'block text-white font-semibold mb-1')); ?>
        <?php echo $form->textField($model, 'name', array(
          'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
        )); ?>
        <?php echo $form->error($model, 'name', array('class' => 'text-red-500 text-sm')); ?>
      </div>
      
      <!-- Email Field -->
      <div>
        <?php echo $form->labelEx($model, 'email', array('class' => 'block text-white font-semibold mb-1')); ?>
        <?php echo $form->textField($model, 'email', array(
          'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
        )); ?>
        <?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
      </div>
      
      <!-- Subject Field -->
      <div>
        <?php echo $form->labelEx($model, 'subject', array('class' => 'block text-white font-semibold mb-1')); ?>
        <?php echo $form->textField($model, 'subject', array(
          'size' => 60,
          'maxlength' => 128,
          'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
        )); ?>
        <?php echo $form->error($model, 'subject', array('class' => 'text-red-500 text-sm')); ?>
      </div>
      
      <!-- Body Field -->
      <div>
        <?php echo $form->labelEx($model, 'body', array('class' => 'block text-white font-semibold mb-1')); ?>
        <?php echo $form->textArea($model, 'body', array(
          'rows' => 6,
          'class' => 'w-full p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
        )); ?>
        <?php echo $form->error($model, 'body', array('class' => 'text-red-500 text-sm')); ?>
      </div>
      
      <!-- CAPTCHA -->
      <?php if (CCaptcha::checkRequirements()): ?>
        <div>
          <?php echo $form->labelEx($model, 'verifyCode', array('class' => 'block text-white font-semibold mb-1')); ?>
          <div class="flex items-center space-x-2">
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model, 'verifyCode', array(
              'class' => 'p-2 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:border-[#f5539d]'
            )); ?>
          </div>
          <p class="text-gray-400 text-xs mt-1">
            Please enter the letters as they are shown in the image above.
            Letters are not case-sensitive.
          </p>
          <?php echo $form->error($model, 'verifyCode', array('class' => 'text-red-500 text-sm')); ?>
        </div>
      <?php endif; ?>
      
      <!-- Submit Button -->
      <div class="flex justify-end">
        <?php echo CHtml::submitButton('Submit', array(
          'class' => 'px-4 py-2 bg-[#f5539d] text-white rounded hover:bg-[#ff8bcf] transition-colors'
        )); ?>
      </div>
      
      <?php $this->endWidget(); ?>
    </div><!-- /form card -->
  <?php endif; ?>
</div>
