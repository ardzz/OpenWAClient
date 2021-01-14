<?php


namespace OpenWAClient;

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
     * Get account info (self fetching)
     *
     * @return Output
     */
    function getMe(): Output
    {
        $request = $this->request("getMe");
        return new Output(new Response($request));
    }

    /**
     *
     * Get session info from Server RESt API
     *
     * @return Output
     */
    function getSessionInfo(): Output
    {
        $request  = $this->request("getSessionInfo");
        return new Output(new Response($request));
    }

    /**
     *
     * Set status account (e.g, Available, Busy, On meeting, Sleep, ...)
     *
     * @param     String     $status     status account (e.g, Available, Busy, On meeting, Sleep, ...)
     *
     * @return Output
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