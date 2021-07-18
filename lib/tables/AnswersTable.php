<?php
namespace Ibc\Quiz;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\StringField,
    Bitrix\Main\ORM\Fields\Validators\LengthValidator;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

/**
 * Class AnswersTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> ANSWER string(600) mandatory
 * </ul>
 *
 * @package Bitrix\Answers
 **/

class AnswersTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'ibc_answers';
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
            new Entity\StringField(
                'ANSWER',
                [
                    'column_name' => 'ANSWER',
                ]
            ),
            new Entity\StringField(
                'TYPE',
                [
                    'column_name' => 'TYPE',
                ]
            ),
        ];
    }
}