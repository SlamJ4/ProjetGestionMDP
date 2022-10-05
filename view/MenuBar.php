<?php

class MenuBar extends View
{
    public function pageContent( $sUri, $sMethod )
    {

    $sContent = <<<EOT
    <aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">

        <div class="profile">
            <a href="profil_page.php"><img src="../images/image-sidebar/person_4.jpg" alt="Image" class="img-fluid"></a>
            <h3 class="name">
                <?php echo($infosUser['pseudo']); ?>
            </h3>
            <span class="country">Web Designer</span>
        </div>


        <div class="nav-menu">
            <ul>
                <div>
                    <li><a href="profil_page.php"><span class="icon-pie-chart mr-3"></span>Profil</a></li>
                    <li><a href="../index.php">
                            <span class="icon-sign-out mr-3"></span>Sign out
                        </a></li>
                </div>
                <div>
                    <li><a href="../php/listGroup_page.php">
                            <span class="icon-add mr-3"></span>Ajouter groupe
                        </a></li>
                </div>
                <div>
                    <li><a>
                    <input class="form-control mr-sm-2" type="search" id="myInput" onkeyup="searchMDP()" placeholder="Search Password" aria-label="Search Password">
                        </a></li>
                </div>
            </ul>
            <hr />
            <ul id="myUL">
            <?php

              foreach($mdpInfoItem as $Item)
              {
          
            ?>
              <li><a href="#" onclick="retrievePasswordData('<?php echo($Item['site']); ?>','<?php echo($Item['login']); ?>','<?php echo($Item['password']); ?>')">
            <?php
                echo $Item[site]."</a></li>";
              }

            ?>
            </ul>
        </div>
    </div>

</aside>
    EOT;
    
    return($sContent);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }
}