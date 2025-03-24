<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        try {            
            $categoriesData = [
                ['name' => 'Stores', 'description' => 'Various stores for buying and selling goods.'],
                ['name' => 'Real Estate for Sale', 'description' => 'Properties available for sale including houses, apartments, and land.'],
                ['name' => 'Real Estate for Rent', 'description' => 'Properties available for rent including houses, apartments, and commercial spaces.'],
                ['name' => 'Vehicles', 'description' => 'Cars, trucks, and other vehicles for sale or trade.'],
                ['name' => 'Motorcycles', 'description' => 'Motorcycles for sale, from sport to cruiser bikes.'],
                ['name' => 'Services', 'description' => 'Various services including home maintenance, business services, and personal services.'],
                ['name' => 'Men Fashion', 'description' => 'Fashionable clothing and accessories for men.'],
                ['name' => 'Women Fashion', 'description' => 'Trendy clothing and accessories for women.'],
                ['name' => 'Kids and Toys', 'description' => 'Everything for children, from toys to clothes and accessories.'],
                ['name' => 'Jobs', 'description' => 'Job listings for various positions in multiple industries.'],
                ['name' => 'Mobile Phones and Tablets', 'description' => 'Smartphones, tablets, and related accessories for sale.'],
                ['name' => 'Laptops and Computers', 'description' => 'Laptops, desktop computers, and computer accessories for sale.'],
                ['name' => 'Education and Training', 'description' => 'Educational courses, tutorials, and training programs for various fields.'],
                ['name' => 'Video Games and Accessories', 'description' => 'Video games, consoles, and gaming accessories.'],
                ['name' => 'Electronics', 'description' => 'Electronics including gadgets, home appliances, and personal devices.'],
                ['name' => 'Sports and Fitness', 'description' => 'Sports equipment and fitness gear for active lifestyles.'],
                ['name' => 'Books and Hobbies', 'description' => 'Books, reading materials, and hobby-related products.'],
                ['name' => 'Pets', 'description' => 'Pets, pet supplies, and accessories for animal lovers.'],
                ['name' => 'Business Equipment', 'description' => 'Tools and equipment for businesses, including machinery and office supplies.'],
                ['name' => 'Home and Garden', 'description' => 'Furniture, home décor, and gardening supplies for your home and garden.'],
                ['name' => 'Food and Beverages', 'description' => 'Fresh food, groceries, and beverages for everyday needs.'],
            ];

            
            foreach ($categoriesData as $categoryData) {
            
                $category = Category::create([
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'],
                    'status' => 1, 
                    'parent_id' => null, 
                ]);

                
                CategoryTranslation::updateOrCreate(
                    ['category_id' => $category->id, 'locale' => 'en'],
                    ['name' => $categoryData['name'], 'description' => $categoryData['description']]
                );             
                $this->addArabicTranslation($category);             
                $this->addCategoryImage($category);
            }

            DB::commit();
            $this->command->info('Parent categories and translations have been added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            $this->command->error('Error while adding categories: ' . $e->getMessage());
        }
    }

    private function addArabicTranslation($category)
    {
        $arabicTranslations = [
            'Stores' => 'متاجر',
            'Real Estate for Sale' => 'عقارات للبيع',
            'Real Estate for Rent' => 'عقارات للإيجار',
            'Vehicles' => 'مركبات',
            'Motorcycles' => 'دراجات نارية',
            'Services' => 'الخدمات',
            'Men Fashion' => 'أزياء رجالية',
            'Women Fashion' => 'أزياء نسائية',
            'Kids and Toys' => 'أطفال وألعاب',
            'Jobs' => 'وظائف',
            'Mobile Phones and Tablets' => 'هواتف موبايل و تابلت',
            'Laptops and Computers' => 'لابتوبات وكمبيوترات',
            'Education and Training' => 'تعليم وتدريب',
            'Video Games and Accessories' => 'ألعاب فيديو وملحقاتها',
            'Electronics' => 'إلكترونيات',
            'Sports and Fitness' => 'رياضة ولياقة بدنية',
            'Books and Hobbies' => 'كتب وهوايات',
            'Pets' => 'حيوانات',
            'Business Equipment' => 'معدات شركات',
            'Home and Garden' => 'منزل وحديقة',
            'Food and Beverages' => 'طعام وغذاء',
        ];            
        if (isset($arabicTranslations[$category->name])) {
            CategoryTranslation::updateOrCreate(
                ['category_id' => $category->id, 'locale' => 'ar'],
                ['name' => $arabicTranslations[$category->name], 'description' => $category->description]
            );
        }
    }

    private function addCategoryImage($category)
    {        
        $imagePath = public_path("Dashboard/img/Category/{$category->name}.jpg");        
        if (file_exists($imagePath)) {          
            $image = new Image();
            $image->filename = "{$category->name}.jpg"; 
            $image->imageable_id = $category->id;
            $image->imageable_type = 'App\Models\Category';
            $image->save();
        }
    }
}
