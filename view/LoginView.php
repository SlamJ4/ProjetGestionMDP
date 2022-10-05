<?php

class LoginView extends View
{

    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
    <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                    <br>
                    <br>
                <img src="/ProjetGestionMDP/images/logo.png" alt="IMG" class="centrer" style="width:200px;height:200px;">
            </div>

            <form class="login100-form validate-form" method="POST" action="php/connexion.php">
                <span class="login100-form-title">
                    Connexion
                </span>

                <?php
                    if($erreur == 1) {
                        ?>
                        <p style="color: red;">Les identifiants sont incorrects</p>
                        <?php
                    }
                ?>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email" required="required">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Mot de passe" required="required">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button name="connexion" class="login100-form-btn">
                        Connexion
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Oublier
                    </span>
                    <a class="txt2" href="#">
                        Utilisateur / Mot de Passe ?
                    </a>
                </div>

                <div class="text-center p-t-10">
                    <a class="txt2" href="php/inscription_form.php">
                        Créer un utilisateur
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
    EOT;
    
    return($sContent);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }

}