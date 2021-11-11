<?php

declare(strict_types=1);

namespace App\Repositories;

class RandomImageRepository
{
    private array $images = [
        'ok.png',
        'ok.png',
        'ok.png',
        'ok.png',

        'no.png',
        'no.png',
        'no.png',
        'no.png',
        'no.png',
        'no.png',
    ];

    public function getOneByRandom(): string
    {
        $index = random_int(0, count($this->images) -1 );

        return 'images/' . $this->images[$index];
    }
}