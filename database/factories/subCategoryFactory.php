<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subCategory>
 */
class subCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $rowIndex = 0;
        
        $subCategories = [
            /*[
                'name' => 'Petite section',
                'category_id' => 1,
            ],
            [
                'name' => 'Crayons de couleur',
                'category_id' => 2,
            ],
            [
                'name' => 'Brosse pour tableau',
                'category_id' => 2,
            ],
            [
                'name' => 'Romans arabes',
                'category_id' => 1, 
            ],*/
            [
                'name' => 'Feutres de couleur',
                'category_id' => 2,
            ],
            [
                'name' => 'Craie',
                'category_id' => 2,
            ],
            [
                'name' => 'Feutres de tableau',
                'category_id' => 2,
            ],
            [
                'name' => 'Colles',
                'category_id' => 2,
            ],
            [
                'name' => 'Gommes',
                'category_id' => 2,
            ],
            [
                'name' => 'Taille crayons',
                'category_id' => 2,
            ],

            // Add more category data as needed
        ];
        
        $subCategory = $subCategories[$rowIndex];
        $rowIndex = ($rowIndex + 1) % count($subCategories);
        
        return $subCategory;
    }
}
