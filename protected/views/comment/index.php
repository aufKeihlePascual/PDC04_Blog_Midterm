<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Comments',
);

$this->menu = array(
    array('label' => 'Manage Comments', 'url' => array('admin')),
);
?>

<div class="container mx-auto px-4 py-1">
  <h1 class="text-3xl font-bold mb-4">Comments</h1>
  
  <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider' => $dataProvider,
      'itemView' => '_view',
      'template' => "<div class='space-y-6'>{items}</div>\n{pager}",
  )); ?>
</div>
