<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class AdminController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    /*public function index()
    {
        return $this->twig->render('Admin/index.html.twig');

    }*/

    public function Verif()
    {
            return $this->twig->render('Admin/index.html.twig');
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function ajouter()
    {
        if ((($_GET['login'] === 'olivier') && ($_GET['password'] === 'franck')) || (!isset($_SESSION['login']))) {
            session_start();
            $_SESSION['login'] = $_GET['login'];
            return $this->twig->render('Admin/ajouter.html.twig');/*, ['login' => $_SESSION['login']]);*/
        }else{
            header('location : /admin');
        }

    }
    public function redirection()
    {
        if (isset($_GET['selectAA'])){
            if($_GET['selectAA']==='Modifier un set'){

                return $this->twig->render('Admin/modifier.html.twig');
            }elseif($_GET['selectAA']==='Supprimer un set'){

                return $this->twig->render('Admin/supprimer.html.twig');
            }elseif ($_GET['selectAA']==='Ajouter un set'){
                return $this->twig->render('Admin/ajouter.html.twig');
            }


            var_dump($_GET);

        }
    }


        public function modifier()
    {
        session_start();
        return $this->twig->render('Admin/modifier.html.twig', ['login' => $_SESSION['login']]);
    }

    public function supprimer()
    {
        session_start();
        return $this->twig->render('Admin/supprimer.html.twig', ['login' => $_SESSION['login']]);
    }

}
