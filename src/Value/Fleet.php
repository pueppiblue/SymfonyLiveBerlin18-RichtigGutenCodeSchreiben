<?php

declare(strict_types=1);

namespace example\Value;

use ArrayIterator;
use IteratorAggregate;

class Fleet implements IteratorAggregate
{
    /** @var Ship[] */
    private $ships;

    public function __construct(Ship ...$ships)
    {
        $this->ships = $ships;
    }

    /**
     * @return ArrayIterator|Ship[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->ships);
    }

}
