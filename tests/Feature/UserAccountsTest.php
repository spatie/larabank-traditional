<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Account;

class UserAccountsTest extends TestCase
{

  use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function a_user_can_login_and_register()
    {
      $this->get('login')->assertStatus(200);

      $this->get('register')->assertStatus(200);
    }

    /** @test */
    public function an_auth_user_can_create_accounts()
    {
      $this->actingAs(factory(User::class)->create());

      $attributes = factory(Account::class)->raw();

      $this->post('/accounts', $attributes)->assertRedirect('');
    }

    /** @test */
    public function not_a_registered_user_cannot_manage_accounts()
    {
      $account = factory(Account::class)->create();

      $this->post('/accounts', $account->toArray())->assertRedirect('login'); //cannot create an account

      $this->get('/accounts')->assertRedirect('login');
    }




}
