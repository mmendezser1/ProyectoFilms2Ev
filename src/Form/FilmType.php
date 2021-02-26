<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilmType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tittle')
            ->add('Description')
            ->add('Director')
            ->add('Picture')
            ->add('TrailerLink')
            ->add('User')
            ->add('save',SubmitType::class, array('label' => 'Continue',  'attr' => array('class'=>'btn btn-primary')))
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
