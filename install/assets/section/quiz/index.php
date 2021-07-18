<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заточка ножей");

use Bitrix\Main\Loader;
use Ibc\Quiz\AnswersTable;

CJSCore::Init(array("jquery"));

Loader::includeModule("ibc.quiz");

?>
<?
$APPLICATION->IncludeComponent(
    "ibc:quiz",
    ".default",
    array(),
    false
);?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
