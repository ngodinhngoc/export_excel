<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_sub_category';
        $catIds = array_pluck(DB::table('t_category')->get(), 'category_id');

        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 50; $i++) {
            $arrData[] = [
                'sub_category_id' => $i,
                'category_id' => $faker->randomElement($catIds),
                'sub_category_name' => $faker->name,
                'sub_category_name_lang' => $faker->name,
                'comment' => $faker->text,
                'comment_lang' => $faker->text,
                'option_1' => $faker->text,
                'option_1_lang' => $faker->text,
                'option_2' => $faker->text,
                'option_2_lang' => $faker->text,
                'option_3' => $faker->text,
                'option_3_lang' => $faker->text,
                'option_4' => $faker->text,
                'option_4_lang' => $faker->text,
                'option_5' => $faker->text,
                'option_5_lang' => $faker->text,
                'sort' => null,
                'view' => 1,
                'view_lang' => null,
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ];

            if($i % 5 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }
}
