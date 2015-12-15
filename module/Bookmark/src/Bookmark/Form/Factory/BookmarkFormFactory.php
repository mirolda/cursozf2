<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bookmark\Form\Factory;


use Bookmark\Form\InputFilter\BookmarkInputFilter;
use Bookmark\Form\BookmarkForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkFormFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return BookmarkForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new BookmarkForm();
        $filter = new UserInputFilter();
        $form->setInputFilter($filter->getInputFilter());

        return $form;
    }
}