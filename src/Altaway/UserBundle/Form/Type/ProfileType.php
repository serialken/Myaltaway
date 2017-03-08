<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 26/08/2015
 * Time: 10:09
 */

namespace Altaway\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Altaway\UserBundle\Form\DocumentType;
//use Sonata\MediaBundle\Form\Type;

class ProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'form.profile.name'))
            ->add('lastname', 'text', array('label' => 'form.profile.lastname'))
            ->add('documents', 'collection', array(
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label' => "form.profile.documents",
                'type' => new DocumentType()
//                'options' => array(
//                    'provider' => 'sonata.media.provider.file',
//                    'context'  => 'cv')
            ));

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Altaway\UserBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'altaway_userbundle_profile';
    }
}
