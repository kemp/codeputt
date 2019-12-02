(function(window, document) {
    'use strict';

    // Filter questions by title
    function filterQuestions(event) {
        let questions = document.querySelectorAll('.question');
        let query = event.target.value.toLowerCase(); // Case insensitive

        questions.forEach((questionEl) => {
            let title = questionEl.querySelector('.question-title').innerText.toLowerCase();

            if (title.indexOf(query) >= 0) {
                questionEl.style.display = 'block';
            } else {
                questionEl.style.display = 'none';
            }
        });
    }

    window.filterQuestions = filterQuestions;

})(window, document);
