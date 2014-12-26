<?php

namespace Puphpet\Extension\ApacheBundle\Controller;

use Puphpet\MainBundle\Extension;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller implements Extension\ControllerInterface
{
    public function indexAction(array $data, $extra = '')
    {
        return $this->render('PuphpetExtensionApacheBundle::form.html.twig', [
            'apache' => $data,
        ]);
    }

    public function vhostAction()
    {
        return $this->render('PuphpetExtensionApacheBundle:sections:vhost.html.twig', [
            'vhost'             => $this->getData()['empty_vhost'],
            'available_engines' => $this->getData()['available_engines'],
        ]);
    }

    public function directoryAction(array $vhost, $uniqid)
    {
        return $this->render('PuphpetExtensionApacheBundle:sections:directories.html.twig', [
            'vhost'             => $vhost,
            'v_uniqid'          => $uniqid,
            'directory'         => $this->getData()['empty_vhost']['directories'][0],
            'available_engines' => $this->getData()['available_engines'],
        ]);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $config = $this->get('puphpet.extension.apache.configure');
        return $config->getData();
    }
}
