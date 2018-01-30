# Menu Tree Использующее родитель parent_id #


Установка
------------

Предпочтительный способ установки этого расширения через [composer](http://getcomposer.org/download/).

Запустить

```
php composer.phar require --prefer-dist alex290/yii2-menu-tree "*"
```

или вписать

```
"alex290/yii2-menu-tree": "*"
```

в секцию require вашего `composer.json` файла.


Использование
-------------

После установки расширения, просто использовать его в вашем коде :


	<?php $map = app\models\MenuTop::find()->indexBy('id')->orderBy('weight')->asArray()->all() ?>

Где `app\models\MenuTop` Это модель таблицы меню (У вас она может быть своя. Главное, чтоб были нужные поля в таблице).

	<?= \alex290\treemenu\MenuTree::widget(['arrMenu' => $map]); ?

Сама модель использует поля

	'id' - № - int,
	'parent_id' - Родитель - int,
	'name' - Наименование - varchar,
	'link' - Ссылка - varchar,
	'weight' - Вес(порядок)  - int,
	'attribute' - Атрибут ссылк - text',

На выходе получается стандартный Bootstrap Dropdown меню