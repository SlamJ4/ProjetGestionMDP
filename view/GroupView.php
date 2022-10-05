<?php

class GroupView extends View
{

    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
        <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="accueil_page.php">TopLock</a>
    </nav>
    <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Table #02</h2>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary rounded-1 py-2 px-2" data-toggle="modal" data-target="#Modal">
              Créer un groupe
          </button>
          <!-- Modal -->
          <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="column" id="main">
                    <h1>Créer un groupe </h1>
                    <h3>créer un nouveau groupe de mot de passe</h3>
                    <form method="POST" action="listGroup.php">
                      <div class="form-group">
                        <label for="InputSite">Nom du groupe</label>
                        <input type="text" class="form-control" name="nameGrp" placeholder="Nom Groupe">
                      </div>
                        <button type="submit" name="createGrp" value="Créer" class="btn btn-primary">Créer Groupe</button>
                      </form>
                    </div>
                    <div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <form action="listGroup.php" method="post">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th>Nom du groupes</th>
                      <th>Mot de passe</th>
                      <th>&nbsp;</th>
                    </tr>
                    <?php
                        foreach ($infosGroupes as $key) {
                          ?> <tr>
                            <td><?php echo ($key['nom']);?></td>
                            <td><?php $recupMdp = $bdd -> prepare("SELECT id,site,user,group_id FROM gestionmdp WHERE user = ? AND group_id = ?");
                                      $recupMdp -> execute(array($_SESSION['res_id'], $key['id']));

                                      $infosMdp = $recupMdp -> fetchAll();

                                      foreach($infosMdp as $elmt) {
                                        echo $elmt['site'].', ';
                                      }?>
                            </td>
                            <td>
                                      <?php //trouver quoi supprimer et quoi garder dans la balise button car quand supprime tt, le php marche ?>
                                      <button type="submit" class="close" data-dismiss="alert" aria-label="Close" name="test">
                                          <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                  </td>
                          </tr><?php
                        }
                    ?>
                  </thead>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
        </div>
    EOT;
    
    return($sContent);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }

}