<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Calculator.php';

$profile = [
    'name' => 'Diego Saavedra',
    'role' => 'Desarrollador web y docente universitario',
    'location' => 'Loja, Ecuador',
    'summary' => 'Profesional de informática con experiencia verificada en docencia universitaria, formación técnica y desarrollo de software. Me interesa crear soluciones web claras, seguras y útiles.',
];

$education = [
    'Ingeniería de Software — en curso',
    'Máster en Ciberseguridad Defensiva y Ofensiva — Universidad Complutense de Madrid, en curso',
    'Máster en Ciencia y Tecnología de la Computación — Universidad Técnica Particular de Loja',
    'Licenciado en Informática Educativa — Universidad Nacional de Loja',
];

$experience = [
    [
        'role' => 'Docente, facilitador y diseñador curricular',
        'organization' => 'ABACOM',
        'period' => '12/2021 – actualidad',
        'detail' => 'Diseño y facilitación de formación en Python, Flutter, R, Linux, ciberseguridad e inteligencia artificial.',
    ],
    [
        'role' => 'Docente ocasional de Ciencias de la Computación',
        'organization' => 'Universidad de las Fuerzas Armadas ESPE',
        'period' => '04/2023 – 10/2024',
        'detail' => 'Asignaturas impartidas: Programación, Bases de Datos e Ingeniería de Software.',
    ],
    [
        'role' => 'Facilitador de bootcamp Full Stack',
        'organization' => 'Codings Academy',
        'period' => '02/2024 – 12/2024',
        'detail' => 'Acompañamiento técnico en desarrollo web con Django y React.',
    ],
    [
        'role' => 'Software Engineer',
        'organization' => 'UTEAM',
        'period' => '08/2026 – 09/2026',
        'detail' => 'Trabajo remoto en ingeniería de software, automatización, pruebas y aseguramiento de calidad.',
    ],
];

$skillGroups = [
    'Web' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'React', 'Django', 'Node.js'],
    'Datos' => ['SQL', 'PostgreSQL', 'MySQL', 'MongoDB'],
    'Herramientas' => ['Docker', 'Linux', 'Git', 'GitHub', 'Pruebas de software'],
    'Docencia' => ['Programación', 'Bases de datos', 'Ingeniería de software', 'Diseño curricular'],
];

$languages = ['Español — nativo', 'Inglés — B2', 'Italiano — A2', 'Portugués — A2'];
$practiceSkills = ['HTML semántico', 'CSS adaptable', 'PHP 8.5', 'Docker con Colima', 'Git y GitHub'];
$operationLabels = [
    'add' => 'Suma',
    'subtract' => 'Resta',
    'multiply' => 'Multiplicación',
    'divide' => 'División',
];

