<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Config;

interface ConfigInterface
{
    /**
     * Устанавливаем конфигурацию.
     *
     * @param string $file - yaml файл с настройками
     */
    public function set(string $file): ConfigInterface;

    /**
     * Возвращаем настройки DB.
     *
     * @param string $db - данные для какой БД выводим (указывается в yaml  файле конфигурации)
     */
    public function database(string $db = 'default'): DataBaseConfig;
}
