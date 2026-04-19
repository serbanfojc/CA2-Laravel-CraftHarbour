<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Artisan;
use App\Models\Review;
use App\Models\Workshop;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@craftharbour.ie',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $artisanUsers = [
            ['name' => 'Niamh Brennan', 'email' => 'niamh@craftharbour.ie'],
            ['name' => 'Conor Walsh', 'email' => 'conor@craftharbour.ie'],
            ['name' => 'Aoife Doyle', 'email' => 'aoife@craftharbour.ie'],
            ['name' => 'Seamus Kelly', 'email' => 'seamus@craftharbour.ie'],
            ['name' => 'Ciara Murphy', 'email' => 'ciara@craftharbour.ie'],
        ];

        foreach ($artisanUsers as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
                'role' => 'artisan',
            ]);
        }

        $memberUsers = [
            ['name' => 'Ciarán Murtagh', 'email' => 'ciaran@craftharbour.ie'],
            ['name' => 'Sandra Regan', 'email' => 'sandra@craftharbour.ie'],
            ['name' => 'Padraig Finn', 'email' => 'padraig@craftharbour.ie'],
            ['name' => 'Roisin Burke', 'email' => 'roisin@craftharbour.ie'],
            ['name' => 'Declan Farrell', 'email' => 'declan@craftharbour.ie'],
        ];

        foreach ($memberUsers as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
                'role' => 'member',
            ]);
        }

        $listings = [
            [
                'user_id' => 2,
                'name' => 'Niamh Brennan Ceramics',
                'category' => 'ceramics',
                'bio' => 'Hand thrown ceramics made in my studio in Drogheda. I specialise in functional pieces like mugs, bowls and plates using locally sourced clay.',
                'town' => 'Drogheda',
                'county' => 'Louth',
                'email' => 'niamh@brennanceramics.ie',
                'phone' => '085 123 4567',
                'cover_image' => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=800',
                'avg_rating' => 4.5,
            ],
            [
                'user_id' => 3,
                'name' => 'Walsh Woodworks',
                'category' => 'woodwork',
                'bio' => 'Custom furniture and homeware made from Irish hardwoods. Every piece is unique and built to last a lifetime.',
                'town' => 'Kilkenny',
                'county' => 'Kilkenny',
                'email' => 'conor@walshwoodworks.ie',
                'phone' => '086 234 5678',
                'cover_image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800',
                'avg_rating' => 4.8,
            ],
            [
                'user_id' => 4,
                'name' => 'Aoife Doyle Jewellery',
                'category' => 'jewellery',
                'bio' => 'Handmade silver and gold jewellery inspired by the Irish landscape. Each piece is designed and made by hand in my Galway workshop.',
                'town' => 'Galway',
                'county' => 'Galway',
                'email' => 'aoife@aoifedoylejewellery.ie',
                'phone' => '087 345 6789',
                'cover_image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800',
                'avg_rating' => 4.2,
            ],
            [
                'user_id' => 5,
                'name' => 'Seamus Kelly Leatherwork',
                'category' => 'leather',
                'bio' => 'Traditional leather goods made using old world techniques. Belts, wallets, bags and custom orders welcome.',
                'town' => 'Cork',
                'county' => 'Cork',
                'email' => 'seamus@kellyleather.ie',
                'phone' => '083 456 7890',
                'cover_image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800',
                'avg_rating' => 4.6,
            ],
            [
                'user_id' => 6,
                'name' => 'Ciara Murphy Textiles',
                'category' => 'textiles',
                'bio' => 'Hand woven throws, cushions and wall hangings made on a traditional loom in my Dublin studio. Natural fibres only.',
                'town' => 'Dublin',
                'county' => 'Dublin',
                'email' => 'ciara@ciaratextiles.ie',
                'phone' => '089 567 8901',
                'cover_image' => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800',
                'avg_rating' => 4.3,
            ],
        ];

        foreach ($listings as $listing) {
            Artisan::create($listing);
        }

        $workshops = [
            [
                'artisan_id' => 1,
                'title' => 'Introduction to Wheel Throwing',
                'description' => 'Learn the basics of throwing clay on the wheel. All materials provided. Suitable for complete beginners.',
                'date' => '2026-05-10',
                'start_time' => '10:00:00',
                'duration_hours' => 3.0,
                'price' => 65.00,
                'max_capacity' => 8,
                'is_active' => true,
            ],
            [
                'artisan_id' => 1,
                'title' => 'Hand Building Ceramics',
                'description' => 'Create your own bowls and cups using hand building techniques. No wheel required. Great for all ages.',
                'date' => '2026-05-24',
                'start_time' => '14:00:00',
                'duration_hours' => 2.5,
                'price' => 50.00,
                'max_capacity' => 10,
                'is_active' => true,
            ],
            [
                'artisan_id' => 2,
                'title' => 'Woodworking for Beginners',
                'description' => 'Learn how to use hand tools to make a small wooden shelf. All tools and wood provided.',
                'date' => '2026-05-17',
                'start_time' => '09:00:00',
                'duration_hours' => 4.0,
                'price' => 80.00,
                'max_capacity' => 6,
                'is_active' => true,
            ],
            [
                'artisan_id' => 3,
                'title' => 'Silver Ring Making',
                'description' => 'Make your own sterling silver ring from scratch. You will leave with a finished piece of jewellery.',
                'date' => '2026-06-01',
                'start_time' => '11:00:00',
                'duration_hours' => 3.5,
                'price' => 95.00,
                'max_capacity' => 6,
                'is_active' => true,
            ],
            [
                'artisan_id' => 5,
                'title' => 'Introduction to Weaving',
                'description' => 'Learn the basics of loom weaving and take home your own woven piece. All materials included.',
                'date' => '2026-06-07',
                'start_time' => '10:00:00',
                'duration_hours' => 3.0,
                'price' => 70.00,
                'max_capacity' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($workshops as $workshop) {
            Workshop::create($workshop);
        }

        $reviews = [
            ['user_id' => 7, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Absolutely stunning work', 'body' => 'Niamh made a set of mugs for us as a wedding gift. The quality is incredible and she was so easy to deal with.'],
            ['user_id' => 8, 'artisan_id' => 1, 'rating' => 4, 'title' => 'Really lovely pieces', 'body' => 'Bought a bowl and a side plate. Beautifully made and arrived well packaged. Would definitely order again.'],
            ['user_id' => 9, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Best ceramics I have ever bought', 'body' => 'I stumbled across this listing and I am so glad I did. The craftsmanship is on another level.'],
            ['user_id' => 10, 'artisan_id' => 1, 'rating' => 4, 'title' => 'Great workshop experience', 'body' => 'Attended the wheel throwing workshop. Niamh is a brilliant teacher and so patient. Highly recommend.'],
            ['user_id' => 11, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Perfect gift', 'body' => 'Ordered a custom piece as a birthday gift. Niamh was great to communicate with and the finished product was perfect.'],

            ['user_id' => 7, 'artisan_id' => 2, 'rating' => 5, 'title' => 'Incredible craftsmanship', 'body' => 'Conor built a dining table for us. It is absolutely beautiful and built to last generations. Worth every cent.'],
            ['user_id' => 8, 'artisan_id' => 2, 'rating' => 5, 'title' => 'Outstanding quality', 'body' => 'Had a custom bookshelf made. The attention to detail is unreal. Everyone who visits comments on it.'],
            ['user_id' => 9, 'artisan_id' => 2, 'rating' => 4, 'title' => 'Very happy with my order', 'body' => 'Ordered a small side table. Took a few weeks but the wait was worth it. Really solid piece of furniture.'],
            ['user_id' => 10, 'artisan_id' => 2, 'rating' => 5, 'title' => 'Will order again', 'body' => 'Second time using Walsh Woodworks and just as good as the first time. Brilliant work.'],

            ['user_id' => 7, 'artisan_id' => 3, 'rating' => 4, 'title' => 'Beautiful jewellery', 'body' => 'Bought a silver necklace for my mam. She absolutely loves it. Really delicate and well made.'],
            ['user_id' => 8, 'artisan_id' => 3, 'rating' => 5, 'title' => 'Stunning pieces', 'body' => 'Aoife made a custom engagement ring for me. It is exactly what I wanted and the whole process was great.'],
            ['user_id' => 9, 'artisan_id' => 3, 'rating' => 4, 'title' => 'Great quality', 'body' => 'Bought a pair of earrings. Really nicely made and good value for handmade silver jewellery.'],
            ['user_id' => 11, 'artisan_id' => 3, 'rating' => 3, 'title' => 'Nice but took a while', 'body' => 'The piece was lovely but it took longer than expected to arrive. Would still recommend though.'],

            ['user_id' => 7, 'artisan_id' => 4, 'rating' => 5, 'title' => 'Best leather wallet I have owned', 'body' => 'Bought a bifold wallet. The leather quality is top notch and it has aged really well after a few months of use.'],
            ['user_id' => 9, 'artisan_id' => 4, 'rating' => 5, 'title' => 'Brilliant craftsman', 'body' => 'Had a custom belt made. Seamus was great to deal with and the finished product is exactly what I wanted.'],
            ['user_id' => 10, 'artisan_id' => 4, 'rating' => 4, 'title' => 'Really solid work', 'body' => 'Bought a leather card holder. Small but perfectly made. You can tell a lot of care went into it.'],
            ['user_id' => 11, 'artisan_id' => 4, 'rating' => 5, 'title' => 'Exceptional quality', 'body' => 'Ordered a leather bag as a gift. The person receiving it was blown away. Absolutely recommend.'],

            ['user_id' => 8, 'artisan_id' => 5, 'rating' => 4, 'title' => 'Gorgeous throw', 'body' => 'Bought a wool throw for the couch. Really well made and the colours are lovely. Great addition to the living room.'],
            ['user_id' => 9, 'artisan_id' => 5, 'rating' => 5, 'title' => 'Unique and beautiful', 'body' => 'Bought a wall hanging. It is a real statement piece and completely unique. So happy with it.'],
            ['user_id' => 10, 'artisan_id' => 5, 'rating' => 4, 'title' => 'Great weaving workshop', 'body' => 'Did the intro to weaving class. Really enjoyed it and Ciara is a great teacher. Left with a lovely piece.'],
            ['user_id' => 11, 'artisan_id' => 5, 'rating' => 4, 'title' => 'Lovely cushions', 'body' => 'Ordered two cushion covers. Really nice quality and the weave pattern is beautiful. Would order again.'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}