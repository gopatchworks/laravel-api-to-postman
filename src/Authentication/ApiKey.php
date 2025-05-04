<?php

namespace PostmanGenerator\Authentication;

class ApiKey extends AuthenticationMethod
{
    public function prefix(): string
    {
        return '';
    }
}
