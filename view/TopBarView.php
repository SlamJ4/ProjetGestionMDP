<?php

class TopBar extends View
{
    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="accueil_page.php">TopLock</a>
    <ul class="navbar-nav mr-auto">
    </ul>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary rounded-1 py-2 px-2" data-toggle="modal" data-target="#Modal">
                Add Password
              </button>
              <!-- Modal -->
              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="column" id="main">
                        <h1>Add password </h1>
                        <h3>ajouter un mot de passe en inscrivant vos informations ci-dessous</h3>
                        <form method="POST" action="AddPassword.php">
                          <div class="form-group">
                            <label for="InputSite">Site</label>
                            <input type="name" class="form-control" name="name" placeholder="Site">
                          </div>
                          <div class="form-group">
                            <label for="InputLogin">Identifiant </label>
                            <input type="name" class="form-control" name="identifiant" placeholder="identifiant du compte">
                          </div>
                          <div class="form-group">
                            <label for="group" class="col-form-label">Groupe :</label>
                            <select class="form-control" name="pets" id="pet-select">
                            <option value="">--Choisir un groupe--</option>
                              <?php
                              foreach ($infosGroups as $key) {
                                              ?> <option value="<?php echo $key['id']; ?>"><?php echo $key['nom']; ?></option><?php
                                          }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="InputPwd">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe du compte">
                          </div>
                    <button type="submit" name="add" value="Créer" class="btn btn-primary">Add Password</button>
                  </form>
                </div>
                <div>
              </div>
            </div>
          </div>
        </div>
    </nav>
    EOT;
    
    return($sContent);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }
} 