<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class Calendar
{
    public array $events=[];
    public string $title='Calendar Demo';
    public string $initialView = 'dayGridMonth'; // 'dayGridWeek', 'timeGridDay', 'listWeek' .
}
