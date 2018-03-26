<?php

use Illuminate\Database\Seeder;

class FeedbackNatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('feedback_nature')->insert([
            'name' => 'Feature request',
        ],[ 'name' => 'General feedback'],[ 'name' => 'Bug']);

    }
}
