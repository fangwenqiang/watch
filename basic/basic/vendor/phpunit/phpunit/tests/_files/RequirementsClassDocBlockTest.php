<?php

/**
 * @requires PHP 5.3
 * @requires PHPUnit 4.0
 * @requires OS Linux
 * @requires functions testFuncClass
 * @requires extension testExtClass
 */
class RequirementsClassDocBlockTest
{
    /**
     * @requires PHP 5.4
     * @requires PHPUnit 3.7
     * @requires OS WINNT
     * @requires functions testFuncMethod
     * @requires extension testExtMethod
     */
    public function testMethod()
    {
    }
}
