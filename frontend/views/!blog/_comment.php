<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>
<div class="blog-comment<?= $model->status== \akiraz2\blog\traits\IActiveStatus::STATUS_INACTIVE? ' blog-comment--inactive': ''?>" id="c<?= $model->id; ?>">
    <p class="white bg-grey">
        <span class="blog-comment__author">
            <?= $model->authorLink; ?> <?= $model->getMaskedEmail();?>
        </span>
        <time class="date" datetime="<?= date_format(date_timestamp_set(new DateTime(), $model->created_at), 'c') ?>" itemprop="datePublished">
            <?= Yii::$app->formatter->asDatetime($model->created_at); ?>
        </time>
    </p>
    <div class="content">
        <?= nl2br(Html::encode($model->getContent())); ?>
    </div>
</div>

