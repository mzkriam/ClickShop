<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChildCategorySeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        try {
            $realEstateForSale = CategoryTranslation::where('name', 'Real Estate for Sale')->first();
            $categoriesData = [
                ['name' => 'Apartments for Sale', 'description' => 'Various apartments available for sale.'],
                ['name' => 'Villas - Palaces for Sale', 'description' => 'Villas and palaces available for sale.'],
                ['name' => 'Houses - Homes for Sale', 'description' => 'Houses and homes available for sale.'],
                ['name' => 'Land for Sale', 'description' => 'Land plots available for sale.'],
                ['name' => 'Farms and Chalets for Sale', 'description' => 'Farms and chalets available for sale.'],
                ['name' => 'Buildings for Sale', 'description' => 'Residential and commercial buildings available for sale.'],
                ['name' => 'Offices for Sale', 'description' => 'Office spaces available for sale.'],
                ['name' => 'Shops for Sale', 'description' => 'Shops available for sale.'],
                ['name' => 'Complexes for Sale', 'description' => 'Commercial complexes available for sale.'],
                ['name' => 'Exhibitions for Sale', 'description' => 'Exhibition spaces available for sale.'],
                ['name' => 'Restaurants and Cafes for Sale', 'description' => 'Restaurants and cafes available for sale.'],
                ['name' => 'Warehouses for Sale', 'description' => 'Warehouses available for sale.'],
                ['name' => 'Supermarkets for Sale', 'description' => 'Supermarkets available for sale.'],
                ['name' => 'Clinics for Sale', 'description' => 'Medical clinics available for sale.'],
                ['name' => 'Commercial Villas for Sale', 'description' => 'Commercial villas available for sale.'],
                ['name' => 'Whole Floor for Sale', 'description' => 'Entire floors available for sale.'],
                ['name' => 'Hotels for Sale', 'description' => 'Hotels available for sale.'],
                ['name' => 'Factories for Sale', 'description' => 'Factories available for sale.'],
                ['name' => 'Employee Housing for Sale', 'description' => 'Employee housing units available for sale.'],
                ['name' => 'Foreign Properties for Sale', 'description' => 'Foreign properties available for sale.'],
            ];

            foreach ($categoriesData as $categoryData) {

                $category = Category::create([
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'],
                    'status' => 1,
                    'parent_id' => $realEstateForSale->category_id,
                ]);


                CategoryTranslation::updateOrCreate(
                    ['category_id' => $category->id, 'locale' => 'en'],
                    ['name' => $categoryData['name'], 'description' => $categoryData['description']]
                );
                $this->addArabicTranslation($category);
            }

            DB::commit();
            $this->command->info('Real Estate categories and translations have been added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            $this->command->error('Error while adding categories: ' . $e->getMessage());
        }
    }

    private function addArabicTranslation($category)
    {
        $arabicTranslations = [
            'Apartments for Sale' => ['name' => 'شقق للبيع', 'description' => 'شقق متنوعة متاحة للبيع.'],
            'Villas - Palaces for Sale' => ['name' => 'فلل - قصور للبيع', 'description' => 'فلل وقصور متاحة للبيع.'],
            'Houses - Homes for Sale' => ['name' => 'بيوت - منازل للبيع', 'description' => 'منازل وبيوت متاحة للبيع.'],
            'Land for Sale' => ['name' => 'أراضي للبيع', 'description' => 'قطع أراضٍ متاحة للبيع.'],
            'Farms and Chalets for Sale' => ['name' => 'مزارع وشاليهات للبيع', 'description' => 'مزارع وشاليهات متاحة للبيع.'],
            'Buildings for Sale' => ['name' => 'بنايات للبيع', 'description' => 'مباني سكنية وتجارية متاحة للبيع.'],
            'Offices for Sale' => ['name' => 'مكاتب للبيع', 'description' => 'مساحات مكتبية متاحة للبيع.'],
            'Shops for Sale' => ['name' => 'محلات للبيع', 'description' => 'محلات متاحة للبيع.'],
            'Complexes for Sale' => ['name' => 'مجمعات للبيع', 'description' => 'مجمعات تجارية متاحة للبيع.'],
            'Exhibitions for Sale' => ['name' => 'معارض للبيع', 'description' => 'مساحات للمعارض متاحة للبيع.'],
            'Restaurants and Cafes for Sale' => ['name' => 'مطاعم وكافيهات للبيع', 'description' => 'مطاعم وكافيهات متاحة للبيع.'],
            'Warehouses for Sale' => ['name' => 'مخازن للبيع', 'description' => 'مخازن متاحة للبيع.'],
            'Supermarkets for Sale' => ['name' => 'سوبرماركت للبيع', 'description' => 'سوبرماركت متاح للبيع.'],
            'Clinics for Sale' => ['name' => 'عيادات للبيع', 'description' => 'عيادات طبية متاحة للبيع.'],
            'Commercial Villas for Sale' => ['name' => 'فلل تجارية للبيع', 'description' => 'فلل تجارية متاحة للبيع.'],
            'Whole Floor for Sale' => ['name' => 'طابق كامل للبيع', 'description' => 'طوابق كاملة متاحة للبيع.'],
            'Hotels for Sale' => ['name' => 'فنادق للبيع', 'description' => 'فنادق متاحة للبيع.'],
            'Factories for Sale' => ['name' => 'مصانع للبيع', 'description' => 'مصانع متاحة للبيع.'],
            'Employee Housing for Sale' => ['name' => 'سكن موظفين للبيع', 'description' => 'وحدات سكنية للموظفين متاحة للبيع.'],
            'Foreign Properties for Sale' => ['name' => 'عقارات أجنبية للبيع', 'description' => 'عقارات أجنبية متاحة للبيع.'],
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
}
