<?php


Route::get('/hello',function(){
    echo "Hello word";
});

Route::get('/hello/{nome}',function($nome){
    echo "Olá " . $nome. "! <br>Bem vindo ao meu site";
}) -> where ('nome', '[A-Za-z3-9]{3,}') -> name('welcome');

Route:: get('/conta/{numero1}/{numero2}/{operação}',function($numero1,$numero2,$operação,$resultado){
     
});