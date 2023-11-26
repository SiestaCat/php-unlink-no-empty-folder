<?php

namespace Siestacat\UnlinkNoEmptyFolder;

/**
 * @package Siestacat\UnlinkNoEmptyFolder
 */
class Main
{
    public static function unlink(string $path, ?resource $context = null):bool
    {
        $unlink_func_response = unlink($path);

        if($unlink_func_response) return self::clear_file_dir($path);

        return $unlink_func_response;
    }

    public static function clear_file_dir(string $path):bool
    {
        return self::clear_dir(dirname($path));
    }

    public static function clear_dir(string $dir_path):bool
    {
        if(count(array_diff(scandir($dir_path), ['..', '.'])) === 0)
        {
            return rmdir($dir_path);
        }

        return false;
    }
}