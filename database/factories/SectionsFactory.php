<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


           'grade'=>$this->faker->randomElement([

           'Grade 11',
           'Grade 12'

            ]),

           'strand'=>$this->faker->randomElement([

            'HUMMS',
            'GAS',
            'TVL',
            'COOKERY',
            'ICT',
            'ABM',
            'STEM'

            ]),

           'lower_gwa'=>$this->faker->randomElement([

           '75'

            ]),
           'upper_gwa'=>$this->faker->randomElement([

           '85'

            ]),

            'admission_limit'=>$this->faker->randomElement([

           '30'

            ]),

           'admission_status'=>$this->faker->randomElement([

           'Yes'

            ]),
       
        ];
    }
}
