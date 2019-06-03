<?php

function castObjectClassInArray($object) {
    if(gettype($object)=="array")
    {
        $array = array();
        foreach($object as $elemento)
        {
            array_push($array, castObjectClassInArray($elemento));
        }
        return $array;
    }else{
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
}