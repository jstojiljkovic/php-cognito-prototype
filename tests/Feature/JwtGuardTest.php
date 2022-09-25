<?php


class JwtGuardTest extends \Tests\TestCase
{
    /**
     * @var string
     */
    protected $token;
    /**
     * @var string
     */
    protected $cognito_uuid;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->token = env('AWS_COGNITO_TEST_TOKEN', 'token');
        $this->cognito_uuid = env('AWS_COGNITO_TEST_USERNAME', 'token');
    }
}
