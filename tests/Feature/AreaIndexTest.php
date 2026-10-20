<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AreaIndexTest extends TestCase
{
    public function test_it_displays_areas_returned_by_the_api(): void
    {
        config(['services.adminsena_api.url' => 'http://backend.test/v1']);
        Http::fake([
            'http://backend.test/v1/areas' => Http::response([
                ['id' => 1, 'name' => 'Tecnología e Informática'],
            ]),
        ]);

        $this->get('/areas')
            ->assertOk()
            ->assertSee('Tecnología e Informática')
            ->assertDontSee('No se pudieron cargar las áreas');

        Http::assertSent(fn ($request) => $request->url() === 'http://backend.test/v1/areas');
    }

    public function test_it_displays_a_warning_when_the_api_fails(): void
    {
        config(['services.adminsena_api.url' => 'http://backend.test/v1']);
        Http::fake([
            'http://backend.test/v1/areas' => Http::response(['message' => 'Unavailable'], 500),
        ]);

        $this->get('/areas')
            ->assertOk()
            ->assertSee('No se pudieron cargar las áreas');
    }
}
