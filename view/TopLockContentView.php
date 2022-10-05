<?php

class TopLockContentView extends View
{

    public function pageContent( $sUri, $sMethod )
    {

        $topBar = TopBarView::makeTopBar();
        $menuBar = MenuBarView::makeMenuBar();
        $topLockContent = ContentView::makeContent();

    $sContent = <<<EOT
        <div class="container">
        </div>
    EOT;

    $sContent.$topLockContent;
    $sContent.$topBar;
    $sContent.$menuBar;
    
    return($sContent);
    }

    public function make( $sUri, $sMethod )
    {
        $this->makeHtml( $this->pageContent( $sUri, $sMethod ) );
    }

}