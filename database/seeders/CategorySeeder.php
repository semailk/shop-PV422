<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            // ────────────── Основные типы одежды ──────────────
            ['name' => 'Женская одежда',       'slug' => 'zhenskaya-odezhda',     'type' => 'clothing', 'sort' => 10],
            ['name' => 'Мужская одежда',       'slug' => 'muzhskaya-odezhda',      'type' => 'clothing', 'sort' => 20],
            ['name' => 'Детская одежда',       'slug' => 'detskaya-odezhda',       'type' => 'clothing', 'sort' => 30],
            ['name' => 'Спортивная одежда',    'slug' => 'sportivnaya-odezhda',    'type' => 'clothing', 'sort' => 40],
            ['name' => 'Домашняя одежда',      'slug' => 'domashnyaya-odezhda',    'type' => 'clothing', 'sort' => 50],

            // ────────────── Подкатегории женской одежды ──────────────
            ['name' => 'Платья',               'slug' => 'platya',                 'type' => 'clothing', 'sort' => 101],
            ['name' => 'Блузки и рубашки',     'slug' => 'bluzki-rubashki',        'type' => 'clothing', 'sort' => 102],
            ['name' => 'Футболки и топы',      'slug' => 'futbolki-topy',          'type' => 'clothing', 'sort' => 103],
            ['name' => 'Юбки',                 'slug' => 'yubki',                  'type' => 'clothing', 'sort' => 104],
            ['name' => 'Брюки и джинсы',       'slug' => 'bryuki-dzhinsy',         'type' => 'clothing', 'sort' => 105],
            ['name' => 'Верхняя одежда женская','slug' => 'verhnyaya-odezhda-zh',   'type' => 'clothing', 'sort' => 106],
            ['name' => 'Нижнее бельё',         'slug' => 'nizhnee-bele',           'type' => 'lingerie', 'sort' => 107],

            // ────────────── Подкатегории мужской одежды ──────────────
            ['name' => 'Футболки и поло',      'slug' => 'futbolki-polo',          'type' => 'clothing', 'sort' => 201],
            ['name' => 'Рубашки',              'slug' => 'rubashki',               'type' => 'clothing', 'sort' => 202],
            ['name' => 'Брюки и чиносы',       'slug' => 'bryuki-chinosy',         'type' => 'clothing', 'sort' => 203],
            ['name' => 'Джинсы мужские',       'slug' => 'dzhinsy-muzhskie',       'type' => 'clothing', 'sort' => 204],
            ['name' => 'Верхняя одежда мужская','slug' => 'verhnyaya-odezhda-m',    'type' => 'clothing', 'sort' => 205],

            // ────────────── Другие популярные категории ──────────────
            ['name' => 'Обувь',                'slug' => 'obuv',                   'type' => 'shoes',    'sort' => 60],
            ['name' => 'Аксессуары',           'slug' => 'aksessuary',             'type' => 'accessories', 'sort' => 70],
            ['name' => 'Сумки',                'slug' => 'sumki',                  'type' => 'accessories', 'sort' => 71],
            ['name' => 'Большой размер',       'slug' => 'bolshoy-razmer',         'type' => 'clothing', 'sort' => 80],
            ['name' => 'Детская обувь',        'slug' => 'detskaya-obuv',          'type' => 'shoes',    'sort' => 81],
            ['name' => 'Головные уборы',       'slug' => 'golovnye-ubory',         'type' => 'accessories', 'sort' => 82],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
