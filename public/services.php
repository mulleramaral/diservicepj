<?php

$container['conexao'] = function(Pimple\Container $container){
    return new \muller\Conexao($container['host'], $container['db'],$container['user'],$container['password']);
};

$container['produto'] = function(Pimple\Container $container){
    return new muller\Produtos($container['conexao']);
};

$container['fornecedor'] = function(Pimple\Container $container){
    return new muller\Fornecedor($container['conexao']);
};