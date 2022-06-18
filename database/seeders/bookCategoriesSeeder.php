<?php

namespace Database\Seeders;

use App\Models\bookCategories;
use Illuminate\Database\Seeder;

class bookCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bookCategories::create(['category_name' => 'Classics']);
        bookCategories::create(['category_name' => 'Action and Adventure']);
        bookCategories::create(['category_name' => 'Comic Book or Graphic Novel']);
        bookCategories::create(['category_name' => 'Detective and Mystery']);
        bookCategories::create(['category_name' => 'Fantasy']);
        bookCategories::create(['category_name' => 'Historical Fiction']);
        bookCategories::create(['category_name' => 'Science']);
        bookCategories::create(['category_name' => 'History']);
        bookCategories::create(['category_name' => 'Poetry']);
        bookCategories::create(['category_name' => 'Literary Fiction']);
        bookCategories::create(['category_name' => 'Biographies and Autobiographies']);
    }
}
