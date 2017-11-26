<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;

use AppBundle\Utils\CardChance;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request, CardChance $card_chance)
    {
        $cards = array_combine($card_chance->getCards(), $card_chance->getCards());

        $form = $this->createFormBuilder()
            ->add('card', CollectionType::class, array(
                'constraints'   => new NotBlank(),
                'entry_type'    => ChoiceType::class,
                'entry_options' => array(
                    'choices'   => $cards
                ),
            ))
            ->getForm()
            ->createView();

        return $this->render('default/index.html.twig', array(
            'form' => $form
        ));
    }
}
