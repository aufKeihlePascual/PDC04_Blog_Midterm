<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Posts',
);

$this->menu=array(
    array('label'=>'Create Post', 'url'=>array('create')),
    array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<div class="container mx-auto px-4 py-1">
  <?php if (!empty($_GET['tag'])): ?>
    <h1 class="text-3xl font-bold mb-4">
      Posts Tagged with <i class="font-normal"><?php echo CHtml::encode($_GET['tag']); ?></i>
    </h1>
  <?php else: ?>
    <h1 class="text-3xl font-bold mb-4">Posts</h1>
  <?php endif; ?>
  
  <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_view',
      'template'=>"<div class='space-y-6'>{items}</div>\n{pager}",
  )); ?>
</div>
