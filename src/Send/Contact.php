<?php


namespace OpenWAClient\Send;


use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\Helper\VCard;
use OpenWAClient\OpenWA;

class Contact extends OpenWA
{
    function VCard(String $fullName, $phoneNumber, $receiver_number): Output
    {
        $vcard = new VCard();
        $vcard->addName($fullName);
        $vcard->addPhoneNumber($phoneNumber);

        $request = $this->request("sendVCard", [
            "args" => [
                "chatId"=> Number::format($receiver_number),
                "vcard" => $vcard->getOutput(),
                "contactName" => $fullName,
                "contactNumber" => $phoneNumber
            ]
        ]);

        return new Output(new Response($request));
    }

    function Contact($contact_number, $receiver_number): Output
    {
        $request = $this->request("sendContact", [
            "args" => [
                "to" => Number::format($receiver_number),
                "contactId" => Number::format($receiver_number)
            ]
        ]);

        return new Output(new Response($request));
    }
}