<?php

namespace CrCms\Permission\Tests;

trait ApplicationTrait
{

    public static $app;
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass(); // TODO: Change the autogenerated stub
        require_once __DIR__.'/./bootstrap.php';
        static::$app = app();
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass(); // TODO: Change the autogenerated stub

        static::$app = null;
    }
}
