<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateIngredientTest extends TestCase
{
   use RefreshDatabase;


   private function getUser()
   {
    return User::factory()->create();
   }

   private function accessCreateRoute()
   {
    return $this->actingAs($this->getUser())->get(route('ingredients.create'));
   }

    public function test_add_ingredient_route()
    {
        $response=$this->accessCreateRoute();
        $response->assertOk();
    }

    public function test_add_ingredient_route_view()
    {
        $response=$this->accessCreateRoute();
        $response->assertViewIs('ingredients.create');
    }

    public function test_add_ingredient_route_should_redirect_if_not_logged_in()
    {
       
        $response=$this->get(route('ingredients.create'));
        $response->assertRedirect(route('login'));
    }

    public function test_should_save_ingredient_to_database()
    {
        $data=[
            'name'=>'Onion',
            'stocks'=>'1',
            'measurement'=>'g',
            'total_purchased'=>'1'
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $this->assertDatabaseCount('ingredients',1);
    }

    public function test_should_have_error_if_ingredient_information_is_blank()
    {
        $data=[
            'name'=>'',
            'stocks'=>'',
            'measurement'=>'',
            'total_purchased'=>''
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $response->assertSessionHasErrors(['name','stocks','measurement','total_purchased']);
    }

    public function test_should_have_error_if_ingredient_stock_is_below_zero()
    {
        $data=[
            'name'=>'Onion',
            'stocks'=>'-1',
            'measurement'=>'g',
            'total_purchased'=>'1'
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $response->assertSessionHasErrors(['stocks']);
    }
    public function test_should_have_error_if_ingredient_measurement_is_invalid()
    {
        $data=[
            'name'=>'Onion',
            'stocks'=>'1',
            'measurement'=>'xxxx',
            'total_purchased'=>'1'
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $response->assertSessionHasErrors(['measurement']);
    }

    public function test_should_have_error_if_ingredient_total_purchased_is_below_zero()
    {
        $data=[
            'name'=>'Onion',
            'stocks'=>'1',
            'measurement'=>'g',
            'total_purchased'=>'-1'
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $response->assertSessionHasErrors(['total_purchased']);
    }


    public function test_total_purchased_should_be_same_with_stock()
    {
        $data=[
            'name'=>'Onion',
            'stocks'=>'1',
            'measurement'=>'g',
            'total_purchased'=>'2'
        ];
        $response=$this->actingAs($this->getUser())->post(route('ingredients.store'),$data);
        $response->assertSessionHasErrors(['total_purchased']);
    }

}
