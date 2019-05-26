<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Polo', 'preco' => 100,
            'estoque' => 4, 'categoria_id' => 1]);

        DB::table('produtos')->insert(
            ['nome' => 'Calça Jeans', 'preco'=> 200,
            'estoque' => 1, 'categoria_id' => 1]);

        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Manga Longa', 'preco'=> 500,
            'estoque' => 2, 'categoria_id' => 1]);

        DB::table('produtos')->insert(
            ['nome' => 'PC Games', 'preco'=> 50,
            'estoque' => 5, 'categoria_id' => 2]);

        DB::table('produtos')->insert(
            ['nome' => 'Impressora', 'preco'=> 650,
            'estoque' => 8, 'categoria_id' => 6]);
        
        DB::table('produtos')->insert(
            ['nome' => 'Mouse', 'preco'=> 650,
            'estoque' => 8, 'categoria_id' => 6]);
        
        DB::table('produtos')->insert(
            ['nome' => 'Perfume', 'preco'=> 650,
            'estoque' => 8, 'categoria_id' => 3]);
        
        DB::table('produtos')->insert(
            ['nome' => 'Cama de casal', 'preco'=> 650,
            'estoque' => 8, 'categoria_id' => 4]);
        
        DB::table('produtos')->insert(
            ['nome' => 'Moveis', 'preco'=> 650,
            'estoque' => 8, 'categoria_id' => 4]);
        
    }
}
