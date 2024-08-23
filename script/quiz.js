document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('start-quiz');
    const nextButton = document.getElementById('next-question');
    const restartButton = document.getElementById('restart-quiz');
    const introSection = document.getElementById('intro');
    const quizSection = document.getElementById('quiz');
    const resultsSection = document.getElementById('results');
    const questionContainer = document.getElementById('question-container');
    const scoreDisplay = document.getElementById('score');
    const adviceDisplay = document.getElementById('advice');
    const submitQuizButton = document.getElementById('submit-quiz');

    let shuffledQuestions = [];
    let currentQuestionIndex = 0;
    let score = 0;
    let wrongAnswers = [];

    startButton.addEventListener('click', startQuiz);
    nextButton.addEventListener('click', () => {
        currentQuestionIndex++;
        setNextQuestion();
    });
    submitQuizButton.addEventListener('click', (event) => {
        event.preventDefault();
        showResults();
        storeResults();
    });
    restartButton.addEventListener('click', restartQuiz);

    function startQuiz() {
        introSection.style.display = 'none';
        quizSection.style.display = 'block';
        shuffledQuestions = [...document.querySelectorAll('.question')].sort(() => Math.random() - 0.5);
        currentQuestionIndex = 0;
        score = 0;
        wrongAnswers = [];
        setNextQuestion();
    }

    function setNextQuestion() {
        resetState();
        if (currentQuestionIndex < shuffledQuestions.length) {
            showQuestion(shuffledQuestions[currentQuestionIndex]);
        } else {
            showResults();
            storeResults();
        }
    }

    function showQuestion(questionElement) {
        questionElement.classList.add('fade-in');
        questionElement.style.display = 'block';
        questionContainer.appendChild(questionElement);

        const answerButtons = questionElement.querySelectorAll('input[type="radio"]');
        answerButtons.forEach(button => {
            button.disabled = false;
            button.addEventListener('click', () => {
                selectAnswer(button, questionElement);
                nextButton.disabled = false; // Enable the "Next Question" button when an answer is selected
            });
        });

        nextButton.disabled = true; // Disable the "Next Question" button initially

        if (currentQuestionIndex < shuffledQuestions.length - 1) {
            nextButton.style.display = 'block';
            submitQuizButton.style.display = 'none';
        } else {
            nextButton.style.display = 'none';
            submitQuizButton.style.display = 'block';
        }
    }

    function resetState() {
        nextButton.style.display = 'none';
        submitQuizButton.style.display = 'none';
        while (questionContainer.firstChild) {
            questionContainer.removeChild(questionContainer.firstChild);
        }
    }

    function selectAnswer(selectedButton, questionElement) {
        const correctAnswer = questionElement.querySelector('input[type="radio"][value="' + questionElement.dataset.correct + '"]');
        const selectedAnswer = selectedButton.value;

        if (selectedAnswer === correctAnswer.value) {
            score++;
            questionElement.classList.add('correct');
        } else {
            wrongAnswers.push({
                question: questionElement.querySelector('p').innerText,
                selectedAnswer: selectedButton.parentNode.textContent.trim(),
                correctAnswer: correctAnswer.parentNode.textContent.trim(),
                explanation: questionElement.dataset.explanation // Get explanation from data attribute
            });
            questionElement.classList.add('wrong');
        }

        questionElement.querySelectorAll('input[type="radio"]').forEach(button => {
            button.disabled = true;
        });
    }

    function showResults() {
        quizSection.style.display = 'none';
        resultsSection.style.display = 'block';
        document.getElementById('score-value').innerText = score;
        provideAdvice();
    }

    function provideAdvice() {
        let adviceText = '';
        if (wrongAnswers.length === 0) {
            adviceText = 'Felicitări! Ai răspuns corect la toate întrebările. Continuă să îți aprofundezi cunoștințele!';
        } else {
            adviceText = '<p>Aici sunt întrebările la care ați răspuns greșit:</p><ul>';
            wrongAnswers.forEach((answer, index) => {
                adviceText += `
                    <li class="wrong-answer-item">
                        <p><strong>Întrebare ${index + 1}:</strong> ${answer.question}</p>
                        <p class="wrong-answer">Răspuns greșit: ${answer.selectedAnswer}</p>
                        <p class="correct-answer">Răspuns corect: ${answer.correctAnswer}</p>
                        <p class="explanation">Explicație: ${answer.explanation}</p>
                    </li>`;
            });
            adviceText += '</ul>';
        }
        adviceDisplay.innerHTML = adviceText;
    }

    function storeResults() {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "php/store_results.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Results stored successfully');
            }
        };
        xhr.send(`score=${score}`);
    }

    function restartQuiz() {
        location.reload(); // Reload the page to restart the quiz
    }
});
