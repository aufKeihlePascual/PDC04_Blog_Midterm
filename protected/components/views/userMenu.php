<ul class="space-y-3 text-[#333]">

  <li>
    <a href="<?php echo Yii::app()->createUrl('post/admin'); ?>" 
       class="flex items-center space-x-8 text-[#f1c080] hover:text-[#EC9955FF] transition duration-300">
      <i class="fas fa-tasks"></i>
      <span>Manage Posts</span>
    </a>
  </li>

<li>
  <a href="<?php echo Yii::app()->createUrl('comment/index', array('status' => 'pending')); ?>" 
     class="flex items-center space-x-8 text-[#f1c080] hover:text-[#EC9955FF] transition duration-300">
    <i class="fas fa-check-circle"></i>
    <span>Approve Comments (<?php echo Comment::model()->pendingCommentCount; ?>)</span>
  </a>
</li>

<li>
  <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>" 
      class="flex items-center space-x-8 text-[#E99D3AFF] hover:text-[#EC9955FF] transition duration-300">
    <i class="fas fa-sign-out-alt"></i>
    <span><strong>Logout</strong></span>
  </a>
</li>

</ul>