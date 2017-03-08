<?php
// src\Altaway\OfferBundle\Admin

namespace Altaway\OfferBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sizannia\TranslationBundle\Admin\AbstractAdmin as Admin;
//use Symfony\Component\Validator\Constraints\DateTime;

class OfferAdmin extends Admin
{
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'title'
    );

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('shortTitle', 'text', array('label' => 'Short Title'))
            ->add('location', 'text', array('label' => 'Location'))
            ->add('sector')
            ->add('isEnable', 'checkbox', array('label' => 'Enable', 'required' => 'false'))
            ->add('body', 'sizannia_editor_type', array('label' => 'Details'))
            ->add('publishAt', 'datetime', array('label' => 'Published at', 'data' => new \DateTime('now')))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('shortTitle')
            ->add('location')
            ->add('sector')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('shortTitle')
            ->add('location')
            ->add('sector')
            ->add('isEnable')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('shortTitle')
            ->add('location')
            ->add('sector')
            ->add('isEnable')
            ->add('createdAt')
            ->add('publishAt')
            ->add('updatedAt')
            ->add('createdBy')
            ->add('updatedBy')
        ;
    }
}