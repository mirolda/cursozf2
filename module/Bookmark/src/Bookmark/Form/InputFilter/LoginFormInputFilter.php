<?php

class LoginFormInputFilter implements InputFilterAwareInterface
{

    /**
     * @var InputFilterInterface
     */
    private $inputFilter;

    /**
     * @param InputFilterInterface $inputFilter
     */
    function __construct()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'), // clean blank spaces
                array('name' => 'StripTags'), // clean malicious code
                array('name' => 'StringToLower'),
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            'emailAddressInvalidFormat' => 'You entered an invalid email address',
                        ),
                    ),
                ),
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Email address is required',
                        ),
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name' => 'password',
            'required' => true,
            'filters' => array(
                array('name' => 'Alnum'),
            ),
        ));

        $this->inputFilter = $inputFilter;
    }


    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Not used');
    }

    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        return $this->inputFilter;
    }

}