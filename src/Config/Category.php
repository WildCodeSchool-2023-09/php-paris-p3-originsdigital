<?php

namespace App\Config;

enum Category: string
{
    case Lesson = 'Cours';
    case Tutoriel = 'Tutoriel';
    case LiveCoding = 'LiveCoding';
}
