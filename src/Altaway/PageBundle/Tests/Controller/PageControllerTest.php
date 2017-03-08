<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 27/08/2015
 * Time: 11:10
 */

namespace Altaway\PageBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("ALTAWAY")')->count() > 0);
    }
}
