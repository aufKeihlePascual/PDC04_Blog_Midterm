<?php foreach ($comments as $comment) : ?>

<div class="flex justify-between items-center mb-2">
    <span class="text-green-700 font-semibold"><?= $comment->authorLink; ?></span>
    <span class="text-gray-500 text-sm"><?= date('F j, Y \a\t h:i a', $comment->create_time); ?></span>
</div>

<div class="text-gray-300">
    <?= nl2br(CHtml::encode($comment->content)); ?>
</div>

<?php endforeach; ?>
