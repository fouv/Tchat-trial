<?php


namespace PafBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;


class ChatForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextType::class,array('label'=> 'Message'))
            ->add('save', SubmitType::class,array(
                "label"=> 'Save',
                "attr" => array('class' => 'btn-floating btn-large waves-effect waves-light')
            ));
    }
    public function getBlockPrefix()
    {
        return 'forms_bundle_person';
    }
}