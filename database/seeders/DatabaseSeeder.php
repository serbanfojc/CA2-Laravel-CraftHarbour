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
            ['name' => 'Padraig OBrien', 'email' => 'padraig@craftharbour.ie'],
            ['name' => 'Sinead Farrell', 'email' => 'sinead@craftharbour.ie'],
            ['name' => 'Declan Byrne', 'email' => 'declan@craftharbour.ie'],
            ['name' => 'Roisin Lynch', 'email' => 'roisin@craftharbour.ie'],
            ['name' => 'Fionnuala Quinn', 'email' => 'fionnuala@craftharbour.ie'],
            ['name' => 'Cormac Donoghue', 'email' => 'cormac@craftharbour.ie'],
            ['name' => 'Aisling Power', 'email' => 'aisling@craftharbour.ie'],
            ['name' => 'Tadhg Nolan', 'email' => 'tadhg@craftharbour.ie'],
            ['name' => 'Grainne Hennessy', 'email' => 'grainne@craftharbour.ie'],
            ['name' => 'Eoghan Gallagher', 'email' => 'eoghan@craftharbour.ie'],
            ['name' => 'Maeve Fitzpatrick', 'email' => 'maeve@craftharbour.ie'],
            ['name' => 'Oisin Kavanagh', 'email' => 'oisin@craftharbour.ie'],
            ['name' => 'Sorcha Daly', 'email' => 'sorcha@craftharbour.ie'],
            ['name' => 'Lorcan Healy', 'email' => 'lorcan@craftharbour.ie'],
            ['name' => 'Caoimhe Maguire', 'email' => 'caoimhe@craftharbour.ie'],
            ['name' => 'Ruairi Flanagan', 'email' => 'ruairi@craftharbour.ie'],
            ['name' => 'Orlaith Connolly', 'email' => 'orlaith@craftharbour.ie'],
            ['name' => 'Darragh Sweeney', 'email' => 'darragh@craftharbour.ie'],
            ['name' => 'Siobhan Reilly', 'email' => 'siobhan@craftharbour.ie'],
            ['name' => 'Cathal Dunne', 'email' => 'cathal@craftharbour.ie'],
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
            ['name' => 'Ciaran Murtagh', 'email' => 'ciaran@craftharbour.ie'],
            ['name' => 'Sandra Regan', 'email' => 'sandra@craftharbour.ie'],
            ['name' => 'Padraig Finn', 'email' => 'padraigf@craftharbour.ie'],
            ['name' => 'Roisin Burke', 'email' => 'roisinb@craftharbour.ie'],
            ['name' => 'Declan Farrell', 'email' => 'declanf@craftharbour.ie'],
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
                'user_id' => 2, 'name' => 'Niamh Brennan Ceramics', 'category' => 'ceramics',
                'bio' => 'Hand thrown ceramics made in my studio in Drogheda. I specialise in functional pieces like mugs, bowls and plates using locally sourced clay.',
                'town' => 'Drogheda', 'county' => 'Louth', 'email' => 'niamh@brennanceramics.ie', 'phone' => '085 123 4567',
                'cover_image' => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=800', 'avg_rating' => 4.5,
            ],
            [
                'user_id' => 3, 'name' => 'Walsh Woodworks', 'category' => 'woodwork',
                'bio' => 'Custom furniture and homeware made from Irish hardwoods. Every piece is unique and built to last a lifetime.',
                'town' => 'Kilkenny', 'county' => 'Kilkenny', 'email' => 'conor@walshwoodworks.ie', 'phone' => '086 234 5678',
                'cover_image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800', 'avg_rating' => 4.8,
            ],
            [
                'user_id' => 4, 'name' => 'Aoife Doyle Jewellery', 'category' => 'jewellery',
                'bio' => 'Handmade silver and gold jewellery inspired by the Irish landscape. Each piece is designed and made by hand in my Galway workshop.',
                'town' => 'Galway', 'county' => 'Galway', 'email' => 'aoife@aoifedoylejewellery.ie', 'phone' => '087 345 6789',
                'cover_image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800', 'avg_rating' => 4.2,
            ],
            [
                'user_id' => 5, 'name' => 'Seamus Kelly Leatherwork', 'category' => 'leather',
                'bio' => 'Traditional leather goods made using old world techniques. Belts, wallets, bags and custom orders welcome.',
                'town' => 'Cork', 'county' => 'Cork', 'email' => 'seamus@kellyleather.ie', 'phone' => '083 456 7890',
                'cover_image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800', 'avg_rating' => 4.6,
            ],
            [
                'user_id' => 6, 'name' => 'Ciara Murphy Textiles', 'category' => 'textiles',
                'bio' => 'Hand woven throws, cushions and wall hangings made on a traditional loom in my Dublin studio. Natural fibres only.',
                'town' => 'Dublin', 'county' => 'Dublin', 'email' => 'ciara@ciaratextiles.ie', 'phone' => '089 567 8901',
                'cover_image' => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800', 'avg_rating' => 4.3,
            ],
            [
                'user_id' => 7, 'name' => 'Padraig OBrien Glass', 'category' => 'glass',
                'bio' => 'Handblown glass art and homeware made in my Waterford studio. Inspired by the colours of the Irish coast.',
                'town' => 'Waterford', 'county' => 'Waterford', 'email' => 'padraig@obrienglassart.ie', 'phone' => '085 678 9012',
                'cover_image' => 'https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=800', 'avg_rating' => 4.7,
            ],
            [
                'user_id' => 8, 'name' => 'Sinead Farrell Pottery', 'category' => 'ceramics',
                'bio' => 'Wheel thrown and hand built pottery from my studio in Limerick. Specialising in unique glazed pieces for the home.',
                'town' => 'Limerick', 'county' => 'Limerick', 'email' => 'sinead@fareellpottery.ie', 'phone' => '086 789 0123',
                'cover_image' => 'https://images.unsplash.com/photo-1605429523419-d828acb041d5?w=800', 'avg_rating' => 4.4,
            ],
            [
                'user_id' => 9, 'name' => 'Declan Byrne Furniture', 'category' => 'woodwork',
                'bio' => 'Bespoke wooden furniture crafted to order in my Wicklow workshop. Dining tables, chairs, shelving and more.',
                'town' => 'Bray', 'county' => 'Wicklow', 'email' => 'declan@byrnefurniture.ie', 'phone' => '087 890 1234',
                'cover_image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800', 'avg_rating' => 4.9,
            ],
            [
                'user_id' => 10, 'name' => 'Roisin Lynch Silver', 'category' => 'jewellery',
                'bio' => 'Contemporary silver jewellery with Celtic influences. Each piece is handmade in my Sligo studio.',
                'town' => 'Sligo', 'county' => 'Sligo', 'email' => 'roisin@lynchsilver.ie', 'phone' => '083 901 2345',
                'cover_image' => 'https://images.unsplash.com/photo-1506630448388-4e683c67ddb0?w=800', 'avg_rating' => 4.1,
            ],
            [
                'user_id' => 11, 'name' => 'Fionnuala Quinn Weaving', 'category' => 'textiles',
                'bio' => 'Traditional Irish weaving using natural wool and linen. Wall hangings, table runners and custom commissions.',
                'town' => 'Galway', 'county' => 'Galway', 'email' => 'fionnuala@quinnweaving.ie', 'phone' => '089 012 3456',
                'cover_image' => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800', 'avg_rating' => 4.6,
            ],
            [
                'user_id' => 12, 'name' => 'Cormac Donoghue Leather', 'category' => 'leather',
                'bio' => 'Handcrafted leather bags, belts and accessories made in my Kerry workshop. Built to last a lifetime.',
                'town' => 'Tralee', 'county' => 'Kerry', 'email' => 'cormac@donoghuelather.ie', 'phone' => '085 123 6789',
                'cover_image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800', 'avg_rating' => 4.5,
            ],
            [
                'user_id' => 13, 'name' => 'Aisling Power Ceramics', 'category' => 'ceramics',
                'bio' => 'Unique ceramic sculptures and functional pieces made in my Tipperary studio. Each piece tells a story.',
                'town' => 'Clonmel', 'county' => 'Tipperary', 'email' => 'aisling@powercreramics.ie', 'phone' => '086 234 7890',
                'cover_image' => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=800', 'avg_rating' => 4.3,
            ],
            [
                'user_id' => 14, 'name' => 'Tadhg Nolan Woodcraft', 'category' => 'woodwork',
                'bio' => 'Hand carved wooden bowls, spoons and kitchen utensils made from sustainably sourced Irish timber.',
                'town' => 'Carlow', 'county' => 'Carlow', 'email' => 'tadhg@nolanwoodcraft.ie', 'phone' => '087 345 8901',
                'cover_image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800', 'avg_rating' => 4.7,
            ],
            [
                'user_id' => 15, 'name' => 'Grainne Hennessy Glass', 'category' => 'glass',
                'bio' => 'Stained glass art and decorative pieces made in my Clare studio. Commissions and custom window panels welcome.',
                'town' => 'Ennis', 'county' => 'Clare', 'email' => 'grainne@hennessyglass.ie', 'phone' => '083 456 9012',
                'cover_image' => 'https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=800', 'avg_rating' => 4.4,
            ],
            [
                'user_id' => 16, 'name' => 'Eoghan Gallagher Jewellery', 'category' => 'jewellery',
                'bio' => 'Gold and silver jewellery crafted using traditional techniques in my Donegal studio. Bespoke wedding rings a speciality.',
                'town' => 'Letterkenny', 'county' => 'Donegal', 'email' => 'eoghan@gallagherjewellery.ie', 'phone' => '089 567 0123',
                'cover_image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800', 'avg_rating' => 4.8,
            ],
            [
                'user_id' => 17, 'name' => 'Maeve Fitzpatrick Candles', 'category' => 'other',
                'bio' => 'Hand poured soy candles made with essential oils in my Wexford studio. Eco friendly and beautifully scented.',
                'town' => 'Wexford', 'county' => 'Wexford', 'email' => 'maeve@fitzpatrickcandles.ie', 'phone' => '085 111 2233',
                'cover_image' => 'https://images.unsplash.com/photo-1602607528146-4e288e235287?w=800', 'avg_rating' => 4.5,
            ],
            [
                'user_id' => 18, 'name' => 'Oisin Kavanagh Ironwork', 'category' => 'other',
                'bio' => 'Traditional blacksmithing and ornamental ironwork. Gates, railings, sculptures and fire tools made in my Meath forge.',
                'town' => 'Navan', 'county' => 'Meath', 'email' => 'oisin@kavanaghiron.ie', 'phone' => '086 222 3344',
                'cover_image' => 'https://images.unsplash.com/photo-1474631245198-4244a39e1168?w=800', 'avg_rating' => 4.7,
            ],
            [
                'user_id' => 19, 'name' => 'Sorcha Daly Printmaking', 'category' => 'other',
                'bio' => 'Linocut and screen printed art inspired by Irish wildlife. Limited edition prints and custom commissions.',
                'town' => 'Killarney', 'county' => 'Kerry', 'email' => 'sorcha@dalyprints.ie', 'phone' => '087 333 4455',
                'cover_image' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=800', 'avg_rating' => 4.3,
            ],
            [
                'user_id' => 20, 'name' => 'Lorcan Healy Ceramics', 'category' => 'ceramics',
                'bio' => 'Contemporary stoneware ceramics fired in a wood kiln. Functional pots with a rustic, earthy aesthetic.',
                'town' => 'Westport', 'county' => 'Mayo', 'email' => 'lorcan@healyceramics.ie', 'phone' => '083 444 5566',
                'cover_image' => 'https://images.unsplash.com/photo-1493106641515-6b5631de4bb9?w=800', 'avg_rating' => 4.6,
            ],
            [
                'user_id' => 21, 'name' => 'Caoimhe Maguire Knitwear', 'category' => 'textiles',
                'bio' => 'Hand knitted Aran sweaters, scarves and hats using 100% Irish wool. Traditional patterns with a modern twist.',
                'town' => 'Clifden', 'county' => 'Galway', 'email' => 'caoimhe@maguireknitwear.ie', 'phone' => '089 555 6677',
                'cover_image' => 'https://images.unsplash.com/photo-1584736286279-0b394743d0c0?w=800', 'avg_rating' => 4.8,
            ],
            [
                'user_id' => 22, 'name' => 'Ruairi Flanagan Woodturning', 'category' => 'woodwork',
                'bio' => 'Lathe turned bowls, vases and decorative pieces from native Irish timbers. Each piece is unique and one of a kind.',
                'town' => 'Athlone', 'county' => 'Westmeath', 'email' => 'ruairi@flanaganwood.ie', 'phone' => '085 666 7788',
                'cover_image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800', 'avg_rating' => 4.4,
            ],
            [
                'user_id' => 23, 'name' => 'Orlaith Connolly Mosaics', 'category' => 'glass',
                'bio' => 'Bespoke mosaic art for interiors and gardens. Using reclaimed glass, ceramic and stone to create stunning pieces.',
                'town' => 'Dundalk', 'county' => 'Louth', 'email' => 'orlaith@connollymosaics.ie', 'phone' => '086 777 8899',
                'cover_image' => 'https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=800', 'avg_rating' => 4.2,
            ],
            [
                'user_id' => 24, 'name' => 'Darragh Sweeney Leather', 'category' => 'leather',
                'bio' => 'Handstitched leather journals, notebook covers and desk accessories. Perfect for gifts and corporate orders.',
                'town' => 'Kilkenny', 'county' => 'Kilkenny', 'email' => 'darragh@sweeneyleather.ie', 'phone' => '087 888 9900',
                'cover_image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800', 'avg_rating' => 4.5,
            ],
            [
                'user_id' => 25, 'name' => 'Siobhan Reilly Jewellery', 'category' => 'jewellery',
                'bio' => 'Bohemian inspired gemstone jewellery. Rings, necklaces and earrings made with ethically sourced stones.',
                'town' => 'Dingle', 'county' => 'Kerry', 'email' => 'siobhan@reillyjewellery.ie', 'phone' => '083 999 0011',
                'cover_image' => 'https://images.unsplash.com/photo-1506630448388-4e683c67ddb0?w=800', 'avg_rating' => 4.6,
            ],
            [
                'user_id' => 26, 'name' => 'Cathal Dunne Pottery', 'category' => 'ceramics',
                'bio' => 'Sgraffito decorated pottery inspired by ancient Irish art. Plates, bowls and decorative tiles made in my Roscommon studio.',
                'town' => 'Roscommon', 'county' => 'Roscommon', 'email' => 'cathal@dunnepottery.ie', 'phone' => '089 000 1122',
                'cover_image' => 'https://images.unsplash.com/photo-1605429523419-d828acb041d5?w=800', 'avg_rating' => 4.1,
            ],
        ];

        foreach ($listings as $listing) {
            Artisan::create($listing);
        }

        $workshops = [
            ['artisan_id' => 1, 'title' => 'Introduction to Wheel Throwing', 'description' => 'Learn the basics of throwing clay on the wheel. All materials provided. Suitable for complete beginners.', 'date' => '2026-05-10', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 65.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 1, 'title' => 'Hand Building Ceramics', 'description' => 'Create your own bowls and cups using hand building techniques. No wheel required. Great for all ages.', 'date' => '2026-05-24', 'start_time' => '14:00:00', 'duration_hours' => 2.5, 'price' => 50.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 1, 'title' => 'Advanced Glazing Techniques', 'description' => 'Take your ceramics to the next level with advanced glazing methods. Intermediate level required.', 'date' => '2026-06-05', 'start_time' => '10:00:00', 'duration_hours' => 4.0, 'price' => 80.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 2, 'title' => 'Woodworking for Beginners', 'description' => 'Learn how to use hand tools to make a small wooden shelf. All tools and wood provided.', 'date' => '2026-05-17', 'start_time' => '09:00:00', 'duration_hours' => 4.0, 'price' => 80.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 2, 'title' => 'Make Your Own Cutting Board', 'description' => 'Learn joinery techniques and take home a beautiful hardwood cutting board you made yourself.', 'date' => '2026-06-14', 'start_time' => '10:00:00', 'duration_hours' => 3.5, 'price' => 75.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 2, 'title' => 'Wood Carving Introduction', 'description' => 'Discover the art of wood carving. Create a small decorative piece to take home. All tools provided.', 'date' => '2026-06-28', 'start_time' => '11:00:00', 'duration_hours' => 3.0, 'price' => 70.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 3, 'title' => 'Silver Ring Making', 'description' => 'Make your own sterling silver ring from scratch. You will leave with a finished piece of jewellery.', 'date' => '2026-06-01', 'start_time' => '11:00:00', 'duration_hours' => 3.5, 'price' => 95.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 3, 'title' => 'Pendant Making Workshop', 'description' => 'Design and create your own silver pendant. No experience needed. All materials included.', 'date' => '2026-06-15', 'start_time' => '14:00:00', 'duration_hours' => 3.0, 'price' => 85.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 4, 'title' => 'Leather Belt Making', 'description' => 'Learn how to cut, stitch and finish a genuine leather belt. Take home a belt you made yourself.', 'date' => '2026-05-20', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 75.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 4, 'title' => 'Leather Card Wallet Workshop', 'description' => 'Make your own slim leather card wallet using traditional hand stitching techniques.', 'date' => '2026-06-10', 'start_time' => '14:00:00', 'duration_hours' => 2.5, 'price' => 60.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 5, 'title' => 'Introduction to Weaving', 'description' => 'Learn the basics of loom weaving and take home your own woven piece. All materials included.', 'date' => '2026-06-07', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 70.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 5, 'title' => 'Natural Dyeing Workshop', 'description' => 'Learn how to dye natural fibres using plants and flowers. Take home your own dyed yarn.', 'date' => '2026-06-21', 'start_time' => '10:00:00', 'duration_hours' => 3.5, 'price' => 65.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 6, 'title' => 'Glass Blowing Taster', 'description' => 'Experience the magic of glass blowing in a supervised taster session. Create a small glass ornament.', 'date' => '2026-05-25', 'start_time' => '10:00:00', 'duration_hours' => 2.0, 'price' => 90.00, 'max_capacity' => 4, 'is_active' => true],
            ['artisan_id' => 6, 'title' => 'Fused Glass Art', 'description' => 'Create your own fused glass artwork to hang in your home. Kiln fired and ready to collect the next day.', 'date' => '2026-06-08', 'start_time' => '13:00:00', 'duration_hours' => 2.5, 'price' => 75.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 7, 'title' => 'Beginners Pottery Class', 'description' => 'A relaxed introduction to pottery for complete beginners. Make a small pot or bowl to take home.', 'date' => '2026-05-18', 'start_time' => '11:00:00', 'duration_hours' => 2.5, 'price' => 55.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 7, 'title' => 'Raku Firing Workshop', 'description' => 'Experience the ancient Japanese technique of Raku firing. Create and fire your own ceramic piece.', 'date' => '2026-06-20', 'start_time' => '10:00:00', 'duration_hours' => 5.0, 'price' => 110.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 8, 'title' => 'Furniture Restoration Basics', 'description' => 'Learn how to restore and upcycle old wooden furniture. Bring a small piece of your own to work on.', 'date' => '2026-05-31', 'start_time' => '09:00:00', 'duration_hours' => 5.0, 'price' => 90.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 8, 'title' => 'Wooden Spoon Carving', 'description' => 'Carve your own wooden spoon from a piece of green wood using hand tools. Very relaxing and rewarding.', 'date' => '2026-06-13', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 60.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 9, 'title' => 'Wire Wrapping Jewellery', 'description' => 'Learn the art of wire wrapping to create beautiful pendants and rings. All materials provided.', 'date' => '2026-05-22', 'start_time' => '14:00:00', 'duration_hours' => 2.5, 'price' => 55.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 9, 'title' => 'Beaded Bracelet Making', 'description' => 'Make your own beaded bracelet using semi precious stones and sterling silver findings.', 'date' => '2026-06-12', 'start_time' => '11:00:00', 'duration_hours' => 2.0, 'price' => 45.00, 'max_capacity' => 12, 'is_active' => true],
            ['artisan_id' => 10, 'title' => 'Macrame Wall Hanging', 'description' => 'Create a beautiful macrame wall hanging using natural cotton rope. Suitable for all skill levels.', 'date' => '2026-05-28', 'start_time' => '13:00:00', 'duration_hours' => 3.0, 'price' => 60.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 10, 'title' => 'Basket Weaving Introduction', 'description' => 'Learn the traditional craft of basket weaving using natural willow. Take home your own handmade basket.', 'date' => '2026-06-18', 'start_time' => '10:00:00', 'duration_hours' => 4.0, 'price' => 80.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 11, 'title' => 'Leather Embossing Workshop', 'description' => 'Learn how to emboss decorative patterns onto leather. Create a small embossed leather piece to take home.', 'date' => '2026-06-03', 'start_time' => '14:00:00', 'duration_hours' => 2.5, 'price' => 65.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 12, 'title' => 'Pinch Pot Ceramics', 'description' => 'Learn the oldest pottery technique — pinch pots. Create a set of small decorative pots to take home.', 'date' => '2026-05-16', 'start_time' => '10:00:00', 'duration_hours' => 2.0, 'price' => 45.00, 'max_capacity' => 12, 'is_active' => true],
            ['artisan_id' => 12, 'title' => 'Ceramic Tile Making', 'description' => 'Design and make your own decorative ceramic tiles. Great for personalised home decor.', 'date' => '2026-06-25', 'start_time' => '11:00:00', 'duration_hours' => 3.0, 'price' => 65.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 13, 'title' => 'Relief Wood Carving', 'description' => 'Learn relief wood carving techniques to create decorative panels. All tools and timber provided.', 'date' => '2026-05-30', 'start_time' => '09:00:00', 'duration_hours' => 4.0, 'price' => 85.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 14, 'title' => 'Mosaic Art Workshop', 'description' => 'Create your own mosaic artwork using coloured glass and ceramic tiles. All materials provided.', 'date' => '2026-06-04', 'start_time' => '13:00:00', 'duration_hours' => 3.0, 'price' => 70.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 15, 'title' => 'Gold Leaf Jewellery', 'description' => 'Learn how to work with gold leaf to create unique jewellery pieces. All materials included.', 'date' => '2026-06-17', 'start_time' => '11:00:00', 'duration_hours' => 3.5, 'price' => 100.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 15, 'title' => 'Earring Making Workshop', 'description' => 'Make two pairs of sterling silver earrings from scratch. A fun and rewarding workshop for all levels.', 'date' => '2026-07-01', 'start_time' => '14:00:00', 'duration_hours' => 3.0, 'price' => 85.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 16, 'title' => 'Soy Candle Making', 'description' => 'Learn to make your own hand poured soy candles with essential oils. Take home three finished candles.', 'date' => '2026-05-15', 'start_time' => '10:00:00', 'duration_hours' => 2.5, 'price' => 55.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 17, 'title' => 'Introduction to Blacksmithing', 'description' => 'Experience the heat of the forge and learn basic blacksmithing techniques. Make a small hook or bottle opener.', 'date' => '2026-05-22', 'start_time' => '09:00:00', 'duration_hours' => 4.0, 'price' => 95.00, 'max_capacity' => 4, 'is_active' => true],
            ['artisan_id' => 18, 'title' => 'Linocut Printing for Beginners', 'description' => 'Learn the art of linocut printmaking. Design, carve and print your own limited edition artwork.', 'date' => '2026-06-06', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 60.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 19, 'title' => 'Wood Kiln Firing Experience', 'description' => 'Join a three day wood kiln firing experience. Load, fire and unpack a traditional wood kiln.', 'date' => '2026-07-10', 'start_time' => '08:00:00', 'duration_hours' => 8.0, 'price' => 150.00, 'max_capacity' => 6, 'is_active' => true],
            ['artisan_id' => 20, 'title' => 'Aran Knitting Masterclass', 'description' => 'Learn the traditional Aran cable knitting patterns passed down through generations. All yarn provided.', 'date' => '2026-06-14', 'start_time' => '13:00:00', 'duration_hours' => 3.5, 'price' => 70.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 21, 'title' => 'Woodturning Taster Session', 'description' => 'Try your hand at the lathe and turn a small wooden bowl or pen. All materials and safety gear provided.', 'date' => '2026-06-21', 'start_time' => '10:00:00', 'duration_hours' => 3.0, 'price' => 75.00, 'max_capacity' => 4, 'is_active' => true],
            ['artisan_id' => 22, 'title' => 'Garden Mosaic Workshop', 'description' => 'Create a beautiful mosaic stepping stone for your garden using reclaimed tiles and glass.', 'date' => '2026-06-28', 'start_time' => '10:00:00', 'duration_hours' => 3.5, 'price' => 65.00, 'max_capacity' => 10, 'is_active' => true],
            ['artisan_id' => 23, 'title' => 'Leather Journal Making', 'description' => 'Handstitch a beautiful leather journal from scratch. Learn traditional saddle stitching and edge finishing.', 'date' => '2026-07-05', 'start_time' => '11:00:00', 'duration_hours' => 3.0, 'price' => 80.00, 'max_capacity' => 8, 'is_active' => true],
            ['artisan_id' => 24, 'title' => 'Gemstone Setting Workshop', 'description' => 'Learn professional stone setting techniques. Set a gemstone in a sterling silver ring you make yourself.', 'date' => '2026-07-12', 'start_time' => '10:00:00', 'duration_hours' => 4.0, 'price' => 110.00, 'max_capacity' => 6, 'is_active' => true],
        ];

        foreach ($workshops as $workshop) {
            Workshop::create($workshop);
        }

        $reviews = [
            ['user_id' => 27, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Absolutely stunning work', 'body' => 'Niamh made a set of mugs for us as a wedding gift. The quality is incredible and she was so easy to deal with.'],
            ['user_id' => 28, 'artisan_id' => 1, 'rating' => 4, 'title' => 'Really lovely pieces', 'body' => 'Bought a bowl and a side plate. Beautifully made and arrived well packaged. Would definitely order again.'],
            ['user_id' => 29, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Best ceramics I have ever bought', 'body' => 'I stumbled across this listing and I am so glad I did. The craftsmanship is on another level.'],
            ['user_id' => 30, 'artisan_id' => 1, 'rating' => 4, 'title' => 'Great workshop experience', 'body' => 'Attended the wheel throwing workshop. Niamh is a brilliant teacher and so patient. Highly recommend.'],
            ['user_id' => 31, 'artisan_id' => 1, 'rating' => 5, 'title' => 'Perfect gift', 'body' => 'Ordered a custom piece as a birthday gift. Niamh was great to communicate with and the finished product was perfect.'],
            ['user_id' => 27, 'artisan_id' => 2, 'rating' => 5, 'title' => 'Incredible craftsmanship', 'body' => 'Conor built a dining table for us. It is absolutely beautiful and built to last generations. Worth every cent.'],
            ['user_id' => 28, 'artisan_id' => 2, 'rating' => 5, 'title' => 'Outstanding quality', 'body' => 'Had a custom bookshelf made. The attention to detail is unreal. Everyone who visits comments on it.'],
            ['user_id' => 29, 'artisan_id' => 2, 'rating' => 4, 'title' => 'Very happy with my order', 'body' => 'Ordered a small side table. Took a few weeks but the wait was worth it. Really solid piece of furniture.'],
            ['user_id' => 27, 'artisan_id' => 3, 'rating' => 4, 'title' => 'Beautiful jewellery', 'body' => 'Bought a silver necklace for my mam. She absolutely loves it. Really delicate and well made.'],
            ['user_id' => 28, 'artisan_id' => 3, 'rating' => 5, 'title' => 'Stunning pieces', 'body' => 'Aoife made a custom engagement ring for me. It is exactly what I wanted and the whole process was great.'],
            ['user_id' => 29, 'artisan_id' => 4, 'rating' => 5, 'title' => 'Best leather wallet I have owned', 'body' => 'Bought a bifold wallet. The leather quality is top notch and it has aged really well after a few months of use.'],
            ['user_id' => 30, 'artisan_id' => 4, 'rating' => 4, 'title' => 'Really solid work', 'body' => 'Bought a leather card holder. Small but perfectly made. You can tell a lot of care went into it.'],
            ['user_id' => 28, 'artisan_id' => 5, 'rating' => 4, 'title' => 'Gorgeous throw', 'body' => 'Bought a wool throw for the couch. Really well made and the colours are lovely. Great addition to the living room.'],
            ['user_id' => 29, 'artisan_id' => 5, 'rating' => 5, 'title' => 'Unique and beautiful', 'body' => 'Bought a wall hanging. It is a real statement piece and completely unique. So happy with it.'],
            ['user_id' => 27, 'artisan_id' => 6, 'rating' => 5, 'title' => 'Magical glass blowing experience', 'body' => 'Did the glass blowing taster session. One of the most unique experiences I have ever had. Padraig is a brilliant teacher.'],
            ['user_id' => 30, 'artisan_id' => 6, 'rating' => 4, 'title' => 'Beautiful glass pieces', 'body' => 'Bought a handblown vase as a housewarming gift. It was a real talking point at the party.'],
            ['user_id' => 28, 'artisan_id' => 7, 'rating' => 5, 'title' => 'Loved the pottery class', 'body' => 'Did the beginners pottery class with Sinead. She is so patient and encouraging. Left with a pot I am actually proud of.'],
            ['user_id' => 29, 'artisan_id' => 7, 'rating' => 4, 'title' => 'Really lovely studio', 'body' => 'Visited Sinead to pick up a commission. The studio is beautiful and the work on display is stunning.'],
            ['user_id' => 27, 'artisan_id' => 8, 'rating' => 5, 'title' => 'Amazing bespoke table', 'body' => 'Declan made a custom dining table for our new home. The quality is extraordinary and it arrived on time.'],
            ['user_id' => 31, 'artisan_id' => 8, 'rating' => 5, 'title' => 'Wood carving workshop was brilliant', 'body' => 'Did the wooden spoon carving workshop. Declan is so knowledgeable and the whole day was really enjoyable.'],
            ['user_id' => 28, 'artisan_id' => 9, 'rating' => 4, 'title' => 'Lovely silver jewellery', 'body' => 'Bought a pair of Celtic knot earrings for my sister. She was absolutely delighted with them.'],
            ['user_id' => 30, 'artisan_id' => 10, 'rating' => 5, 'title' => 'Beautiful macrame piece', 'body' => 'Attended the macrame wall hanging workshop. Fionnuala is a wonderful teacher and I left with a piece I am so proud of.'],
            ['user_id' => 27, 'artisan_id' => 11, 'rating' => 4, 'title' => 'Quality leather goods', 'body' => 'Bought a handmade leather bag. The stitching is perfect and the leather is really high quality.'],
            ['user_id' => 29, 'artisan_id' => 12, 'rating' => 5, 'title' => 'Wonderful ceramics workshop', 'body' => 'Did the pinch pot class with Aisling. She makes everything so accessible and fun. Will definitely be back.'],
            ['user_id' => 28, 'artisan_id' => 13, 'rating' => 5, 'title' => 'Incredible wood carving skills', 'body' => 'Tadhg carved a custom piece for our fireplace mantle. The detail is incredible and he was a pleasure to work with.'],
            ['user_id' => 31, 'artisan_id' => 14, 'rating' => 4, 'title' => 'Stunning stained glass', 'body' => 'Grainne made a custom stained glass panel for our front door. It completely transforms the hallway.'],
            ['user_id' => 27, 'artisan_id' => 15, 'rating' => 5, 'title' => 'Beautiful wedding rings', 'body' => 'Eoghan made our wedding rings. They are absolutely perfect and exactly what we wanted. Could not recommend him more.'],
            ['user_id' => 30, 'artisan_id' => 15, 'rating' => 5, 'title' => 'Exceptional jewellery maker', 'body' => 'Had a custom necklace made as an anniversary gift. Eoghan communicated brilliantly throughout and the result was stunning.'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}