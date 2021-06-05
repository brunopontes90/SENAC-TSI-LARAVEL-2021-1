<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{
    use DatabaseTransactions;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate(){

        // PARA EVITAR O TESTE
        $this->markTestSkipped();

        $cliente = Clientes::create(    ['nome' => 'Luana',
                                        'email' => 'luana@senac.br',
                                        'endereco' => 'Rua tal, 123'
                                        'nascimento' => '1996-12-06']);
        $this->assertDatabaseHas('Clientes', ['nome' => 'Luana']);

        // FORMA NÃO ELEGANTE DE APAGAR O LIXO GERADO NO DB
        // USANDO O DatabaseTransactions NÃO PRECISA FAZER DESSA FORMA
        /*$this->assertDatabaseHas('Clientes', ['nome' => 'Luana']);
        $id = $cliente->id;
        $cliente->destroy($cliente->id);
        $this->assertDatabaseMissing('Clientes', ['id' => $id]);*/
    }

}
