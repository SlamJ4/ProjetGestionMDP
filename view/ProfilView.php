<?php

class ProfilView extends View
{

    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
        <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="accueil_page.php">TopLock</a>
            </nav>

            <div id="card">
            <h1 action="profil.php">%s</h1>
            <div class="image-crop">
                <img id="avatar" src="https://drive.google.com/uc?id=1EVA3KUBLxCXF2EGmTf4LUB8F4yAvBrjl"></img>
            </div>
            <div id="bio-txt">
                <form method="POST">
                <table align="center">
                    <tr>
                        <td align="right">
                            <label for="pseudo">
                                <b>Pseudo :</b>
                            </label>
                        </td>
                        <td>
                            %s
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="email">
                                <b>Adresse Email :</b>
                            </label>
                        </td>
                        <td>
                            %s
                        </td>
                    </tr>
                </table>
            </form>
            </div>
            <div id="stats">
                <div class="col" id="col1">
                    <p class="stat">108</p>
                    <p class="label">Langue</p>
                </div>
                        <div class="col" id="col2">
                    <p class="stat">457</p>
                    <p class="label">Enregistrements</p>
                </div>
                        <div class="col" id="col3">
                    <p class="stat">229</p>
                    <p class="label">Following</p>
                </div>
            </div>
            <div id="buttons">
                <form method="POST" action="profil.php">
                    <table>
                        <tr>
                            <td>
                                <input class="btn" type="submit" name="editionProfil" value="Éditer"/>
                            </td>
                            <td>
                            </td>
                            <td>
                                <input class="btn" type="submit" name="deco" id="msg" value="Déco"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </div>
    EOT;

    $temp = sprintf($sContent, $infosUser['pseudo'], $infosUser['site'],$infosUser['email']);

    return($temp);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }

}