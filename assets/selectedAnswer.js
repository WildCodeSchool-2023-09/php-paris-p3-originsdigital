const answers = document.querySelectorAll('.answersField');
for (let answer of answers) {
    answer.addEventListener('mouseover', function() {
        let selectedAnswer = document.querySelector('.selectedAnswer')
        if (!answer.classList.contains('selectedAnswer')) {
            if (selectedAnswer !== null) {
                selectedAnswer.classList.remove('selectedAnswer');
            }
        }
        answer.classList.toggle('selectedAnswer');
})
}

