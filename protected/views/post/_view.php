<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="blog-post">
  <!-- Post Title -->
  <h2>
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
  </h2>
  
  <!-- Post Meta: Date and Tags -->
  <div class="post-meta">
    <span class="post-date"><?php echo date('F j, Y', $data->create_time); ?></span>
    <?php if (!empty($data->tags)): ?>
      <span class="post-tags"> | Tags: <?php echo CHtml::encode($data->tags); ?></span>
    <?php endif; ?>
  </div>
  
  <!-- Post Excerpt -->
  <div class="post-excerpt">
    <?php 
      // Remove HTML tags for a clean summary and limit to 250 characters
      $plainText = strip_tags($data->content);
      $summary = strlen($plainText) > 250 ? substr($plainText, 0, 250) . '...' : $plainText;
      echo CHtml::encode($summary);
    ?>
  </div>
  
  <!-- Read More Link -->
  <div class="read-more">
    <?php echo CHtml::link('Read More', array('view', 'id'=>$data->id)); ?>
  </div>
</div>
