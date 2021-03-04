<?php

namespace Werner\DoctrineORM\Helper;

use Doctrine\Common\Collections\Collection;
use Werner\DoctrineORM\Entity\Phone;

class MapArrayPhones
{
    public static function getPhonesArray(Collection $collection): array
    {
        $phonesArray = $collection->map(
            function (Phone $phone) {
                return $phone->getFormattedPhone();
            })->toArray();

        return $phonesArray;
    }
}
