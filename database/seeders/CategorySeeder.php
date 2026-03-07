<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            // ────────────── Женская одежда ──────────────
            ['name' => 'Женская одежда', 'slug' => 'zhenskaya-odezhda', 'parent_id' => null, 'sort' => 10],

            ['name' => 'Платья',             'slug' => 'platya',              'parent_id' => 1, 'sort' => 10],
            ['name' => 'Блузки и рубашки',   'slug' => 'bluzki-rubashki',     'parent_id' => 1, 'sort' => 20],
            ['name' => 'Футболки и топы',    'slug' => 'futbolki-topy',       'parent_id' => 1, 'sort' => 30],
            ['name' => 'Юбки',               'slug' => 'yubki',               'parent_id' => 1, 'sort' => 40],
            ['name' => 'Брюки и джинсы',     'slug' => 'bryuki-dzhinsy',      'parent_id' => 1, 'sort' => 50],
            ['name' => 'Верхняя одежда',     'slug' => 'verhnyaya-odezhda',   'parent_id' => 1, 'sort' => 60],
            ['name' => 'Нижнее бельё',       'slug' => 'nizhnee-bele',        'parent_id' => 1, 'sort' => 70],

            // ────────────── Мужская одежда ──────────────
            ['name' => 'Мужская одежда', 'slug' => 'muzhskaya-odezhda', 'parent_id' => null, 'sort' => 20],

            ['name' => 'Футболки и поло',    'slug' => 'futbolki-polo',       'parent_id' => 9, 'sort' => 10],
            ['name' => 'Рубашки',            'slug' => 'rubashki',            'parent_id' => 9, 'sort' => 20],
            ['name' => 'Брюки и чиносы',     'slug' => 'bryuki-chinosy',      'parent_id' => 9, 'sort' => 30],
            ['name' => 'Джинсы',             'slug' => 'dzhinsy',             'parent_id' => 9, 'sort' => 40],
            ['name' => 'Верхняя одежда',     'slug' => 'verhnyaya-odezhda-m', 'parent_id' => 9, 'sort' => 50],
            ['name' => 'Спортивная одежда',  'slug' => 'sportivnaya-odezhda', 'parent_id' => 9, 'sort' => 60],

            // ────────────── Детская одежда ──────────────
            ['name' => 'Детская одежда', 'slug' => 'detskaya-odezhda', 'parent_id' => null, 'sort' => 30],

            ['name' => 'Для девочек', 'slug' => 'dlya-devochek', 'parent_id' => 16, 'sort' => 10],
            ['name' => 'Для мальчиков', 'slug' => 'dlya-malchikov', 'parent_id' => 16, 'sort' => 20],

            // Дополнительные популярные категории
            ['name' => 'Спортивная одежда',     'slug' => 'sportivnaya',          'parent_id' => null, 'sort' => 40],
            ['name' => 'Домашняя одежда',       'slug' => 'domashnyaya',          'parent_id' => null, 'sort' => 50],
            ['name' => 'Большой размер',        'slug' => 'bolshoy-razmer',       'parent_id' => null, 'sort' => 60],
            ['name' => 'Аксессуары',            'slug' => 'aksessuary',           'parent_id' => null, 'sort' => 70],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
