const textInputs = document.querySelectorAll('input[type="text"]');

textInputs.forEach((textInput) => {
  textInput.addEventListener('input', () => {
    textInput.setCustomValidity('');
    if (textInput.validity.valueMissing) {
      textInput.setCustomValidity("Please, submit required data");
    }
    if (textInput.validity.typeMismatch) {
      textInput.setCustomValidity("Please, provide the data of indicated type");
    }
    if (textInput.validity.patternMismatch) {
      textInput.setCustomValidity("Please, provide the data of indicated type");
    }
  });

	textInput.addEventListener('invalid', () => {
    textInput.setCustomValidity('');
    if (textInput.validity.valueMissing) {
      textInput.setCustomValidity("Please, submit required data");
    }
    if (textInput.validity.typeMismatch) {
      textInput.setCustomValidity("Please, provide the data of indicated type");
    }
    if (textInput.validity.patternMismatch) {
      textInput.setCustomValidity("Please, provide the data of indicated type");
    }
  });
});