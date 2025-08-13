<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'rank_id' => 1,
                'details' => 'Latest electronic gadgets and devices',
                'image' => 'electronics.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'rank_id' => 2,
                'details' => 'Trendy fashion items and accessories',
                'image' => 'fashion.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-living',
                'rank_id' => 3,
                'details' => 'Home decor and living essentials',
                'image' => 'home-living.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'name' => 'Sports & Outdoor',
                'slug' => 'sports-outdoor',
                'rank_id' => 4,
                'details' => 'Sports equipment and outdoor gear',
                'image' => 'sports-outdoor.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'name' => 'Books & Stationery',
                'slug' => 'books-stationery',
                'rank_id' => 5,
                'details' => 'Books, notebooks, and office supplies',
                'image' => 'books-stationery.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create SubCategories
        $subCategories = [
            // Electronics SubCategories
            [
                'category_id' => 1,
                'name' => 'Smartphones',
                'slug' => 'smartphones',
                'image' => 'smartphones.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 1,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'image' => 'laptops.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 1,
                'name' => 'Headphones',
                'slug' => 'headphones',
                'image' => 'headphones.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Fashion SubCategories
            [
                'category_id' => 2,
                'name' => 'Men\'s Clothing',
                'slug' => 'mens-clothing',
                'image' => 'mens-clothing.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 2,
                'name' => 'Women\'s Clothing',
                'slug' => 'womens-clothing',
                'image' => 'womens-clothing.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 2,
                'name' => 'Shoes',
                'slug' => 'shoes',
                'image' => 'shoes.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Home & Living SubCategories
            [
                'category_id' => 3,
                'name' => 'Furniture',
                'slug' => 'furniture',
                'image' => 'furniture.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 3,
                'name' => 'Kitchen Appliances',
                'slug' => 'kitchen-appliances',
                'image' => 'kitchen-appliances.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Sports SubCategories
            [
                'category_id' => 4,
                'name' => 'Fitness Equipment',
                'slug' => 'fitness-equipment',
                'image' => 'fitness-equipment.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 4,
                'name' => 'Outdoor Gear',
                'slug' => 'outdoor-gear',
                'image' => 'outdoor-gear.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Books SubCategories
            [
                'category_id' => 5,
                'name' => 'Fiction Books',
                'slug' => 'fiction-books',
                'image' => 'fiction-books.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'category_id' => 5,
                'name' => 'Office Supplies',
                'slug' => 'office-supplies',
                'image' => 'office-supplies.jpg',
                'status' => 'a',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ]
        ];

        foreach ($subCategories as $subCategoryData) {
            SubCategory::create($subCategoryData);
        }

        // Create Products
        $products = [
            // Electronics Products
            [
                'code' => 'P001',
                'name' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max-' . time(),
                'category_id' => 1,
                'sub_category_id' => 1,
                'price' => 129999.00,
                'discount' => 5000.00,
                'short_details' => 'Latest iPhone with A17 Pro chip, 48MP camera, and titanium design',
                'description' => 'The iPhone 15 Pro Max features the most advanced camera system ever on iPhone, with a 48MP Main camera that captures incredible detail. The A17 Pro chip delivers breakthrough performance and enables new gaming experiences.',
                'image' => 'iphone-15-pro-max.jpg',
                'thum_image' => 'thumb-iphone-15-pro-max.jpg',
                'is_popular' => 1,
                'is_arrival' => 1,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P002',
                'name' => 'MacBook Air M2',
                'slug' => 'macbook-air-m2-' . time(),
                'category_id' => 1,
                'sub_category_id' => 2,
                'price' => 159999.00,
                'discount' => 10000.00,
                'short_details' => 'Ultra-thin laptop with M2 chip, 13.6-inch Liquid Retina display',
                'description' => 'The MacBook Air with M2 chip features a stunning 13.6-inch Liquid Retina display, up to 18 hours of battery life, and a fanless design for silent operation.',
                'image' => 'macbook-air-m2.jpg',
                'thum_image' => 'thumb-macbook-air-m2.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P003',
                'name' => 'Sony WH-1000XM5',
                'slug' => 'sony-wh-1000xm5-' . time(),
                'category_id' => 1,
                'sub_category_id' => 3,
                'price' => 45999.00,
                'discount' => 5000.00,
                'short_details' => 'Industry-leading noise canceling wireless headphones',
                'description' => 'Experience the ultimate in noise canceling technology with the Sony WH-1000XM5. Features 30-hour battery life, quick charge, and exceptional sound quality.',
                'image' => 'sony-wh-1000xm5.jpg',
                'thum_image' => 'thumb-sony-wh-1000xm5.jpg',
                'is_popular' => 0,
                'is_arrival' => 1,
                'is_offer' => 0,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Fashion Products
            [
                'code' => 'P004',
                'name' => 'Men\'s Premium Cotton T-Shirt',
                'slug' => 'mens-premium-cotton-tshirt-' . time(),
                'category_id' => 2,
                'sub_category_id' => 4,
                'price' => 1299.00,
                'discount' => 200.00,
                'short_details' => '100% organic cotton, comfortable fit, multiple colors available',
                'description' => 'Made from 100% organic cotton, this premium t-shirt offers ultimate comfort and breathability. Available in multiple colors and sizes.',
                'image' => 'mens-cotton-tshirt.jpg',
                'thum_image' => 'thumb-mens-cotton-tshirt.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P005',
                'name' => 'Women\'s Summer Dress',
                'slug' => 'womens-summer-dress-' . time(),
                'category_id' => 2,
                'sub_category_id' => 5,
                'price' => 2499.00,
                'discount' => 500.00,
                'short_details' => 'Lightweight summer dress with floral pattern',
                'description' => 'Perfect for summer days, this lightweight dress features a beautiful floral pattern and comfortable fit. Made from breathable fabric.',
                'image' => 'womens-summer-dress.jpg',
                'thum_image' => 'thumb-womens-summer-dress.jpg',
                'is_popular' => 0,
                'is_arrival' => 1,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P006',
                'name' => 'Nike Air Max 270',
                'slug' => 'nike-air-max-270-' . time(),
                'category_id' => 2,
                'sub_category_id' => 6,
                'price' => 12999.00,
                'discount' => 2000.00,
                'short_details' => 'Comfortable running shoes with Air Max technology',
                'description' => 'The Nike Air Max 270 delivers unrivaled comfort with its large Air unit. Perfect for running and everyday wear.',
                'image' => 'nike-air-max-270.jpg',
                'thum_image' => 'thumb-nike-air-max-270.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Home & Living Products
            [
                'code' => 'P007',
                'name' => 'Modern Coffee Table',
                'slug' => 'modern-coffee-table-' . time(),
                'category_id' => 3,
                'sub_category_id' => 7,
                'price' => 15999.00,
                'discount' => 3000.00,
                'short_details' => 'Contemporary design coffee table with storage',
                'description' => 'This modern coffee table features a sleek design with built-in storage. Perfect for living rooms and adds elegance to any space.',
                'image' => 'modern-coffee-table.jpg',
                'thum_image' => 'thumb-modern-coffee-table.jpg',
                'is_popular' => 0,
                'is_arrival' => 1,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P008',
                'name' => 'Kitchen Blender',
                'slug' => 'kitchen-blender-' . time(),
                'category_id' => 3,
                'sub_category_id' => 8,
                'price' => 3999.00,
                'discount' => 500.00,
                'short_details' => 'High-speed blender for smoothies and food processing',
                'description' => 'This powerful blender can handle everything from smoothies to food processing. Features multiple speed settings and easy cleaning.',
                'image' => 'kitchen-blender.jpg',
                'thum_image' => 'thumb-kitchen-blender.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 0,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Sports Products
            [
                'code' => 'P009',
                'name' => 'Yoga Mat Premium',
                'slug' => 'yoga-mat-premium-' . time(),
                'category_id' => 4,
                'sub_category_id' => 9,
                'price' => 1999.00,
                'discount' => 300.00,
                'short_details' => 'Non-slip yoga mat with carrying strap',
                'description' => 'Premium yoga mat with excellent grip and cushioning. Includes carrying strap for easy transport.',
                'image' => 'yoga-mat-premium.jpg',
                'thum_image' => 'thumb-yoga-mat-premium.jpg',
                'is_popular' => 0,
                'is_arrival' => 1,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P010',
                'name' => 'Camping Tent 4-Person',
                'slug' => 'camping-tent-4-person-' . time(),
                'category_id' => 4,
                'sub_category_id' => 10,
                'price' => 8999.00,
                'discount' => 1000.00,
                'short_details' => 'Waterproof camping tent for 4 people',
                'description' => 'Spacious 4-person camping tent with waterproof material. Easy to set up and includes carrying bag.',
                'image' => 'camping-tent-4-person.jpg',
                'thum_image' => 'thumb-camping-tent-4-person.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            // Books Products
            [
                'code' => 'P011',
                'name' => 'The Great Gatsby',
                'slug' => 'the-great-gatsby-' . time(),
                'category_id' => 5,
                'sub_category_id' => 11,
                'price' => 599.00,
                'discount' => 100.00,
                'short_details' => 'Classic novel by F. Scott Fitzgerald',
                'description' => 'A masterpiece of American literature, The Great Gatsby explores themes of decadence, idealism, and the American Dream.',
                'image' => 'the-great-gatsby.jpg',
                'thum_image' => 'thumb-the-great-gatsby.jpg',
                'is_popular' => 1,
                'is_arrival' => 0,
                'is_offer' => 0,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ],
            [
                'code' => 'P012',
                'name' => 'Premium Notebook Set',
                'slug' => 'premium-notebook-set-' . time(),
                'category_id' => 5,
                'sub_category_id' => 12,
                'price' => 899.00,
                'discount' => 150.00,
                'short_details' => 'Set of 3 premium notebooks with leather cover',
                'description' => 'High-quality notebook set with leather covers. Perfect for journaling, note-taking, or as a gift.',
                'image' => 'premium-notebook-set.jpg',
                'thum_image' => 'thumb-premium-notebook-set.jpg',
                'is_popular' => 0,
                'is_arrival' => 1,
                'is_offer' => 1,
                'status' => 'A',
                'save_by' => 1,
                'ip_address' => '127.0.0.1'
            ]
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);
            
            // Create inventory for each product
            Inventory::create([
                'product_id' => $product->id,
                'purchage' => rand(50, 200),
                'sales' => rand(0, 30),
                'return' => rand(0, 5)
            ]);

            // Create product images for some products
            if (in_array($product->code, ['P001', 'P002', 'P004', 'P006'])) {
                for ($i = 1; $i <= 3; $i++) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'otherImage' => $product->slug . '-image-' . $i . '.jpg'
                    ]);
                }
            }
        }
    }
}
