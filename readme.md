<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</

## Despliegue Aplicativo


1. En caso de no tener el gestor de dependencias composer instalar(tener previamente instalado php 7.2)


2. Clonar el repositorio:
Usando el comando git clone https://github.com/OscarGG13/prueba-tecnica-laravel.git

3. Ingresar al proyecto con el comando:
cd prueba-tecnica-laravel

4. Instalar depedencias:
Usando el comando composer install


5. nstalar llaves proyecto laravel:
Usando el comando  php artisan key:generate


6. Agreagar archivo .env al proyecto(solicitar al desarollador(se envia una copia al correo de la prueba))
En el archivo .env se ecuentran las variables de entorno del archivo y credecniales del servidor y base de datos.


7. ejecutar las migraciones:
Usando el comando php artisan migrate


8. Para realizar prueba en local host:
Usando el comando php artisan serve


9. Para realizar un depliegue a produccion agregar el proyecto con la configuracion necesaria segun el servidor web que se use


10. para realizar un despliegue que salga a internet mediante la ip publica sin necesidad de instalar servidor web usar el comando:
php artisan serve --host="mi ip publica"