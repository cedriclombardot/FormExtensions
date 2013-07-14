<?php

namespace Avocode\FormExtensionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Vincent Touzet <vincent.touzet@gmail.com>
 */
class TimePickerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'minute_step'   => $options['minute_step'],
            'second_step'   => $options['second_step'],
            'disable_focus' => $options['disable_focus'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'widget'        => 'single_text',
            'minute_step'   => 15,
            'second_step'   => 15,
            'disable_focus' => false,
            'attr'          => array(
                'class' => 'input-small',
            ),
        ));
    }

    public function getParent()
    {
        return 'time';
    }

    public function getName()
    {
        return 'time_picker';
    }
}