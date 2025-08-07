import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('preinscriptionForm');
    const steps = Array.from(document.querySelectorAll('.step'));
    const nextButtons = document.querySelectorAll('.next-step');
    const prevButtons = document.querySelectorAll('.prev-step');

    let currentStep = 0;

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('hidden', index !== stepIndex);
            const title = step.querySelector('h2');
            if (title) {
                title.textContent = `Phase ${index + 1} : ` + title.textContent.split(': ')[1];
                removeCheckmark(index);
                removeCross(index);
            }
        });
    }

    function validateStep(stepIndex) {
        const currentStepElement = steps[stepIndex];
        const inputs = currentStepElement.querySelectorAll('input, select, textarea');
        let isValid = true;

        // Remove previous error messages
        currentStepElement.querySelectorAll('.error-message').forEach(el => el.remove());

        inputs.forEach(input => {
            let value;
            if (input.type === 'file') {
                value = input.files.length;
            } else if (input.type === 'checkbox') {
                // For checkboxes, check if at least one with the same name is checked
                if (input.hasAttribute('required')) {
                    const checkboxes = currentStepElement.querySelectorAll(`input[type="checkbox"][name="${input.name}"]`);
                    const checkedOne = Array.from(checkboxes).some(cb => cb.checked);
                    if (!checkedOne) {
                        isValid = false;
                        checkboxes.forEach(cb => cb.classList.add('border-red-500'));
                        showError(checkboxes[checkboxes.length - 1], 'Veuillez cocher au moins une option.');
                    } else {
                        checkboxes.forEach(cb => cb.classList.remove('border-red-500'));
                    }
                    // Skip individual checkbox validation since group is validated
                    return;
                } else {
                    value = input.checked;
                }
            } else {
                value = input.value.trim();
            }

            if (input.hasAttribute('required') && (value === '' || value === 0 || value === false)) {
                isValid = false;
                input.classList.add('border-red-500');
                showError(input, 'Ce champ est requis.');
            } else {
                input.classList.remove('border-red-500');
            }
        });

        // Example: email validation if email input exists
        if (stepIndex === 0) {
            const emailInput = currentStepElement.querySelector('input[type="email"]');
            if (emailInput && emailInput.value.trim()) {
                const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim());
                if (!emailValid) {
                    isValid = false;
                    emailInput.classList.add('border-red-500');
                    showError(emailInput, "L'adresse email n'est pas valide.");
                }
            }
        }

        if (isValid) {
            removeCross(stepIndex);
            addCheckmark(stepIndex);
        } else {
            removeCheckmark(stepIndex);
            addCross(stepIndex);
        }

        return isValid;
    }

    function showError(input, message) {
        if (input.nextElementSibling && input.nextElementSibling.classList.contains('error-message')) return;

        const error = document.createElement('div');
        error.className = 'error-message text-red-600 text-sm mt-1';
        error.textContent = message;
        input.insertAdjacentElement('afterend', error);
    }

    function addCheckmark(stepIndex) {
        const stepTitle = steps[stepIndex].querySelector('h2');
        if (!stepTitle.querySelector('.checkmark')) {
            const checkmark = document.createElement('span');
            checkmark.className = 'checkmark text-green-500 ml-2';
            checkmark.innerHTML = '&#10004;'; // ✔
            stepTitle.appendChild(checkmark);
        }
    }

    function removeCheckmark(stepIndex) {
        const stepTitle = steps[stepIndex].querySelector('h2');
        const checkmark = stepTitle.querySelector('.checkmark');
        if (checkmark) checkmark.remove();
    }

    function addCross(stepIndex) {
        const stepTitle = steps[stepIndex].querySelector('h2');
        if (!stepTitle.querySelector('.cross')) {
            const cross = document.createElement('span');
            cross.className = 'cross text-red-500 ml-2';
            cross.innerHTML = '&#10006;'; // ✖
            stepTitle.appendChild(cross);
        }
    }

    function removeCross(stepIndex) {
        const stepTitle = steps[stepIndex].querySelector('h2');
        const cross = stepTitle.querySelector('.cross');
        if (cross) cross.remove();
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // form.addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     let allValid = true;
    //     for (let i = 0; i < steps.length; i++) {
    //         if (!validateStep(i)) {
    //             allValid = false;
    //             if (i !== currentStep) {
    //                 currentStep = i;
    //                 showStep(currentStep);
    //             }
    //             break;
    //         }
    //     }
    //     if (allValid) {
    //         alert('Formulaire soumis avec succès !');
    //         // form.submit(); // Uncomment to actually submit
    //     }
    // });

    // Live validation on input/change
    steps.forEach((step, index) => {
        const inputs = step.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', () => validateStep(index));
            input.addEventListener('change', () => validateStep(index));
        });
    });

    showStep(currentStep);
});


