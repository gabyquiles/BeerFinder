<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/6/18
 * Time: 11:42 PM
 */

namespace App\Form;


use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('streetAddress1');
        $builder->add('streetAddress2', TextType::class, array(
            'required' => false
        ));
        $builder->add('city');
        $builder->add('state');
        $builder->add('postalCode');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Address::class,
        ));
    }
}