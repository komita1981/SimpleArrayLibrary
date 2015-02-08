<?php

use \SimpleArrayLibrary\SimpleArrayLibrary;

/**
 * Tests getRectangularDimensions method with valid data
 */
class GetRectangularDimensionsTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals($data['expResult'], SimpleArrayLibrary::getRectangularDimensions($data['array']));
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            // #0 1 level, 1 element
            [
                [
                    'array'     => [1],
                    'expResult' => [1]
                ]
            ],
            // #1 non rectangular
            [
                [
                    'array'     => [1, [1]],
                    'expResult' => -1
                ]
            ],
            // #2 3 levels: 4 elements on the deepest level, 1 element on middle level, 3 on the shallowes
            [
                [
                    'array'     => [[[1, 2, 3, 4]], [[1, 2, 3, 4]], [[1, 2, 3, 4]]],
                    'expResult' => [4, 1, 3]
                ]
            ]
        ];
    }
}