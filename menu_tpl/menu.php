<?php
    if (yii\helpers\Url::to([$category['link']]) == Yii::$app->request->url) {
        $classLi = 'active';
    } else {
        $classLi = '';
    }
?>
<?php if (!isset($category['childs'])): ?>
    <li class="nav-item <?= $classLi ?>"><a class="nav-link" href="<?= $category['link'] ?>" <?= $category['attribute'] ?> ><?= $category['name'] ?></a></li>
<?php else: ?>
    <li class="nav-item dropdown <?= $classLi ?>"><a href="<?= yii\helpers\Url::to([$category['link']]) ?>"  class="dropdown-toggle" data-hover="dropdown" data-delay="100" data-toggle="dropdown" aria-expanded="false"><?= $category['name'] ?> <b class="caret"></b></a>
        <ul  class="dropdown-menu">
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    </li>
<?php endif; ?>
