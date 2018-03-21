<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/19/18
 * Time: 11:08 PM
 */

namespace App\Admin;


use App\Form\AddressType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BreweryAdmin extends AbstractAdmin
{
    public function configureFormFields(FormMapper $form)
    {
        $form->add('name');
        $form->add('phone');
        $form->add('webpage');
        $form->add('address', AddressType::class);
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
}