<?php 

declare(strict_types=1);

namespace App\Model;

class Person
{
    private String $name;
    private int $age;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->age = 28;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getName(): string
    {
        return $this-> name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

     
}