<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

if (class_exists('ibc_quiz')) {
    return;
}

class ibc_quiz extends CModule
{
    /** @var string */
    public $MODULE_ID;

    /** @var string */
    public $MODULE_VERSION;

    /** @var string */
    public $MODULE_VERSION_DATE;

    /** @var string */
    public $MODULE_NAME;

    /** @var string */
    public $MODULE_DESCRIPTION;

    /** @var string */
    public $MODULE_GROUP_RIGHTS;

    /** @var string */
    public $PARTNER_NAME;

    /** @var string */
    public $PARTNER_URI;

    public function __construct()
    {
        $this->MODULE_ID = 'ibc.quiz';
        $this->MODULE_VERSION = '1.0.0';
        $this->MODULE_VERSION_DATE = '2021-07-17 10:00:00';
        $this->MODULE_NAME = 'Заточка ножей';
        $this->MODULE_DESCRIPTION = 'Заточка ножей';
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = "Пивоваров Петр";
        $this->PARTNER_URI = "https://www.ibc.ru/";
    }
    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->installDB();
        $this->installFile();
    }

    public function doUninstall()
    {
        $this->uninstallDB();
        $this->uninstallFile();
        ModuleManager::unregisterModule($this->MODULE_ID);
    }

    public function installDB()
    {
        global $DB, $APPLICATION;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/install.sql");
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/dump_ibc_answers.sql");
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/dump_ibc_answers_users.sql");
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/dump_ibc_products_link.sql");
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/dump_ibc_questions.sql");
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/dump_ibc_questions_answers.sql");

        echo __DIR__ . "/db/mysql/install.sql";

        if($this->errors !== false)
        {
            $APPLICATION->ThrowException(implode("", $this->errors));
            return false;
        }
    }

    public function uninstallDB()
    {
        global $DB;
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/mysql/uninstall.sql");
    }

    public function installFile()
    {

        $oldfolder =  $_SERVER['DOCUMENT_ROOT'].'/local/modules/ibc.quiz/install/assets/components/';
        $newfolder = $_SERVER['DOCUMENT_ROOT'].'/local/components/';

        CopyDirFiles(
            $oldfolder,
            $newfolder,
            true,
            true
        );

        $oldfolder = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/ibc.quiz/install/assets/ajax/';
        $newfolder = $_SERVER['DOCUMENT_ROOT'] . '/ajax/';

        CopyDirFiles(
            $oldfolder,
            $newfolder,
            true,
            true
        );

        $oldfolder =  $_SERVER['DOCUMENT_ROOT'].'/local/modules/ibc.quiz/install/assets/section/';
        $newfolder = $_SERVER['DOCUMENT_ROOT'];

        CopyDirFiles(
            $oldfolder,
            $newfolder,
            true,
            true
        );
    }

    public function uninstallFile()
    {
        Directory::deleteDirectory(
            $_SERVER['DOCUMENT_ROOT'].'/local/components/ibc/quiz/'
        );
        Directory::deleteDirectory(
            $_SERVER['DOCUMENT_ROOT'].'/quiz/'
        );
        Directory::deleteDirectory(
            $_SERVER['DOCUMENT_ROOT'].'/ajax/ibcquiz/'
        );
    }
}