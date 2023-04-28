<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Versao::create(['nome' => 'Nova Versão Internacional', 'abreviacao' => 'NVI', 'idioma_id' => 1]);
    }
}
