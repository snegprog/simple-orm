<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Connector;

use Snegprog\SimpleORM\Config\DataBaseConfig;
use Swoole\Database\PDOConfig;
use Swoole\Database\PDOPool;
use Swoole\Runtime;
use Swoole\ConnectionPool;
use Swoole\Database\PDOProxy;

class Connector
{
    private $pools;
    private static $instance;

    /**
     * Connector constructor.
     * @param DataBaseConfig $config - объект с конфигурацией БД
     */
    private function __construct(DataBaseConfig $config)
    {
        if (empty($this->pools)) {
            $this->pools = new PDOPool(
                (new PDOConfig())
                    ->withHost($config->host())
                    ->withPort($config->port())
                    ->withDbName($config->db())
                    ->withCharset('utf8mb4')
                    ->withUsername($config->user())
                    ->withPassword($config->password()),
                $config->size()
            );
        }
    }

    /**
     * Возвращаем инстанс пула подключений
     *
     * @param DataBaseConfig $config - объект с конфигурацией БД
     * @return static
     */
    public static function getInstance(DataBaseConfig $config)
    {
        if (!empty(self::$instance)) {
            return self::$instance;
        }

        self::$instance = new static($config);

        return self::$instance;
    }

    /**
     * Возвращаем объект подключения из пула
     *
     * @return PDOProxy
     */
    public function getConnection(): PDOProxy
    {
        return $this->pools->get();
    }

    public function putConnection(PDOProxy $db): void
    {
        $this->pools->put($db);
    }

    public function close(): void
    {
        $this->pools->close();
    }
}