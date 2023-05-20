<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $rowIndex = 0;
        
        $categories = [
            [
                'name' => 'Livres',
            ],
            [
                'name' => 'Fournitures scolaires',
            ],
            // Add more category data as needed
        ];
        
        $category = $categories[$rowIndex];
        $rowIndex = ($rowIndex + 1) % count($categories);
        
        return $category;
        /*return [
            //insert multiple rows
            'name' => 'Livres',

            //add another row

        ];*/
    }
}
