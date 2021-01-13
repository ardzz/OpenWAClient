<?php


namespace OpenWAClient;

use OpenWAClient\Factory;
use OpenWAClient\FileManager\Media;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\Send\SendFactory;

class User extends OpenWA
{
    function getMe(): Output
    {
        $request = $this->request("getMe");
        $response = $request->getBody()->getContents();
        return new Output(new Response($request));
    }

    function getSessionInfo(): Output
    {
        $request  = $this->request("getSessionInfo");
        $response = $request->getBody()->getContents();
        return new Output(new Response($request));
    }

    function setStatus(String $status): Output
    {
        $request = $this->request("setMyStatus", [
            "args" => [
                "newStatus" => $status
            ]
        ]);
        $response =  $request->getBody()->getContents();
        return new Output(new Response($request));
    }

    function setName(String $name): Output
    {
        $request = $this->request("setMyName", [
            "args" => [
                "newName" => $name
            ]
        ]);
        $response =  $request->getBody()->getContents();
        return new Output(new Response($request));
    }

    function setProfilePicture(String $file_name): Output
    {
        $data = Media::format($file_name);
        if ($data){
            $request = $this->request("setProfilePic", [
                "args" => [
                    "data" => $data
                ]
            ]);
            $response =  $request->getBody()->getContents();
            return new Output(new Response($request));
        }
        return $this->handleOutput(json_encode([
            "success" => false
        ]));
    }
}