# Proyecto Base de Datos FIDM

Este proyecto fue desarrollado como parte del curso de **Bases de Datos I** en la Universidad Nacional de Colombia.  
Modela el sistema de información para la *Federación Internacional de Deportes a Motor (FIDM)*, abarcando pilotos, escuderías, campeonatos, patrocinadores y carreras.

## Características
- **Modelo Entidad-Relación** para una federación de automovilismo.
- **Esquema relacional** implementado en SQL con restricciones, llaves y reglas de negocio.
- **Prototipo en PHP** para la interacción con la base de datos.
- **Informe bien documentado** (ver `docs/Reporte_Proyecto.pdf`).

## Esquema de la Base de Datos
El esquema soporta:
- Pilotos, escuderías y campeonatos  
- Carreras y resultados  
- Patrocinadores y contratos  
- Pruebas de entrenamiento y análisis  

## Estructura
- `config/` → Conexión a la base de datos  
- `includes/` → Encabezado y pie de página  
- `piloto/`, `escuderia/`, `test/` → Módulos CRUD  
- `consultas/`, `busqueda/` → Consultas y búsquedas personalizadas  
- `db.sql` → Esquema de la base de datos  
- `modelo.png` → Diagrama ER  
- `index.php` → Punto de entrada  

## Instalación

1. Instalar [XAMPP](https://www.apachefriends.org/download.html) (o WAMP/MAMP).  
2. Iniciar **Apache** y **MySQL** desde el panel de control de XAMPP.  
3. Abrir [phpMyAdmin](http://localhost/phpmyadmin).  
4. Crear una base de datos (ejemplo: `fidm`) e importar `db.sql`.  
5. Ajustar las credenciales en `config/conexion.php` si es necesario.  
6. Colocar el proyecto en `htdocs/` y ejecutar: `http://localhost/fidm-database/index.php`  

## Autores
- Tomás Escobar Rivera  
- Leonard David Vivas Dallos  
- Jorge Humberto Gaviria Botero  
