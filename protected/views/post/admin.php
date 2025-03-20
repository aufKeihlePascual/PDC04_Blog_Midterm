<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs = array(
    'Posts' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Post', 'url' => array('index')),
    array('label' => 'Create Post', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#post-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="container mx-auto px-4 py-8">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-5xl font-bold text-[#f5539d] mb-4">Manage Posts</h1>
    <p class="text-gray-300">
      You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
      or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>
  </header>
  
  <!-- Advanced Search Link -->
  <div class="mb-4">
    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button text-[#f5539d] underline')); ?>
  </div>
  
  <!-- Search Form -->
  <div class="search-form mb-8" style="display:none">
    <?php $this->renderPartial('_search', array('model' => $model)); ?>
  </div>
  
  <!-- Responsive Grid Container -->
  <div class="bg-white dark:bg-gray-800 p-4 rounded shadow overflow-x-auto">
    <?php 
      $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'post-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'itemsCssClass' => 'min-w-full divide-y divide-gray-00 table-auto',
        'columns' => array(
			array(
				'name' => 'author_id',
				'header' => 'Author',
				'value' => 'isset($data->author) ? $data->author->username : "Unknown"',
				'filter' => false,
				'htmlOptions' => array('class' => 'px-4 py-2 sm:max-w-[100px] overflow-hidden'),
			  ),
          array(
            'name' => 'title',
            'htmlOptions' => array('class' => 'px-4 py-2 sm:max-w-[200px] overflow-hidden'),
			'filterHtmlOptions' => array('class' => 'bg-white text-gray-800'),
          ),
          array(
            'name' => 'content',
            'value' => 'strlen(strip_tags($data->content)) > 50 ? substr(strip_tags($data->content), 0, 50) . "..." : strip_tags($data->content)',
            'htmlOptions' => array('class' => 'px-4 py-2 sm:max-w-[300px] overflow-hidden text-justify'),
			'filterHtmlOptions' => array('class' => 'bg-white text-gray-800'),
          ),
          array(
            'name' => 'tags',
            'htmlOptions' => array('class' => 'px-4 py-2 sm:max-w-[150px] overflow-hidden text-center'),
			'filterHtmlOptions' => array('class' => 'bg-white text-gray-800'),
          ),
          array(
            'name' => 'status',
            'value' => 'Post::getStatusName($data->status)',
            'filter' => Lookup::items("PostStatus"),
            'htmlOptions' => array('class' => 'px-4 py-2 text-center'),
            'filterHtmlOptions' => array('class' => 'bg-white text-gray-800'),
          ),
          array(
            'name' => 'create_time',
            'value' => 'date("m/d/y h:i A", $data->create_time)',
            'filter' => false,
            'htmlOptions' => array('class' => 'px-4 py-2'),
          ),
          array(
            'class' => 'CButtonColumn',
            'htmlOptions' => array('class' => 'w-full flex items-center justify-center space-x-2 mt-7'),
            'buttons' => array(
              'view' => array(
                'label' => '<i class="fas fa-eye"></i>',
                'imageUrl' => false,
                'options' => array('class' => 'text-xl text-[#FCB7D6FF] hover:text-[#FF9DC9FF]'),
              ),
              'update' => array(
                'label' => '<i class="fas fa-edit"></i>',
                'imageUrl' => false,
                'options' => array('class' => 'text-xl text-[#FCB7D6FF] hover:text-[#FF9DC9FF]'),
              ),
              'delete' => array(
                'label' => '<i class="fas fa-trash-alt"></i>',
                'imageUrl' => false,
                'options' => array('class' => 'text-xl text-[#FCB7D6FF] hover:text-[#FF9DC9FF]'),
              ),
            ),
          ),
        ),
      ));
    ?>
  </div>
</div>
