class Register_Modal {
    constructor() {
        this.registerModal = document.getElementById('register-modal');
        this.registerModalForm = document.getElementById('register-form');
        this.registerBtn = document.getElementById('modal-register-btn');
        this.cancelBtn = document.getElementById('modal-reset-btn');

        this.initHandlers()
    }

    initHandlers() {
        this.registerBtn
        this.registerModal.addEventListener('hidden.bs.modal', this.onModalClose.bind(this));
        this.registerBtn.addEventListener('click', this.registerButtonClick.bind(this));
    }

    registerButtonClick() {
        this.registerModalForm.querySelectorAll('input').forEach((element) => {
            const inputName = element.getAttribute('name');
            const inputValue = element.value;
            inputsValues.push({inputName: inputValue});

        });
        console.log(inputsValues);
        fetch('template/auth/registration.php',
            {
                method: 'POST',
                body: JSON.stringify(inputsValues),
                headers: {
                    'Content-Type': 'application/json'
                },
            }).then(
            response => response.json()
        ).then(
            response => console.log(response)
        );
    }

    onModalClose() {
        this.registerModalForm.reset()
    }

    onRegister() {
        $('#register-modal').modal('hide');
        this.registerModalForm.reset();
    }


}
