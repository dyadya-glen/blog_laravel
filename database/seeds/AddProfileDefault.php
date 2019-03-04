<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class AddProfileDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'Роман',
            'phone' => null,
            'user_id' => 1,
        ]);
    }
}
