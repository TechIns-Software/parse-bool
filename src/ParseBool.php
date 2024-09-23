<?php

namespace Techins\ParseBool;

class ParseBool
{
    /**
     * Parses a given value into a boolean.
     *
     * Accepts boolean, string, or numeric input and converts it to a boolean
     * value. Throws an exception if the value cannot be interpreted as a boolean.
     *
     * @param mixed $value The value to be parsed.
     * @param bool $strict Performs checjk whether value is booleable,
     * @param bool $nullIsBoolean Optional parameter that indicated that null is considered as a boolean value.
     *          In order to work you must also set $strict=true
     * @return bool Returns true or false based on the parsed value.
     * @throws ValueNotBooleanOneException If the value is not booleable.
     */
    public static function parseBool($value,bool $strict=false, bool $nullIsBoolean=true)
    {
        if(is_bool($value)){
            return $value;
        }
    
        if(is_string($value)){
            $value=strtolower(trim($value));
        }
    
        if(is_numeric($value)){
            $value = (int)$value;
        }

        if($strict && !self::validateBooleableValue($value,$nullIsBoolean)){
            throw new ValueNotBooleanOneException();
        }

        return in_array($value,[1,true,'on','yes','true','y'],true);
    }
    
    
    /**
     * Validates if a value can be interpreted as a boolean.
     *
     * Checks if the value is a boolean, string, or numeric and returns true
     * if it can be considered booleable, otherwise false.
     *
     * @param mixed $value The value to be validated.
     * @param bool $nullIsBool Also check whether `null` is considered as a boolean
     * @return bool True if the value can be interpreted as a boolean, false otherwise.
     */
    public static function validateBooleableValue($value,bool $nullIsBool=false)
    {
        if (is_bool($value)) {
            return true;
        }
    
        if (is_string($value)) {
            $value = strtolower($value);
        }
    
        if (is_numeric($value)) {
            $value = (int)$value;
        }
    
        $validBoolValues = [0, 1, 'true', 'false', 'yes', 'no', 'on', 'off','f'];

        if($nullIsBool){
            $validBoolValues[]=null;
        }

        return in_array($value, $validBoolValues);
    }
}