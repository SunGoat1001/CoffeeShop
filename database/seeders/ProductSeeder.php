<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = Product::DEFAULT_CURRENCY;

    public $products = [
        [
            'id' => 1,
            'category_id' => 1,
            'name' => 'Black phin coffee',
            'description' => 'Perfect for coffee purists who appreciate slow-brewed perfection!',
            'price' => 10000,
            'display_image_url' => 'https://www.shutterstock.com/shutterstock/photos/2273287209/display_1500/stock-vector-vietnamese-coffee-illustration-the-dripper-also-called-a-phin-caphe-phin-vector-graphics-2273287209.jpg',
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'name' => 'White phin coffee',
            'description' => 'Often served over ice, it’s both a refreshing treat and a cherished morning ritual.',
            'price' => 12000,
            'display_image_url' => 'https://www.shutterstock.com/shutterstock/photos/2269792185/display_1500/stock-vector-coffee-with-condensed-milk-in-glass-cups-vietnamese-coffee-maker-vietnamese-coffee-illustration-2269792185.jpg',
        ],
        [
            'id' => 3,
            'category_id' => 2,
            'name' => 'Black roasted coffee',
            'description' => 'Black roasted coffee is a rich, bold beverage made from freshly ground, darkly roasted coffee beans. Its deep aroma and robust flavor offer a pure and invigorating experience, often enjoyed without milk or sugar to highlight its natural intensity and subtle notes of chocolate or caramel.',
            'price' => 13000,
            'display_image_url' => 'https://png.pngtree.com/png-vector/20240206/ourlarge/pngtree-watercolor-ibrik-coffee-png-image_11664653.png',
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'name' => 'White roasted coffee',
            'description' => 'Paired with the smooth sweetness of the milk, it creates a perfect balance, making it a beloved choice for coffee lovers worldwide.',
            'price' => 14000,
            'display_image_url' => 'https://png.pngtree.com/png-vector/20240206/ourlarge/pngtree-watercolor-ibrik-coffee-png-image_11664653.png',
        ],
        [
            'id' => 5,
            'category_id' => 1,
            'name' => 'Bac Xiu coffee',
            'description' => 'Experience the perfect balance of rich coffee and creamy sweetness with a refreshing cup of Bạc Xỉu, a true Vietnamese delight.',
            'price' => 15000,
            'display_image_url' => 'asset\img\Bac_xiu.png',
        ],
    ];

    private function getProducts()
    {
        return collect($this->products);
    }

    public function run(): void
    {
        foreach ($this->getProducts() as $product) {
            $product['currency'] = self::DEFAULT_CURRENCY;

            Product::create($product);
        }

        // Product::factory()->count(1000)->create();
    }
}
