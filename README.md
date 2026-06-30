# Sistema de Control de Tutorías UNSIS

Sistema web para la gestión del programa de tutorías de la Universidad de la Sierra Sur (UNSIS). Permite registrar alumnos, asignarles tutores, agendar citas, llevar bitácora, registrar asistencia (con historial por sesión), canalizar a áreas de apoyo y monitorear alertas de riesgo académico.

Tecnologías utilizadas:

HTML5

CSS3

JavaScript

PHP 8

Supabase (PostgreSQL)

---

## Estructura del proyecto

```
tutorias-unsis/
├── backend/                  # Lógica del servidor (PHP + Supabase)
│   ├── api/                  # Endpoints REST (un archivo por recurso)
│   │   ├── login.php
│   │   ├── logout.php
│   │   ├── alumnos.php
│   │   ├── profesores.php
│   │   ├── citas.php
│   │   ├── bitacora.php
│   │   ├── asistencias.php
│   │   ├── alertas.php
│   │   └── canalizacion.php
│   ├── config/
│   │   └── config.php        # Credenciales Supabase y configuración global
│   ├── includes/
│   │   ├── auth.php          # Sesiones y control de acceso por rol
│   │   └── SupabaseClient.php
│   └── sql/
│       ├── schema.sql
│       └── migracion_asistencias.sql
│
├── frontend/                 # Vistas y assets del cliente
│   ├── admin/                # Vistas del administrador
│   │   ├── dashboard.php
│   │   ├── alumnos.php
│   │   └── profesores.php
│   ├── tutor/                # Vistas del tutor
│   │   ├── dashboard.php     # Incluye lista de asistencia por sesiones
│   │   ├── agenda.php
│   │   ├── bitacora.php
│   │   ├── alertas.php
│   │   └── canalizacion.php
│   ├── includes/
│   │   └── sidebar.php
│   └── assets/
│       ├── css/style.css     # Diseño con colores UNSIS (azul #003366 + dorado)
│       └── js/               # Un archivo JS por módulo
│
└── index.php                 # Punto de entrada / login
```

---

## Requisitos

- PHP 7.4+ con extensión `cURL` habilitada
- Servidor web Apache/Nginx/XAMPP apuntando a la raíz del proyecto
- Cuenta en [Supabase](https://supabase.com) (gratuita)

---

## Instalación

### 1. Colocar el proyecto en el servidor

Copia la carpeta `tutorias-unsis/` en la raíz de tu servidor (p.ej. `htdocs/` en XAMPP).

### 2. Ejecutar el esquema SQL en Supabase

En **SQL Editor** de tu proyecto Supabase, ejecuta primero `backend/sql/schema.sql` y luego `backend/sql/migracion_asistencias.sql`.

### 3. Configurar credenciales

Abre `backend/config/config.php` y reemplaza:

```php
define('SUPABASE_URL',         'https://TU-PROYECTO.supabase.co');
define('SUPABASE_SERVICE_KEY', 'TU_SERVICE_ROLE_KEY');
```
### 4. Ejecutar el proyecto

Desde la carpeta principal del proyecto abre una terminal y ejecuta:

php -S localhost:8000
Después abre tu navegador e ingresa a:

http://localhost:8000
Aparecerá la pantalla de inicio de sesión.

### 5. Acceder al sistema

Navega a `http://localhost/tutorias-unsis/` y usa las credenciales por defecto:

| Rol | Correo | Contraseña |
|-----|--------|-----------|
| Administrador | admin@tutorias.com | Admin123! |

---

### 6. ¿Cómo utilizar el sistema?

Como administrador
Iniciar sesión.
Registrar profesores o tutores.
Registrar alumnos mediante un archivo de Excel o de forma manual.
Asignar alumnos a un tutor.
Consultar la información registrada por los tutores.
Como tutor
Después de iniciar sesión podrá:

Consultar los alumnos que tiene asignados.
Programar citas de tutoría.
Registrar la asistencia de los alumnos.
Llevar una bitácora de cada sesión.
Crear reportes de canalización cuando sea necesario.
Registrar alertas para alumnos que presenten riesgo académico o de deserción.


## Stack tecnológico

| Capa | Tecnología |
|------|-----------|
| Backend | PHP 7.4+ con cURL |
| Base de datos | PostgreSQL vía Supabase (PostgREST) |
| Frontend | HTML5, CSS3, JavaScript vanilla |
| Importación Excel | SheetJS desde CDN |
| Autenticación | PHP Sessions |
