<?php 

declare(strict_types=1);

namespace App\Form;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CarType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
                'label' => 'Bezeichnung',
                'required' => false,
            ])
            ->add('plate', TextType::class, [
                'label' => 'Kennzeichen',
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Speichern',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void 
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}