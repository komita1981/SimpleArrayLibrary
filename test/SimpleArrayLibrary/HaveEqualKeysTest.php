<?php

use \SimpleArrayLibrary\SimpleArrayLibrary;

/**
 * Tests haveEqualKeys method with valid data
 */
class HaveEqualKeysTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     *
     * @return void
     * @dataProvider getData
     */
    public function test_function(array $data)
    {
        // invoke logic
        $result = SimpleArrayLibrary::haveEqualKeys($data['array1'], $data['array2']);

        // test
        $this->assertEquals($data['expected'], $result);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            // #0 equal associative keys
            [
                [
                    'array1'   => ['a' => 1],
                    'array2'   => ['a' => 2],
                    'expected' => true
                ]
            ],
            // #1 both empty arrays
            [
                [
                    'array1'   => [],
                    'array2'   => [],
                    'expected' => true
                ]
            ],
            // #2 equal numeric keys
            [
                [
                    'array1'   => [1],
                    'array2'   => [2],
                    'expected' => true
                ]
            ],
            // #3 equal associative and numeric keys
            [
                [
                    'array1'   => ['0' => 1],
                    'array2'   => [2],
                    'expected' => true
                ]
            ],
            // #4 not equal associative keys
            [
                [
                    'array1'   => ['a' => 1],
                    'array2'   => ['b' => 2],
                    'expected' => false
                ]
            ],
            // #5 first array empty
            [
                [
                    'array1'   => ['a' => 1],
                    'array2'   => [],
                    'expected' => false
                ]
            ],
            // #6 second array empty
            [
                [
                    'array1'   => [],
                    'array2'   => ['a' => 1],
                    'expected' => false
                ]
            ],
            // #7 not equal associative and numeric keys
            [
                [
                    'array1'   => [1],
                    'array2'   => ['a' => 1],
                    'expected' => false
                ]
            ],
            // #8 not equal associative and numeric keys
            [
                [
                    'array1'   => [1],
                    'array2'   => ['a' => 1, 1],
                    'expected' => false
                ]
            ],
            // #9 not equal associative and numeric keys
            [
                [
                    'array1'   => [1, 'a' => 1],
                    'array2'   => [2],
                    'expected' => false
                ]
            ]
        ];
    }
}