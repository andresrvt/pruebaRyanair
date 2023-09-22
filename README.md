Guía de Usuario

Requisitos Previos
Asegúrese de tener XAMPP instalado en su sistema. 

Debe tener Composer instalado en su sistema. Puede descargarlo e instalarlo desde la página oficial de Composer.

Paso 1: Clonar el Proyecto

Clone el proyecto el repositorio Git utilizando el siguiente comando:

git clone https://github.com/andresrvt/pruebaRyanair

Paso 2: Configurar la Base de Datos

Abra XAMPP y asegúrese de que los servicios de Apache y MySQL estén iniciados.

En la raíz principal del proyecto, copie el archivo .env.example y renómbrelo a .env.

Abra el archivo .env en un editor de texto y asegure que las siguientes variables de entorno se encuentran así:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ryanair
DB_USERNAME=root
DB_PASSWORD=

Los valores de DB_DATABASE, DB_USERNAME y DB_PASSWORD tienen que coincidir con su configuración de XAMPP.

Paso 3: Actualizar Dependencias

Abra una terminal donde se encuentra el archivo composer.json y ejecute el siguiente comando para actualizar las dependencias de Laravel:

composer update




Paso 4: Migrar la Base de Datos

En la misma terminal, ejecute el siguiente comando para ejecutar las migraciones de la base de datos y crear las tablas necesarias:

php artisan migrate

Paso 5: Iniciar el Servidor de Desarrollo

En la misma terminal, ejecute el siguiente comando para iniciar el servidor de desarrollo de Laravel:

php artisan serve

El servidor de desarrollo se iniciará en http://localhost:8000.
