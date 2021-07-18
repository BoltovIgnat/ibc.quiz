<?php

define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
Loader::includeModule("ibc.quiz");
use Bitrix\Main\Application;
use Bitrix\Main\Type\DateTime as BDateTime;
use Ibc\Quiz\AnswersTable;

global $USER;
global $DB;

if (!function_exists("makeJsonAnswer")) {
    function makeJsonAnswer($answer)
    {
        header("Content-type: application/json");
        echo json_encode($answer);
        exit;
    }
}

$request = Application::getInstance()->getContext()->getRequest();
$answer1 = $request->getPost("answer1");
$query = new \Bitrix\Main\Entity\Query(AnswersTable::getEntity());
$query->setSelect(array("*"));
$query->setFilter(array('=TYPE' => $answer1));

$result = $query->exec();
$arRezComp = [];
while($ar=$result->fetch())
{

    $arRezComp[] = $ar;

}

makeJsonAnswer([
    "success" => 1,
    "answers" => $arRezComp
]);



if ($check !== 'y') {
    makeJsonAnswer([
        "success" => 0
    ]);
}

$method = $request->getPost("method");
$contact = $request->getPost("contact");
$url = $request->getPost("url");
$comment = $request->getPost("comment");
$user = UserContext::getById($USER->getID());
$fullName = $user->getFullName();
$wrum = $user->getWrum();

if (!$user) {
    makeJsonAnswer([
        "success" => 0
    ]);
}


if ($result->isSuccess()) {
    makeJsonAnswer([
        "success" => 1
    ]);
} else {
    makeJsonAnswer([
        "success" => 0
    ]);
}