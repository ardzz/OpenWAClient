<?php


namespace OpenWAClient;

use GuzzleHttp\Exception\GuzzleException;
use OpenWAClient\FileManager\Media;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;

/**
 * Class User
 *
 * This class have a responsibility to handle the User tasks
 *
 * @package OpenWAClient
 */
class User extends OpenWA
{
    
    /**
     *
     * Set status account (e.g, Available, Busy, On meeting, Sleep, ...)
     *
     * @param     String     $status     status account (e.g, Available, Busy, On meeting, Sleep, ...)
     *
     * @return Output
     * @throws GuzzleException
     */
    function setStatus(string $status): Output
    {
        $request = $this->request("setMyStatus", [
            "args" => [
                "newStatus" => $status
            ]
        ]);
        return new Output(new Response($request));
    }

    /**
     *
     * Set name account
     *
     * @param     String     $name     Name
     *
     * @return Output
     * @throws GuzzleException
     */
    function setName(string $name): Output
    {
        $request = $this->request("setMyName", [
            "args" => [
                "newName" => $name
            ]
        ]);
        return new Output(new Response($request));
    }

    /**
     *
     * Set profile picture from image file
     *
     * @param     String     $image_file     Image file name [file_name].[whitelisted extension]
     *
     * @return Output
     * @throws GuzzleException
     */
    function setProfilePicture(string $image_file): Output
    {
        $request = $this->request("setProfilePic", [
            "args" => [
                "data" => Media::format($image_file)
        ]
        ]);
        return new Output(new Response($request));
    }
}