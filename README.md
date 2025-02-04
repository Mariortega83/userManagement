# User Management Application

## Descripción

Esta aplicación ha sido diseñada para optimizar la gestión de usuarios, ofreciendo a los administradores una herramienta robusta y profesional. Con una interfaz intuitiva y moderna, permite realizar acciones clave como la creación, edición, eliminación y verificación de usuarios de manera eficiente. Su enfoque en la usabilidad y la administración avanzada garantiza un flujo de trabajo fluido y productivo.

## Funcionalidades

- **SuperAdmin** : Acesso total

- **Admin** : Borrar, crear, editar usuarios

- **User** : Modificar sus datos

## Imágenes

### 1. Login
![Login Dashboard](fotos/LOGIN.png)

### 2. Register
![Register Dashboard](fotos/REGISTER.png)

### 3. Panel Super Admin
![SuperAdmin Dashboard](fotos/superAdmin.png)

### 4. Panel del Admin
![Admin Dashboard](fotos/admin.png)

### 5. Panel User
![Editar Usuario](fotos/foto2.png)

### 6. Editar Usuario con Modal
![Editar Usuario](fotos/editmodal.png)

### 7. Crear Usuario
![Crear Usuario](fotos/crearmodal.png)




## Instalación

1. Clona el repositorio:
    ```sh
    git clone https://github.com/Mariortega83/userManagement
    ```

2. Instala las dependencias:
    ```sh
    composer install
    npm install
    ```

3. Configura el archivo [.env]:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Ejecuta las migraciones:
    ```sh
    php artisan migrate
    ```

5. Inicia los assets:
    ```sh
    npm run dev
    ```


