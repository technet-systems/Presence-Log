<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Student;
use AppBundle\Entity\StudentPresence;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PresenceController
 *
 * Contains all methods for handling Presence Log
 *
 * @package AppBundle\Controller
 */
class PresenceController extends Controller
{
    /**
     * Constants below represent the presence status
     */
    const PRESENT = 'O';

    const ABSENT = 'N';

    const BELATED = 'S';

    /**
     * Selects all months to choose them in a start template
     *
     * @Route("/", name="presence_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $months = $em->getRepository('AppBundle:Year')
            ->findAllGroupedByMonth();

        return $this->render('presence/index.html.twig', [
            'months' => $months
        ]);
    }

    /**
     * On the basis of the given month, the appropriate number of days and all students
     * with their presence are selected in the URL
     *
     * @Route("/show/{month}", name="presence_show")
     */
    public function showAction($month)
    {
        // getting all days from given month ($month)
        $em = $this->getDoctrine()->getManager();

        $criteria = [
            'month' => $month
        ];

        $days = $em->getRepository('AppBundle:Year')
            ->findBy($criteria);

        // getting all students with their presences
        $students = $em->getRepository('AppBundle:Student')
            ->findAll();

        $itemArray = [];

        foreach ($students as $student) {
            foreach ($student->getPresences() as $presence) {
                $item = $presence->getStudent();
            }
            $itemArray[] = $item;
        }

        return $this->render('presence/show.html.twig', [
            'month'         => $month,
            'days'          => $days,
            'students'      => $itemArray,
            'capabilities'  => self::getAllCapabilitiesWithDescriptions(),
        ]);
    }

    private static function getAllCapabilitiesWithDescriptions()
    {
        return array(
            self::PRESENT   => 'Obecny',
            self::ABSENT    => 'Nieobecny',
            self::BELATED   => 'Spóźniony',
        );
    }

    /**
     * This method allows to modify a particular status on a given day for a given student
     * (used by the plugin 'x-editable'
     *
     * @Route("/edit", name="presence_edit")
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presence = $em->getRepository('AppBundle:StudentPresence')->find($_POST['pk']);

        $data = [];

        if (!$presence) {
            $data = [
                'status'    => 'error',
                'msg'       => 'Coś poszło nie tak. Spróbuj jeszcze raz.'
            ];
        }

        $data = [
            'status'    => 'success',
            'msg'       => 'Zmieniono status!'
        ];

        $presence->setStatus($_POST['value']);
        $em->flush();

        return new JsonResponse($data);
    }

    /**
     * This method allows you to create a new student with a random name and add its id in the 'student_presence' table
     * for the whole year (using by ajax call in start templete - button 'Nowy uczeń')
     *
     * @Route("/new", name="presence_new")
     */
    public function newAction()
    {
        $student = new Student();
        $student->setName('Student'.rand(1, 1000));

        $em = $this->getDoctrine()->getManager();
        $em->persist($student);
        $em->flush();

        for ($i = 1; $i <= 366; $i++)
        {
            $presence = new StudentPresence();
            $presence->setStudent($student);
            $presence->setDay($i);

            switch ($i) {
                case $i > 0 && $i <= 31:
                    $presence->setMonth(1);
                    break;

                case $i > 31 && $i <= 60:
                    $presence->setMonth(2);
                    break;

                case $i > 60 && $i <= 91:
                    $presence->setMonth(3);
                    break;

                case $i > 91 && $i <= 121:
                    $presence->setMonth(4);
                    break;

                case $i > 121 && $i <= 152:
                    $presence->setMonth(5);
                    break;

                case $i > 152 && $i <= 182:
                    $presence->setMonth(6);
                    break;

                case $i > 182 && $i <= 213:
                    $presence->setMonth(7);
                    break;

                case $i > 213 && $i <= 244:
                    $presence->setMonth(8);
                    break;

                case $i > 244 && $i <= 274:
                    $presence->setMonth(9);
                    break;

                case $i > 274 && $i <= 305:
                    $presence->setMonth(10);
                    break;

                case $i > 305 && $i <= 335:
                    $presence->setMonth(11);
                    break;

                case $i > 335 && $i <= 366:
                    $presence->setMonth(12);
                    break;
            }

            $em->persist($presence);
            $em->flush();
        }

        $data = [
            'status'    => 'success',
            'msg'       => 'Dodano nowego studenta!'
        ];

        return new JsonResponse($data);
    }
}