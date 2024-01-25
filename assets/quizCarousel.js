let questions = document.querySelectorAll('.quizField');
let currentQuestionIndex = 0;
let transitionDuration = 300;

function showNextQuestion() {
  hide(questions[currentQuestionIndex]);

  setTimeout(() => {
    currentQuestionIndex++;

    if (currentQuestionIndex < questions.length) {
      show(questions[currentQuestionIndex]);
    } else {
      console.log('Arnold, vous êtes virés !');
    }
  }, transitionDuration);
}

function showPreviousQuestion() {
  if (currentQuestionIndex > 0) {
    hide(questions[currentQuestionIndex]);

    setTimeout(() => {
      currentQuestionIndex--;

      show(questions[currentQuestionIndex]);
    }, transitionDuration);
  }
}

function hide(element) {
  element.style.display = 'none';
}

function show(element) {
  element.style.display = 'block';
}

questions.forEach((question, index) => {
  let answers = question.getElementsByClassName('answersField');

  Array.from(answers).forEach(answer => {
    answer.onclick = function () {
      showNextQuestion();
    };
  });

  if (index !== 0) {
    hide(question);
  }

  let previousButtons = question.getElementsByClassName('buttonContainer');

  Array.from(previousButtons).forEach(previousButton => {
    previousButton.onclick = function () {
      showPreviousQuestion();
    };
  });
});
