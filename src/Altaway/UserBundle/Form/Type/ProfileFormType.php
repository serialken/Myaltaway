<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 25/08/2015
 * Time: 18:14
 */

namespace Altaway\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseProfileFormType;

class ProfileFormType extends BaseProfileFormType
{
    private $class;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('profile', new ProfileType(), array('label' => 'form.user.profile'));
    }

}
