<?php

use SimpleArrayLibrary\SimpleArrayLibrary;

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
        return array(
            // #0 equal associative keys
            array(
                array(
                    'array1'   => array('a' => 1),
                    'array2'   => array('a' => 2),
                    'expected' => true
                )
            ),
            // #1 both empty arrays
            array(
                array(
                    'array1'   => array(),
                    'array2'   => array(),
                    'expected' => true
                )
            ),
            // #2 equal numeric keys
            array(
                array(
                    'array1'   => array(1),
                    'array2'   => array(2),
                    'expected' => true
                )
            ),
            // #3 equal associative and numeric keys
            array(
                array(
                    'array1'   => array('0' => 1),
                    'array2'   => array(2),
                    'expected' => true
                )
            ),
            // #4 not equal associative keys
            array(
                array(
                    'array1'   => array('a' => 1),
                    'array2'   => array('b' => 2),
                    'expected' => false
                )
            ),
            // #5 first array empty
            array(
                array(
                    'array1'   => array('a' => 1),
                    'array2'   => array(),
                    'expected' => false
                )
            ),
            // #6 second array empty
            array(
                array(
                    'array1'   => array(),
                    'array2'   => array('a' => 1),
                    'expected' => false
                )
            ),
            // #7 not equal associative and numeric keys
            array(
                array(
                    'array1'   => array(1),
                    'array2'   => array('a' => 1),
                    'expected' => false
                )
            ),
            // #8 not equal associative and numeric keys
            array(
                array(
                    'array1'   => array(1),
                    'array2'   => array('a' => 1, 1),
                    'expected' => false
                )
            ),
            // #9 not equal associative and numeric keys
            array(
                array(
                    'array1'   => array(1, 'a' => 1),
                    'array2'   => array(2),
                    'expected' => false
                )
            )
        );
    }
}