<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Config;

final class Creator
{
    /**
     * Создаем нужный объект конфигурации
     *
     * @return ConfigInterface
     */
    public function create(): ConfigInterface
    {
        return new Config();
    }
}
