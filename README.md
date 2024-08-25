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
