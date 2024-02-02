let questions = document.querySelectorAll('.quizField');

let currentQuestionIndex = 0;
let transitionDuration = 300;

let quiz1 = document.getElementById('test1');
let quiz2 = document.getElementById('test2');

let answer6 = document.getElementById('6');
let answer7 = document.getElementById('7');
let answer9 = document.getElementById('9');
let answer10 = document.getElementById('10');
let answer11 = document.getElementById('11');

if (quiz1) {
    function showNextQuestion() {
        hide(questions[currentQuestionIndex]);
        setTimeout(() => {
            currentQuestionIndex++;
            if (currentQuestionIndex === 2) {
                answer6.onclick = function () {
                    document.forms["quizForm"].pathInformation.value = "2";
                    document.forms["quizForm"].submit();;
                }

                answer7.onclick = function () {
                    document.forms["quizForm"].pathInformation.value = "2";
                    document.forms["quizForm"].submit();;
                }

                answer9.onclick = function () {
                    document.forms["quizForm"].pathInformation.value = "5";
                    document.forms["quizForm"].submit();;
                }
            }
            if (currentQuestionIndex === 3) {
                answer10.onclick = function () {
                    document.forms["quizForm"].pathInformation.value = "3";
                    document.forms["quizForm"].submit();;
                }

                answer11.onclick = function () {
                    document.forms["quizForm"].pathInformation.value = "4";
                    document.forms["quizForm"].submit();
                }
            }

            if (currentQuestionIndex < questions.length) {
                show(questions[currentQuestionIndex]);
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
        element.style.display = 'flex';
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
                event.preventDefault();
                showPreviousQuestion();
            };
        });
    });
}
else {
    let result = {};

    questions.forEach((question, index) => {
        let answers = question.getElementsByClassName('answersField');

        Array.from(answers).forEach(answer => {
            answer.onclick = function () {
                result[question.id] = answer.id;
                showNextQuestion();
            };
        });

        if (index !== 0) {
            hide(question);
        }

        let previousButtons = question.getElementsByClassName('buttonContainer');

        Array.from(previousButtons).forEach(previousButton => {
            previousButton.onclick = function () {
                event.preventDefault();
                showPreviousQuestion();
            };
        });
    });

    function showNextQuestion() {
        hide(questions[currentQuestionIndex]);
        setTimeout(() => {
            currentQuestionIndex++;

            if (currentQuestionIndex < questions.length) {
                show(questions[currentQuestionIndex]);
            }
            else {
                let course = document.forms["quizForm"].id;
                let data = { result, course };

                fetch('/generatePlaylist', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-type': 'application/json',
                    },
                })
                    .then(function (response) {
                        if (!response.ok) {
                            throw new Error('La requête a échoué avec le code ' + response.status);
                        }
                        return response.json();
                    })
                    .then(function () {
                        window.location.href = '/playlist';
                    })
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
        element.style.display = 'flex';
    }
}
