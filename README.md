<div align="center">
    <a href="https://github.com/ggamover/skl" target="_blank">
        <img src="http://gamover.ru/images/gapp-logo.png" height="100px">
    </a>
    <h1 align="center">Турнирная таблица</h1>
    <p>Проверочное приложение для ООО «СКЛ», разработано Дмитрием Евдокимовым</p>
    <br>
</div>

<h5>Описание установки</h5>
Для примера установим в директорию /home/user/project/skl-app
<ol>
  <li>Зайти в директорию, где будет проект cd /home/user/project</li>
  <li>скачать репозиторий <code>git clone https://github.com/ggamover/skl.git skl-app</code>, 
  где 'skl-app' - название директории в которую будет скачиваться проект</li>
  <li>зайти в директорию проекта <code>cd skl-app</code></li>
  <li>Выполнить <code>composer install</code></li>
  <li>Выполнить <code>init --env=Production --overwrite=All</code></li>
  <li>Создать базу данных, например skl, прописать параметры подключения в common/config/main-local.php</li>
  <li>Запустить миграцию: <code>yii migrate</code>. Или без демо-данных <code>yii migrate/up 5</code></li>
  <li>Создать пользователя для backend: <code>yii user/create-admin &lang;имя&rang; &lang;пароль&rang; &lang;email&rang;</code></li>
  <li>Настроить http сервер для backend и frontend согласно документации Yii2:
    <a href="https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation"></a>
     см. раздел 'Preparing application', п.4
  </li>
</ol>

<p><strong>Замечания</strong></p>
<p>Последняя миграция в пакете - установка демо данных. Если в БД не настроено разрешение явного указания ID, 
то это может вызвать ошибку. В таком случае устанавливайте все миграции, кроме последней <code>yii migrate/up 5</code></p>

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
