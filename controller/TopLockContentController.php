<?php 

class TopLockController
{
    public function display()
    {
        $oView = new TopLockContentView();
        $app = App::getInstance();

        $app->response->setStatusCode( 404 );
        $sRunningTime = sprintf("Duree script : %5.3f ms<br>", Debug::runningTimeMs( $app->request->time ) );
        $app->debug->addDebug( $sRunningTime );
        $oView->make( $app->request->uri, $app->request->method );

        $app->response->send( $oView->render() );
    }
}