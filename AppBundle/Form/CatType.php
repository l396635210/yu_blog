<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
class CatType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add( 'name', TextType::class, array('label'=>'标题*', 'attr'=>array( 'name'=>'name','class'=>'form-control', 'value'=>$this->getName($options) ) ) );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cat'
        ));
    }

    protected function getData(array $options){
        return $options['data'];
    }

    protected function getName(array $options){
        return $this->getData($options)->getName();
    }
}