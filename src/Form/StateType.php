<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/22/18
 * Time: 9:33 AM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
//        TODO: Extract PR as its own country
        $resolver->setDefaults(array(
            'placeholder' => '-- Select One --',
            'choices' => array(
                'Alabama' => 'AL',
                'Alaska' => 'AK',
                'Arizona' => 'AZ',
                'Arkansas' => 'AR',
                'California' => 'CA',
                'Colorado' => 'CO',
                'Connecticut' => 'CT',
                'Delaware' => 'DE',
                'Florida' => 'FL',
                'Georgia' => 'GA',
                'Hawaii' => 'HI',
                'Idaho' => 'ID',
                'Illinois' => 'IL',
                'Indiana' => 'IN',
                'Iowa' => 'IA',
                'Kansas' => 'KS',
                'Kentucky' => 'KY',
                'Louisiana' => 'LA',
                'Maine' => 'ME',
                'Maryland' => 'MD',
                'Massachusetts' => 'MA',
                'Michigan' => 'MI',
                'Minnesota' => 'MN',
                'Mississippi' => 'MS',
                'Missouri' => 'MO',
                'Montana' => 'MT',
                'Nebraska' => 'NE',
                'Nevada' => 'NV',
                'New Hampshire' => 'NH',
                'New Jersey' => 'NJ',
                'New Mexico' => 'NM',
                'New York' => 'NY',
                'North Carolina' => 'NC',
                'North Dakota' => 'ND',
                'Ohio' => 'OH',
                'Oklahoma' => 'OK',
                'Oregon' => 'OR',
                'Pennsylvania' => 'PA',
                'Puerto Rico' => 'PR',
                'Rhode Island' => 'RI',
                'South Carolina' => 'SC',
                'South Dakota' => 'SD',
                'Tennessee' => 'TN',
                'Texas' => 'TX',
                'Utah' => 'UT',
                'Vermont' => 'VT',
                'Virginia' => 'VA',
                'Washington' => 'WA',
                'West Virginia' => 'WV',
                'Wisconsin' => 'WI',
                'Wyoming' => 'WY',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}