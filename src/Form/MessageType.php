<?php

namespace App\Form;
use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sexe', TextType::class,[
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
            ->add('gsm', TelType::class,[
                'attr'=>[
                    'class' => 'custom-control-input',
                    'placeholder' => 'Exemple: 0423908183 ou +32423908183 ou 0032423908183'
                ]
            ])
            ->add('objet', TextType::class,[
                'attr'=>['class' => 'custom-control-input']
            ])
            ->add('contenu', TextType::class,[
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