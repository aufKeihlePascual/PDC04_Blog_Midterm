<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comments', 'url'=>array('index')),
	// array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		array(
			'name' => 'status',
			'value' => Comment::getStatusName($model->status),
		),
		array(
            'name' => 'create_time',
            'value' => date('F j, Y h:i:s A', $model->create_time),
        ),
		'author',
		'email',
		'url',
		'post_id',
	),
)); ?>
