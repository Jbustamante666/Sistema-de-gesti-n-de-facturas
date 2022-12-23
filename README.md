# Proyecto de sistema de gestión de facturas

[![N|Solid](https://laravel.com/img/logomark.min.svg)](https://laravel.com/img/logomark.min.svg)

Este proyecto es un pequeño sistema de gestion y facturación de productos

### Tecnologias utilizadas.
- [Laravel]
- [Tailwindcss]

## Dependencias
Para este proyecto se necesita que se tenga instalados los siguentes programas: PHP en su version 8.0 o superior, Node en su version LTS o superior, Composer para gestionar las dependencias de PHP

## Installation

Clonar repositorio.
```sh
git clone https://github.com/Jbustamante666/Sistema-de-gestion-de-facturas.git
```

Instalar dependencias de composer
```sh
composer install
```
Copiar archivo .env
```sh
cp .env-example .env
```
Generar Api Key
```sh
php artisan key:generate
```
Instalar depondencias de node
```sh
npm install
```

Compilar assets css y js
```sh
npm build
```

Correr migraciones:
Asegurarse de colocar los datos de la conexión de la Base de Datos por defecto en el archivo .env, el proyecto trabaja con MySql pero puede utilizar opcionalmente PostgreSql
```sh
php artisan migrate --seed
```

Inicializar servidor
```sh
php artisan serve
```

## Usuarios
```sh
Admin: admin@test.com
Contraseña: 12345678
```
```sh
User: user1@test.com
Contraseña: 12345678
```

[Laravel]: <https://laravel.com/>
[Tailwindcss]: <https://tailwindcss.com>