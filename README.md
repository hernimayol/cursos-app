<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

##                                  Proyecto Laravel API - Sistema de Cursos

Este proyecto es una API RESTful desarrollada en Laravel 12, que permite la gestión de cursos, categorías, usuarios, inscripciones y evaluaciones académicas.

## Funcionalidades implementadas:
1. Atutenticación de usuarios con Laravel Sanctum.
2. Registro y login de usuarios (sólo administradores pueden registrar).
3. Middleware personalizado "is_admin" para proteger rutas administrativas.
4. CRUD de categorías de cursos (solo accesible por administradores).
5. CRUD de cursos (Admin).
6. Listado de cursos por categoría (público o autenticado).
7. Inscripción de estudiantes a cursos.
8. Registro de evaluaciones por parte del administrador.
9. Consulta de evaluaciones por alumno (visible solo al admin o al propio estudiante).

## Modelos definidos con relaciones y validaciones adecuadas:
- User (admin/estudiante)
- Category (1-n con Course)
- Course (n-n con User vía Enrollment)
- Enrollment (intermedia entre User y Course)
- Evaluation (1-1 con Enrollment)

Todas las rutas protegidas con middleware donde corresponde, los modelos tienen campos protegidos por '$fillable', y se provee una colección Postman para pruebas de la API.

Por: José Hernán Mayol Toledo
Linkedin: <p <a href="https://www.linkedin.com/in/hernan-mayol"</a> </p>
