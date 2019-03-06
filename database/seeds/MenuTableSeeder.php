<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Главная',
            'url' => '/',
            'sort_order' => '90',
        ]);

        Menu::create([
            'name' => 'Обо мне',
            'url' => '/about-me',
            'sort_order' => '91',
        ]);

        Menu::create([
            'name' => 'Обратная связь',
            'url' => '/feedback',
            'sort_order' => '92',
        ]);

//        Menu::create([
//            'name' => 'Авторизация',
//            'url' => '#',
//            'sort_order' => '93',
//        ]);
//
//        Menu::create([
//            'parent_id' => '4',
//            'name' => 'Вход',
//            'url' => '/auth/signin',
//            'sort_order' => '99',
//        ]);
//
//        Menu::create([
//            'parent_id' => '4',
//            'name' => 'Регистрация',
//            'url' => '/auth/signup',
//            'sort_order' => '100',
//        ]);
    }
}
