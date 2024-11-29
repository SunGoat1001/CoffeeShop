<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = Product::DEFAULT_CURRENCY;

    public $products = [
        [
            "id" => 1,
            'category_id' => 1,
            'name' => 'Black phin coffee',
            'description' => 'Vietnamese Black Phin Coffee is a traditional coffee brewed using a small metal drip filter, known as a phin. This method produces a rich, bold, and intensely aromatic coffee, typically served black without sugar or milk. It highlights the deep, earthy flavors of Vietnamese coffee beans, often made from robusta for an extra caffeine kick and unique bitterness. Perfect for coffee purists who appreciate slow-brewed perfection!',
            'price' => 10000,
            'display_image_url' => 'https://www.shutterstock.com/shutterstock/photos/2273287209/display_1500/stock-vector-vietnamese-coffee-illustration-the-dripper-also-called-a-phin-caphe-phin-vector-graphics-2273287209.jpg',
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'name' => 'White phin coffee',
            'description' => 'Vietnamese drip coffee with condensed milk is a beloved traditional beverage that embodies the essence of Vietnamese coffee culture. Made using a small metal drip filter (phin), the coffee slowly brews into a cup layered with rich, creamy condensed milk. The result is a perfect balance of bold coffee flavor and sweet, velvety richness. Often served over ice, it’s both a refreshing treat and a cherished morning ritual.',
            'price' => 12000,
            'display_image_url' => 'https://www.shutterstock.com/shutterstock/photos/2269792185/display_1500/stock-vector-coffee-with-condensed-milk-in-glass-cups-vietnamese-coffee-maker-vietnamese-coffee-illustration-2269792185.jpg',
        ],
        [
            "id" => 3,
            "category_id" => 2,
            "name" => 'Black roasted coffee',
            'description' => "Black roasted coffee is a rich, bold beverage made from freshly ground, darkly roasted coffee beans. Its deep aroma and robust flavor offer a pure and invigorating experience, often enjoyed without milk or sugar to highlight its natural intensity and subtle notes of chocolate or caramel.",
            "price" => 13000,
            'display_image_url' => 'https://png.pngtree.com/png-vector/20240206/ourlarge/pngtree-watercolor-ibrik-coffee-png-image_11664653.png',
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'name' => 'White roasted coffee',
            'description' => 'Vietnamese roasted coffee with milk is a harmonious blend of robust, dark-roasted coffee and creamy sweetened condensed milk. The coffee is brewed slowly, often using a traditional drip filter, allowing its rich aroma and bold flavors to shine. Paired with the smooth sweetness of the milk, it creates a perfect balance, making it a beloved choice for coffee lovers worldwide.',
            'price' => 14000,
            'display_image_url' => 'https://png.pngtree.com/png-vector/20240206/ourlarge/pngtree-watercolor-ibrik-coffee-png-image_11664653.png',
        ]
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
    }
}
