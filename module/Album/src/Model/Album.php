<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 14:22
 */
namespace Album\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;


class Album  implements InputFilterAwareInterface
{
    public $id;
    public $text;
    public $title;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->text = !empty($data['text']) ? $data['text'] : null;
        $this->title  = !empty($data['title']) ? $data['title'] : null;
    }

    /* Add the following methods: */

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'text',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'text' => $this->artist,
            'title'  => $this->title,
        ];
    }
}

