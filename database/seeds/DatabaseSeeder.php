<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WeChatSeeder::class);
        \Laravel\Passport\Passport::client()->setRawAttributes(
            [
                'name' => 'Mini Program',
                'secret' => '7RtUi7ZN8agL496IcUfEpmrycPU7ye83MHDcr0Jr',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'password_client' => 0,
                'revoked' => 0
            ]
        )->save();
        //\Illuminate\Support\Facades\DB::table('oauth_clients')->insert();
    }
}
