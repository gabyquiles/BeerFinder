<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/19/18
 * Time: 11:08 PM
 */

namespace App\Admin;


use App\Form\AddressType;
use App\Form\CoordinatesType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class BreweryAdmin extends AbstractAdmin
{
    public function configureFormFields(FormMapper $form)
    {
        $form->add('name');
        $form->add('phone', TelType::class);
        $form->add('webpage');
        $form->add('address', AddressType::class);
        $form->add('coordinates', CoordinatesType::class);
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('phone');
        $listMapper->add('address.city', null, array(
            'label' => 'City'
        ));
        $listMapper->add('address.state', null, array(
            'label' => 'State'
        ));
    }
}