<?php

namespace App\Controller;

use App\Entity\Flag;
use App\Form\FlagType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FlagController extends AbstractController
{
    #[Route('/flag_qcm', name: 'app_flag_qcm')]
    public function index(Request $request): Response
    {
        // Example of flag questions with choices
        $flagQuestions = [
            new Flag('United States', 'Stars and Stripes', [
                'Stars and Stripes' => 'stars_and_stripes',
                'Union Jack' => 'union_jack',
                'Tricolor' => 'tricolor',
                'Maple Leaf' => 'maple_leaf',
            ]),
            new Flag('France', 'Tricolor', [
                'Stars and Stripes' => 'stars_and_stripes',
                'Union Jack' => 'union_jack',
                'Tricolor' => 'tricolor',
                'Maple Leaf' => 'maple_leaf',
            ]),
            // Add more flags here
        ];

        // Prepare the first question (for simplicity)
        $question = $flagQuestions[0]; // Get the first flag question

        // Create the form
        $form = $this->createForm(FlagType::class, $question, [
            'flag_choices' => $question->getChoices(),
        ]);

        // Handle form submission
        $form->handleRequest($request);

        $score = 0;
        if ($form->isSubmitted() && $form->isValid()) {
            // Check if the selected answer is correct
            $selectedAnswer = $form->getData()->getChoices();
            if ($selectedAnswer === $question->getCorrectAnswer()) {
                $score++;
            }

            return $this->render('flag/score.html.twig', [
                'score' => $score,
            ]);
        }

        return $this->render('flag/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}