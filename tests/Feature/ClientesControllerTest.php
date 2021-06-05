<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ClientesController;

class ClientesControllerTest extends TestCase
{

    private $cliente;

    public function __construct(){
        parent::__construct();
        $this->cliente = new ClientesController;
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCheckCliente(){

        $this->assertFalse($this->cliente->checkCliente(1));
        $this->assertFalse($this->cliente->checkCliente(0));
        $this->assertJson($this->cliente->checkCliente(2));
    }

    public function testGetCliente(){

        $json = $this->cliente->getCliente(1);
        $this->assertEquals('Elza Maria', $json->nome);
    }
}
