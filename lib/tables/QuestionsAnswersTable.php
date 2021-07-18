<?php
namespace Ibc\Quiz;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

/**
 * Class AnswersTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> QUESTION_ID int mandatory
 * <li> ANSWER_ID int mandatory
 * </ul>
 *
 * @package Bitrix\Questions
 **/

class QuestionsAnswersTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'ibc_questions_answers';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new Entity\IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'column_name' => 'ID',
                ]
            ),
            new Entity\IntegerField(
                'QUESTION_ID',
                [
                    'column_name' => 'QUESTION_ID',
                ]
            ),
            new Entity\IntegerField(
                'ANSWER_ID',
                [
                    'column_name' => 'ANSWER_ID'
                ]
            ),
        ];
    }
}