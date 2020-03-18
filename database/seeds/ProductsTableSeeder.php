<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 5)->create();
        $categories->each( function($category) {
            $products = factory(Product::class, 13)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);
                $p->addMediaFromUrl("http://martinezbrands.com/wp-content/uploads/2019/08/antonio-aguilar.jpg")->toMediaCollection('images');
            });
        });
    }
}
