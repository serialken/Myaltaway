<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 19/08/2015
 * Time: 10:11
 */

namespace Altaway\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class RegistrationFormType extends BaseRegistrationFormType
{
    private $class;


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('profile', new ProfileType());
    }

}
