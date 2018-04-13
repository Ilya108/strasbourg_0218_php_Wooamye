<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;

use Model\Client;
use Model\ClientManager;

/**
 * Class ClientController
 * @package Controller
 */
class ClientController extends AbstractController
{

    /**
     * @return string
     */
    public function index()
    {



        return $this->twig->render('Client/index.html.twig');
    }

    public function decks()
    {
        if($_SERVER['REQUEST_METHOD']==='POST'){

            if(isset($_POST['pseudo'])){
                session_start();
                $_SESSION['pseudo']=$_POST['pseudo'];
            }
        }


        return $this->twig->render('Client/decks.html.twig');
    }

    public function play()
    {
        session_start();
        if (isset($_SESSION['pseudo'])) {
            return $this->twig->render('Client/play.html.twig', ['pseudo' => $_SESSION['pseudo']]);
        }else
        {
            return $this->twig->render('Client/index.html.twig');
        }
    }

    public function finDeParti()
    {
        session_start();
        if (isset($_SESSION['pseudo'])) {
            return $this->twig->render('Client/finDeParti.html.twig', ['pseudo' => $_SESSION['pseudo']]);
        }else
        {
            return $this->twig->render('Client/index.html.twig');
        }
    }
    /**
     * @param $id
     * @return string
     */
    public function show(int $id)
    {
        $clientManager = new ClientManager();
        $client = $clientManager->findOneById($id);

        return $this->twig->render('Client/show.html.twig', ['client' => $client]);
    }

    /**
     * @param $id
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit client with id $id
        return $this->twig->render('Client/edit.html.twig', ['client', $id]);
    }

    /**
     * @param $id
     * @return string
     */
    public function add()
    {
        // TODO : add a new client
        return $this->twig->render('Client/add.html.twig');
    }

    /**
     * @param $id
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the client with id $id
        return $this->twig->render('Client/index.html.twig');
    }
}
