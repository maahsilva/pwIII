<?php

use App\Http\Controllers\AtividadeController;
use Illuminate\Support\Facades\Route;

//controller

Route::get('/hey/{nome}', [AtividadeController::class,'nome'])-> name('hey');

Route::get('/calculos/{numero1}/{numero2}/{operação?}',[AtividadeController::class,'contas'])->name('calculos');

Route::get('/age/{ano}/{mes?}/{dia?}', [AtividadeController::class,'idades'])->name('age');


//


Route::get('/hello/{nome}',function($nome){
    echo "Olá " . $nome. "! <br>Bem vindo ao meu site";
}) -> where ('nome', '[A-Za-z3-9]{3,}') -> name('bemvindo');

Route:: get('/conta/{numero1}/{numero2}/{operação?}',function(int $numero1, int $numero2, $operação = ''){
     

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
})-> name('conta');

Route::get('/idade/{ano}/{mes?}/{dia?}', function( int $ano,int  $mes =0 ,int $dia =0 ){

  
  
    $hoje = new DateTime('now');
    $nascimento = new DateTime("$ano-$mes-$dia");
    $idade = $hoje->diff($nascimento);

    if ($nascimento->format('Y') >= $hoje->format('Y')){
        echo 'Data invalida';
    }
    elseif ($mes!=0 &&  $dia==0){
        echo 'Você tem ' . $idade->y . ' anos ';
    }
    elseif ($mes==0){
        echo 'Você tem ' . $idade->y . ' anos';
    }
    else{
        echo 'Você tem ' . $idade->y . ' anos ' ;
    }


})->where(['ano'=>'[0-9]{4}', 'mes'=>'[0-9]{1,2}', 'dia'=>'[0-9]{1,2}']) -> name('idade') ; 

