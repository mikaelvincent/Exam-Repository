document.addEventListener('DOMContentLoaded', () => {
    const answerButtons = document.querySelectorAll('#answers .btn-outline-primary');
    const submitButton = document.getElementById('submit-answer');
    let selectedButton = null;

    /**
     * Handles the selection and deselection of answer buttons.
     * Ensures only one button is active at a time.
     * Updates the state of the submit button based on selection.
     * @param {Event} event - The click event triggered by a button.
     */
    const handleButtonClick = (event) => {
        const button = event.currentTarget;

        if (button.classList.contains('active')) {
            button.classList.remove('active');
            selectedButton = null;
        } else {
            if (selectedButton) {
                selectedButton.classList.remove('active');
            }
            button.classList.add('active');
            selectedButton = button;
        }

        updateSubmitButtonState();
    };

    /**
     * Updates the disabled state of the submit button based on selection.
     * Adds 'disabled' class if no button is selected, removes it otherwise.
     */
    const updateSubmitButtonState = () => {
        if (selectedButton) {
            submitButton.classList.remove('disabled');
            submitButton.disabled = false;
        } else {
            submitButton.classList.add('disabled');
            submitButton.disabled = true;
        }
    };

    // Attach click event listeners to each answer button
    answerButtons.forEach(button => {
        button.addEventListener('click', handleButtonClick);
    });

    // Initialize the submit button state on page load
    updateSubmitButtonState();
});
