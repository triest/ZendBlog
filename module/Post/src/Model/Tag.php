<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 26.01.2018
 * Time: 17:10
 */

namespace Post\Model;




    use Doctrine\ORM\Mapping as ORM;

/**
 * Этот класс представляет собой тег.
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag
{
    public $id;
    public $text;


    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->text = !empty($data['text']) ? $data['text'] : null;

    }

    /* Add the following methods: */

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


        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }


    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'text' => $this->text,

        ];
    }
}