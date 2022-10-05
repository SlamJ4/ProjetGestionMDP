<?php

class ContentView extends View
{

    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
        <div class="container">
        <div class="content">
    
        <div class="container">
          <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
              <div class="form h-100">
                <h3 id="nomSite">nom du site</h3>
                <form class="mb-5" method="POST" id="contactForm" name="contactForm" action="updatePassword.php">
                  <div class="row">
                    <div class="col-md-6 form-group mb-3">
                      <label for="" class="col-form-label">Nom du compte :</label>
                      <input type="text" class="form-control" name="name" id="loginPwdCompte" placeholder="Nom du compte">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                      <label for="" class="col-form-label">Mot de passe du compte :</label>
                      <input type="text" class="form-control" name="text" id="passPwdCompte"  placeholder="Mot de passe">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                      <label for="group" class="col-form-label">Groupe :</label>
                      <select class="form-control" name="pets" id="pet-select">
                        <option value="">--Choisir un groupe--</option>
                        <?php
                        $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

                        $group_ids = $bdd -> prepare("SELECT id,nom FROM groupes WHERE user_id = ?");
                        $group_ids -> execute(array($_SESSION['res_id']));
                        
                        $infosGroups = $group_ids -> fetchAll();

                        foreach ($infosGroups as $key) {
                                        ?> <option value="<?php echo $key['nom']; ?>"><?php echo $key['nom']; ?></option><?php
                                    }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group mb-3">
                      <label for="message" class="col-form-label">Informations supplémentaires :</label>
                      <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="ajouter des information supplémentaire" style="height: 80px;"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
						<button type="submit" name="updatePassword" class="btn btn-primary rounded-1 py-2 px-2">
							Sauvegarder
						</button>
					</div>
                  </div>
                </form>
    
                <div id="form-message-warning mt-4"></div> 
                <div id="form-message-success">
                  Vos information on bien été sauvegardé
                </div>
    
              </div>
            </div>
          </div>
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