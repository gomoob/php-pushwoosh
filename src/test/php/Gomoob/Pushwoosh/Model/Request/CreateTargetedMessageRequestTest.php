<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\Notification\MinimizeLink;

/**
 * Test case used to test the `CreateTargetedMessageRequest` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CreateTargetedMessageRequest
 */
class CreateTargetedMessageRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the `create()` function.
     */
    public function testCreate()
    {
        $createTargetedMessageRequest = CreateTargetedMessageRequest::create();
    
        $this->assertNotNull($createTargetedMessageRequest);
    }
    
    /**
     * Test method for the `getCampain()` and `setCampain($campain)` functions.
     */
    public function testGetSetCampain()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getCampain());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setCampain('CAMPAIN'));
        $this->assertSame('CAMPAIN', $createTargetedMessageRequest->getCampain());
    }
    
    /**
     * Test method for the `getContent()` and `setContent($aDM)` functions.
     */
    public function testGetSetContent()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getContent());
    
        // Test with a simple string
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setContent('Hello !'));
        $this->assertSame('Hello !', $createTargetedMessageRequest->getContent());
    
        // Test with a map of ISO 639-1 language => message
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setContent(
                [
                    'fr' => 'Bonjour !',
                    'en' => 'Hello !',
                    'es' => 'Buenos dias !'
                ]
            )
        );
        $this->assertSame(
            [
                'fr' => 'Bonjour !',
                'en' => 'Hello !',
                'es' => 'Buenos dias !'
            ],
            $createTargetedMessageRequest->getContent()
        );
    }
    
    /**
     * Test method for the `getData()` and `setData($data)` functions.
     */
    public function testGetSetData()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getData());
        $data = ['field0' => 'field0_value', 'field1' => 'field1_value'];
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setData($data));
        $data = $createTargetedMessageRequest->getData();
        $this->assertCount(2, $data);
        $this->assertSame('field0_value', $data['field0']);
        $this->assertSame('field1_value', $data['field1']);
    }
    
    /**
     * Test method for the `getDevicesFilter()` and `setDevicesFilter($devicesFilter)` functions.
     */
    public function testGetSetDevicesFilter()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getDevicesFilter());
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setDevicesFilter('T("username", EQ, "my_username")')
        );
        $this->assertSame('T("username", EQ, "my_username")', $createTargetedMessageRequest->getDevicesFilter());
    }
    
    /**
     * Test method for the `getLink()` and `setLink($link)` functions.
     */
    public function testGetSetLink()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getLink());
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setLink('http://www.gomoob.com')
        );
        $this->assertSame('http://www.gomoob.com', $createTargetedMessageRequest->getLink());
    }
    
    /**
     * Test method for the `getMinimizeLink()` and `setMinimizeLink($minimizeLink)` functions.
     */
    public function testGetSetMinimizeLink()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getMinimizeLink());
        $minimizeLink = MinimizeLink::bitly();
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setMinimizeLink($minimizeLink));
        $this->assertSame($minimizeLink, $createTargetedMessageRequest->getMinimizeLink());
    }
    
    /**
     * Test method for the `getPageId()` and `setPageId($pageId)` functions.
     */
    public function testGetSetPageId()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getPageId());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setPageId(15));
        $this->assertSame(15, $createTargetedMessageRequest->getPageId());
    }
    
    /**
     * Test method for the `getPreset()` and `setPreset($preset)` functions.
     */
    public function testGetSetPreset()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getPreset());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setPreset('Q1A2Z-6X8SW'));
        $this->assertSame('Q1A2Z-6X8SW', $createTargetedMessageRequest->getPreset());
    }
    
    /**
     * Test method for the `getRemotePage()` and `setRemotePage($remotePage)` functions.
     */
    public function testGetSetRemotePage()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getRemotePage());
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setRemotePage('http://myremoteurl.com')
        );
        $this->assertSame('http://myremoteurl.com', $createTargetedMessageRequest->getRemotePage());
    }
    
    /**
     * Test method for the `getRichPageId()` and `setRichPageId($richPageId)` functions.
     */
    public function testGetSetRichPageId()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getRichPageId());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setRichPageId(42));
        $this->assertSame(42, $createTargetedMessageRequest->getRichPageId());
    }
    
    /**
     * Test method for the `getSendDate` and `setSendDate($sendDate)` functions.
     */
    public function testGetSetSendDate()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
    
        // Test with an invalid send date string
        try {
            $createTargetedMessageRequest->setSendDate('aaa');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            // Expected
        }
    
        // Test with a send date which is neither a \DateTime neither a string
        try {
            $createTargetedMessageRequest->setSendDate(654);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            // Expected
        }
    
        // Test with 'now'
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setSendDate('now'));
        $this->assertSame('now', $createTargetedMessageRequest->getSendDate());
    
        // Test with a valid string date provided
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setSendDate('2014-01-01 10:06')
        );
        $this->assertSame(
            \DateTime::createFromFormat('Y-m-d H:i', '2014-01-01 10:06')->getTimestamp(),
            $createTargetedMessageRequest->getSendDate()->getTimestamp()
        );
    
        // Test with a \DateTime
        $dateTime = \DateTime::createFromFormat('Y-m-d H:i', '2014-01-01 10:06');
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setSendDate($dateTime));
        $this->assertSame($dateTime, $createTargetedMessageRequest->getSendDate());
    
    }
    
    /**
     * Test method for the `getPageId()` and `setPageId($pageId)` functions.
     */
    public function testGetSetSendRate()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getSendRate());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setSendRate(200));
        $this->assertSame(200, $createTargetedMessageRequest->getSendRate());
    }
    
    /**
     * Test method for the `getTimezone()` and `setTimezone($timezone)` functions.
     */
    public function testGetSetTimezone()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertNull($createTargetedMessageRequest->getTimezone());
        $this->assertSame(
            $createTargetedMessageRequest,
            $createTargetedMessageRequest->setTimezone('America/New_York')
        );
        $this->assertSame('America/New_York', $createTargetedMessageRequest->getTimezone());
    }
    
    /**
     * Test method for the `isIgnoreUserTimezone()` and `setIgnoreUserTimezone()` functions.
     */
    public function testIsSetIgnoreUserTimezone()
    {
        $createTargetedMessageRequest = new CreateTargetedMessageRequest();
        $this->assertTrue($createTargetedMessageRequest->isIgnoreUserTimezone());
        $this->assertSame($createTargetedMessageRequest, $createTargetedMessageRequest->setIgnoreUserTimezone(false));
        $this->assertFalse($createTargetedMessageRequest->isIgnoreUserTimezone());
    }
    
    /**
     * Test method for the `jsonSerialize()` function.
     */
    public function testJsonSerialize()
    {
        $createTargetedMessageRequest = CreateTargetedMessageRequest::create()
            ->setSendDate('now')
            ->setTimezone('America/New_York')
            ->setIgnoreUserTimezone(true)
            ->setContent(
                [
                    'en' => 'English',
                    'ru' => 'Русский',
                    'de' => 'Deutsch'
                ]
            )
            ->setPageId(39)
            ->setRemotePage('http://myremoteurl.com')
            ->setRichPageId(42)
            ->setSendRate(200)
            ->setLink('http://google.com')
            ->setMinimizeLink(MinimizeLink::none())
            ->setData(
                [
                    'custom' => 'json data'
                ]
            )
            ->setDevicesFilter('A(\"00000-00000\") * T(\"age\", BETWEEN, [17, 19])');
        
        // Test with an 'auth' property which is not set
        try {
            $array = $createTargetedMessageRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('The \'auth\' property is not set !', $pex->getMessage());
        }

        // Test with an 'auth' property and check results
        $array = $createTargetedMessageRequest->setAuth('XXXX')->jsonSerialize();

        $this->assertCount(13, $array);
        $this->assertSame('XXXX', $array['auth']);
        $this->assertSame('now', $array['send_date']);
        $this->assertSame('America/New_York', $array['timezone']);
        $this->assertTrue($array['ignore_user_timezone']);
        $this->assertCount(3, $array['content']);
        $this->assertSame('English', $array['content']['en']);
        $this->assertSame('Русский', $array['content']['ru']);
        $this->assertSame('Deutsch', $array['content']['de']);
        $this->assertSame(39, $array['page_id']);
        $this->assertSame('http://myremoteurl.com', $array['remote_page']);
        $this->assertSame(42, $array['rich_page_id']);
        $this->assertSame(200, $array['send_rate']);
        $this->assertSame('http://google.com', $array['link']);
        $this->assertSame(0, $array['minimize_link']);
        $this->assertCount(1, $array['data']);
        $this->assertSame('json data', $array['data']['custom']);
        $this->assertSame('A(\"00000-00000\") * T(\"age\", BETWEEN, [17, 19])', $array['devices_filter']);
    }
}
