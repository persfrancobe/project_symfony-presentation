<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\ChoiceSubType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', CheckboxType::class,[
                'attr'=>[
                    'class' => 'custom-control-input',
                    'placeholder' => 'Monsieur ou Madame ou Mademoiselle'
                ]
            ])
            ->add('name', TextType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('email', EmailType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('tel', TelType::class,[
                'attr'=>[
                    'class' => 'custom-control-input',
                    'placeholder' => 'Exemple: 042390883 ou +3242390883 ou 003242390883'
                ]
            ])
            ->add('contenu', TextareaType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('file',FileType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('url',UrlType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('search',SearchType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('repeate',RepeatedType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('radio',RadioType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('password',PasswordType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('choice',ChoiceSubType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
