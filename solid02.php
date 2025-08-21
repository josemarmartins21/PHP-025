<?php

    // O: open/closed Principle
    declare(strict_types=1);

    interface Desconto {
        public function calcular(float $valor): float;
    }

    class DescontoNoNatal implements Desconto {
        public function calcular(float $valor): float {
            return $valor * 0.9;
        }
    }

    class DescontoBlackFriday implements Desconto {
        public function calcular(float $valor): float {
            return $valor * 0.5;
        }
    
    
    }
    class DescontoDeVerao implements Desconto {
        public function calcular(float $valor): float {
            return $valor * 0.75;
        }
    }
    

    class CalculadoraDePrecos {
        public function calcularDesconto(Desconto $tipoDesconto, float $valor): float {
            return $tipoDesconto->calcular($valor);
        }
    }
    

    // Implementação

    $calculadora = new CalculadoraDePrecos();

    echo $calculadora->calcularDesconto(new DescontoNoNatal, 2000);
    echo PHP_EOL;
    echo number_format($calculadora->calcularDesconto(new DescontoBlackFriday, 2000), 2, ',','.');
    echo PHP_EOL;

    echo number_format($calculadora->calcularDesconto(new DescontoDeVerao, 2000), 2, ',','.');