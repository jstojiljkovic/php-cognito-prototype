<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;

class InvalidTokenException extends AuthenticationException
{

}
