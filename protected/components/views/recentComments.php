<ul class="space-y-3 text-[#fff]">

  <?php foreach ($this->getRecentComments() as $comment): ?>
    <li class="flex items-center space-x-8">
      <i class="fas fa-comment text-[#b08968]"></i>
      <span>
        <?php echo $comment->authorLink; ?> on 
        <a href="<?php echo $comment->getUrl(); ?>" 
           class="text-[#f1c080] hover:text-[#EC9955FF] transition duration-300">
          <?php echo CHtml::encode($comment->post->title); ?>
        </a>
      </span>
    </li>
  <?php endforeach; ?>

</ul>