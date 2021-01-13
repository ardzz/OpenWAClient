<?php


namespace OpenWAClient\Send;


use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\OpenWA;

class Text extends OpenWA
{

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

    function textWithMention(String $message, $receiver_number): Output
    {
        $request = $this->request("sendTextWithMentions", [
            "args" => [
                "to" => Number::format($receiver_number),
                "content" => $message
            ]
        ]);

        return new Output(new Response($request));
    }

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