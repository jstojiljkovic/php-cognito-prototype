<?php

class JwkConverterTest extends \Tests\TestCase
{
    public function testGetJwks()
    {
        $jwC = new \App\Services\JwkConverter();
        $keys = $jwC->getJwks();
    }
}
