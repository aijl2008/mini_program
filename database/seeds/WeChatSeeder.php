<?php

use Illuminate\Database\Seeder;

class WeChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\WeChat::class,100)->create()->each(function ($model) {
            $model->save();
        });
    }
}
