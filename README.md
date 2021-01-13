# Prueba 6Conecta

Prueba realizada en Lumen framework v8.0

Requerimientos:
- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension

## Pasos para configurar el proyecto:

1. Duplicar el archivo ".env.example" y renombrarlo a ".env".
2. Configurar los parametros de conexión a la Base de Datos en el archivo ".env" (Línea 11 a 16).
3. Configurar los parametros para el envio de email en el archivo ".env" (Línea 22 a 29).
4. Crear BD con el nombre indicado en DB_DATABASE.
5. Ejecutar comando `php:artisan:migrate` para crear las tablas.

## Pasos para ejecutar el proyecto:

1. Ubicarse en la carpeta del proyecto a través de la consola y ejecutar los comandos: 
    - `composer update` (para crear el vendor).
    - `php -S localhost:8080 -t public` (para levantar el servicio).
2. Abrir un navegador y ejecutar la siguiente url:  `http://localhost:8080/api/events` (muestra todos los conciertos registrados).
3. La colección Postman: areaseys - events.postman_collection.json contiene 2 request para probar la API.

### Test Unitarios
1. Ubicarse en la carpeta del proyecto a través de la consola.
2. Para efectos de validar la funcionalidad he creado creado el test: EventTest.php
3. Para ejecutar los tests, se debe ejecutar el siguiente comando: `vendor/bin/phpunit tests/EventTest.php`.