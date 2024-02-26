<?php

namespace Traits;

trait Writeable
{
    public function write(string $prompt = null): void
    {
        echo $prompt . "\n";
    }
}