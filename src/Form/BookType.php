<?php
/**
 * Book type.
 */

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Tag;
use App\Entity\Category;
use App\Form\DataTransformer\TagsDataTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BookType.
 */
class BookType extends AbstractType
{
    /**
     * Tags data transformer.
     *
     * @var \App\Form\DataTransformer\TagsDataTransformer
     */
    private $tagsDataTransformer;

    /**
     * TaskType constructor.
     *
     * @param \App\Form\DataTransformer\TagsDataTransformer $tagsDataTransformer Tags data transformer
     */
    public function __construct(TagsDataTransformer $tagsDataTransformer)
    {
        $this->tagsDataTransformer = $tagsDataTransformer;
    }

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder The form builder
     * @param array                                        $options The options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'title',
            TextType::class,
            [
                'label' => 'label_title',
                'required' => true,
                'attr' => ['max_length' => 45],
            ]
        );

        $builder->add(
            'author',
            EntityType::class,
            [
                'class' => Author::class,
                'choice_label' => function ($author) {
                    return $author->getName();
                },
                'label' => 'label_author',
                'placeholder' => 'label_author',
                'required' => true,
            ]
        );

        $builder->add(
            'description',
            TextType::class,
            [
                'label' => 'label_description',
                'required' => true,
                'attr' => ['max_length' => 255],
            ]
        );

        $builder->add(
            'category',
            EntityType::class,
            array(
                'label' => 'label_category',
                'class' => "App\Entity\Category",
                'choice_label' => 'content'
            )
        );


//        $builder->add(
//            'author',
//            TextType::class,
//            [
//                'label' => 'label_firstname',
//                'required' => true,
//                'attr' => ['max_length' => 255],
//            ]
//        );

//        $builder->add(
//            'author',
//            AuthorType::class,
//            array(
//                'choice_label' => 'author'
//            )
//        );

        $builder->add(
            'tags',
            TextType::class,
            [
                'label' => 'label_tags',
                'required' => false,
                'attr' => ['max_length' => 128],
            ]
        );

        $builder->get('tags')->addModelTransformer(
            $this->tagsDataTransformer
        );
    }

    /**
     * Configures the options for this type.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Book::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'book';
    }
}