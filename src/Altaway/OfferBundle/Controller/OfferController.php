<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 13/08/2015
 * Time: 16:53
 */
namespace Altaway\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Altaway\OfferBundle\Entity\Offer;
use Altaway\OfferBundle\Entity\Apply;
use Altaway\OfferBundle\Form\ApplyType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/offre")
 */
class OfferController extends Controller
{
    /**
     * @Route(name="altaway_offer_homepage", path="/{page}", requirements={"page"="\d*"}, defaults={"page"="1"})
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction($page, Request $request)
    {
        $locale = $request->getLocale();
        $paginator  = $this->get('knp_paginator');
        $offer_manager = $this->get('altaway.offer.manager');

        $offers = $offer_manager->findBy(array('language' => $locale, 'isEnable' => true), array('publishAt' => 'DESC'));
        $pagination = $paginator->paginate($offers, $page, 5);
        return array('pagination' => $pagination);
    }

    /**
     * @Route(name="altaway_offer_show", path="/{slug}")
     * @Method({"GET","POST"})
     * @Template()
     */
    public function showAction(Request $request)
    {
        $slug = $request->get('slug');
        $locale = $request->get('_locale');

        $offer_manager = $this->container->get('altaway.offer.manager');
        $offer = $offer_manager->findOneBy(array('language' => $locale, 'slug' => $slug));

        if (null == $offer)
        {
            throw $this->createNotFoundException("L'annonce demandée n'existe pas.");
        }

        $user = $this->getUser();
        /**
         * L'utilisateur n'est pas authentifié
         */
        if ($user == null)
        {
            $form = NULL;
        }
        else
        {
            $factory = $this->get('altaway.apply.manager');
            $factory->setUser($user);
            $factory->setOffer($offer);
            $apply = $factory->get();
            $form = $this->createForm(new ApplyType(), $apply);
            if ($request->isMethod('POST'))
            {
                $form->handleRequest($request);
                if ($form->isValid())
                {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($apply);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add(
                        'notice_success',
                        $this->get('translator')->trans('application_success')
                    );
                    return $this->redirect($this->generateUrl('altaway_offer_show', array('slug' => $slug)));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add(
                        'notice_failure',
                        $this->get('translator')->trans('application_fail')
                    );
                }
            }
        }
        if ($form != NULL)
        {
            $form = $form->createView();
        }
        return array(
            'user' => $this->getUser(),
            'form' => $form,
            'offer' => $offer,
            'maximumNumberApplicationReaches' => 3,
        );
    }

    /**
     * @Template()
     */
    public function lastOffersAction(Request $request)
    {
        $locale = $request->getLocale();
        $offer_manager = $this->container->get('altaway.offer.manager');
        $last_offers = $offer_manager->findBy(array('language' => $locale), array('publishAt' => 'DESC'), 9);;

        return array('last_offers' => $last_offers);
    }

    /**
     * @Template()
     */
    public function sliderAction(Request $request)
    {
        $locale = $request->getLocale();
        $offer_manager = $this->container->get('altaway.offer.manager');
        $list_offers = $offer_manager->getOffersForSlider($locale);

        return array('list_offers' => $list_offers);
    }
}
