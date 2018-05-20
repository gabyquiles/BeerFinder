<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 5/20/18
 * Time: 1:19 PM
 */

namespace App\Form;


use App\Form\DataTransformers\PointTextDataTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CoordinatesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('latitude', TextType::class);
        $builder->add('longitude', TextType::class);

        $builder->addModelTransformer(new PointTextDataTransformer());
    }
}