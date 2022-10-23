<?php

namespace Tests\Feature\Task;

use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    public function test_should_return_code_400_when_user_id_is_invalid()
    {
        $invalidUserId = 1000;
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_a_letter_in_the_user_id()
    {
        $invalidUserId = 'a';
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_a_space_in_the_user_id()
    {
        $invalidUserId = '';
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_a_alphanumeric_in_the_user_id()
    {
        $invalidUserId = 'ss1';
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_null_in_the_user_id()
    {
        $invalidUserId = NULL;
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_201_when_passing_null_in_the_user_id()
    {
        $invalidUserId = NULL;
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => 'Titulo teste',
            'description' => 'Descrição teste',
            'user_id' => $invalidUserId,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_null_in_the_title()
    {
        $invalidTitle = NULL;
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => $invalidTitle,
            'description' => 'Descrição teste',
            'user_id' => 2,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_code_400_when_passing_null_in_the_description()
    {
        $invalidDescription = NULL;
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => "titulo valido",
            'description' => $invalidDescription,
            'user_id' => 2,
        ]);
 
        $response->assertStatus(400);
    }

    public function test_should_return_201_when_all_fields_are_valid()
    {
        $validTitle = "Titulo valido";
        $validDescription = "Descrição valida";
        $validUserId = 1;

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->post('api/task', [
            'title' => $validTitle,
            'description' => $validDescription,
            'user_id' => $validUserId,
        ]);
 
        $response->assertStatus(201);
    }
}
