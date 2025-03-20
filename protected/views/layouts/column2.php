<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container mx-auto px-4 py-8">
  <div class="flex flex-col lg:flex-row gap-4">
    <!-- Main Content Column (no extra container) -->
    <div class="lg:w-2/3">
      <?php echo $content; ?>
    </div>
    
    <!-- Sidebar Column -->
    <aside class="lg:w-1/3 space-y-4">
      <?php if (!Yii::app()->user->isGuest): ?>
        <div class="bg-[#242d4b] p-3 rounded shadow">
          <h4 class="text-lg font-bold text-[#FD8C9EFF] mb-1">User Menu</h4>
          <?php $this->widget('UserMenu'); ?>
        </div>
      <?php endif; ?>

      <div class="bg-[#242d4b] p-3 rounded shadow">
        <h4 class="text-lg font-bold text-[#ff7289] mb-1">Tag Cloud</h4>
        <?php $this->widget('TagCloud', array(
          'maxTags' => Yii::app()->params['tagCloudCount'],
        )); ?>
      </div>

      <div class="bg-[#242d4b] p-3 rounded shadow">
        <h4 class="text-lg font-bold text-[#ff7289] mb-1">Recent Comments</h4>
        <?php $this->widget('RecentComments', array(
          'maxComments' => Yii::app()->params['recentCommentCount'],
        )); ?>
      </div>

      <div class="bg-[#242d4b] p-3 rounded shadow">
        <h4 class="text-lg font-bold text-[#ff7289] mb-1">Operations</h4>
        <?php
          $this->beginWidget('zii.widgets.CPortlet', array('title' => ''));
          $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'space-y-3 text-sm'),
          ));
          $this->endWidget();
        ?>
      </div>
    </aside>
  </div>
</div>
<?php $this->endContent(); ?>
