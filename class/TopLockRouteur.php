<?php

class TopLockRouteur extends Router
{
    public $controller_name;
    public $action_name;
    public $params;

    const GUEST_ROUTES = [
        ['method' => 'GET',  'URI'=> '/',         'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/login',    'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/group',    'controller' => 'GroupController', 'action' => 'group'],
        ['method' => 'GET',  'URI'=> '/profil',   'controller' => 'ProfilController', 'action' => 'profil'],
        ['method' => 'GET',  'URI'=> '/content',  'controller' => 'TopLockContentController', 'action' => 'content'],
    ];

    const ADMIN_ROUTES = [
        ['method' => 'GET',  'URI'=> '/',         'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/login',    'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/group',    'controller' => 'GroupController', 'action' => 'group'],
        ['method' => 'GET',  'URI'=> '/profil',   'controller' => 'ProfilController', 'action' => 'profil'],
        ['method' => 'GET',  'URI'=> '/content',  'controller' => 'TopLockContentController', 'action' => 'content'],
    ];

    const USER_ROUTES = [
        ['method' => 'GET',  'URI'=> '/',         'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/login',    'controller' => 'LoginController', 'action' => 'login'],
        ['method' => 'GET',  'URI'=> '/group',    'controller' => 'GroupController', 'action' => 'group'],
        ['method' => 'GET',  'URI'=> '/profil',   'controller' => 'ProfilController', 'action' => 'profil'],
        ['method' => 'GET',  'URI'=> '/content',  'controller' => 'TopLockContentController', 'action' => 'content'],
    ];

    public function __construct( $request )
    {
        $this->path_parts = $this->explode_URI( $request->uri );
    }

    public function route_match( $request, $session )
    {

        if ( ! $session->isAuth() ) {
            // User is guest
            if ( ! $this->route_find(self::GUEST_ROUTES, $request) ) {
                $this->setControllerAction( "HTTP404Controller", "display" );
            }
        } elseif ( $session->isAuth() && $session->isAdmin() ) {
            // User is admin
            if ( ! $this->route_find(self::ADMIN_ROUTES, $request) ) {
                if ( ! $this->route_find(self::USER_ROUTES, $request) ) {
                    $this->setControllerAction( "HTTP404Controller", "display" );
                }    
            }
        } else {
            // User is normal user
            if ( ! $this->route_find(self::USER_ROUTES, $request) ) {
                $this->setControllerAction( "HTTP404Controller", "display" );
            }    
        }
    }

    private function route_find($routes, $request)
    {
        $aParams = [];
//
//        print("path_parts:");
//        print_r($this->path_parts);
//        print("<br>");
//
        $lRouteFound = false;
        $r = 0;
        $rMax = count($routes);

        while($r < $rMax && ! $lRouteFound) {

//            print("route:");
//            print_r($routes[$r]);
//            print("<br>");
    
            $aParts = $this->explode_URI( $routes[$r]['URI'] );

//            print_r($aParts);
//            print("<br>");

            if  ( 
                $request->method == $routes[$r]['method']
                && count($this->path_parts) == count($aParts)  
            ) {
                //print("Compare routes<br>");

                $i = 0;
                $iMax = count($this->path_parts);
                $lDiff = false;
                while ($i < $iMax && ! $lDiff) {
                    if ( 
                        substr($this->path_parts[$i], 0, 1) == '{' 
                        && substr($this->path_parts[$i], -1, 1) == '}'
                    ) {
                        // Forme: {param}
                        $sParamName = substr($this->path_parts[$i], 1, -1);
                        $aParams[$sParamName] = $aParts[$i];
                    } else {
                        // Forme: identifiant
//                        printf("Compare routes: %s %s<br>", $this->path_parts[$i], $aParts[$i]);
                        if ($this->path_parts[$i] != $aParts[$i]) {
//                            print("Differents<br>");
                            $lDiff = true;
                        }    
                    }
                    $i++;
                }

                if ( ! $lDiff ) {
//                    print("Trouvé<br>");
                    $this->setControllerAction( $routes[$r]['controller'], $routes[$r]['action'] );
                    $this->addParams($aParams);
                    $lRouteFound = true;
                }
            }

            $r++;
        }

        return($lRouteFound);
    }

    private function setControllerAction( $controller, $action )
    {
        $this->controller_name = $controller;
        $this->action_name = $action;
    }

    private function addParams($aParams)
    {
        $this->params = $aParams;
    }
}