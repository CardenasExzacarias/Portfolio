<?php

namespace App\Models;

class Functions
{
    public static function mergeArrays(array ...$elements): array{
        $array = [];

        foreach($elements as $element){
            $array = array_merge($array, $element);
        }

        $array = static::objectToArray($array);

        $array = array_unique($array, SORT_REGULAR);

        return $array;
    }

    public static function mergeArraysInArray(array ...$elements): array{
        $array = [];

        foreach($elements as $element){
            foreach($element as $singular){
                $array = array_merge($array, $singular);
            }
        }

        return $array;
    }

    public static function objectToArray(array $array): array{
        return array_map (function ($value) {
            return array_values((array)$value);
        }, $array);
    }
}
