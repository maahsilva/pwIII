<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    public function nome($nome)
    {
        return "Olá " . $nome. "! <br>Bem vindo ao meu site";
    }

    public function contas(int $numero1, int $numero2, $operação = '')
    {
        switch($operação){
            case 'soma':
                $resultado = $numero1 + $numero2;
                echo 'O resultado da sua Soma é:'.$resultado;
                break;
            case 'subtracao':
                $resultado = $numero1 - $numero2;
                echo 'O resultado da sua Subtração é:'.$resultado;
                break;
            case 'multiplicacao':
                $resultado = $numero1 * $numero2;
                echo 'O resultado da sua Multiplicação é:'.$resultado;
                break;
            case 'divisao':
                $resultado = $numero1 / $numero2;
                echo 'O resultado da sua Divisão é:'.$resultado;
                break;
            case'':
                $resultado = $numero1 + $numero2;
                echo 'Soma : '.$resultado;
                $resultado = $numero1 - $numero2;
                echo '<br>Subtração : '.$resultado;
                $resultado = $numero1 * $numero2;
                echo '<br>Multiplicação : '.$resultado;
                $resultado = $numero1 / $numero2;
                echo '<br>Divisão : '.$resultado;
                break;
        };   
    }

    public function idades(int $ano,int  $mes =0 ,int $dia =0)
    {
        $hoje = new DateTime ('now');
        $nascimento = new DateTime ("$ano-$mes-$dia");
        $idade = $hoje->diff($nascimento);

        if ($nascimento->format('Y') >= $hoje->format('Y')){
            echo 'Insira uma Data valida!';
        }
        elseif ($mes==0 && $dia==0 ){
            echo 'Você tem ' . $idade->y . ' anos ';
        }
        elseif ($mes==0){
            echo 'Você tem ' . $idade->y . ' anos';
        }
        else{
            echo 'Você tem ' . $idade->y . ' anos ' ;
        }
    }

}
