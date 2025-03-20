<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="relative-container">
  <!-- Main Content -->
  <div class="main-content">
    <div id="content">
      <?php echo $content; ?>
    </div><!-- content -->
  </div>
  
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidemenu-container">
      <?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

      <?php $this->widget('TagCloud', array(
          'maxTags'=>Yii::app()->params['tagCloudCount'],
      )); ?>

      <?php $this->widget('RecentComments', array(
          'maxComments'=>Yii::app()->params['recentCommentCount'],
      )); ?>

      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
          'title'=>'Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
          'items'=>$this->menu,
          'htmlOptions'=>array('class'=>'operations'),
        ));
        $this->endWidget();
      ?>
    </div><!-- sidemenu-container -->
  </div><!-- sidebar -->
</div><!-- relative-container -->
<?php $this->endContent(); ?>
