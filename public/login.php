<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            $title = "Login Page";
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/public/head.php';
            require $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';

            if(isset($_SESSION['id_user'])){
                header("Location: dashboard.php");
            }
        
        ?>
    </head>
    <body style="overflow-y: hidden;">
        <main class="vh-100">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-md-8 px-0 d-none d-md-block h-100">
                        <video class="w-100 h-100" style="object-fit: cover; object-position: left;" autoplay muted loop>
                            <source src="./assets/video/login-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-4 text-black">
                        <div class="p-5 ms-xl-4 my-5 logo__container"></div>
                        <div class="d-flex flex-column justify-content-center h-custom-2 px-5 ms-xl-4 pt-5 pt-xl-0 ">
                            <hr>
                            <form>
                                <h3 class="fw-normal " style="letter-spacing: 1px; color:#0053F1;">Zaloguj się</h3>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control email_input" style="color: #0053F1;" id="floatingInput" placeholder="Email">
                                    <label for="floatingInput">Adres email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control pwd_input" style="color: #0053F1;" id="floatingPassword" placeholder="Hasło">
                                    <label for="floatingPassword">Hasło</label>
                                </div>
                                <div class="pt-1 my-4">
                                    <button class="btn btn-lg btn-outline-primary login_btn" type="button" >Zaloguj</button>
                                </div>
                                <p>Nie masz konta? <a href="./register.php">Zarejestruj się 🔥🔥</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="./assets/js/login.js"></script>
    </body>
</html>