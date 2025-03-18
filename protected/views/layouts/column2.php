<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container mx-auto grid grid-cols-4 gap-6 my-8">

  <!-- Main Content Area -->
  <div class="col-span-3 bg-white p-6 rounded-lg shadow-md">
    <div id="content">
      <?php echo $content; ?>
    </div>
  </div>

  <!-- Sidebar -->
  <aside class="bg-white p-6 rounded-lg shadow-md space-y-6">

    <!-- User Menu (Visible for Logged-in Users) -->
    <?php if (!Yii::app()->user->isGuest): ?>
      <div class="mb-4">
        <?php $this->widget('UserMenu'); ?>
      </div>
    <?php endif; ?>

    <!-- Tag Cloud Widget -->
    <div class="mb-4">
      <h3 class="text-lg font-semibold text-[#b08968] mb-2">Tags</h3>
      <?php $this->widget('TagCloud', array(
        'maxTags' => Yii::app()->params['tagCloudCount'],
      )); ?>
    </div>
      
    <!-- Recent Comments Widget -->
    <div class="mb-4">
      <h3 class="text-lg font-semibold text-[#b08968] mb-2">Recent Comments</h3>
      <?php $this->widget('RecentComments', array(
        'maxComments' => Yii::app()->params['recentCommentCount'],
      )); ?>
    </div>

  </aside>

</div>

<?php $this->endContent(); ?>