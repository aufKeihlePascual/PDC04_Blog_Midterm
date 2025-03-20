<?php
/* @var $this CommentController */
/* @var $model Comment */

// Fetch the associated Post record based on post_id
$post = Post::model()->findByPk($model->post_id);
$postTitle = $post ? $post->title : 'Unknown Post';
$postPreview = $post ? (strlen(strip_tags($post->content)) > 150 ? substr(strip_tags($post->content), 0, 150) . '...' : strip_tags($post->content)) : '';

$statusName = Comment::getStatusName($model->status);
$statusColor = 'text-gray-400';
if (strtolower($statusName) === 'pending approval') {
    $statusColor = 'text-yellow-500';
} elseif (strtolower($statusName) === 'approved') {
    $statusColor = 'text-green-500';
} elseif (strtolower($statusName) === 'rejected') {
    $statusColor = 'text-red-500';
}

$this->breadcrumbs = array(
    'Comments' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Comments', 'url' => array('index')),
    array('label' => 'Update Comment', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Comment', 'url' => '#', 'linkOptions' => array(
        'submit' => array('delete', 'id' => $model->id),
        'confirm' => 'Are you sure you want to delete this item?'
    )),
    array('label' => 'Manage Comments', 'url' => array('admin')),
);
?>

<div class="container mx-auto px-4 py-8">
  <!-- Comment Header -->
  <header class="mb-8">
    <h1 class="text-5xl font-bold text-[#f5539d] mb-4">
      View Comment #<?php echo $model->id; ?>
    </h1>
    <div class="flex items-center text-gray-400 text-sm">
      <span class="mr-2">By: <?php echo CHtml::encode($model->author); ?></span>
      <span class="mx-2">&bull;</span>
      <span><?php echo date('F j, Y', $model->create_time); ?></span>
    </div>
  </header>

  <article class="prose prose-invert max-w-none mb-12">
    <?php echo $model->content; ?>
  </article>
  
  <!-- Important Details Section -->
  <div class="mb-8 p-4 bg-[#202844] rounded shadow">
    <div class="flex flex-col gap-4">
      <!-- Post Details: ID, Title and Preview -->
      <div>
        <span class="font-bold text-gray-300">Post:</span>
        <?php
          echo CHtml::link(
            CHtml::encode($postTitle),
            array('post/view', 'id' => $model->post_id),
            array('class' => 'text-[#F37C46FF] hover:text-[#f1c080]')
          );
        ?>
      </div>
      <!-- Status -->
      <div>
        <span class="font-bold text-gray-300">Status:</span>
        <span class="<?php echo $statusColor; ?>"><?php echo $statusName; ?></span>
      </div>
      <!-- Email -->
      <div>
        <span class="font-bold text-gray-300">Email:</span>
        <span class="text-white"><?php echo $model->email; ?></span>
      </div>
      <!-- URL -->
      <div>
        <span class="font-bold text-gray-300">URL:</span>
        <span class="text-white"><?php echo $model->url; ?></span>
      </div>
    </div>
  </div>

  <!-- Comment Content -->
  
</div>
