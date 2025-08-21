<?php

use PhpParser\Node\Stmt\Return_;

interface Consulta {
    public function marcar(string $tipoConsulta, $consultas = []): bool;
}
/**
 * Classe que implementa a interface marcar consulta
 * @author Josimar Martins <josemar21@outlook.pt>
 * @version 1.0.0
 */
class ConsultaGeral implements Consulta {
    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function marcar(string $tipoConsulta, $consultas = []): bool {
        $consulta = 'Consulta Geral';
        $consultaModificada = ucwords($tipoConsulta);
        if (!empty($tipoConsulta) ) {
            if (in_array($consultaModificada, $consultas) ) { 
                   if ($consulta == $consultaModificada) {
                    echo "Consulta Marcada. $consultaModificada" . PHP_EOL;
                    return true;

                }
            }
        }

        return false;
    }
}

class ConsultaDeRotina implements Consulta {
    /**
     * Função para marcar uma consulta
     * - Ela verifica se temos a consulta e retorna true or false
     * @param string $tipoConsulta
     * @param array $consultas
     * @return boolean
     * @author Josimar Martins <josemar21@outlook.pt>
     */
    public function marcar(string $tipoConsulta, $consultas = []): bool {
        $consulta = "Consulta De Rotina";
        $consultaModificada = ucwords($tipoConsulta);
        if (!empty($tipoConsulta) ) {
            if (in_array($consultaModificada, $consultas) ) {
                   if ($consulta == $consultaModificada) {
                    echo "Consulta Marcada. $consultaModificada" . PHP_EOL;
                    return true;

                }
            }
        }

        return false;
    }
}

class MarcarConsulta {
    public function marcarConsulta(Consulta $tipoConsulta, string $consulta, $consultas = []): bool {
       return $tipoConsulta->marcar($consulta, $consultas);
    }
}

$consultas = [
    'Consulta De Rotina',
    'Consulta Geral'
];

$marcarConsulta = new MarcarConsulta;

$consultaMarcada = $marcarConsulta->marcarConsulta(new ConsultaGeral, "consulta geral", $consultas);
$consultaMarcada = $marcarConsulta->marcarConsulta(new ConsultaDeRotina, "Consulta De Rotina", $consultas);

// $consultaMarcada2 = $marcarConsulta->marcarConsulta(new ConsultaDeRotina, "consulta de rotina");

if ($consultaMarcada) { 
    echo "Consulta marcada com sucesso" . PHP_EOL;
    die('-----------------------');
}

echo "Ocorreu algum erro!";







