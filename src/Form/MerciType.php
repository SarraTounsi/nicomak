<?php

namespace App\Form;

use App\Entity\Merci;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MerciType extends AbstractType
{
    private const EMPLOYEES = [
        'Myriam' => '/images/myriam.png',
        'Geoffroy' => '/images/geoffroy.png',
        'Laura' => '/images/laura.png',
        'Céline' => '/images/celine.png',
        'Alice' => '/images/alice.png',
        'Laetitia' => '/images/laetitia.png',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fromEmployee', ChoiceType::class, [
                'choices' => array_keys(self::EMPLOYEES),
                'choice_label' => function ($choice) {
                    return $choice; 
                },
                'label' => 'De',
                'placeholder' => 'Choisissez un employé',
                'disabled' => true,
            ])
            ->add('toEmployee', ChoiceType::class, [
                'choices' => array_keys(self::EMPLOYEES),
                'choice_label' => function ($choice) {
                    return $choice;
                },
                'label' => 'À',
                'placeholder' => 'Choisissez un employé',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'placeholder' => 'Msg',
                ],
            ])
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text', 
                'label' => 'Date',
                'data' => new \DateTime(),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Merci::class,
        ]);
    }

    public static function getAvatar(string $employee): ?string
    {
        return self::EMPLOYEES[$employee] ?? null;
    }
}
