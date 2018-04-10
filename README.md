## INTERCON - Сайт intercon.ru на WordPress 

В качестве шаблона была взята тема: MDLWP is a Material Design WordPress 

Выбор темы основан на использовании библиотети Material Design Lite(MDL). Тема пустая, фактически просто скилет.

В ходе разработки от MDL практически отказался и перешел на SmatrGrid (библиотека для генерации сеток на технологии flex)



#### INTERCON Использованные Plugins

- Advanced Custom Fields PRO - Платный плагин (30$) Для определения и работы с допонительными полями. (Плагин удобный. Но на самом деле хватило бы и бесплатной версии этого плагина)
- Toolset Types - Бесплатная версия для определения новых типов записей
- Material Design Icons - Для удобного использования иконок библиотеки MDL
- Cyr to Lat enhanced -Для преобразования УРЛов в латиницу
- Duplicator - для создания копий и переноса сайта (бесплатная версия до 2Gb)


#### INTERCON Инструментарий

- MDL ([http://www.getmdl.io/](http://www.getmdl.io/)) 
- SmartGrid ([github.com/dmitry-lavrik/smart-grid](github.com/dmitry-lavrik/smart-grid)) - $ npm i smart-grid 
- Node ([http://nodejs.org/](http://nodejs.org/)) -`$ npm install`
- Gulp ([http://gulpjs.com/](http://gulpjs.com/)) - `$ npm install --global gulp`
- Bower ([http://bower.io/](http://bower.io/)) -`$ npm install -g bower`

#### Запуск
Скачиваете архив и запускаете `npm install` 

#### Gulp

###### 1) Переходите в директорию проекта
`cd /your-project/wordpress/wp-content/themes/intercon`

###### 2) Запускаете нужную задачу Gulp

`gulp` - Полная сборка

`gulp scripts` - Конкатинация и минимизация  javascript файлов

`gulp sass` - Компиляция Saas в CSS файл

`gulp bower` - 

`gulp zip` - Создание  zip архива всего проекта в корневой директории

#### Разработчик
    AVO