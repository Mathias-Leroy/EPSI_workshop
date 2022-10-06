<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CalendarRepository;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(CalendarRepository $calendar)
    {
        $events = $calendar->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(), 
                'start' => $event->getStart()->format('Y-m-d H:i:s'), 
                'end' => $event->getEnd()->format('Y-m-d H:i:s'), 
                'title' => $event->getTitle(), 
                'description' => $event->getDescription(), 
                'backgroundColor' => $event->getBackgroundColor(), 
                'borderColor' => $event->getBorderColor(), 
                'textColor' => $event->getTextColor(), 
            ];
        }

        $data = json_encode($rdvs);
        return $this->render('services/index.html.twig', compact('data'));
    }
}
