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
            'Stores' => ['name' => 'متاجر', 'description' => 'متاجر لبيع وشراء السلع.'],
            'Real Estate for Sale' => ['name' => 'عقارات للبيع', 'description' => 'عقارات متاحة للبيع بما في ذلك المنازل والشقق والأراضي.'],
            'Real Estate for Rent' => ['name' => 'عقارات للإيجار', 'description' => 'عقارات متاحة للإيجار بما في ذلك المنازل والشقق والمساحات التجارية.'],
            'Vehicles' => ['name' => 'مركبات', 'description' => 'سيارات وشاحنات ومركبات أخرى للبيع أو للتبادل.'],
            'Motorcycles' => ['name' => 'دراجات نارية', 'description' => 'دراجات نارية للبيع، من الدراجات الرياضية إلى الدراجات الكروز.'],
            'Services' => ['name' => 'الخدمات', 'description' => 'خدمات متنوعة بما في ذلك الصيانة المنزلية وخدمات الأعمال والخدمات الشخصية.'],
            'Men Fashion' => ['name' => 'أزياء رجالية', 'description' => 'ملابس واكسسوارات عصرية للرجال.'],
            'Women Fashion' => ['name' => 'أزياء نسائية', 'description' => 'ملابس واكسسوارات عصرية للنساء.'],
            'Kids and Toys' => ['name' => 'أطفال وألعاب', 'description' => 'كل شيء للأطفال من ألعاب وملابس واكسسوارات.'],
            'Jobs' => ['name' => 'وظائف', 'description' => 'إعلانات وظائف لمناصب مختلفة في صناعات متعددة.'],
            'Mobile Phones and Tablets' => ['name' => 'هواتف موبايل و تابلت', 'description' => 'هواتف ذكية وأجهزة تابلت وملحقاتها للبيع.'],
            'Laptops and Computers' => ['name' => 'لابتوبات وكمبيوترات', 'description' => 'لابتوبات وأجهزة كمبيوتر مكتبية وملحقات كمبيوتر للبيع.'],
            'Education and Training' => ['name' => 'تعليم وتدريب', 'description' => 'دورات تعليمية وبرامج تدريبية في مجالات متنوعة.'],
            'Video Games and Accessories' => ['name' => 'ألعاب فيديو وملحقاتها', 'description' => 'ألعاب الفيديو، الأجهزة، وملحقاتها.'],
            'Electronics' => ['name' => 'إلكترونيات', 'description' => 'إلكترونيات بما في ذلك الأجهزة المنزلية والأدوات الشخصية.'],
            'Sports and Fitness' => ['name' => 'رياضة ولياقة بدنية', 'description' => 'معدات رياضية وأدوات لياقة بدنية لأسلوب حياة نشط.'],
            'Books and Hobbies' => ['name' => 'كتب وهوايات', 'description' => 'كتب ومواد للقراءة ومنتجات متعلقة بالهوايات.'],
            'Pets' => ['name' => 'حيوانات', 'description' => 'حيوانات أليفة، مستلزمات حيوانات، واكسسوارات لمحبي الحيوانات.'],
            'Business Equipment' => ['name' => 'معدات شركات', 'description' => 'أدوات ومعدات للأعمال بما في ذلك الآلات وملحقات المكاتب.'],
            'Home and Garden' => ['name' => 'منزل وحديقة', 'description' => 'أثاث منزلي، ديكورات، ولوازم البستنة لمنزلك وحديقتك.'],
            'Food and Beverages' => ['name' => 'طعام وغذاء', 'description' => 'طعام طازج، بقالة، ومشروبات للاحتياجات اليومية.'],
        ];

        if (isset($arabicTranslations[$category->name])) {
            CategoryTranslation::updateOrCreate(
                ['category_id' => $category->id, 'locale' => 'ar'],
                [
                    'name' => $arabicTranslations[$category->name]['name'],
                    'description' => $arabicTranslations[$category->name]['description']
                ]
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
