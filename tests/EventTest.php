<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    public function testEvents()
    {
        $response = $this->call('GET', 'api/events');
        $this->assertEquals(200, $response->status());
    }

    public function testAddEvent()
    {
        $this->seeInDatabase('promotores', ['id' => 1]);

        $this->seeInDatabase('recintos', ['id' => 1]);

        $this->seeInDatabase('grupos', ['id' => 1]);

        $response = $this->call('POST', 'api/events/add', [	"nombre" => "Concierto 2", "fecha" => "2021-06-15", "id_recinto" => 1, "id_grupos" => [2], "numero_espectadores" => 1500, "id_promotor" => 1, "id_medios" => [1,2], "email" => "oswal026gmail.com"]);
        $this->assertEquals(201, $response->status());
    }

    public function testJsonResponse()
    {
        $this->json('POST', 'api/events/add', [	"nombre" => "Concierto 2", "fecha" => "2021-06-15", "id_recinto" => 1, "id_grupos" => [2], "numero_espectadores" => 1500, "id_promotor" => 1, "id_medios" => [1,2], "email" => "oswal026gmail.com"])
            ->seeJsonEquals([
                'created' => true,
            ]);

        $this->json('POST', 'api/events/add', [	])
            ->seeJson([
                'error' => true,
            ]);
    }

}