$firstValue = '';
$secondValue = '';
$operation = 'add';
$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstValue = trim((string) filter_input(INPUT_POST, 'first', FILTER_UNSAFE_RAW));
    $secondValue = trim((string) filter_input(INPUT_POST, 'second', FILTER_UNSAFE_RAW));
    $operation = trim((string) filter_input(INPUT_POST, 'operation', FILTER_UNSAFE_RAW));

    $calculation = Calculator::calculate($firstValue, $secondValue, $operation);
    $result = $calculation['result'];
    $error = $calculation['error'];
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web personal y calculadora PHP de Diego Saavedra para Aplicaciones Web.">
    <title>Diego Saavedra | Web personal</title>
    <link rel="icon" href="favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido principal</a>

    <header class="hero" id="inicio">
        <nav class="navigation" aria-label="Navegación principal">
            <a class="brand" href="#inicio" aria-label="DS — Ir al inicio">DS</a>
            <div class="navigation__links">
                <a href="#perfil">Perfil</a>
                <a href="#trayectoria">Trayectoria</a>
                <a href="#calculadora">Calculadora</a>
            </div>
        </nav>

        <div class="hero__content">
            <img class="hero__photo" src="assets/statick.png" alt="Fotografía de Diego Saavedra" width="120" height="120">
            <p class="eyebrow">Aplicaciones Web · Semana 1</p>
            <h1><?= escape($profile['name']) ?></h1>
            <p class="hero__role"><?= escape($profile['role']) ?></p>
            <p class="hero__summary"><?= escape($profile['summary']) ?></p>
            <div class="hero__actions">
                <a class="button button--primary" href="#calculadora">Probar calculadora</a>
                <a class="button button--secondary" href="https://github.com/statick88" target="_blank" rel="noopener noreferrer">GitHub</a>
                <a class="button button--secondary" href="https://www.linkedin.com/in/diego-saavedra-developer/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
            </div>
        </div>
    </header>

    <main id="contenido">
        <section class="section" id="perfil" aria-labelledby="perfil-titulo">
            <div class="section__heading">
                <p class="eyebrow">Sobre mí</p>
                <h2 id="perfil-titulo">Tecnología, educación y aprendizaje continuo</h2>
            </div>
            <div class="profile-grid">
                <article class="card">
                    <h3>Perfil</h3>
                    <p>Combino la formación informática con la docencia de programación, bases de datos e ingeniería de software.</p>
                    <p class="meta">📍 <?= escape($profile['location']) ?></p>
                </article>
                <article class="card">
                    <h3>Objetivo</h3>
                    <p>Construir aplicaciones web mantenibles, accesibles y centradas en resolver necesidades reales.</p>
                </article>
                <article class="card">
                    <h3>Tecnologías de esta práctica</h3>
                    <ul class="tag-list">
                        <?php foreach ($practiceSkills as $skill): ?>
                            <li><?= escape($skill) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </section>

        <section class="section section--soft" id="trayectoria" aria-labelledby="trayectoria-titulo">
            <div class="section__heading">
                <p class="eyebrow">Trayectoria</p>
                <h2 id="trayectoria-titulo">Experiencia y formación verificadas</h2>
                <p>Selección profesional basada en mi perfil académico y laboral, sin exponer información personal sensible.</p>
            </div>

            <div class="experience-grid">
                <?php foreach ($experience as $item): ?>
                    <article class="experience-card">
                        <p class="experience-card__period"><?= escape($item['period']) ?></p>
                        <h3><?= escape($item['role']) ?></h3>
                        <p class="experience-card__organization"><?= escape($item['organization']) ?></p>
                        <p><?= escape($item['detail']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="career-grid">
                <article>
                    <h3>Formación académica</h3>
                    <ol class="timeline">
                        <?php foreach ($education as $item): ?>
                            <li><?= escape($item) ?></li>
                        <?php endforeach; ?>
                    </ol>
                </article>

                <article>
                    <h3>Competencias técnicas</h3>
                    <?php foreach ($skillGroups as $group => $skills): ?>
                        <div class="skill-group">
                            <h4><?= escape($group) ?></h4>
                            <ul class="tag-list">
                                <?php foreach ($skills as $skill): ?>
                                    <li><?= escape($skill) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    <h3>Idiomas</h3>
                    <ul class="language-list">
                        <?php foreach ($languages as $language): ?>
                            <li><?= escape($language) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </section>

        <section class="section calculator-section" id="calculadora" aria-labelledby="calculadora-titulo">
            <div class="section__heading">
                <p class="eyebrow">PHP del lado del servidor</p>
                <h2 id="calculadora-titulo">Calculadora de operaciones básicas</h2>
                <p>Ingresá dos números, elegí una operación y PHP procesará el resultado en el servidor.</p>
            </div>

            <div class="calculator-card">
                <form method="post" action="#calculadora" class="calculator-form" novalidate>
                    <div class="form-field">
                        <label for="first">Primer número</label>
                        <input
                            id="first"
                            name="first"
                            type="number"
                            step="any"
                            inputmode="decimal"
                            value="<?= escape($firstValue) ?>"
                            placeholder="Ej.: 12.5"
                            required
                        >
                    </div>

                    <div class="form-field">
                        <label for="operation">Operación</label>
                        <select id="operation" name="operation" required>
                            <?php foreach ($operationLabels as $value => $label): ?>
                                <option value="<?= escape($value) ?>" <?= $operation === $value ? 'selected' : '' ?>>
                                    <?= escape($label) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="second">Segundo número</label>
                        <input
                            id="second"
                            name="second"
                            type="number"
                            step="any"
                            inputmode="decimal"
                            value="<?= escape($secondValue) ?>"
                            placeholder="Ej.: 4"
                            required
                        >
                    </div>

                    <button class="button button--primary calculator-form__submit" type="submit">Calcular</button>
                </form>

                <div class="calculator-output" aria-live="polite" aria-atomic="true">
                    <?php if ($error !== null): ?>
                        <p class="message message--error"><strong>No se pudo calcular:</strong> <?= escape($error) ?></p>
                    <?php elseif ($result !== null): ?>
                        <p class="result-label">Resultado</p>
                        <output class="result" for="first operation second"><?= escape(Calculator::format($result)) ?></output>
                    <?php else: ?>
                        <p class="message">El resultado aparecerá aquí.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>Desarrollado por <?= escape($profile['name']) ?> con HTML, CSS, PHP y Docker.</p>
        <p>Práctica académica · Aplicaciones Web · 2026</p>
    </footer>
</body>
</html>
