<?php
/**
 * Created by PhpStorm.
 * User: donatowolfisberg
 * Date: 26.03.18
 * Time: 14:43
 */

class ValidationHelper
{
	public static function isEmpty($str): bool
	{
		return is_string($str) && strlen(trim($str)) === 0;
	}

	public static function hasKey($arr, $key): bool
	{
		return array_key_exists($key, $arr);
	}

	public static function stringHasJustCharacters($str): bool
	{
		preg_match("/^[a-zA-Z]*$/", $str, $matches);
		return sizeof($matches) > 0;
	}

	public static function isEmail($str): bool
	{
		preg_match("/^\w+[@]\w+[.]\w{2,}$/", $str, $matches);
		return sizeof($matches) > 0;

	}

	public static function isPhone($str): bool
	{
		preg_match("/^[+]?[0-9 ]{7,30}$/", $str, $matches);
		return sizeof($matches) > 0;
	}
}