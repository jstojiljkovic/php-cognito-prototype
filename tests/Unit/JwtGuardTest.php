<?php

use App\Services\JwkConverter;
use Firebase\JWT\JWK;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class JwtGuardTest extends TestCase
{
    /**
     * @test
     */
    public function testGuardFailsBecauseNoUser()
    {
        $jtb = $this->getJwtTestBundle();
        $issuer = $this->getIssuer();

        Route::get('test', function () {
            return auth()->user();
        })->middleware(SubstituteBindings::class)->middleware('api');

        $this->mock(JwkConverter::class, function ($mock) use ($jtb, $issuer) {
            $mock->shouldReceive('getJwks')
                ->andReturn(JWK::parseKeySet($jtb->jwks, 'RSA256'));
            $mock->shouldReceive('getIssuer')
                ->andReturn($issuer);
        });

        $result = $this->getJson('/test', [
            'Authorization' => 'Bearer' . ' ' . $jtb->jwt,
        ]);

        dump($result);
        $this->assertEquals(401, $result->getStatusCode());
        $result->assertJsonFragment([ 'message' => 'Unauthenticated.' ]);
        $result->assertUnauthorized();
    }
}
