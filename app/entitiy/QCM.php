<?php

class QCM
{
    /** @var Question[] */
    private array $questions;

    /**
     * @param Question $question
     * 
     * @return [type]
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    /**
     * Get the value of questions
     */ 
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Permet d'afficher le template HTML d'un QCM
     * @return [type]
     */
    public function show()
    {
       include 'template.php';
    }

    /**
     * Permet de vérifier les réponses du QCM
     * @return [type]
     */
    public function check()
    {
        // ...
        $this->show();
        foreach($_POST['answers'] as $questionKey => $answerKey)
        {
            $question = $this->questions[$questionKey];
            $answers = $question->getAnswers();
            $checkedAnswer = $answers[$answerKey];
            $result = $checkedAnswer->getIsTheGoodAnswer() ? 'bonne' : 'fausse';
            echo "<p>La réponse à la question " . $question->getTitle() . " est " . $result . "</p>";
        }
    }


}