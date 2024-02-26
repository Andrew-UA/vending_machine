<?php

namespace Traits;

trait Readable
{
    public function read(string $prompt = null): string
    {
        if ($prompt !== null) {
            echo $prompt;
        }
        $handle = fopen("php://stdin", "r");
        $output = fgets($handle);

        return trim($output);
    }
}