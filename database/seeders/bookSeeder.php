<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PHPUnit\Framework\MockObject\Rule\Parameters;
use App\Models\Books;
use App\Models\Author;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::factory()->count(23)->create();
    }
}
