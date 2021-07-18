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
$answer = $request->getPost("answer");
$questionId = $request->getPost("questionId");

if (!function_exists("makeJsonProduct")) {
    function makeJsonProduct($product)
    {
        header("Content-type: application/json");
        echo json_encode($product);
        exit;
    }
}

\Ibc\Quiz\AnswersUsersTable::add(array(
    'USER_ID' => $userId,
    'QUESTION_ID' => $questionId,
    'ANSWER_ID' => $answer
));

makeJsonProduct([
    "success" => 1
]);