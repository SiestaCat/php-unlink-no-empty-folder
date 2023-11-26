<?php

namespace Siestacat\UnlinkNoEmptyFolder\Tests;
use PHPUnit\Framework\TestCase;
use Siestacat\UnlinkNoEmptyFolder\ClearFolderAfterUnlink;

class ClearFolderAfterUnlinkTest extends TestCase
{

    public function test_all()
    {
        for($i=1;$i<=10;$i++)
        {

            $file_path = $this->create_dir() . hash('crc32', random_bytes(8));

            touch($file_path);

            $this->assertEquals(true, ClearFolderAfterUnlink::unlink($file_path));
        }

        
    }

    private function create_dir():string
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'junk_files' . DIRECTORY_SEPARATOR . hash('crc32', random_bytes(8)) . DIRECTORY_SEPARATOR;

        $this->assertEquals(true, mkdir($path));

        return $path;
    }
}