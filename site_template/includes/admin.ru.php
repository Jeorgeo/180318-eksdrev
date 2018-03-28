<?php
define ('_BANNER','Баннер');
define ('_VIEW_CHAILD','Смотреть дочерние объекты');
define ('_BANNER_PERIOD','Период показа');
define ('_BANNER_SAPE','Количество ссылок');
define ('_BANNER_SAPE_POD','-1 = Оставшиеся');
define ('_BANNER_POKAZ','Ограничение по показам');
define ('_BANNER_CODE','Код рекламы<br/><small>(Adsense,Yandex Direct и т.д.)</small>');
define ('_NOT_CONNECT','Не могу соединиться с сервером MySQL!');
define ('_NOT_SELECT_DB','База данных не созданна или указана не верно!');
define ('_NAME','Наименование');
define ('_PHONE_WORK','Рабочий телефон');
define ('_PHONE_HOME','Домашний телефон');
define ('_PHONE_MOBILE','Мобильный телефон');
define ('_MAIL','Электронная почта');
define ('_USER_NAME','Имя пользователя');
define ('_USER_GROUP','Группа');
define ('_USER_GROUPS','Группы');
define ('_ACTION','Действия');
define ('_EDIT','Редактировать');
define ('_ADD','Добавить');
define ('_ADD_CATEGORY','Добавить Группу');
define ('_SAVE','Сохранить');
define ('_CLEAR','Очистить');
define ('_DELETE','Удалить');
define ('_GROUPS','Группы');
define ('_GROUP','Группа');
define ('_URL','Адрес сайта');
define ('_PUBLISH','Публиковать');
define ('_UNPUBLISH','Не публиковать');
define ('_CHANGE_PASSWD','Изменить пароль');
define ('_LOGIN','Логин');
define ('_PASSWD','Пароль');
define ('_NO_ITEMS','Нет записей');
define ('_ALLOW','Разрешения');
define ('_USER_EXIST','Пользователь с данным логином уже сеществует!');
define ('_NO_COOKIE','');
define ('_NO_LOGIN','Вы ввели неправильный логин/пароль');
define ('_CITY','Город');
define ('_FOTO','Фото');
define ('_NO','Не важно&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
define ('_NO_SELECT','- не важно -');
define ('_NON','Нет');
define ('_YES','Да');
define ('_PARENT_CATEGORY','Родительская категория');
define ('_CATEGORY','Категория');
define ('_MARKA','Марка');
define ('_MODEL','Модель');
define ('_TYPE','Тип');
define ('_VALUE','Значение');
define ('_FOTO_NO','Нет фото');
define ('_LINK','Ярлык');
define ('_PUB','Опубликовано');
define ('_UNPUB','Не опубликовано');
define ('_TITLE','Заголовок');
define ('_PRICE','Цена');
define ('_VIPUSK','Год выпуска');
define ('_DATE','Дата');
define ('_ORDER','Сортировка');
define ('_PN_LT','&lt;');
define ('_PN_RT','&gt;');
define ('_PN_PAGE','Страница');
define ('_COMPLECTS','Комплекты');
define ('_PN_OF','из');
define ('_PN_START','В начало');
define ('_PN_PREVIOUS','Предыдущая');
define ('_PN_NEXT','Следующая');
define ('_PN_END','В конец');
define ('_PN_DISPLAY_NR','Показано #');
define ('_PN_RESULTS','Всего');
define ('_ALL','Все');
define ('_SELECTED','Отмеченные');
define ('_ADDRESS','Адрес');
define ('_SETS','Общие настройки');
define ('_SETS_REKLAMA','Настройка рекламы');
define ('_SETS_COUNTER','Счетчики');
define ('_SETS_INFORMER','Информеры');
define ('_SETS_DOP','Дополнительные параметры');
define ('_PHONE','Телефон');
$g_action = array (
   'view' =>   array ('id'	=> '1', 'action' => 'view', 'title'  => 'Просматривать'),
   'add' =>   array ('id'	=> '2', 'action' => 'add', 'title'  => 'Добавлять'),
   'edit' =>   array ('id'	=> '3', 'action' => 'edit', 'title'  => 'Редактировать'),
   'regedit' =>   array ('id'	=> '4', 'action' => 'delete', 'title'  => 'Удалять'),
   );
   
$g_type = array (
   'checkbox' =>   'Чекбокс',
   'select' =>  'Список',
   'value' =>   'Значение'
   );  
// Тип Рекламы   
$banner_type = array (
   '1' =>   'Баннер',
   '2' =>  'Код (Adsense и т.д.)',
   '3' =>   'SAPE'
   );  
// Тип место Рекламы   
$banner_place_type = array (
   '1' =>   'Реклама',
   '2' =>  'Ссылки'
   );     
$b_type = array (
   '1' =>   'Продажа',
   '2' =>  'Покупка'
   );    
$g_currency = array (
   '1' =>   'Руб.',
   '2' =>   'USD',
   '3' =>   'EUR',
   );    
?>