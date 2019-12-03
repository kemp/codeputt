/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/** Application code */
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
