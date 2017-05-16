<?php

namespace PafBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;



class IndexForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
        {
         $builder
           ->add('name', TextType::class, array(
               'required'=> true,
               'attr' => array('placeholder' =>'Name')
           ))
           ->add('save', SubmitType::class,array(
               "label"=> 'PafChat',
               "attr" => array('class' => 'login-button')
               ));
        }
}