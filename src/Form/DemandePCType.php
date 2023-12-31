<?php

namespace App\Form;

use App\Entity\DemandeEnvoye;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class DemandePCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder 
            ->add('nomDemandePc', FileType::class, [
                'label' => 'Demande de permis de construire',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '21020004k',
                        'mimeTypes' => [
                            'application/msword',
                            'application/pdf'
                        ],
                        'mimeTypesMessage' => 'Entrer un bon format d\'de votre dossier (Fichier Pdf ou word)',
                    ])
                ], 
            ]) 
            ->add('nomDemandeAlignement', FileType::class, [
                'label' => 'Demande d\'alignement',
 
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '21020004k',
                        'mimeTypes' => [
                            'application/msword',
                            'application/pdf'
                        ],
                        'mimeTypesMessage' => 'Entrer un bon format d\'de votre dossier (Fichier Pdf ou word)',
                    ])
                ],
            ])
            ->add('nomAutreDossier', FileType::class, [
                'label' => 'Autre dossier',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '21020004k',
                        'mimeTypes' => [
                            'application/msword',
                            'application/pdf'
                        ],
                        'mimeTypesMessage' => 'Entrer un bon format d\'de votre dossier (Fichier Pdf ou word)',
                    ])
                ],
            ])
            
            ->add('valider', SubmitType::class , [

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandeEnvoye::class,
        ]);
    }
}
