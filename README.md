<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## MottoBackpackBase

MottoBackpackBase es un CMS base creado con Laravel, implementado Backpack para el backend y con la idea de evitar repetir estructuras.

## Plugins instalados

#### Laravel

###### Debug - Ignition

Code Editor: <a href="https://github.com/facade/ignition-code-editor">https://github.com/facade/ignition-code-editor</a>
<br>
Self Diagnosis: <a href="https://github.com/facade/ignition-self-diagnosis">https://github.com/facade/ignition-self-diagnosis</a>
<br>

###### Debug - Debugbar

Debugbar: <a href="https://github.com/barryvdh/laravel-debugbar">https://github.com/barryvdh/laravel-debugbar</a>

#### Backpack

Backpack + elfinder: <a href="https://backpackforlaravel.com/docs/4.0/installation">https://backpackforlaravel.com/docs/4.0/installation</a>
<br>

## Settings

Las configuraciones base de un proyecto se definen en la tabla settings de la base de datos. El crud permite crear y modificar los valores según el tipo seleccionado.<br>
Para llamar a estos settings se puede hacer de dos formas
<code>
    Setting::get('contact_email');<br>
    Config::get('settings.contact_email');
</code>
<br>
En caso de que ya exista el setting en el env, en el AppServiceProvider se ha de condicionar para sobreescribir el valor.

## Languages

Las traducciones se gestionan con idiomas en tres sitios: LaravelLocalization para el front, config/backpack/base para los idiomas que utilizará el HasTranslations y en tabla languages para el LangFileManager en archivos de trans.<br>
Backpack/LangFileManager: <a href="https://github.com/Laravel-Backpack/LangFileManager">https://github.com/Laravel-Backpack/LangFileManager</a>
<br><br>
Instalamos plugin para gestionar idiomas en el front. Activamos opción que idioma default no aparecerá locale en la ruta.
Mcamara/LaravelLocalization: <a href="https://github.com/mcamara/laravel-localization">https://github.com/mcamara/laravel-localization</a>
<br><br>
Plugin sluggable:<br>
<code>composer require cviebrock/eloquent-sluggable "^6.0"</code>
<a href="https://github.com/cviebrock/eloquent-sluggable">https://github.com/cviebrock/eloquent-sluggable</a>
<br><br>
Plugin spatie/translatable: <a href="https://github.com/spatie/laravel-translatable">https://github.com/spatie/laravel-translatable</a>
<br>

## How to start project with docker (sail)

* First install:
```
composer require laravel/sail --dev
php artisan sail:install
```

* Execute command into the project folder:
````
./vendor/bin/sail up
````

* Create an alias for sail if needed:
````
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
sail up
````

* If you prefer start Docker containers in background:
````
sail up -d
````


## Some useful commands / code
````
sail composer install
````
````
sail npm install
````
````
sail npm run watch
````
````
sail npm run dev
````
````
sail mysql -u<user> -p
````
Remove all docker images:
````
sail down --rmi all -v
````
Clear cache:
````
sail flush:cache
````
Cruds:
````
sail composer require backpack/generators --dev
````
````
sail composer require laracasts/generators --dev
````
````
sail php artisan make:migration:schema create_tags_table --model=0 --schema="name:string:unique,slug:string:unique
````
````
sail php artisan migrate
````
Use singular, not plural.  Make request, model, controller, add routes, add menu in sidebar
````
sail php artisan backpack:crud tag
````

## Scaffolding

##### Routes
Separamos en dos archivos las rutas del front (web.php) y las del backend (admin.php). Ejemplo o para separar más las rutas:<br>
<a href="https://laraveles.com/organiza-tus-rutas-en-multiples-archivos-en-laravel/">https://laraveles.com/organiza-tus-rutas-en-multiples-archivos-en-laravel/</a><br>

#### Pages
Instalamos plugin de backpack <a href="https://github.com/Laravel-Backpack/PageManager">https://github.com/Laravel-Backpack/PageManager</a><br>

#### Menu
Instalamos el plugin de backpack que depende de pagemanager MenuCRUD: <a href="https://github.com/Laravel-Backpack/MenuCRUD">https://github.com/Laravel-Backpack/MenuCRUD</a>

#### News
Instalamos plugin para backpack de NewsCRUD: <a href="https://github.com/Laravel-Backpack/NewsCRUD">https://github.com/Laravel-Backpack/NewsCRUD</a><br>
Lo adaptamos a traducciones, campos personalizados, etc.


#### Sitemap
Instalamos plugin Laravelium/Sitemap para generar el sitemap automáticamente por consola: <a href="https://gitlab.com/Laravelium/Sitemap">https://gitlab.com/Laravelium/Sitemap</a>

#### Logging

Canales extras disponibles: mail, console, api, cron, exception.
<br>
Example:<br>
<code>Log::channel('api')->info("Mensaje en el channel de api");</code>

#### Commands

<code>flush:cache</code>: Clear Laravel cache

#### Cruds
<code>composer require backpack/generators --dev</code><br>
<code>composer require laracasts/generators --dev</code><br>
<code>php artisan make:migration:schema create_tags_table --model=0 --schema="name:string:unique,slug:string:unique"</code><br>
<code>php artisan migrate</code><br>
<code>php artisan backpack:crud tag #use singular, not plural // Make request, model, controller, add routes, add menu in sidebar</code>

#### Migrations

###### BlueprintHelper

Estructura para campos comunes en las migrations (BlueprintHelper):<br>
<code>$table->defaultOrder();<br>
$table->defaultDestacat();<br>
$table->defaultActive();<br>
$table->defaultTimeStamps();</code>

###### SoftDeletes

Utilizar siempre <br>
<code>$table->softDeletes();</code>	            

###### Envoy
Instalamos Envoy para hacer deploys desde consola más automáticos: <br>
composer global require "laravel/envoy=~1.0"<br>
sudo nano ~/.profile <br>
Añadimos: PATH=$PATH:$HOME/.composer/vendor/bin<br>
source ~/.profile

Las task o stories se crean en el Envoy.blade.php
Se ejecutan con:<br>
<code>envoy run deploy</code>


#### Cron

Cron para el servidor: <br>
<code>* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1</code>

###### Programados
Semanal: flush:cache, backup:run
<br>
Diario: backup:run --only-db
<br>
Diario: generate:sitemap
