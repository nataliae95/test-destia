
# Prueba Tecnica para Destia

Este proyecto ofrece un entorno Dockerizado para desplegar los tres servicios necesarios para ejecutar la prueba técnica, la cual ha sido desarrollada en PHP nativo.

## Descripción
El proyecto consiste en realizar un gestor de tareas con manejo de usuarios y sesiones. 

## Requisitos del Sistema

- **Docker**: versión 20.10.0 o superior
- **Docker Compose**: versión 1.27.0 o superior

## Configuración
Crea el archivo .env basado en el que se tiene de ejemplo


### Clonar el Repositorio

Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/nataliae95/test-destia.git

cd nombre-repositorio

docker-compose up --build -d
```

## Acceso al Sistema

### Servicios
- **Aplicación Web:**: Accede a la aplicación a través de http://localhost:8000.
- **Base de Datos MySQL**: Acceso a MySQL en el puerto 3306.
- **phpMyAdmin**: Acceso a phpMyAdmin a través de http://localhost:8090 para gestionar la base de datos.

### Credenciales de MySQL
```bash
Usuario: user_destia
Contraseña: Gbd12345678;
```

### Ingreso al Proyecto

- Accede a la aplicación a través de http://localhost:8000.
- Serás llevado a una ventana de inicio de sesión. Para crear tu cuenta, haz clic en "Registrarse".
- Completa el formulario de registro para acceder a la aplicación.

## Author

- [@nataliae95](https://github.com/nataliae95)


