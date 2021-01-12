<?php

namespace Database\Seeders;

use App\Account;
use App\User;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        User::get()->each(function (User $user) {
            Account::factory()->count(rand(1, 10))->create(['user_id' => $user->id]);
        });
    }
}
