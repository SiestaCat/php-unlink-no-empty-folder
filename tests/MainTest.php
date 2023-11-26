<?php

namespace Siestacat\UnlinkNoEmptyFolder\Tests;
use PHPUnit\Framework\TestCase;
use Siestacat\UnlinkNoEmptyFolder\Main;

class MainTest extends TestCase
{

    public function test_all()
    {

        $dir_path = $this->create_dir();

        var_dump($dir_path); die();
        
        for($i=1;$i<=10;$i++)
        {

            $file_path = $dir_path . DIRECTORY_SEPARATOR . hash('crc32', random_bytes(8));

            touch($file_path);

            $this->assertEquals(true, Main::unlink($file_path));
        }

        
    }

    private function create_dir():string
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'junk_files' . DIRECTORY_SEPARATOR . hash('crc32', random_bytes(8));

        $this->assertEquals(true, mkdir($path));

        return $path;
    }
}