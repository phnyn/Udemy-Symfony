<?php

namespace App\Form;

use App\Entity\Trip;
use App\Entity\Car;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startLocation', TextType::class, [
                'label' => 'Startort',
            ])
            ->add('endLocation', TextType::class, [
                'label' => 'Zielort',
            ])
            ->add('startDateTime', DateTimeType::class, [
                'label' => 'Startzeitpunkt',
                'years' => $this->getAvailableYears(),
            ])
            ->add('endDateTime', DateTimeType::class, [
                'label' => 'Endzeitpunkt',
                'years' => $this->getAvailableYears(),
            ])
            ->add('drivenKilometers',TextType::class, [
                'label' => 'Gefahrene Kilometer',
            ])
            ->add('car', EntityType::class, [
                'label' => 'Fahrzeug',
                'class' => Car::class,
                'expanded' => true,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }

    private function getAvailableYears(){

        $actualYear = date('Y')-1;
        $targetYear = $actualYear + 3;
        $returnArray = [];

        for($i = $actualYear; $i < $targetYear; $i++){
            $returnArray[$i] = $i;
        }

        return $returnArray;
    }
}
