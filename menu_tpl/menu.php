<?php

use yii\helpers\Url;
$newUrl = '';
$MenuFull = $category['link'];
$https = explode('https', $MenuFull);
$http = explode('http', $MenuFull);
if (count($https) > 1 || count($http) > 1 ) {
    $newUrl = $MenuFull;
} else {
    $newUrl = Url::to([$MenuFull]);
}

if (Url::to([$MenuFull]) == Yii::$app->request->url) {
    $classLi = 'active';
} else {
    $classLi = '';
}
?>
<?php if (!isset($category['childs'])) : ?>
    <li class="nav-item <?= $classLi ?>"><a class="nav-link" href="<?= $newUrl ?>" <?= $category['attribute'] ?>><?= $category['name'] ?></a></li>
<?php else : ?>
    <li class="nav-item dropdown <?= $classLi ?>"><a href="<?= $newUrl ?>" class="dropdown-toggle" data-hover="dropdown" data-delay="100" data-toggle="dropdown" aria-expanded="false"><?= $category['name'] ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    </li>
<?php endif; ?>