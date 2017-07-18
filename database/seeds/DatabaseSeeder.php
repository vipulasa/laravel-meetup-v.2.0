<?php

use App\Menu;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {

            User::create([
                'name' => $faker->firstNameMale(),
                'email' => $faker->email(),
                'password' => $faker->password()
            ]);
        }

        $menus = [
            'Short Eats' => [
                [
                    'title' => 'Vegetable Roti',
                    'image' => str_replace(' ', '_', strtolower('Vegetable Roti')),
                    'price' => 100
                ],
                [
                    'title' => 'Samosa',
                    'image' => str_replace(' ', '_', strtolower('Vegetable Roti')),
                    'price' => 200
                ],
            ],
            'Break fast' => [
                [
                    'title' => 'Jumbo Chickpea Pancake',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2014-01/enhanced/webdr06/27/11/enhanced-buzz-4179-1390841733-0.jpg',
                    'price' => 340
                ],

                [
                    'title' => 'Blueberry Oatmeal Waffles',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2014-01/enhanced/webdr07/27/11/enhanced-buzz-19322-1390840579-31.jpg',
                    'price' => 300
                ],
            ],
            'Lunch' => [
                [
                    'title' => 'Cheesy Corn, Potato, and Zucchini Galette',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/11/asset/buzzfeed-prod-fastlane-02/sub-buzz-28812-1499440622-11.jpg',
                    'price' => 230
                ],
                [
                    'title' => 'Three Cheese and Zucchini Galette',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/10/asset/buzzfeed-prod-fastlane-03/sub-buzz-6691-1499438588-5.jpg',
                    'price' => 450
                ]
            ],
            'Dinner' => [
                [
                    'title' => 'Mushroom Galette With Gruyere Crust',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/11/asset/buzzfeed-prod-fastlane-02/sub-buzz-29581-1499441787-13.jpg',
                    'price' => 230
                ],
                [
                    'title' => 'Heirloom Tomato and Eggplant Galette',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/11/asset/buzzfeed-prod-fastlane-01/sub-buzz-23129-1499442020-5.jpg',
                    'price' => 130
                ]
            ],
            'Desserts' => [
                [
                    'title' => 'Mixed Berry Galette With Buttermilk Crust',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/11/asset/buzzfeed-prod-fastlane-03/sub-buzz-9132-1499442255-22.png',
                    'price' => 280
                ],
                [
                    'title' => 'Blueberry and Apple Galette',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/7/12/asset/buzzfeed-prod-fastlane-02/sub-buzz-31216-1499445035-6.jpg',
                    'price' => 340
                ]
            ],
            'Drinks' => [
                [
                    'title' => 'Grill-Limonade',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-06/12/16/asset/buzzfeed-prod-fastlane-01/sub-buzz-6522-1497298875-1.jpg',
                    'price' => 250
                ],
                [
                    'title' => 'Color-Changing Frozen Mojito',
                    'image' => 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/10/20/asset/buzzfeed-prod-fastlane-02/sub-buzz-5570-1499733463-1.jpg',
                    'price' => 480
                ]
            ],
        ];

        foreach ($menus as $menu => $products) {
            $menu = Menu::create([
                'title' => $menu,
                'image' => str_replace(' ', '_', strtolower($menu)) . '.jpg'
            ]);

            if (count($products)) {
                foreach ($products as $product) {
                    Product::create([
                        'menu_id' => $menu->id,
                        'title' => $product['title'],
                        'image' => $product['image'],
                        'price' => $product['price']
                    ]);
                }
            }
        }
    }
}
