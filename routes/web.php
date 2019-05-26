<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if (count($cat) == 0){
        echo "<h4>Voce nao possui nenhuma categoria cadastrada</h4>";
    } else {
        foreach ($cat as $c ) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) == 0){
        echo "<h4>Voce nao possui nenhum produto cadastrada</h4>";
    } else {
        echo "<table>";
        echo "<thead> <tr><td>Nome</td><td>Preço</td><td>Estoque</td><td>Categoria</td></tr></thead>";
        foreach ($prods as $p) {
            echo "<tr>";
            echo "<td>" . $p->nome ."</td>";
            echo "<td>" . $p->preco ."</td>";
            echo "<td>" . $p->estoque ."</td>";
            echo "<td>" . $p->categoria->nome ."</td>";
            echo "</tr>";
        }
    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if (count($cat) == 0){
        echo "<h4>Voce nao possui nenhuma categoria cadastrada</h4>";
    } else {
        foreach ($cat as $c ) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";

            $produtos =  $c->produtos;
            if ( count($produtos) > 0 ){
                echo "<ul>";
                foreach ($produtos as $p) {
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('inserir', function(){
    $p = new Produto();
    $p->id = 10;
    $p->nome = "Arroz";
    $p->preco = 20;
    $p->estoque = 50;
    $p->categoria_id = 5;
    $p->save();
});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "MEU NOVO PRODUTO";
    $p->preco = 10;
    $p->estoque = 100;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p = Produto::find(12);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    return '';
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto();
    $p->nome = "Minhoca";
    $p->preco = 500;
    $p->estoque = 30;

    if (isset($cat)){
        $cat->produtos()->save($p);
    }
    $cat->load('produtos');
    return $cat->toJson();
});