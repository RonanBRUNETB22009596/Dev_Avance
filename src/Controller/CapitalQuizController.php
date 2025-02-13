<?php

// src/Controller/CapitalQuizController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CapitalQuizController extends AbstractController
{
    /**
     * @Route("/capital-quiz", name="capital_quiz")
     */
    public function index(Request $request): Response
    {
        // Liste des pays avec leurs capitales et options
        $questions = [
            [
                'country' => 'Estonia',
                'correct_answer' => 'Tallinn',
                'options' => ['Tallinn', 'Riga', 'Vilnius', 'Helsinki']
            ],
            [
                'country' => 'Georgia',
                'correct_answer' => 'Tbilisi',
                'options' => ['Tbilisi', 'Yerevan', 'Baku', 'Tashkent']
            ],
            [
                'country' => 'Kazakhstan',
                'correct_answer' => 'Astana',
                'options' => ['Astana', 'Almaty', 'Tashkent', 'Bishkek']
            ],
            [
                'country' => 'El Salvador',
                'correct_answer' => 'San Salvador',
                'options' => ['San Salvador', 'Managua', 'Tegucigalpa', 'Guatemala City']
            ],
            // Ajoute les autres pays ici...
        ];

        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            // Récupérer les réponses de l'utilisateur
            $user_answers = $request->request->all();
            $score = 0;

            // Comparer les réponses de l'utilisateur avec les bonnes réponses
            foreach ($questions as $index => $question) {
                $user_answer = $user_answers['question_' . ($index + 1)] ?? null; // Récupérer la réponse de l'utilisateur

                // Si la réponse de l'utilisateur est correcte
                if ($user_answer && $user_answer === $question['correct_answer']) {
                    $score++;
                }
            }

            // Calculer le pourcentage
            $total_questions = count($questions);
            $percentage = ($score / $total_questions) * 100;

            // Afficher le score et le pourcentage
            return $this->render('capital_quiz_result.html.twig', [
                'score' => $score,
                'total_questions' => $total_questions,
                'percentage' => $percentage
            ]);
        }

        // Passer les questions à la vue pour les afficher
        return $this->render('capital_quiz.html.twig', [
            'questions' => $questions,
        ]);
    }
}

