# Bienvenido el sistema de registro de empleados

## Configuración

Para correr este programa primero deberá ser descargado de **Github** en la carpeta que desee. Después deberá de configurar el archivo **.env** colocando los datos:

> DB_CONNECTION=mysql
	DB_HOST=
	DB_PORT=
	DB_DATABASE=
	DB_USERNAME=
	DB_PASSWORD=


Después debe correr el el comando **php artisan migrate** para que se creen las bases de datos automaticamante y después generamos las **keys** de **passport** que es la librería que nos ayuda en el loggeo **php
php artisan passport:keys**.

## Levantar servidor

Para correr el servidor deberá correr el comando **php artisan serve**, ya con esto el servidor estará en nuestra página en **http://127.0.0.1:8000/** y será la ruta con la que se trabajará.

##  Datos
Los datos a ingresar deben ser de un tipo específico.
| Parametro | Tipo de dato |
|-----------|--------------|
| name | **String** |
| email | **Formato Email** |
|document | **Número** |
| photo | **Blob** tipo png o jpg |

## Login
Para loggearse se necesita primero registrar con la dirección anterior seguido de **/api/register** con los parametros **name, email, password**  y después en la ruta **/api/login** que le devolverá un token de acceso para consultar y agregar empleados.

## Rutas

|       Rutas        | Parametros | Función | Metodo
|--------------------|------------|---------------|----------|
|**/api/employees**|              |Devuelve todos los empleados registrados  | **GET** |          |
|**/api/employee/show/{id}** |`  |Devuelve un empleado en especifico con el id | **GET** |          |
|**/api/employee/destroy/{id}**| | Destruye el empleado con el id | **DELETE** |
|**/api/employee/add**| name, email, document, photo | Añade un nuevo empleado| **POST**|
|**/api/employee/edit/{id}**| name, email, document, photo | Actualiza el empleado con el id especificado | **POST**| 
