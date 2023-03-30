<?php


Route::get('/hello/{nome}',function($nome){
    echo "Olá " . $nome. "! <br>Bem vindo ao meu site";
}) -> where ('nome', '[A-Za-z3-9]{3,}') -> name('bemvindo');

Route:: get('/conta/{numero1}/{numero2}/{operação}',function(int $numero1, int $numero2, $operação){
     

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
        case'vazio':
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

Route::get('/idade/{ano}/{mes}/{dia}', function( $ano, $mes = null, $dia = null ){

  
    $calcula_idade = function( $ano, $mes = null, $dia = null){
      
        if (!preg_match('/^\d{4}$/', $ano)) {
            return 'Ano inválido';
        }
    $data_nascimento = date_create("$ano-$mes-$dia");
    
    $data_atual = new DateTime();
    $idade = $data_atual->diff($data_nascimento);
    
    
    return $idade->y;
    

    };
    $idade = $calcula_idade($ano, $mes, $dia);
    echo 'Sua idade é : '.$idade;
}) -> name('idade');
