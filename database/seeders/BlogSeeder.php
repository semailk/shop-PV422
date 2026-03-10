<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()
            ->where('email', 'admin@mail.ru')
            ->firstOrFail();

        $categories = [
            'Travel' => Category::firstOrCreate(
                ['slug' => 'puteshestviya'],
                ['name' => 'Путешествия', 'sort' => 10, 'type' => 'blog']
            ),

            'Lifestyle' => Category::firstOrCreate(
                ['slug' => 'layfstayl'],
                ['name' => 'Лайфстайл', 'sort' => 20, 'type' => 'blog']
            ),

            'Technology' => Category::firstOrCreate(
                ['slug' => 'tekhnologii'],
                ['name' => 'Технологии', 'sort' => 30, 'type' => 'blog']
            ),

            'Food' => Category::firstOrCreate(
                ['slug' => 'eda'],
                ['name' => 'Еда', 'sort' => 40, 'type' => 'blog']
            ),

            'Inspiration' => Category::firstOrCreate(
                ['slug' => 'vdokhnovenie'],
                ['name' => 'Вдохновение', 'sort' => 50, 'type' => 'blog']
            ),

            'Health' => Category::firstOrCreate(
                ['slug' => 'zdorove'],
                ['name' => 'Здоровье', 'sort' => 60, 'type' => 'blog']
            ),

            // Можно сразу добавить ещё несколько популярных категорий для блога
            'Fashion' => Category::firstOrCreate(
                ['slug' => 'moda'],
                ['name' => 'Мода', 'sort' => 70, 'type' => 'blog']
            ),

            'Beauty' => Category::firstOrCreate(
                ['slug' => 'krasota'],
                ['name' => 'Красота', 'sort' => 80, 'type' => 'blog']
            ),

            'Psychology' => Category::firstOrCreate(
                ['slug' => 'psikhologiya'],
                ['name' => 'Психология', 'sort' => 90, 'type' => 'blog']
            ),

            'Business' => Category::firstOrCreate(
                ['slug' => 'biznes'],
                ['name' => 'Бизнес', 'sort' => 100, 'type' => 'blog']
            ),
        ];


        $samplePosts = [
            [
                'title' => 'Best Street Food Spots in Southeast Asia 2025',
                'description' => 'Discover the most delicious and authentic street food experiences in Bangkok, Hanoi, Singapore and Kuala Lumpur this year.',
                'cover_path' => 'img/blog/single_blog_1.png',
                'categories' => [
                    $categories['Travel']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
            [
                'title' => 'Why Slow Travel is the New Luxury',
                'description' => 'In a fast-paced world, taking your time to truly experience a destination has become the ultimate indulgence.',
                'cover_path' => 'img/blog/single_blog_2.png',
                'categories' => [
                    $categories['Psychology']->id,
                    $categories['Business']->id,
                ],
            ],
            [
                'title' => 'The Rise of Digital Nomad Visas Around the World',
                'description' => 'More than 50 countries now offer special visas for remote workers — here’s what you need to know in 2026.',
                'cover_path' => 'img/blog/single_blog_3.png',
                'categories' => [
                    $categories['Psychology']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
            [
                'title' => 'AI Tools That Changed My Photography Workflow',
                'description' => 'From generative fill to automatic culling — the most useful AI-powered tools for photographers right now.',
                'cover_path' => 'img/blog/single_blog_4.png',
                'categories' => [
                    $categories['Beauty']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
            [
                'title' => 'Minimalist Living: How I Reduced My Belongings by 70%',
                'description' => 'A personal story about intentional living, decluttering and finding freedom in owning less.',
                'cover_path' => 'img/blog/single_blog_5.png',
                'categories' => [
                    $categories['Psychology']->id,
                    $categories['Beauty']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
            [
                'title' => 'Morning Routines of Successful Digital Entrepreneurs',
                'description' => 'What top remote founders do in the first 90 minutes after waking up — and why it matters.',
                'cover_path' => 'img/blog/single_blog_1.png', // можно повторно или заменить
                'categories' => [
                    $categories['Psychology']->id,
                    $categories['Beauty']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
            [
                'title' => 'Sustainable Travel: How to Explore Without Harming',
                'description' => 'Practical tips on lower carbon footprint, supporting local communities and responsible tourism.',
                'cover_path' => 'img/blog/single_blog_2.png',
                'categories' => [
                    $categories['Psychology']->id,
                    $categories['Beauty']->id,
                    $categories['Lifestyle']->id,
                ],
            ],
        ];

        foreach ($samplePosts as $post) {
           $blog = Blog::query()->firstOrCreate(['title' => $post['title']],
                [
                    'title' => $post['title'],
                    'user_id' => $user->id,
                    'description' => $post['description'],
                    'cover_path' => $post['cover_path'],
                ]);

            $blog->categories()->sync($post['categories']);
        }

        // Если хочешь больше записей — можно добавить factory
        // Blog::factory()->count(15)->create();
    }
}
