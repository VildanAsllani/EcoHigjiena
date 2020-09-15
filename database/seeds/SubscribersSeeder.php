<?php

use Illuminate\Database\Seeder;
use App\Subscribers;

class SubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subscribers::class, 20)->create();
    }
}
