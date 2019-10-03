<?php


namespace App\Controller;


use App\Entity\Ip;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RandomController extends AbstractController
{
    public function runStuff()
    {
        $manager = $this->getDoctrine()->getManager();
        $ips = $manager->getRepository(Ip::class)->findAll();

        foreach ($ips as $ip) {
            if ($ip instanceof Ip) {
                $subnet = $ip->getSubnetId();
            }
        }

    }
}