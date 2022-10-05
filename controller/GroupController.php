<?php 

class ProfilController
{
    public function __construct( $action_name )
    {
        // Execution de l'action
        $this->$action_name();
    }

    public function login()
    {
        $oView = new GroupView();
        $app = App::getInstance();

        $oView->make( $app->session->get_csrf_token() );

        $app->response->send( $oView->render() );
    }

    public function loginpost()
    {

    }

    public function logout()
    {

    }
}