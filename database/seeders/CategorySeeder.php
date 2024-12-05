<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public $categories = [
        [
            'id' => 1,
            'name' => 'Vietnamese drip coffee',
            'description' => 'Vietnamese drip coffee is a traditional Vietnamese coffee style. It is made using a small metal Vietnamese drip filter (phin).',
        ],
        [
            'id' => 2,
            'name' => 'Coffee roasting',
            'description' => 'Coffee roasting is the process of heating coffee beans to transform them into roasted coffee products. The roasting process is what produces the characteristic flavor of coffee by causing the green coffee beans to change in taste.',
        ],
    ];

    private function getCategories()
    {
        return $this->categories;
    }

    public function run(): void
    {
        foreach ($this->getCategories() as $category) {
            Category::create($category);
        }

        // Category::factory()->count(1000)->create();
    }
}
