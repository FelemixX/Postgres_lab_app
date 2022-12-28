<div class="container">
    <div class="d-flex justify-content-center">
        <div class="d-xl-inline-flex p-5 bd-highlight col-lg-4">
            <div class="col-12">
                <h1 class="text-center">
                    Авторизация
                </h1>
                <form id="auth-form">
                    <div class="mb-3">
                        <label for="user_login" class="form-label">
                            Логин
                        </label>
                        <input name="user_login" required type="text" class="form-control" id="user_login" aria-describedby="user login" placeholder="admin">
                    </div>
                    <div class=" mb-3">
                        <label for="user_password" class="form-label">
                            Пароль
                        </label>
                        <input name="user_password" required type="password" class="form-control" id="user_password" placeholder="theMostPowerfulPassword1337">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark mr-3">
                            Войти
                        </button>
                        <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#register-modal">
                            Регистрация
                        </a>
                    </div>
                </form>
                <?php if (isset($_GET["error"])): ?>
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mt-3"
                         role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill"/>
                        </svg>
                        <div>
                            Ошибка! Пользователя не существует!
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'template/modals/index/register_modal.php' ?>