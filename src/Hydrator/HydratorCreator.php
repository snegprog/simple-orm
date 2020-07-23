<?php

namespace Snegprog\SimpleORM\Hydrator;

class HydratorCreator
{
    private const VERSION = [
        7 => Hydrator7::class,
    ];

    /**
     * Создаем нужную версию гидратора.
     *
     * @throws \Exception
     */
    public function create(): HydratorInterface
    {
        if (!isset(self::VERSION[PHP_MAJOR_VERSION])) {
            throw new \Exception('Error: Bad version PHP.');
        }
        $class = self::VERSION[PHP_MAJOR_VERSION];

        return new $class();
    }
}
