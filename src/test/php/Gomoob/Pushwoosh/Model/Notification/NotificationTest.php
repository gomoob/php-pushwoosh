<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use Gomoob\Pushwoosh\Model\Condition\IntCondition;
use Gomoob\Pushwoosh\Model\Condition\ListCondition;
use Gomoob\Pushwoosh\Model\Condition\StringCondition;

/**
 * Test case used to test the <code>Notification</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group NotificationTest
 */
class NotificationTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>addCondition($condition)</tt>, <tt>getConditions()</tt> and
	 * <tt>setConditions($conditions)</tt> functions.
	 */
    public function testAddGetSetConditions()
    {
        // Test for 'addCondition'
        $notification = new Notification();
        $condition0 = IntCondition::create('intTag')->eq(10);
        $condition1 = ListCondition::create('listTag')->in(array('value1', 'value2', 'value3'));
        $condition2 = StringCondition::create('stringTag')->eq('stringValue');

        $this->assertNull($notification->getConditions());
        $notification->addCondition($condition0);
        $notification->addCondition($condition1);
        $notification->addCondition($condition2);

        $conditions = $notification->getConditions();
        $this->assertCount(3, $conditions);
        $this->assertSame($condition0, $conditions[0]);
        $this->assertSame($condition1, $conditions[1]);
        $this->assertSame($condition2, $conditions[2]);

        // Test for 'setConditions'
        $notification = new Notification();
        $this->assertNull($notification->getConditions());
        $notification->setConditions(array($condition0, $condition1, $condition2));

        $conditions = $notification->getConditions();
        $this->assertCount(3, $conditions);
        $this->assertSame($condition0, $conditions[0]);
        $this->assertSame($condition1, $conditions[1]);
        $this->assertSame($condition2, $conditions[2]);

    }

    /**
	 * Test method for the <tt>addDevice($device)</tt>, <tt>getDevices()</tt> and <tt>setDevices($devices)</tt>
	 * functions.
	 */
    public function testAddGetSetDevices()
    {
        // Test for 'addDevice'
        $notification = new Notification();
        $this->assertNull($notification->getDevices());
        $this->assertSame($notification, $notification->addDevice('device0'));
        $this->assertSame($notification, $notification->addDevice('device1'));
        $this->assertSame($notification, $notification->addDevice('device2'));
        $devices = $notification->getDevices();
        $this->assertCount(3, $devices);
        $this->assertTrue(in_array('device0', $devices));
        $this->assertTrue(in_array('device1', $devices));
        $this->assertTrue(in_array('device2', $devices));

        // Test for 'setDevices'
        $notification = new Notification();
        $this->assertNull($notification->getDevices());
        $devices = array('device0', 'device1', 'device2');
        $this->assertSame($notification, $notification->setDevices($devices));
        $devices = $notification->getDevices();
        $this->assertCount(3, $devices);
        $this->assertTrue(in_array('device0', $devices));
        $this->assertTrue(in_array('device1', $devices));
        $this->assertTrue(in_array('device2', $devices));
    }

    /**
     * Test method for the <tt>getADM()</tt> and <tt>setADM($aDM)</tt> functions.
     */
    public function testGetSetADM()
    {
        $notification = new Notification();
        $this->assertNull($notification->getADM());
        $aDM = new ADM();
        $this->assertSame($notification, $notification->setADM($aDM));
        $this->assertSame($aDM, $notification->getADM());
    }

    /**
	 * Test method for the <tt>getAndroid()</tt> and <tt>setAndroid($android)</tt> functions.
	 */
    public function testGetSetAndroid()
    {
        $notification = new Notification();
        $this->assertNull($notification->getAndroid());
        $android = new Android();
        $this->assertSame($notification, $notification->setAndroid($android));
        $this->assertSame($android, $notification->getAndroid());
    }

    /**
	 * Test method for the <tt>getContent()</tt> and <tt>setContent($aDM)</tt> functions.
	 */
    public function testGetSetContent()
    {
        $notification = new Notification();
        $this->assertNull($notification->getContent());
        $this->assertSame($notification, $notification->setContent('CONTENT'));
        $this->assertEquals('CONTENT', $notification->getContent());
    }

    /**
	 * Test method for the <tt>getData()</tt> and <tt>setData($data)</tt> functions.
	 */
    public function testGetSetData()
    {
        $notification = new Notification();
        $this->assertNull($notification->getData());
        $data = array('field0' => 'field0_value', 'field1' => 'field1_value');
        $this->assertSame($notification, $notification->setData($data));
        $data = $notification->getData();
        $this->assertCount(2, $data);
        $this->assertEquals('field0_value', $data['field0']);
        $this->assertEquals('field1_value', $data['field1']);
    }

    /**
	 * Test method for the <tt>getFilter()</tt> and <tt>setFilter($filter)</tt> functions.
	 */
    public function testGetSetFilter()
    {
        $notification = new Notification();
        $this->assertNull($notification->getFilter());
        $this->assertSame($notification, $notification->setFilter('FILTER'));
        $this->assertEquals('FILTER', $notification->getFilter());
    }

    /**
	 * Test method for the <tt>getIOS()</tt> and <tt>setIOS($iOS)</tt> functions.
	 */
    public function testGetSetIOS()
    {
        $notification = new Notification();
        $this->assertNull($notification->getIOS());
        $iOS = new IOS();
        $this->assertSame($notification, $notification->setIOS($iOS));
        $this->assertSame($iOS, $notification->getIOS());
    }

    /**
	 * Test method for the <tt>getLink()</tt> and <tt>setLink($link)</tt> functions.
	 */
    public function testGetSetLink()
    {
        $notification = new Notification();
        $this->assertNull($notification->getLink());
        $this->assertSame($notification, $notification->setLink('http://www.gomoob.com'));
        $this->assertEquals('http://www.gomoob.com', $notification->getLink());
    }

    /**
	 * Test method for the <tt>getMac()</tt> and <tt>setMac($mac)</tt> functions.
	 */
    public function testGetSetMac()
    {
        $notification = new Notification();
        $this->assertNull($notification->getMac());
        $mac = new Mac();
        $this->assertSame($notification, $notification->setMac($mac));
        $this->assertSame($mac, $notification->getMac());
    }

    /**
     * Test method for the <tt>getMinimizeLink()</tt> and <tt>setMinimizeLink($minimizeLink)</tt> functions.
     */
    public function testGetSetMinimizeLink()
    {
        $notification = new Notification();
        $this->assertNull($notification->getMinimizeLink());
        $minimizeLink = MinimizeLink::bitly();
        $this->assertSame($notification, $notification->setMinimizeLink($minimizeLink));
        $this->assertSame($minimizeLink, $notification->getMinimizeLink());
    }

    /**
	 * Test method for the <tt>getPageId()</tt> and <tt>setPageId($pageId)</tt> functions.
	 */
    public function testGetSetPageId()
    {
        $notification = new Notification();
        $this->assertNull($notification->getPageId());
        $this->assertSame($notification, $notification->setPageId(15));
        $this->assertEquals(15, $notification->getPageId());
    }

    /**
	 * Test method for the <tt>getPlatforms()</tt> and <tt>setPlatforms($platforms)</tt> functions.
	 */
    public function testGetSetPlatforms()
    {
        $notification = new Notification();
        $this->assertNull($notification->getPlatforms());
        $this->assertSame($notification, $notification->setPlatforms(array(1, 2)));
        $this->assertCount(2, $notification->getPlatforms());
        $this->assertTrue(in_array(1, $notification->getPlatforms()));
        $this->assertTrue(in_array(2, $notification->getPlatforms()));
    }

    /**
	 * Test method for the <tt>getSafari()</tt> and <tt>setSafari($safari)</tt> functions.
	 */
    public function testGetSetSafari()
    {
        $notification = new Notification();
        $this->assertNull($notification->getSafari());
        $safari = new Safari();
        $this->assertSame($notification, $notification->setSafari($safari));
        $this->assertSame($safari, $notification->getSafari());
    }

    /**
	 * Test method for the <tt>getSendDate</tt> and <tt>setSendDate($sendDate)</tt> functions.
	 */
    public function testGetSetSendDate()
    {
    }

    /**
	 * Test method for the <tt>getWNS()</tt> and <tt>setWNS($wNS)</tt> functions.
	 */
    public function testGetSetWNS()
    {
        $notification = new Notification();
        $this->assertNull($notification->getWNS());
        $wNS = new WNS();
        $this->assertSame($notification, $notification->setWNS($wNS));
        $this->assertSame($wNS, $notification->getWNS());
    }

    /**
	 * Test method for the <tt>getWP()</tt> and <tt>setWP($wP)</tt> functions.
	 */
    public function testGetSetWP()
    {
        $notification = new Notification();
        $this->assertNull($notification->getWP());
        $wP = new WP();
        $this->assertSame($notification, $notification->setWP($wP));
        $this->assertSame($wP, $notification->getWP());
    }

    /**
	 * Test method for the <tt>isIgnoreUserTimezone()</tt> and <tt>setIgnoreUserTimezone()</tt> functions.
	 */
    public function testIsSetIgnoreUserTimezone()
    {
        $notification = new Notification();
        $this->assertTrue($notification->isIgnoreUserTimezone());
        $this->assertSame($notification, $notification->setIgnoreUserTimezone(false));
        $this->assertFalse($notification->isIgnoreUserTimezone());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        /*

        // Test with a sigle content
        $notification = Notification::create();
        $notification->setContent('CONTENT');

        $json = $notification->toJSON();
        $this->assertCount(3, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);

        // Test with additional data
        $notification->setDataParameter('DATA_PARAMETER_1', 'DATA_PARAMETER_1_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_2', 'DATA_PARAMETER_2_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_3', 'DATA_PARAMETER_3_VALUE');

        $json = $notification->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue(array_key_exists('data', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);
        $this->assertCount(3, $json['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['data']['DATA_PARAMETER_3']);

        // Test with devices
        $notification->addDevice('TOKEN_DEVICE_1');
        $notification->addDevice('TOKEN_DEVICE_2');
        $notification->addDevice('TOKEN_DEVICE_3');

        $json = $notification->toJSON();
        $this->assertCount(5, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue(array_key_exists('data', $json));
        $this->assertTrue(array_key_exists('devices', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);
        $this->assertCount(3, $json['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['data']['DATA_PARAMETER_3']);
        $this->assertCount(3, $json['devices']);
        $this->assertEquals('TOKEN_DEVICE_1', $json['devices'][0]);
        $this->assertEquals('TOKEN_DEVICE_2', $json['devices'][1]);
        $this->assertEquals('TOKEN_DEVICE_3', $json['devices'][2]);
        */

    }
}
