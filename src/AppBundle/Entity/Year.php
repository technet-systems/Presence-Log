<?php


namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\YearRepository")
 * @ORM\Table(name="year")
 */
class Year
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @ORM\Column(type="integer")
     */
    private $month;

    /**
     * @ORM\Column(type="string")
     */
    private $monthName;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param integer $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return integer
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param integer $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return string
     */
    public function getMonthName()
    {
        return $this->monthName;
    }

    /**
     * @param string $monthName
     */
    public function setMonthName($monthName)
    {
        $this->monthName = $monthName;
    }


}