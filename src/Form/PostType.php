<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Auteur;
use App\Entity\Tag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('texte')
            ->add('dateCreation', DateType::class,[
			            'widget' => 'single_text',
                        'format' =>'yyyy-MM-dd'
                ])
	        ->add('auteur', EntityType::class,[
                    'class' => Auteur::class,
                    'choice_value' => 'id',
                    'choice_label' => 'pseudo'
                 ])
            ->add('image')
            ->add('slug')
	        ->add('tags', EntityType::class, [
                    'class' => Tag::class,
                    'choice_value' => 'id',
                    'choice_label' => 'nom',
              		'multiple' => true,
              		'expanded' => true
                 ])
	        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
