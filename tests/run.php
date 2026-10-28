<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Calculator.php';

$tests = [
    'suma de enteros' => fn (): bool => Calculator::calculate('8', '4', 'add')['result'] === 12.0,
    'resta con negativo' => fn (): bool => Calculator::calculate('-2', '5', 'subtract')['result'] === -7.0,
    'multiplicación decimal' => fn (): bool => Calculator::calculate('2.5', '4', 'multiply')['result'] === 10.0,
    'división decimal' => fn (): bool => Calculator::calculate('10', '4', 'divide')['result'] === 2.5,
    'operación con cero' => fn (): bool => Calculator::calculate('0', '7', 'add')['result'] === 7.0,
    'división para cero controlada' => fn (): bool => Calculator::calculate('9', '0', 'divide')['error'] === 'No es posible dividir para cero.',
    'primer valor vacío' => fn (): bool => Calculator::calculate('', '2', 'add')['error'] !== null,
    'segundo valor vacío' => fn (): bool => Calculator::calculate('2', ' ', 'add')['error'] !== null,
    'entrada no numérica' => fn (): bool => Calculator::calculate('<script>alert(1)</script>', '2', 'add')['error'] === 'Los dos valores deben ser números válidos.',
    'operación manipulada' => fn (): bool => Calculator::calculate('2', '3', 'power')['error'] === 'Seleccioná una operación válida.',
    'formato entero' => fn (): bool => Calculator::format(4.0) === '4',
    'formato decimal' => fn (): bool => Calculator::format(1.25) === '1.25',
];

$failures = [];

foreach ($tests as $name => $test) {
    try {
        if (!$test()) {
            $failures[] = $name;
            fwrite(STDERR, "FAIL: {$name}\n");
            continue;
        }

        fwrite(STDOUT, "PASS: {$name}\n");
    } catch (Throwable $exception) {
        $failures[] = $name;
        fwrite(STDERR, "ERROR: {$name} — {$exception->getMessage()}\n");
    }
}

fwrite(STDOUT, sprintf("\n%d tests, %d failures.\n", count($tests), count($failures)));
exit($failures === [] ? 0 : 1);
