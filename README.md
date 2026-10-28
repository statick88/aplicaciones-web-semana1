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

## Funcionalidades

- Perfil, experiencia, formación, competencias e idiomas.
- Fotografía y enlaces públicos de GitHub y LinkedIn.
- Calculadora PHP con suma, resta, multiplicación y división.
- Validación de entradas y mensajes de error claros.
- Compatibilidad con dispositivos móviles, tabletas y escritorio.

## Ejecución con Docker y Colima

Requisitos:

- [Colima](https://github.com/abiosoft/colima)
- Docker CLI con Docker Compose

Iniciar Colima:

```bash
colima start --runtime docker --cpu 2 --memory 4 --disk 30
```

Construir y ejecutar la aplicación:

```bash
docker compose up --build -d
```

Abrir `http://localhost:8080`.

Detener la aplicación:

```bash
docker compose down
```

## Pruebas

```bash
docker compose run --rm web php /var/www/tests/run.php
```

Las pruebas cubren operaciones normales, cero, negativos, decimales, campos vacíos, valores no numéricos, operación inválida y división para cero.

## Estructura

```text
├── public/              # Página, estilos, fotografía y favicon
├── src/Calculator.php   # Lógica de la calculadora
├── tests/run.php        # Pruebas automatizadas
├── docker/              # Configuración de Apache
├── Dockerfile
└── compose.yaml
```

## Fuentes de la tarea

- Consigna de Blackboard: **Semana 1 - Tarea 1**.
- Contenido y plan de clase de la Semana 1.
- Referencia del docente: [Proyectos_sexto_2627](https://github.com/lleroc/Proyectos_sexto_2627), carpeta `Semana_1/Personal`.

La calculadora, la validación, el entorno Docker y la información personal fueron desarrollados para esta entrega; no se copiaron los datos personales del ejemplo.

## Autor

**Diego Saavedra** — Aplicaciones Web, 2026.
