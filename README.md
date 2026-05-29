# Inventarios UDB

Sistema web de gestión de inventario desarrollado con Laravel 12. Permite registrar productos, controlar entradas y salidas de stock, y visualizar movimientos del mes desde un dashboard.

---

## Características

- Autenticación con sesiones (sin Laravel Auth)
- Roles: Administrador y Usuario
- CRUD completo de productos
- Registro de entradas y salidas de inventario
- Stock calculado en tiempo real (entradas - salidas)
- Dashboard con resumen del mes
- Interfaz con Tailwind CSS

---

## Requisitos

- PHP >= 8.2
- Composer
- MySQL

---

## Instalación local

**1. Clonar el repositorio**
```bash
git clone <url-del-repositorio>
cd miapp
```

**2. Instalar dependencias PHP**
```bash
composer install
```

**3. Copiar el archivo de entorno**
```bash
cp .env.example .env
```

**4. Generar la clave de la aplicación**
```bash
php artisan key:generate
```

**5. Configurar la base de datos en `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventariosudb
DB_USERNAME=root
DB_PASSWORD=
```

**6. Crear la base de datos en MySQL**
```sql
CREATE DATABASE inventariosudb;
```

**7. Ejecutar migraciones y seeders**
```bash
php artisan migrate --seed
```

**8. Levantar el servidor**
```bash
php artisan serve
```

La app estará disponible en `http://localhost:8000`

---

## Credenciales de acceso

| Rol | Correo | Contraseña |
|-----|--------|------------|
| Administrador | admin@ejemplo.com | password |
| Usuario | borja@ejemplo.com | password |

---

## Estructura del proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── LoginController.php
│   │   ├── DashboardController.php
│   │   ├── ProductoController.php
│   │   ├── EntradaController.php
│   │   └── SalidaController.php
│   └── Middleware/
│       ├── ValidarSesion.php        # Redirige al dashboard si ya está logueado
│       ├── ValidarAutenticacion.php # Redirige al login si no está autenticado
│       └── ValidarAdmin.php        # Redirige al dashboard si no es Administrador
├── Models/
│   ├── Usuario.php
│   ├── Producto.php
│   ├── Entrada.php
│   └── Salida.php
database/
├── migrations/
└── seeders/
    ├── UsuarioSeeder.php
    └── ProductoSeeder.php
resources/views/
├── layouts/
│   ├── app.blade.php
│   ├── header.blade.php
│   └── aside.blade.php
├── dashboard/
├── productos/
├── entradas/
├── salidas/
└── login.blade.php
```

---

## Roles y permisos

| Módulo | Usuario | Administrador |
|--------|---------|---------------|
| Dashboard | ✓ | ✓ |
| Productos | ✓ | ✓ |
| Entradas | — | ✓ |
| Salidas | — | ✓ |

---

## Deploy en producción

**1. Subir los archivos al servidor (sin `/vendor` ni `.env`)**

**2. Instalar dependencias en el servidor**
```bash
composer install --no-dev --optimize-autoloader
```

**3. Crear y configurar el `.env` en el servidor**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventariosudb
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

**4. Generar la clave**
```bash
php artisan key:generate
```

**5. Ejecutar migraciones**
```bash
php artisan migrate --seed
```

**6. Optimizar para producción**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**7. Configurar permisos de carpetas**
```bash
chmod -R 775 storage bootstrap/cache
```

**8. Apuntar el DocumentRoot a la carpeta `/public`**

Apache:
```apache
<VirtualHost *:80>
    ServerName tudominio.com
    DocumentRoot /var/www/miapp/public

    <Directory /var/www/miapp/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Nginx:
```nginx
server {
    listen 80;
    server_name tudominio.com;
    root /var/www/miapp/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

---

## Tecnologías

- [Laravel 12](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Font Awesome 6](https://fontawesome.com)
- MySQL
- PHP 8.2
