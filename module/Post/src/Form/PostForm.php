<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 17:25
 */
namespace Post\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class PostForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('post');
        $this->addInputFilter();

        $this->setAttribute('method', 'POST');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',

        ]);
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'required' => true,
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'text',
            'type' => 'textarea',
            'required' => true,
            'options' => [
                'label' => 'Text',
            ],
        ]);
        $this->add([
            'name' => 'desc',
            'type' => 'textarea',
            'required' => true,
            'options' => [
                'label' => 'Desc',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
                'label'=>'Add post'
            ],
        ]);

    }

    private function addInputFilter()
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name'     => 'title',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 254
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name'     => 'text',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],

            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 15,
                        'max' => 10000
                    ],
                ],
            ],
        ]);
/*
        $inputFilter->add([
            'name'     => 'body',
            'required' => true,
            'filters'  => [
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 4096
                    ],
                ],
            ],
        ]);
*/
    }
}