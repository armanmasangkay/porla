<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewIngredientsTest extends TestCase
{
    use RefreshDatabase;

    private function getUser()
    {
     return User::factory()->create();
    }

   public function test_ingredient_list_route()
   {
        $response=$this->actingAs($this->getUser())->get(route('ingredients.index'));
        $response->assertOk();
   }

   public function test_ingredient_list_route_returns_correct_view()
   {
        $response=$this->actingAs($this->getUser())->get(route('ingredients.index'));
        $response->assertOk();
        $response->assertViewIs('web.pages.ingredients');
        $response->assertViewHas('ingredients');
   }


   public function test_ingredient_list_route_should_redirect_if_user_is_not_logged_in()
   {
        $response=$this->get(route('ingredients.index'));
        $response->assertRedirect(route('login'));
   }

   public function test_mobile_ingredients_view_route()
   {
        $response=$this->get(route('ingredients.index.mobile'));
        $response->assertViewis('mobile.pages.ingredients');
   }


}
