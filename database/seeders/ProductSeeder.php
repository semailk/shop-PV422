<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Предполагаем, что категории уже созданы. Берём несколько id (поменяй под свои)
        // Например:
        // 1 — Подушки / Orthopedic pillows
        // 2 — Домашний декор
        // 3 — Cervical / шея
        // 4 — Travel pillows и т.д.
        $categories = Category::pluck('id')->toArray() ?: [1, 2, 3, 4];

        $products = [
            [
                'name'        => 'Cervical Pillow for Airplane, Car, Office Nap',
                'description' => 'Эргономичная подушка для путешествий и офиса. Поддержка шеи, memory foam, компактная.',
                'price'       => 18.99,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Orthopedic Memory Foam Pillow – Slow Rebound',
                'description' => 'Классическая ортопедическая подушка с эффектом памяти. Отлично снимает напряжение в шее и плечах.',
                'price'       => 24.50,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Adjustable Shredded Memory Foam Pillow',
                'description' => 'Регулируемая подушка с измельчённым memory foam. Подходит для любого типа сна (бок, спина, живот).',
                'price'       => 32.90,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Contour Cervical Pillow for Neck Pain Relief',
                'description' => 'Контурная подушка с выемкой для плеча. Идеально для тех, кто страдает от болей в шее и спине.',
                'price'       => 27.00,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Cooling Gel Memory Foam Orthopedic Pillow',
                'description' => 'Охлаждающая гелевая прослойка + memory foam. Не перегревается ночью.',
                'price'       => 35.99,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Side Sleeper Pillow – Extra High Loft',
                'description' => 'Высокая подушка специально для сна на боку. Поддерживает правильное положение позвоночника.',
                'price'       => 29.50,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Geometric Striped Decorative Throw Pillow',
                'description' => 'Стильная декоративная подушка с геометрическим узором. Отлично дополнит диван или кровать.',
                'price'       => 14.99,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Velvet Bolster Pillow – Modern Home Accent',
                'description' => 'Длинная валик-подушка из бархата. Идеальный акцент для спальни или гостиной.',
                'price'       => 22.00,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Lumbar Support Pillow for Back Pain',
                'description' => 'Подушка под поясницу для стула/кресла/авто. Снимает нагрузку со спины.',
                'price'       => 19.90,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Travel Neck Pillow – Memory Foam U-Shape',
                'description' => 'Компактная подушка для путешествий. Не даёт голове падать во время сна в самолёте/поезде.',
                'price'       => 15.99,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Butterfly Contour Pillow – Sciatica & Hip Relief',
                'description' => 'Уникальная форма "бабочка" для снятия боли в тазу, бедре и пояснице.',
                'price'       => 38.50,
                'category_id' => $categories[array_rand($categories)],
            ],
            [
                'name'        => 'Hypoallergenic Down Alternative Pillow',
                'description' => 'Мягкая подушка с наполнителем, имитирующим пух. Гипоаллергенная, пышная.',
                'price'       => 21.75,
                'category_id' => $categories[array_rand($categories)],
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create($data);

            // Если хочешь добавить медиа через Spatie Media Library
            // (например, главное изображение)
            $product->addMediaFromUrl(
                url('/img/categori/product' . random_int(1, 6) . '.png')
            )->toMediaCollection('products');
            // или укажи реальные пути, если изображения уже есть:
            // $product->addMedia(public_path('img/categori/product' . rand(1,6) . '.png'))->toMediaCollection();
        }

        $this->command?->info('Создано ' . count($products) . ' продуктов.');
    }
}
