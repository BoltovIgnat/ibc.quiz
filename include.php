<?php
$arClasses = [
	'\Ibc\Quiz\AnswersTable' => 'lib/tables/AnswersTable.php',
    '\Ibc\Quiz\QuestionsAnswersTable' => 'lib/tables/QuestionsAnswersTable.php',
    '\Ibc\Quiz\QuestionsTable' => 'lib/tables/QuestionsTable.php',
    '\Ibc\Quiz\AnswersUsersTable' => 'lib/tables/AnswersUsersTable.php',
    '\Ibc\Quiz\ProductTable' => 'lib/tables/ProductTable.php',
];

\Bitrix\Main\Loader::registerAutoLoadClasses('ibc.quiz', $arClasses);