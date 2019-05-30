<?php

function castObjectClassInArray($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        if(gettype($property->getValue($object)) == "object")
            $array[$property->getName()] = castObjectClassInArray($property->getValue($object));
        else
            $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}