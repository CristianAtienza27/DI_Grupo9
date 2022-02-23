<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Articles;
use Illuminate\Support\Facades\Hash;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $credential = [
            'email' => 'cristian@mail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $response->assertSessionMissing('errors');
    }

    public function testRegistro(){
        $this->withoutExceptionHandling();
        
        $response = $this->post('/usuarios', [
            'firstname' => 'Cristian',
            'secondname' => 'Atienza',
            'email' => 'cristian1@mail.com',
            'password' => '12345678',
            'company_id' => 1,
            'code' => null,
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        //Cambiar el número '16' por el número de artículos que hay despues de eliminar este
        $this->assertCount(16, User::all());

        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'cristian1@mail.com')->first();
        $this->assertEquals($user->firstname, 'Cristian');
        $this->assertEquals($user->secondname, 'Atienza');
        $this->assertEquals($user->email, 'cristian1@mail.com');
        $this->assertEquals($user->company_id, 1);
    }

    public function testArticleInsert(){

        $this->withoutExceptionHandling();
        
        $response = $this->post('/articulosTest', [
            'name' => 'Destornillador',
            'price_min' => 10,
            'price_max' => 20,
            'color_name' => 'Negro',
            'weight' => 0.20,
            'size' => '7cm',
            'family_id' => 1,
            'description' => 'Aprieta las tuercas',
        ]);

        $response->assertStatus(200);
        // Comprobamos que hay 1 registro en la BD (se ha insertado)
        $this->assertCount(11, Articles::all());

        // Y comprobamos que sea el que acabamos de insertar
        $article = Articles::where('name', '=', 'Destornillador')->first();
        $this->assertEquals($article->name, 'Destornillador');
        $this->assertEquals($article->price_min, 10);
        $this->assertEquals($article->price_max, 20);
        $this->assertEquals($article->color_name, 'Negro');
        $this->assertEquals($article->family_id, 1);
        $this->assertEquals($article->description, 'Aprieta las tuercas');

    }

    public function testArticleDelete(){
        
        $this->withoutExceptionHandling();

        $article = factory(Articles::class)->create();

        $response = $this->delete('/articulos/' . $article->id);

        //Cambiar el número '10' por el número de artículos que hay despues de eliminar este
        $this->assertCount(11, Articles::all());

        $response->assertRedirect('/articulos');

    }

}
