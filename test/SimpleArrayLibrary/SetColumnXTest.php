<?php

use SimpleArrayLibrary\SimpleArrayLibrary;

class SetColumnXTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     *
     * @return void
     * @dataProvider getData
     */
    public function test_function(array $data)
    {
        // prepare
        $this->setExpectedException($data['exception'], $data['errorMessage']);

        // invoke logic & test
        SimpleArrayLibrary::setColumn($data['matrix'], $data['column'], 1, $data['insertIfMissing'], $data['overwrite']);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return array(
            // #0 not a matrix
            array(
                array(
                    'matrix'          => array(),
                    'column'          => 'foo',
                    'insertIfMissing' => true,
                    'overwrite'       => true,
                    'exception'       => 'UnexpectedValueException',
                    'errorMessage'    => 'Can not set columns on one dimensional array'
                )
            ),
            // #1 invalid column
            array(
                array(
                    'matrix'          => array(array()),
                    'column'          => array(),
                    'insertIfMissing' => false,
                    'overwrite'       => false,
                    'exception'       => 'InvalidArgumentException',
                    'errorMessage'    => 'Invalid column'
                )
            ),
            // #2 invalid insertIfMissing parameter
            array(
                array(
                    'matrix'          => array(array()),
                    'column'          => 'foo',
                    'insertIfMissing' => array(),
                    'overwrite'       => false,
                    'exception'       => 'InvalidArgumentException',
                    'errorMessage'    => 'Insert if missing indicator must be a boolean'
                )
            ),
            // #3 invalid overwrite parameter
            array(
                array(
                    'matrix'          => array(array()),
                    'column'          => 'foo',
                    'insertIfMissing' => true,
                    'overwrite'       => array(),
                    'exception'       => 'InvalidArgumentException',
                    'errorMessage'    => 'Overwrite indicator must be a boolean'
                )
            )
        );
    }
}