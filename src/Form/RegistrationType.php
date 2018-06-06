<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 06.06.18
 * Time: 14:01
 */

namespace App\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('acceptRules', CheckboxType::class);
    }


    public function getParent()
    {
        return RegistrationFormType::class;

    }

}