<?php

namespace Altaway\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('media', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.file',
                'label' => 'form.document.media'))
            ->add('type', 'entity', array(
                'label' => 'form.profile.type',
//                'translation_domain' => '',
                'class' => 'AltawayUserBundle:Type',
                'property' => 'title',
                'multiple' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Altaway\UserBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'altaway_userbundle_document';
    }
}
