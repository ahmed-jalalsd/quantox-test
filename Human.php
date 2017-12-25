<?php 

abstract class Human
{
    private $name;
    private $age;
    private $height = [];
    private $weight = [];
    private $hairColor;
    private $eyesColor;
    private $measurments = ["cm" , "m" ,"kg"]; // list of the acceptable measuremnts

    public function __construct($name, $age, $hairColor = null, $eyesColor = null)
    {
        $this->name = $name;
        $this->setAge($age);
        $this->setHairColor($hairColor);
        $this->setEyesColor($eyesColor);
    }

    public function setAge($age)
    {
        if (is_integer($age)) {
            $this->age = $age;
        }
    }

    public function setHairColor($hairColor)
    {
        if (empty($hairColor)) {
            $this->hairColor = null;
        } else {
            $this->hairColor = ucwords($hairColor);
        }
    }

    public function setEyesColor($eyesColor)
    {
        if (empty($eyesColor)) {
            $this->eyesColor = null;
        } else {
            $this->eyesColor = ucwords($eyesColor);
        }
    }

    public function setHeight($height, $measure = null)
    {
        // check the passed value if it is not null and it is missing from the measuremens array
        if ($measure != null && !in_array(strtolower($measure), $this->measurments)) {
            exit("Please enter a vaild measurment: " . implode(", ", $this->measurments));
        }
        // add the associative array to the height property
        $this->height[] = [
            "height" => $height,
            "measure" => strtolower($measure)
          ];
    }

    public function setWeight($weight, $measure = null)
    {
        // check the passed value if it is not null and it is missing from the measuremens array
        if ($measure != null && !in_array(strtolower($measure), $this->measurments)) {
            exit("Please enter a vaild measurment: " . implode(", ", $this->measurments));
        }
        // add the associative array to the height property
        $this->weight[] = [
            "weight" => $weight,
            "measure" => strtolower($measure)
          ];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getHairColor()
    {
        return $this->hairColor;
    }

    public function getEyesColor()
    {
        return $this->eyesColor;
    }

    abstract protected function getGender();

    public function displayInfo()
    {
        $output = "";
        $output .=  $this->getName() . " is a " . $this->getGender();
        $output .= "\n";
        echo $output;
    }
}

class Female extends Human
{
    private $breasts;
    private $femaleGenitals;
    private $menstrualCycle;

    public function __construct($name, $age, $hairColor = null, $eyesColor = null, $breasts, $femaleGenitals, $menstrualCycle)
    {
        parent::__construct($name, $age, $hairColor = null, $eyesColor = null);
        $this->breasts = $breasts;
        $this->femaleGenitals = $femaleGenitals;
        $this->menstrualCycle = $menstrualCycle;
    }

    public function getGender()
    {
        $gender = "female";
        return $gender;
    }
}

class Male extends Human
{
    private $adamApples;
    private $maleGenitals;
    private $chestHair;

    public function __construct($name, $age, $hairColor = null, $eyesColor = null, $adamApples, $maleGenitals, $chestHair)
    {
        parent::__construct($name, $age, $hairColor = null, $eyesColor = null);
        $this->adamApples = $adamApples;
        $this->maleGenitals = $maleGenitals;
        $this->chestHair = $chestHair;
    }

    protected function getGender()
    {
        $gender = "male";
        return $gender;
    }
}

// $human1 = new Male("Jonathan", 25, "black", "brown", true, true, true);
// $human2 = new Female("Mary", 22, "black", "brown", true, true, true);
// $human2->setHeight(1.84, "cm");
// $human2->setWeight(75, "kg");
// echo $human2->getName();
// echo $human2->getAge();
// echo $human2->getHairColor();
// echo $human2->getEyesColor();
// $human2->displayInfo();
// foreach ($human2->getHeight() as $height) {
//     echo "\n" . $height["height"] . " " . $height["measure"];
// }