<?php

use \SimpleArrayLibrary\SimpleArrayLibrary;

/**
 * Tests isAssociative method with valid data
 */
class IsAssociativeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     *
     * @return void
     * @dataProvider getData
     */
    public function test_function(array $data)
    {
        // invoke logic & test
        $this->assertEquals($data['expResult'], SimpleArrayLibrary::isAssociative($data['array']));
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            // #0 numeric
            [
                [
                    'array'     => [1, 1],
                    'expResult' => false
                ]
            ],
            // #1 associative
            [
                [
                    'array'     => ['a' => 1, 'b' => [1]],
                    'expResult' => true
                ]
            ]
        ];
    }
}