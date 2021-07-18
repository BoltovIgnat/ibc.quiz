<?php

define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
Loader::includeModule("ibc.quiz");
use Bitrix\Main\Application;
use Bitrix\Main\Type\DateTime as BDateTime;
use Ibc\Quiz\ProductTable;

global $USER;
global $DB;

if (!function_exists("makeJsonProduct")) {
    function makeJsonProduct($product)
    {
        header("Content-type: application/json");
        echo json_encode($product);
        exit;
    }
}

$request = Application::getInstance()->getContext()->getRequest();
$product = $request->getPost("product");
$query = new \Bitrix\Main\Entity\Query(ProductTable::getEntity());
$query->setSelect(array("*"));
$query->setFilter(array('=TYPE_PRODUCT' => $product));

$result = $query->exec();
$arRezComp = [];
while($ar=$result->fetch())
{

    $arRezComp[] = $ar;

}

makeJsonProduct([
    "success" => 1,
    "products" => $arRezComp
]);