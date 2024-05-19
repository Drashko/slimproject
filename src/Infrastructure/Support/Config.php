<?php

namespace App\Infrastructure\Support;

class Config
{

//    public string $env;
//    public array $db;
//
    public function __construct(private readonly array $data = [])
    {
        //$this->env = (string)$data['env'];
        //$this->db = $data['db'];

    }


    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key] ?? $default;
        }

        $result = $this->data;

        foreach (explode('.', $key) as $offset) {
            if (!isset($result[$offset])) {
                return $default;
            }
            $result = $result[$offset];
        }

        return $result;
    }
}