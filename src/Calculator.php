<?php

declare(strict_types=1);

final class Calculator
{
    /**
     * @return array{result: float|null, error: string|null}
     */
    public static function calculate(string $firstValue, string $secondValue, string $operation): array
    {
        $firstValue = trim($firstValue);
        $secondValue = trim($secondValue);

        if ($firstValue === '' || $secondValue === '') {
            return ['result' => null, 'error' => 'Ingresá ambos números para realizar el cálculo.'];
        }

        if (!is_numeric($firstValue) || !is_numeric($secondValue)) {
            return ['result' => null, 'error' => 'Los dos valores deben ser números válidos.'];
        }

        $first = (float) $firstValue;
        $second = (float) $secondValue;

        return match ($operation) {
            'add' => ['result' => $first + $second, 'error' => null],
            'subtract' => ['result' => $first - $second, 'error' => null],
            'multiply' => ['result' => $first * $second, 'error' => null],
            'divide' => $second == 0.0
                ? ['result' => null, 'error' => 'No es posible dividir para cero.']
                : ['result' => $first / $second, 'error' => null],
            default => ['result' => null, 'error' => 'Seleccioná una operación válida.'],
        };
    }

    public static function format(float $value): string
    {
        if (abs($value) < 1.0E-12) {
            return '0';
        }

        return rtrim(rtrim(number_format($value, 10, '.', ''), '0'), '.');
    }
}
