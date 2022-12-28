<div class="modal fade" id="register-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="register-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5 w-100" id="register-modal-label">
                    Регистрация
                </h1>
            </div>
            <form id="register-form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_name_register_modal" class="form-label">
                            Имя
                        </label>
                        <input name="user_name_register_modal" required type="text" pattern="[а-яА-Яa-zA-Z]" class="form-control" id="user_name_register_modal" aria-describedby="user login">
                    </div>
                    <div class="mb-3">
                        <label for="user_login_register_modal" class="form-label">
                            Логин
                        </label>
                        <input name="user_login_register_modal" required type="text" pattern="^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$" class="form-control" id="user_login_register_modal" aria-describedby="user login">
                    </div>
                    <div class="mb-3">
                        <label for="user_email_register_modal" class="form-label">
                            Email
                        </label>
                        <input name="user_email_register_modal" required type="email" pattern="^([^ ]+@[^ ]+\.[a-z]{2,6}|)$" class="form-control" id="user_email_register_modal" aria-describedby="user login">
                    </div>
                    <div class="mb-3">
                        <label for="user_password_register_modal" class="form-label">
                            Пароль
                        </label>
                        <input name="user_password_register_modal" required type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" class="form-control" id="user_password_register_modal">
                    </div>
                    <div class="mb-3">
                        <label for="user_password_repeated_register_modal" class="form-label">
                            Пароль еще раз
                        </label>
                        <input name="user_password_repeated_register_modal" required type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" class="form-control" id="user_password_repeated_register_modal">
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-reset-btn">
                    Отменить
                </button>
                <button type="button" class="btn btn-dark" id="modal-register-btn">
                    Зарегистрироваться
                </button>
            </div>
        </div>
    </div>
</div>