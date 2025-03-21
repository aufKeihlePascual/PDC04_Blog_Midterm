<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array('Login');
?>

<div class="max-w-md mx-auto mt-20 p-6">
  <div class="bg-[#242d4b] rounded-lg shadow-lg">
    <!-- Panel Header -->
    <div class="bg-[#1a2036] rounded-t-lg px-6 py-4">
      <h3 class="text-white text-2xl font-semibold text-center">Sign In</h3>
    </div>
    <!-- Panel Body -->
    <div class="px-6 py-8 space-y-6">
      <?php $form = $this->beginWidget('CActiveForm', array(
          'id' => 'login-form',
          'enableClientValidation' => true,
          'clientOptions' => array(
              'validateOnSubmit' => true,
          ),
          'htmlOptions' => array('class' => 'space-y-6')
      )); ?>
      
      <p class="text-center text-sm text-gray-300">
        Enter your credentials to access your account
      </p>
      
      <!-- Username Field -->
      <div class="flex flex-col">
        <?php echo $form->labelEx($model, 'username', array('class' => 'text-white font-medium mb-1')); ?>
        <?php echo $form->textField($model, 'username', array(
            'class' => 'w-full p-3 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Username'
        )); ?>
        <?php echo $form->error($model, 'username', array('class' => 'text-red-500 text-sm mt-1')); ?>
      </div>
      
      <!-- Password Field -->
      <div class="flex flex-col">
        <?php echo $form->labelEx($model, 'password', array('class' => 'text-white font-medium mb-1')); ?>
        <?php echo $form->passwordField($model, 'password', array(
            'class' => 'w-full p-3 rounded border border-gray-300 bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Password'
        )); ?>
        <?php echo $form->error($model, 'password', array('class' => 'text-red-500 text-sm mt-1')); ?>
        <p class="text-sm text-gray-300 mt-2">
          Hint: Use <kbd class="bg-gray-700 text-gray-200 px-1 rounded">demo</kbd>/<kbd class="bg-gray-700 text-gray-200 px-1 rounded">demo</kbd> or <kbd class="bg-gray-700 text-gray-200 px-1 rounded">admin</kbd>/<kbd class="bg-gray-700 text-gray-200 px-1 rounded">admin</kbd>.
        </p>
      </div>
      
      <!-- Remember Me -->
      <div class="flex items-center">
        <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'mr-2')); ?>
        <?php echo $form->label($model, 'rememberMe', array('class' => 'text-white')); ?>
        <?php echo $form->error($model, 'rememberMe', array('class' => 'text-red-500 text-sm ml-2')); ?>
      </div>
      
      <!-- Submit Button -->
      <div>
        <?php echo CHtml::submitButton('Login', array(
            'class' => 'w-full py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200'
        )); ?>
      </div>
      
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
