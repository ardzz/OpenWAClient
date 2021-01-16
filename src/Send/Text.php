<?php


namespace OpenWAClient\Send;


use GuzzleHttp\Exception\GuzzleException;
use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\OpenWA;

/**
 * Class Text
 *
 * @package OpenWAClient\Send
 */
class Text extends OpenWA
{

    /**
     * @param     String             $message             Message you'll send
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
    function text(String $message, $receiver_number): Output
    {
        $request = $this->request("sendText", [
            "args" => [
                "to" => Number::format($receiver_number),
                "content" => $message
            ]
        ]);

        return new Output(new Response($request));
    }

    /**
     *
     * Send YouTube link with preview (thumbnail & title)
     *
     * @param     String             $message             Message you'll send
     * @param     String             $url                 URL/Link
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
    function youtubeLink(String $message, String $url, $receiver_number): Output
    {
        $request = $this->request("sendYoutubeLink", [
            "args" => [
                "to" => Number::format($receiver_number),
                "url" => $url,
                "text" => $message
            ]
        ]);

        return new Output(new Response($request));
    }

    /**
     *
     * Send link with auto preview (meta tags fetching)
     *
     * @param     String             $message             Message you'll send
     * @param     String             $url                 URL/Link
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
    function linkWithAutoPreview(String $message, String $url, $receiver_number): Output
    {
        $request = $this->request("sendLinkWithAutoPreview", [
            "args" => [
                "to" => Number::format($receiver_number),
                "url" => $url,
                "text" => $message
            ]
        ]);

        return new Output(new Response($request));
    }
}