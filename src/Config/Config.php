<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Config;

use Snegprog\SimpleORM\Exceptions\InvalidArgumentException;
use Snegprog\SimpleORM\Exceptions\ParseException;

class Config implements ConfigInterface
{
    /**
     * Конфигурация БД.
     *
     * @var DataBaseConfig[] - массив настроек БД,
     *                       где ключем является название подключения из файла конфигурации
     */
    private array $db;

    /**
     * {@inheritdoc}
     */
    public function set(string $file): ConfigInterface
    {
        $configYaml = yaml_parse_file($file);

        if (!isset($configYaml['databases'])) {
            throw new ParseException('ERROR: parameter missing [databases] in config file');
        }
        foreach ($configYaml['databases'] as $key => $dbConfig) {
            $this->db[$key] = new DataBaseConfig(
                $dbConfig['host'],
                $dbConfig['db'],
                (int) $dbConfig['port'],
                $dbConfig['user'],
                $dbConfig['password'],
                $dbConfig['size'] ?? 64
            );
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function database(string $db = 'default'): DataBaseConfig
    {
        if (!isset($this->db[$db])) {
            throw new InvalidArgumentException('ERROR: Config::database(): invalid argument '.$db);
        }

        return $this->db[$db];
    }
}
