class Register_Modal {
    constructor() {
        this.xhr = new XMLHttpRequest();

        this.registerModal = document.getElementById('register-modal');
        this.registerModalForm = document.getElementById('register-form');
        this.registerBtn = document.getElementById('modal-register-btn');
        this.cancelBtn = document.getElementById('modal-reset-btn');

        this.initHandlers()
    }

    initHandlers() {
        this.registerModal.addEventListener('hidden.bs.modal', this.onModalClose.bind(this));
        this.registerBtn.addEventListener('click', this.registerButtonClick.bind(this));
    }

    registerButtonClick() {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'template/auth/registration.php');
        xhr.onload = () => {

        };
    }

    onModalClose() {
        this.registerModalForm.reset()
    }

    onRegister() {
        $('#register-modal').modal('hide');
        this.registerModalForm.reset();
    }


}
