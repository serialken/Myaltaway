<?php
// src\Altaway\PageBundle\Admin

namespace Altaway\PageBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sizannia\TranslationBundle\Admin\AbstractAdmin as Admin;

class PageAdmin extends Admin
{
    protected $datagridValues = array(
                                         '_sort_order' => 'ASC',
                                        '_sort_by' => 'rank'
    );

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('subtitle', 'text', array('label' => 'SubTitle'))

            ->add('body', 'sizannia_editor_type')
            ->add('rank', 'number', array('label' => 'Position'))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //parent::configureDatagridFilters($datagridMapper);
        $datagridMapper
            ->add('title')
            ->add('subtitle')
            ->add('rank')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        //parent::configureListFields($listMapper);
        $listMapper
            ->addIdentifier('title')
            ->add('subtitle')
            ->add('slug')
            ->add('rank')
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
            ->add('subtitle')
            ->add('rank')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('createdBy')
            ->add('updatedBy')
        ;
    }
}