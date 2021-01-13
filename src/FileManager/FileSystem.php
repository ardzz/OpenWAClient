<?php


namespace OpenWAClient\FileManager;


use League\Flysystem\FilesystemException;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\Filesystem as File;
use League\Flysystem\UnableToReadFile;

class FileSystem
{
    /**
     * @var File
     */
    private File $file_system;

    /**
     * FileSystem constructor.
     *
     * @param     String     $root_dir
     */
    public function __construct(string $root_dir)
    {
        $this->file_system = new File(new LocalFilesystemAdapter($root_dir));
    }

    function getFileSystem(): File
    {
        return $this->file_system;
    }

    function readStream(String $file)
    {
        return $this->getFileSystem()->read($file);
    }

    private static function getMimeType(String $filename)
    {
        return Storage::exists($filename) ? mime_content_type($filename) : false;
    }

    private function fileToBase64(String $filename)
    {
        return Storage::exists($filename) ? base64_encode($this->readStream($filename)) : false;
    }

    function format(String $filename)
    {
        if (Storage::exists($filename)){
            return sprintf("data:%s;base64,%s", self::getMimeType($filename), $this->fileToBase64($filename));
        }
        return false;
    }

}