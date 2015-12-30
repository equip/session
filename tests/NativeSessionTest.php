<?php

namespace SparkTests;

use PHPUnit_Framework_TestCase as TestCase;
use Spark\NativeSession;

class NativeSessionTest extends TestCase
{
    public function setUp()
    {
        $this->session = new NativeSession;
        $this->session->clear();
    }

    public function testOperations()
    {
        $this->session->set('test', 'no');
        $this->session->set('unit', 'ok');

        $this->session->clear();

        $this->assertFalse($this->session->has('test'));
        $this->assertFalse($this->session->has('unit'));

        $this->session->set('test', 'yes');

        $this->assertTrue($this->session->has('test'));

        $this->assertSame('yes', $this->session->get('test'));

        $this->session->del('test');

        $this->assertFalse($this->session->has('test'));
    }

    public function testArraySet()
    {
        $this->session->clear();

        $this->assertTrue(empty($this->session['test']));

        $this->session['test'] = true;

        $this->assertFalse(empty($this->session['test']));
    }

    public function testArrayGet()
    {
        $this->session->clear();

        $this->session['test'] = 'okay';

        $this->assertSame('okay', $this->session['test']);
    }

    public function testArrayExists()
    {
        $this->session->clear();

        $this->assertFalse(isset($this->session['test']));

        $this->session['test'] = true;

        $this->assertTrue(isset($this->session['test']));
    }

    public function testArrayUnset()
    {
        $this->session->clear();

        $this->session['test'] = true;

        $this->assertTrue(isset($this->session['test']));

        unset($this->session['test']);

        $this->assertFalse(isset($this->session['test']));
    }
}
