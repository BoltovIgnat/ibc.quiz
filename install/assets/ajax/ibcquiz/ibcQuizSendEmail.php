<?php

define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
Loader::includeModule("ibc.quiz");
use Bitrix\Main\Application;
use Bitrix\Main\Type\DateTime as BDateTime;
use Ibc\Quiz\AnswersUsersTable;

global $USER;
global $DB;
$request = Application::getInstance()->getContext()->getRequest();
$userId = $USER->GetID();
$email = $request->getPost("email");


if (!function_exists("makeJsonProduct")) {
    function makeJsonProduct($product)
    {
        header("Content-type: application/json");
        echo json_encode($product);
        exit;
    }
}

use Bitrix\Main\Mail\Event;
Event::send(array(
    "EVENT_NAME" => "NEW_USER",
    "LID" => "s1",
    "C_FIELDS" => array(
        "EMAIL" => $email,
        "DEFAULT_EMAIL_FROM" => $email,
        "USER_ID" => $userId
    ),
));

makeJsonProduct([
    "success" => 1
]);


