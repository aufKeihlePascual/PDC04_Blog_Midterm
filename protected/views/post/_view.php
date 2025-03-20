<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="blog-post bg-[#242d4b] p-6 rounded shadow">
  <!-- Post Title -->
  <h2 class="text-2xl font-bold mb-2">
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id), array('class' => 'text-[#f5539d] hover:text-[#ff8bcf]')); ?>
  </h2>
  
  <!-- Post Meta: Date and Tags -->
  <div class="post-meta text-sm text-gray-300 mb-2">
    <span class="post-date"><?php echo date('F j, Y', $data->create_time); ?></span>
    <?php if (!empty($data->tags)): ?>
      <span class="post-tags"> | Tags: <?php echo CHtml::encode($data->tags); ?></span>
    <?php endif; ?>
  </div>
  
  <!-- Post Excerpt -->
  <div class="post-excerpt text-base mb-4">
    <?php 
      // Strip HTML and limit to 250 characters for a clean summary.
      $plainText = strip_tags($data->content);
      $summary = strlen($plainText) > 250 ? substr($plainText, 0, 250) . '...' : $plainText;
      echo CHtml::encode($summary);
    ?>
  </div>
  
  <!-- Read More Link -->
  <div class="read-more">
    <?php echo CHtml::link('Read More', array('view', 'id'=>$data->id), array('class'=>'text-[#f5539d] hover:text-[#ff8bcf] font-semibold')); ?>
  </div>
</div>
