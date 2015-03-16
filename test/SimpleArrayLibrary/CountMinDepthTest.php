<?php

use \SimpleArrayLibrary\SimpleArrayLibrary;

class CountMinDepthTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals($data['expResult'], SimpleArrayLibrary::countMinDepth($data['array'], $data['depth']));
    }

    /**
     * @return array
     */
    public function getData()
    {
        return array(
            // #0 rectangular
            array(
                array(
                    'array'     => array(),
                    'depth'     => 1,
                    'expResult' => 2
                )
            ),
            // #1 non-rectangular
            array(
                array(
                    'array'     => array(1, 2, array(1)),
                    'depth'     => 2,
                    'expResult' => 3
                )
            ),
            // #2 non-array
            array(
                array(
                    'array'     => 1,
                    'depth'     => 1,
                    'expResult' => 1
                )
            )
        );
    }
}