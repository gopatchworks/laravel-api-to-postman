<?php

namespace PostmanGenerator\Concerns;

use PostmanGenerator\Authentication\AuthenticationMethod;
use Illuminate\Support\Str;

trait HasAuthentication
{
    protected ?AuthenticationMethod $authentication = null;

    public function resolveAuth(): self
    {
        $config = $this->config['authentication'];

        if ($config['method']) {
            $className = Str::of('\PostmanGenerator\\Authentication\\')
                ->append(ucfirst($config['method']))
                ->toString();

            $this->authentication = new $className($config['token']);
        }

        return $this;
    }

    public function setAuthentication(?AuthenticationMethod $authentication): self
    {
        if (isset($authentication)) {
            $this->authentication = $authentication;
        }

        return $this;
    }
}
