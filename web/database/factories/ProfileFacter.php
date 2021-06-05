<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Profile::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male','female']);
    $Marital_status = $faker->randomElement(['single', 'Married', 'divorced', 'widowed']);
    $Job_ID = $faker->randomElement([
        '1','2','3','4','5','6','7','8','9','10',
        '11','12','13','14','15','16','17','18','19','20',
        '21','22','23','24','25','26','27','28','29','30',
        '31','32','33','34','35','36','37','38','39','40',
        '41','42','43','44','45','46','47','48','49','50'
        ]);
    $Job_ID2 = $faker->randomElement([
        '1','2'
    ]);
    $Social_link = $faker->randomElement(['-']);
    $Work_type = $faker->randomElement(['Part time','Full time']);
    $Education = $faker->randomElement(['KMUTT','KMUNB','KMUIT']);
    $Photo = $faker->randomElement(['https://scontent.fbkk1-1.fna.fbcdn.net/v/t1.0-9/19554300_1405999659476969_400778324058538746_n.jpg?_nc_fx=fbkk1-5&_nc_cat=0&oh=3f8c5cfbd608c645a70c77253ee64ecb&oe=5B9D9C97','https://scontent.fbkk1-5.fna.fbcdn.net/v/t31.0-8/21082938_1634507129915520_7935661447298751260_o.jpg?_nc_cat=0&oh=e2b25e36c5f51fd0c01a004159a6ddf2&oe=5B4FF5A0']);
    $Nationality = $faker->randomElement(['Thai','English']);
    $Data_status = $faker->randomElement(['ทำงานอยู่','ไม่ได้ทำงานแล้ว']);
    $User_role = $faker->randomElement(['admin','user','hr_admin','head']);
    static $password;
    return array(
        //
        'Firstname' => $faker->firstNameFemale,
        'Lastname' => $faker->lastName,
        'DOB' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days'.'+'.mt_rand(1,12).' month'.'+'.mt_rand(-40,-20).' year') ),
        'Gender' => $gender,
        'Marital_status' => $Marital_status,
        'Email' => $faker->unique()->freeEmail,
        'Tel' => '08'.$faker->numberBetween($min = 10000000, $max = 99999999),
        'Job_ID' => $Job_ID2,
        'Social_link' => $Social_link,
        'Work_type' => $Work_type,
        'Education' => $Education,
        'Photo' => $Photo,
        'Emergency_Contact' => '09'.$faker->numberBetween($min = 10000000, $max = 99999999),
        'Hire_day' => date('Y-m-d'),
        'Nationality' => $Nationality,
        'Data_status' => $Data_status,
        'User_role' => $User_role,
//        'password' => Hash::make('1234567890'), // secret
        'password' => $password ?: $password = bcrypt('1234567890'), // secret
        'remember_token' => str_random(10),
    );
});
