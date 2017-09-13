<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-13
 * Time: 13:28
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListController extends Controller
{
    /**
     * @Route("/ordersList", name="ordersList")
     */
    public function FormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository('AppBundle:Orders')->findAll();

        return $this->render('contents/list.html.twig', [
            'orders' => $orders,
        ]);
    }
}
