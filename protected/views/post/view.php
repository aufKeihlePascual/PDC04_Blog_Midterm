<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs = array(
    'Posts' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Post', 'url' => array('index')),
    array('label' => 'Create Post', 'url' => array('create')),
    array('label' => 'Update Post', 'url' => array('update', 'id' => $model->id)),
    array(
        'label' => 'Delete Post',
        'url' => '#',
        'linkOptions' => array(
          'submit' => array('delete', 'id' => $model->id),
          'confirm' => 'Are you sure you want to delete this item?'
        )
    ),
    array('label' => 'Manage Post', 'url' => array('admin')),
);
?>

<div class="container mx-auto px-4 py-8">
  <!-- Blog Post Header -->
  <header class="mb-8">
  <h1 class="text-5xl font-bold text-[#f5539d] mb-4"><?php echo CHtml::encode($model->title); ?></h1>
    <div class="flex items-center text-gray-400 text-sm">
      <span class="mr-2">By <?php echo isset($model->author) ? $model->author->username : "Unknown"; ?></span>
      <span class="mx-2">&bull;</span>
      <span><?php echo date('F j, Y', $model->create_time); ?></span>
      <?php if (!empty($model->tags)): ?>
        <span class="mx-2">&bull;</span>
        <span>Tags: <?php echo CHtml::encode($model->tags); ?></span>
      <?php endif; ?>
    </div>
  </header>

  <!-- Blog Post Content -->
  <article class="prose prose-invert max-w-none mb-12">
    <?php echo $model->content; ?>
  </article>

  <!-- Post Meta Footer -->
  <footer class="mb-12 border-t border-gray-700 pt-4">
    <div class="flex justify-between text-[#f1c080] text-sm">
      <div>Post ID: <?php echo $model->id; ?></div>
      <div>Last Updated: <?php echo date('F j, Y', $model->update_time); ?></div>
    </div>
  </footer>

  <!-- Comments Section -->
  <section id="comments" class="mb-12">
    <?php if ($model->commentCount >= 1): ?>
      <h3 class="text-2xl font-semibold text-white mb-4"><?php echo $model->commentCount . ' Comment(s)'; ?></h2>
      <div class="space-y-6">
        <?php $this->renderPartial('_comments', array(
            'post' => $model,
            'comments' => $model->comments,
        )); ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Comment Form -->
  <section id="comments-form" class="bg-[#202844] p-6 rounded shadow">
    <h2 class="text-3xl font-semibold text-[#ff8bcf] mb-4">Leave a Comment</h2>
    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
      <div class="bg-green-200 text-green-800 p-4 rounded">
          <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
      </div>
    <?php else: ?>
      <?php $this->renderPartial('/comment/_form', array(
          'model' => $comment,
          'post'  => $model,
      )); ?>
    <?php endif; ?>
  </section>
</div>
