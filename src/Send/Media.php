<?php


namespace OpenWAClient\Send;


use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\OpenWA;
use OpenWAClient\FileManager\Media as File;

class Media extends OpenWA
{

    function image(String $filename, String $caption, $receiver_number): Output
    {
        $request = $this->request("sendImage", [
            "args" => [
                "to" => Number::format($receiver_number),
                "file" => File::format($filename),
                "filename" => $filename,
                "caption" => $caption
            ]
        ]);

        return new Output(new Response($request));
    }

    function imageAsSticker($image, $receiver_number): Output
    {
        $request = $this->request("sendImageAsSticker", [
            "args" => [
                "to" => Number::format($receiver_number),
                "image" => File::format($image)
            ]
        ]);

        return new Output(new Response($request));
    }

    function rawWebpAsSticker(String $webp_filename, $receiver_number): Output
    {
        $request = $this->request("sendRawWebpAsSticker", [
            "args" => [
                "to" => Number::format($receiver_number),
                "webpBase64" => File::fileToBase64($webp_filename)
            ]
        ]);

        return new Output(new Response($request));
    }
}