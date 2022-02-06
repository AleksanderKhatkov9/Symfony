<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class TicketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('user_name', TextType::class,array('label' => 'Input to FIO User'))
            ->add('email', EmailType::class,array('label' => 'Input to Email'))
            ->add('data', DateType::class, array('label' => 'Input to Date'))
            ->add('name_doctor', TextType::class,array('label' => 'Input to Doctor'))
            ->add('specialty', TextType::class,array('label' => 'Input to Specialty'));
    }

}