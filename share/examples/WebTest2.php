<?php
class WebTest2 extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.google.com/');
    }

    public function testTitle()
    {
        $this->url('http://www.google.com/');
        $this->assertEquals('Google', $this->title());
    }

}
?>