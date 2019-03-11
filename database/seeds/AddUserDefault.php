<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AddUserDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'glen@exempl.com',
            'password' => '$argon2i$v=19$m=1024,t=2,p=2$eHBmcTFXN3BrYWhTZmFBSw$8XGLAMURU+3hv2xFBC4ONAXGKPd14MCQ1Ef++BV7ow4',
            'can_create' => 1,
            'can_edit' => 1,
            'can_delete' => 1,
            'remember_token' => '62a0b1da4aad95be133dd03f01d1d899',
            'created_at' => '2019-03-03 16:09:08',
            'updated_at' => '2019-03-03 16:09:08'
        ]);
    }
}
