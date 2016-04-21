<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ArtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add( 'title', TextType::class, array('label'=>'标题*', 'attr'=>array('class'=>'form-control') ) )
             ->add( 'behalf', TextType::class, array('label'=>'导图', 'attr'=>array('class'=>'form-control', 'placeholder'=>'图片地址')))
             ->add( 'cat', EntityType::class, array('class' => 'AppBundle:Cat', 'choice_label' => 'name', 'label'=>'栏目',))
             ->add( 'content', CKEditorType::class, array( 'label'=>'内容*', 'attr'=>array('class'=>'form-control edit')) );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Art'
        ));
    }
}