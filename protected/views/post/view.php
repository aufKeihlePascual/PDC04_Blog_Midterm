<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'tags',
		array(
            'name' => 'status',
            'value' => Post::getStatusName($model->status),
        ),
		array(
            'name' => 'create_time',
            'value' => date('F j, Y h:i:s A', $model->create_time),
        ),
		// 'update_time',
        array(
            'name' => 'update_time',
            'value' => date('F j, Y h:i:s A', $model->update_time),
        ),
		array(
            'name' => 'author_id',
            'label' => 'Author',
            'value' => isset($model->author) ? $model->author->username : "Unknown",
        ),
	),
)); ?>

<div id="comments">
    <?php if($model->commentCount>=1): ?>
        <h3>
            <?php echo $model->commentCount . 'comment(s)'; ?>
        </h3>
 
        <?php $this->renderPartial('_comments',array(
            'post'=>$model,
            'comments'=>$model->comments,
        )); ?>
    <?php endif; ?>
</div>

<div id="comments">
    <h3>Leave a Comment</h3>

    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/comment/_form', array(
            'model' => $comment,
            'post' => $model,
        )); ?>
    <?php endif; ?>
</div>