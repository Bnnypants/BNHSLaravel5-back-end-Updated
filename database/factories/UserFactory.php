<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
          $birthday = $this->faker->date($format = 'Y-m-d', $max = 'now');
          $age =  Carbon::parse($birthday)->age;
        return [
             'name' => strtoupper($this->faker->firstName()),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'middlename' => strtoupper($this->faker->lastName()),
            'lastname' => strtoupper($this->faker->lastName()),
            'lastschoolyearattended'=>$this->faker->randomElement([

            '2021',
            '2019',
            '2022'
            
            ]),
           'lastschoolattended'=>$this->faker->randomElement([
            'DALANGUIRING INTEGRATED SCHOOL',
            'URBIZTONDO INTEGRATED SCHOOL',
            'BAYAMBANG NATIONAL HIGHSCHOOL',
            'ABANON NATIONAL HIGHSCHOOL'

            ]),

           'lastgradelevelcompleted'=>$this->faker->randomElement([

   
           'Grade 11',
           'Grade 12'
            
            ]),
           'gradeleveltoenrolin'=>$this->faker->randomElement([

   
         
           'Grade 11',
           'Grade 12'
            
            
            ]),

           'strandtoenrolin'=>$this->faker->randomElement([

           'GAS',
           'ABM',
           'HUMMS',
           'TVL'

           ]),
          'accepted_as'=>$this->faker->randomElement([

           'Promoted',
       
           ]),
           'studenttype'=>$this->faker->randomElement([

           'Old Student',
           'Balik Aral/Returning Student',
           'Transferee/Moving In' 

           ]),

           'permanenthousenumber'=> $this->faker->regexify('[0-9]{4}'),
           'permanentzipcode'=> $this->faker->regexify('[0-9]{4}'),
           'permanentstreet'=>$this->faker->randomElement([

            'RIZAL',
            'BONIFACIO',
            'ABAD'
            
            ]),
            'permanentcountry'=>$this->faker->randomElement([

            'PHILIPPINES'

            ]),
           'permanentbaranggay'=>$this->faker->randomElement([

            'DALANGUIRING',
            'MALAYO',
            'REAL',
            'POBLACION'
                       
            ]),

            'birthplace'=>$this->faker->randomElement([

            'URBIZTONDO',
            'BAYAMBANG',
            'SAN CARLOS'
            
            ]),

           'permanentmunicipality'=>$this->faker->randomElement([

            'URBIZTONDO',
            'BAYAMBANG',
            'SAN CARLOS'
            
            ]),
           'permanentprovince'=>$this->faker->randomElement([

            'PANGASINAN'
            
            ]),

           'currenthousenumber'=> $this->faker->regexify('[0-9]{4}'),
           'currentzipcode'=> $this->faker->regexify('[0-9]{4}'),
           'currentstreet'=>$this->faker->randomElement([

            'RIZAL',
            'BONIFACIO',
            'ABAD'
            
            ]),
     
            'currentcountry'=>$this->faker->randomElement([

            'PHILIPPINES'
            
            ]),


           'currentbaranggay'=>$this->faker->randomElement([

             'DALANGUIRING',
            'MALAYO',
            'REAL',
            'POBLACION'
                       
            ]),

           'currentmunicipality'=>$this->faker->randomElement([


            'URBIZTONDO',
            'BAYAMBANG',
            'SAN CARLOS'
            
            ]),
           'currentprovince'=>$this->faker->randomElement([

            'PANGASINAN'
            
            ]),
            'phonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'fatherphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'motherphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'guardianphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),

         'birthday'=> $birthday,
            'age'=> $age,
           'sex'=>$this->faker->randomElement(['Male', 'Female']),
           'mothertongue'=>$this->faker->randomElement([

             'AKLANON',
              'BIKOL',
              'CEBUANO',
              'CHAVACANO',
              'ENGLISH',
              'FILIPINO',
              'HILIGAYNON',
              'IBINAG',
              'ILOKANO',
              'IVATAN',
              'KAPAMPANGAN',
              'KINARAY-A',
              'MAGUINDANAO',
              'MARANAO',
              'PANGASINAN'

               ]),

            'indegenouscommunity'=>$this->faker->randomElement([

            "TAGALOG",
            "ILOKANO",
            "KAPAMPANGAN",
            "BIKOLANO",
            "AETA",
            "IGOROT",
            "IVATAN",
            "MANGYAN",
            "CEBUANO",
            "WARAY",
            "ILONGGO",
            "ATI",
            "SALUDNON",
            "BADJAO",
            "YAKAN",
            "B'LAAN",
            "MARANAO",
            "T'BOLI",
            "TAUSUG",
            "BAGOBO"

            ]),
            'generalaverage'=> $this->faker->numberBetween(75,85),
            'lrnnumber' => $this->faker->numberBetween(100000000000,200000000000),
            'psastatus'=>$this->faker->randomElement(['YES','NO']),
            'psanumber'=>  $this->faker->numberBetween(100000000000,200000000000),

            'fatherfirstname'=> strtoupper($this->faker->firstName()),
            'fathermiddlename'=> strtoupper($this->faker->lastName()),
            'fatherlastname'=> strtoupper($this->faker->lastName()),
            'motherfirstname'=> strtoupper($this->faker->firstName()),
            'mothermiddlename'=> strtoupper($this->faker->lastName()),
            'motherlastname'=> strtoupper($this->faker->lastName()),
            'guardianfirstname'=> strtoupper($this->faker->firstName()),
            'guardianmiddlename'=> strtoupper($this->faker->lastName()),
            'guardianlastname'=> strtoupper($this->faker->lastName()),
            'updated'=>$this->faker->randomElement(['Yes', 'No']),
            'semester'=>$this->faker->randomElement(['1st', '2nd']),
            'schoolid'=> $this->faker->regexify('[0-9]{6}'),
             'indigency'=> $this->faker->regexify('[0-9]{18}'),
          

            'last_reviewed_by'=>$this->faker->randomElement([

            "1"
      

            ]),

           'birthcertificate'=>$this->faker->randomElement([

            "example.jpg"

            ]),
            'reportcard'=>$this->faker->randomElement([

            "example.jpg"

            ])
           
           
           
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
