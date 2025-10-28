# Task Management API (Backend con Laravel)

Esta es la API RESTful para la aplicación de gestión de tareas, construida con Laravel 11 y Docker.

---

## ✨ Características

-   **CRUD completo** para tareas.
-   Gestión de **prioridades** y **etiquetas** con relaciones.
-   **Filtrado** de tareas por estado y fecha de vencimiento.
-   Respuestas de API formateadas y consistentes usando **API Resources**.
-   Validación robusta de peticiones con **Form Requests**.
-   Pruebas de API automatizadas con **Pest**.

---

## 💻 Stack Tecnológico

-   PHP 8.2
-   Laravel 11
-   Laravel Sail (Docker)
-   MySQL
-   Pest (para pruebas)

---

## 🚀 Instalación y Puesta en Marcha

Asegúrate de tener **Docker Desktop** y **WSL 2** (para usuarios de Windows) instalados y funcionando.

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/tu-repo-backend.git](https://github.com/tu-usuario/tu-repo-backend.git)
    cd tu-repo-backend
    ```

2.  **Instalar dependencias de Composer:**
    ```bash
    composer install
    ```

3.  **Copiar el archivo de entorno:**
    ```bash
    cp .env.example .env
    ```

4.  **Construir y levantar los contenedores de Docker con Sail:**
    ```bash
    ./vendor/bin/sail build --no-cache
    ./vendor/bin/sail up -d
    ```

5.  **Generar la clave de la aplicación:**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

6.  **Ejecutar las migraciones y los seeders:**
    Este comando creará las tablas y las llenará con datos de prueba.
    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

¡Y listo! La API ahora está corriendo en `http://localhost`.

---

## ⚙️ Comandos Útiles

-   **Iniciar el entorno:** `./vendor/bin/sail up -d`
-   **Detener el entorno:** `./vendor/bin/sail down`
-   **Ejecutar las pruebas:** `./vendor/bin/sail artisan test`