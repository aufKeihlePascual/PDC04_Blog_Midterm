<ul class="space-y-4 text-[#333]">

  <?php foreach ($this->getRecentComments() as $comment): ?>
    <li class="flex items-center space-x-2">
      <i class="fas fa-comment text-[#b08968]"></i>
      <span>
        <?php echo $comment->authorLink; ?> on 
        <a href="<?php echo $comment->getUrl(); ?>" 
           class="text-[#b08968] hover:text-[#8c6a52] transition duration-300">
          <?php echo CHtml::encode($comment->post->title); ?>
        </a>
      </span>
    </li>
  <?php endforeach; ?>

</ul>