# Web personal con calculadora PHP

Tarea de la Semana 1 de **Aplicaciones Web**. Presenta información personal mediante HTML y CSS e incluye una calculadora procesada con PHP.

## Problema y propósito

Una página HTML estática solo muestra información predefinida. Esta práctica incorpora procesamiento del lado del servidor: el formulario envía dos valores mediante `POST`, PHP valida los datos, realiza la operación y devuelve el resultado.

## Objetivo general

Desarrollar una web personal que aplique HTML, CSS, variables y procesamiento PHP para resolver operaciones aritméticas básicas.

## Objetivos específicos

- Presentar información personal verificada con HTML semántico.
- Crear un diseño moderno y adaptable con CSS.
- Implementar suma, resta, multiplicación y división en PHP.
- Validar campos vacíos, datos no numéricos y división para cero.
- Publicar el proyecto en GitHub.

## Alineación con la Semana 1

El proyecto aplica los contenidos oficiales de introducción a páginas dinámicas y uso de variables:

| Objetivo | Aplicación | Resultado |
|---|---|---|
| Desarrollar una web personal | Estructura semántica con HTML y presentación adaptable con CSS | Información personal clara y usable |
| Aplicar PHP del lado del servidor | Procesamiento de entradas y operaciones en `Calculator.php` | Calculadora dinámica integrada |
| Utilizar variables | Variables escalares y arreglos para el perfil, las entradas y el resultado | Datos organizados y procesados correctamente |
| Publicar la evidencia | Versionamiento y publicación mediante GitHub | Repositorio accesible para evaluación |

La raíz mantiene visibles los archivos principales solicitados, mientras `Calculator.php` separa la lógica y `tests/` conserva las comprobaciones automatizadas.

## Funcionalidades

- Perfil, experiencia, formación, competencias e idiomas.
- Fotografía y enlaces públicos de GitHub y LinkedIn.
- Calculadora PHP con suma, resta, multiplicación y división.
- Validación de entradas y mensajes de error claros.
- Compatibilidad con dispositivos móviles, tabletas y escritorio.

## Ejecución

### Opción 1 — Servidor integrado de PHP

Requiere PHP 8.0 o posterior. Desde la raíz del proyecto:

```bash
php -S localhost:8000
```

Abrir `http://localhost:8000`.

### Opción 2 — Docker Compose

Requiere Docker con el complemento Compose:

```bash
docker compose up --build -d
```

Abrir `http://localhost:8080`.

Para detener la aplicación:

```bash
docker compose down
```

En macOS se puede utilizar Colima como motor de Docker:

```bash
colima start --runtime docker --cpu 2 --memory 4 --disk 30
```

## Pruebas

```bash
docker compose run --rm web php /var/www/html/tests/run.php
```

Las pruebas cubren operaciones normales, cero, negativos, decimales, campos vacíos, valores no numéricos, operación inválida y división para cero.

## Estructura

```text
├── index.php            # Web personal y formulario de la calculadora
├── style.css            # Presentación adaptable
├── statick.png          # Fotografía del perfil
├── favicon.svg          # Icono del sitio
├── Calculator.php       # Lógica de la calculadora
├── tests/run.php        # Pruebas automatizadas
├── docker/              # Configuración de Apache
├── Dockerfile
└── compose.yaml
```

## Fuentes de la tarea

- Consigna de Blackboard: **Semana 1 - Tarea 1**.
- Sílabo de Aplicaciones Web: Unidad 1, introducción a páginas dinámicas con PHP.
- Planes y rutas de aprendizaje de la Semana 1: web personal, variables y publicación en GitHub.
- Contenidos de las clases 1 y 2: PHP dinámico, entorno de ejecución, estructura del proyecto y variables.
- Referencia del docente: [Proyectos_sexto_2627](https://github.com/lleroc/Proyectos_sexto_2627), carpeta `Semana_1/Personal`.

La calculadora, la validación, el entorno Docker y la información personal fueron desarrollados para esta entrega; no se copiaron los datos personales del ejemplo.

## Autor

**Diego Saavedra** — Aplicaciones Web, 2026.
