<?php
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class WebTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected $captureScreenshotOnFailure = TRUE;
    protected $screenshotPath = '/home/vagrant';
    protected $screenshotUrl = 'http://localhost/screenshots';
    
    
    public static $browsers = array(
          array(
            'browser' => '*firefox',
          ),
          array(
            'browser' => 'chrome',
          )
            );
    
    protected function setUp()
    {
        $this->setBrowserUrl('http://www.google.com/');
    }

    public function testTitle()
    {
        $this->open('http://www.google.com/');
        $this->assertTitle('Google');
    }
    
    public function testFail()
    {
        $this->open('http://www.google.com/');
        $this->assertTitle('Gogle'); // Misspelled.
    }
}
?>