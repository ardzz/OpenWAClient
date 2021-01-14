<?php


namespace OpenWAClient\Send;


use GuzzleHttp\Exception\GuzzleException;
use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\OpenWA;
use OpenWAClient\FileManager\Media as File;

/**
 * Class Media
 *
 * @package OpenWAClient\Send
 */
class Media extends OpenWA
{

    /**
     * @param     String             $filename            Image file name [file_name].[whitelisted extension]
     * @param     String             $caption             Caption of image
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
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

    /**
     * @param     string         $image               Image file name [file_name].[whitelisted extension]
     * @param     string|int     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     * @see File
     *
     */
    function imageAsSticker(string $image, $receiver_number): Output
    {
        $request = $this->request("sendImageAsSticker", [
            "args" => [
                "to" => Number::format($receiver_number),
                "image" => File::format($image)
            ]
        ]);

        return new Output(new Response($request));
    }

    /**
     * @param     String             $webp_filename       .webp File
     * @param     String|integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
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