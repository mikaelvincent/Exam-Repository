// File: assets/js/explanationNavigation.js

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('explanations');
    const prevButton = document.getElementById('prev-explanation');
    const nextButton = document.getElementById('next-explanation');
    const generateButton = document.getElementById('generate-new-explanation');
    const currentIndexSpan = document.getElementById('current-explanation-index');
    const totalCountSpan = document.getElementById('total-explanations');
    const modalContent = modal.querySelector('.modal-content');

    /**
     * Retrieves all modal body elements representing explanations.
     * @returns {NodeList} List of modal-body elements.
     */
    const getModalBodies = () => modalContent.querySelectorAll('.modal-body');

    // Initialize currentIndex to the last explanation
    let currentIndex = getModalBodies().length > 0 ? getModalBodies().length - 1 : 0;

    /**
     * Updates the visibility of modal bodies based on the current index.
     */
    const updateVisibility = () => {
        const modalBodies = getModalBodies();
        modalBodies.forEach((body, index) => {
            body.classList.toggle('d-none', index !== currentIndex);
        });
        currentIndexSpan.textContent = currentIndex + 1;
        totalCountSpan.textContent = modalBodies.length;

        prevButton.disabled = currentIndex === 0;
        nextButton.disabled = currentIndex === modalBodies.length - 1;
        prevButton.classList.toggle('disabled', prevButton.disabled);
        nextButton.classList.toggle('disabled', nextButton.disabled);
    };

    /**
     * Navigates to the previous explanation.
     */
    const showPrevious = () => {
        if (currentIndex > 0) {
            currentIndex -= 1;
            updateVisibility();
        }
    };

    /**
     * Navigates to the next explanation.
     */
    const showNext = () => {
        const modalBodies = getModalBodies();
        if (currentIndex < modalBodies.length - 1) {
            currentIndex += 1;
            updateVisibility();
        }
    };

    /**
     * Generates a new explanation with dynamic content.
     */
    const generateNewExplanation = () => {
        const newBody = document.createElement('div');
        newBody.classList.add('modal-body');
        const content = document.createElement('p');
        content.textContent = '$explanation->content';
        newBody.appendChild(content);
        modalContent.insertBefore(newBody, modalContent.querySelector('.modal-footer'));
        currentIndex = getModalBodies().length - 1;
        updateVisibility();
    };

    /**
     * Ensures at least one explanation exists.
     */
    const ensureAtLeastOneExplanation = () => {
        if (getModalBodies().length === 0) {
            generateNewExplanation();
        }
    };

    // Attach event listeners to navigation and generation buttons
    prevButton.addEventListener('click', showPrevious);
    nextButton.addEventListener('click', showNext);
    generateButton.addEventListener('click', generateNewExplanation);

    // Initialize the modal with at least one explanation and set visibility
    ensureAtLeastOneExplanation();
    updateVisibility();
});
