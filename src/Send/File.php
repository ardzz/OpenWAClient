<?php


namespace OpenWAClient\Send;


use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\OpenWA;
use OpenWAClient\FileManager\Media as Filesystem;

/**
 * Class File
 *
 * @package OpenWAClient\Send
 */
class File extends OpenWA
{

    /**
     * @param     String             $filename            Filename (please don't send large file!)
     * @param     String             $caption             Caption's file
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     */
    function file(String $filename, String $caption, $receiver_number): Output
    {
        $request = $this->request("sendFile", [
            "args" => [
                "to" => Number::format($receiver_number),
                "file" => Filesystem::formatFile($filename),
                "filename" => $filename,
                "caption" => $caption
            ]
        ]);
        return new Output(new Response($request));
    }
}