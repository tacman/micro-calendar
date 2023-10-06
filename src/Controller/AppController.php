<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\RegisterFormDto;
use App\Form\Type\RegisterForm;
use CalendarBundle\Entity\Event as CalendarBundleEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @see AppControllerTest
 */
#[AsController]
#[Route(name: 'app_')]
final class AppController extends AbstractController
{
    /**
     * Simple page with some dynamic content.
     */
    #[Route(path: '/', name: 'home')]
    public function home(): Response
    {
        $dt = new \DateTime(); // for the demo, start with the current date
        $events = [];
        $events[] = ['title' => 'now()', 'start' => $dt->format('c')];
        $events[] = ['title' => 'Set Goals', 'start' => $dt->format("Y-m-01")];
        $events[] = ['title' => 'Reflect', 'start' => $dt->format("Y-m-t")];

        $readme = file_get_contents(__DIR__.'/../../README.md');


        return $this->render('home.html.twig', compact('events', 'readme'));
    }

    #[Route(path: '/fullcalendar', name: 'fullcalendar')]
    public function fullcalendar(): Response
    {
        $twig = file_get_contents(__DIR__.'/../../templates/fullcalendar.html.twig');
        preg_match('/<script.*?script>/sm', $twig, $mm);
        $js = $mm[0];

        return $this->render('fullcalendar.html.twig', compact('js'));
    }

    #[Route(path: '/modal', name: 'modal')]
    public function modal(): Response
    {
        $twig = file_get_contents(__DIR__.'/../../templates/modal.html.twig');
        preg_match('/<script.*?script>/sm', $twig, $mm);
        $js = $mm[0];

        return $this->render('modal.html.twig', compact('js'));
    }

    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: 'composer')]
    public function composer(): Response
    {
        $composer = file_get_contents(__DIR__.'/../../composer.json');

        return $this->render('composer.html.twig', compact('composer'));
    }

    /**
     * A simple form.
     */
    #[Route(path: '/form', name: 'form')]
    public function form(Request $request): Response
    {
        $dto = new RegisterFormDto();
        $form = $this->createForm(RegisterForm::class, $dto)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // just for the example, the DTO has already been updated
            $dto = $form->getData();
        }

        return $this->render('form.html.twig', compact('form', 'dto'));
    }
}
