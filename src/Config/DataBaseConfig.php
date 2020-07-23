<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Config;

final class DataBaseConfig
{
    /**
     * Хост расположения DB.
     */
    private string $host;

    /**
     * Название DB.
     */
    private string $db;

    /**
     * Порт DB.
     */
    private int $port;

    /**
     * Пользователь DB.
     */
    private string $user;

    /**
     * Пароль DB.
     */
    private string $password;

    /**
     * Размера пула подключений
     */
    private int $size;

    /**
     * DataBaseConfig constructor.
     *
     * @param string $host     - хост БД
     * @param string $db       - название БД
     * @param int    $port     - порт БД
     * @param string $user     - имя пользователя БД
     * @param string $password - пароль пользователя БД
     * @param int $size        - размер пула подключений
     */
    public function __construct(
        string $host,
        string $db,
        int $port,
        string $user,
        string $password,
        int $size
    ) {
        $this->host = $host;
        $this->db = $db;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->size = $size;
    }

    /**
     * Возвращаем хост ДБ
     *
     * @return string
     */
    public function host(): string
    {
        return $this->host;
    }

    /**
     * Возвращаем название ДБ
     *
     * @return string
     */
    public function db(): string
    {
        return $this->db;
    }

    /**
     * Возвращаем порт ДБ
     *
     * @return int
     */
    public function port(): int
    {
        return $this->port;
    }

    /**
     * Возвращаем пользователя ДБ
     *
     * @return string
     */
    public function user(): string
    {
        return $this->user;
    }

    /**
     * Возвращаем парль пользователя ДБ
     *
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    public function size(): int
    {
        if(empty($this->size)) {
            return 64;
        }

        return $this->size;
    }
}
