<?php

namespace Bizarg\StringCase;

/**
 * Class StringCase
 * @package Api\Infrastructure\UseCase
 */
class StringHelper
{
    /**
     * @param string $input
     * @return array
     */
    public static function match(string $input): array
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);

        return $matches[0];
    }

    /**
     * @param string $input
     * @return string
     */
    public static function toUnderscore(string $input): string
    {
        return self::toGlue($input, '_');
    }

    /**
     * @param string $input
     * @return string
     */
    public static function toHyphen(string $input): string
    {
        return self::toGlue($input, '-');
    }

    /**
     * @param string $input
     * @param string $glue
     * @return string
     */
    public static function toGlue(string $input, string $glue): string
    {
        $ret = self::match($input);

        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode($glue, $ret);
    }

    /**
     * @param string $input
     * @return string
     */
    public static function camelCase(string $input): string
    {
        $ret = self::match($input);

        foreach ($ret as $key => &$match) {
            $match = $key == 0 ? strtolower($match) : ucfirst($match);
        }

        return implode($ret);
    }

    /**
     * @param string $input
     * @return string
     */
    public static function upperCaseCamelCase(string $input): string
    {
        return implode(array_map('ucfirst', self::match($input)));
    }
}
