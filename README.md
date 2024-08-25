# Laravel API Test

Proyecto de pruba para Plex.

## Descripción
Este proyecto se integra con la API de Giphy funcionando como intermediario y exponiendo al usuario una API personalizada.

## Tecnologías
- [Laravel v10](https://laravel.com/docs/10.x) es utilizado como framework base.
- [Laravel Sail](https://laravel.com/docs/10.x/sail) es utilizado para ejecutar Docker localmente.
- [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum) se usa para autenticacion.

> [!WARNING]
> Laravel Sanctum proporciona autenticacion rapida para utilizar localmente en este projecto prueba. El token generado puede ser robado y no es seguro para utilizar en produccion.

## Conceptos utilizados
- **Comando** de consola para generar ambiente local de desarrollo.
- **Eloquent** ORM para interactuar con la base de datos.
- **Controller** para agrupar logica de manejo utilizando MVC.
- **Middleware** para interceptar y persistir toda peticion y respuesta.
- **Form Request** para encapsular logica de validacion.
- **Versionamiento** de API para facilitar manutención y flexibilidad.
- **Listener y Subscriber** para detectar y reaccionar a eventos del cliente HTTP.
- **Servicio** con su propio Service Provider y para encapsular interaccion Giphy.
- **Enum** para representar tipos de token.
- **Tests** para prevenir y descubrir errores.

## Requisitos
- Git
- Docker
- PHP v8.2 en adelante

## Instalación
1. Clonar el repositorio
    ```bash
    git clone https://github.com/jonagoldman/laravel-api.git
    ```
2. Navegar dentro de la nueva carpeta
    ```bash
    cd laravel-api
    ```
3. Requerir dependencias
    ```bash
    composer update
    ```
4. Crear archivo .env local
    ```bash
    cp .env.example .env
    ```
5. Correr contenedor desprendido
    ```bash
    ./vendor/bin/sail up -d
    ```
6. Ejecutar comando de inicializacion
    ```bash
    ./vendor/bin/sail artisan setup:dev
    ```

## Postman

La Colección POSTMAN proporciona los servicios proporcionados y su descripcion con automatización de autenticacion.

[Colleccion POSTMAN](https://www.postman.com/orvital/workspace/playground/collection/252628-faf51f3a-07e1-4742-b1e9-9c94c1827af8?action=share&creator=252628&active-environment=252628-f4f23439-0187-47bc-95cb-081499ce0337)

[<img src="https://run.pstmn.io/button.svg" alt="Run In Postman" style="width: 128px; height: 32px;">](https://app.getpostman.com/run-collection/252628-faf51f3a-07e1-4742-b1e9-9c94c1827af8?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D252628-faf51f3a-07e1-4742-b1e9-9c94c1827af8%26entityType%3Dcollection%26workspaceId%3Da148ecd2-f327-4d92-ab3c-9d980895129c#?env%5BLocal%5D=W3sia2V5IjoiYXBpX3VybCIsInZhbHVlIjoibG9jYWxob3N0L2FwaS92MSIsImVuYWJsZWQiOnRydWUsInR5cGUiOiJkZWZhdWx0Iiwic2Vzc2lvblZhbHVlIjoibG9jYWxob3N0L2FwaS92MSIsInNlc3Npb25JbmRleCI6MH0seyJrZXkiOiJhdXRoLXRva2VuIiwidmFsdWUiOiIiLCJlbmFibGVkIjp0cnVlLCJ0eXBlIjoic2VjcmV0Iiwic2Vzc2lvblZhbHVlIjoibnVsbCIsInNlc3Npb25JbmRleCI6MX1d)

## Tests

Ejecutar tests utilizando el comando

```bash
./vendor/bin/sail artisan test
```