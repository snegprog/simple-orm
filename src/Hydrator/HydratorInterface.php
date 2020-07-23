<?php

namespace Snegprog\SimpleORM\Hydrator;

interface HydratorInterface
{
    /**
     * Производим гидрацию данными выбранный класс
     *
     * @param string $className - класс который наполняем данными
     * @param array  $data      - массив данных для наполнения
     */
    public function hydrate(string $className, array $data): EntityInterface;
}
