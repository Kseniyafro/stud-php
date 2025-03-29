<?php
    abstract class HumanAbstract
    {
        private $name;

        public function __construct(string $name)
        {
            $this->name = $name;
        }

        public function getName(): string
        {
            return $this->name;
        }

        abstract public function getGreetings(): string;
        abstract public function getMyNameIs(): string;

        public function introduceYourself(): string
        {
            return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
        }
    }

    class RussianName extends HumanAbstract
    {
        public function getGreetings(): string
        {
            return "Привет";
        }
        public function getMyNameIs(): string
        {
            return "Меня зовут";
        }
    }

    class EnglishName extends HumanAbstract
    {
        public function getGreetings(): string
        {
            return "Hello";
        }
        public function getMyNameIs(): string
        {
            return "My name is";
        }
    }

$russianName = new RussianName("Ксения");
echo $ru->introduceYourself();

$englishName = new EnglishName("Kseniya");
echo $en->introduceYourself();

echo $russianName."<BR>";
echo $englishName."<BR>";
