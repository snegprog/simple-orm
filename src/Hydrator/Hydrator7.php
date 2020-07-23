<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Hydrator;

class Hydrator7 implements HydratorInterface
{
    private const ANNOTATION_ENTITY = '/@Entity/';
    private const ANNOTATION_COLUMN = '/@Column\(([^\s]+)\)/';

    public function hydrate(string $className, array $data): EntityInterface
    {
        $ref = new \ReflectionClass($className);

        if (1 !== preg_match(self::ANNOTATION_ENTITY, $ref->getDocComment())) {
            throw new \Exception($className.' not entity.');
        }

        $obj = $ref->newInstance();

        foreach ($ref->getProperties() as $property) {
            preg_match(self::ANNOTATION_COLUMN, $property->getDocComment(), $matchesColumn);
            if ($matchesColumn) {
                $property->setAccessible(true);
                $property->setValue($obj, $data[$matchesColumn[1]]);
            }
        }

        return $obj;
    }
}
