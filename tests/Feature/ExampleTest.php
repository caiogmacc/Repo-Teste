<?php

namespace Tests\Feature;


use Tests\TestCase;

class ExampleTest extends TestCase
{
   // Define o método de teste
    public function test_the_application_returns_a_successful_response(): void
    {
        // Faz uma requisição GET para a rota raiz
        $response = $this->get('/');

          // Verifica se o status da resposta é 200 (OK)
        $response->assertStatus(200);
    }
}
