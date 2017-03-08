<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 11/08/2015
 * Time: 11:18
 */

namespace Altaway\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Altaway\OfferBundle\Entity\Offer;

class PageController extends Controller
{
    /**
     * @Route(name="altaway_page_homepage", path="/")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        $locale = $this->get('request')->getLocale();
        $manager = $this->container->get('altaway.page.manager');
        $list_pages = $manager->findBy(array('language' => $locale));

        return array('list_pages' => $list_pages);
    }

    /**
     * @Template()
     */
    public function menuAction($route)
    {
        $locale = $this->get('request')->getLocale();
        $manager = $this->container->get('altaway.page.manager');
        $pages = $manager->findBy(array('language' => $locale), array('rank' => 'ASC'));

        return array('list_pages' => $pages, 'route' => $route);
    }

}