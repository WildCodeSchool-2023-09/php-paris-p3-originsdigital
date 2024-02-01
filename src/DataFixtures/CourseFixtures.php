<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public const COURSES = ['test1', 'test2', 'test3', 'test4', 'test5',];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COURSES as $key => $label) {
            $course = new Course();
            $course->setLabel($label);

            $this->addReference('course_' . $key, $course);

            $manager->persist($course);
        }

        $manager->flush();
    }
}
