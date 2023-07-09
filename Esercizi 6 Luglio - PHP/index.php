<?php

//  Traccia 1:
// - Utilizza i principi di OOP ed Ereditarietà per creare una struttura a classi come la seguente:
//     +-|Continent
//     +-----------|Country
//     +--------------------|Region
//     +---------------------------|Province
//     +------------------------------------|City
//     +------------------------------------------|Street


// - Ogni classe avrà un attributo public del tipo:
//     $nameContinent: 
//     $nameCountry;
//     $nameRegion;
//     $nameProvince; 
//     $nameCity;
//     $nameStreet;


// - La prima classe genitore avrà la seguente struttura:
//     class Continent
//     {
//       public $nameContinent;
    
//       public function __construct($continent){
//         $this->nameContinent = $continent; 
//       }
//     }


// - Istanzia un nuovo oggetto $myLocation, per poi richiamare un metodo che stampi a schermo la seguente frase: “Mi trovo in Europa, Italia, Puglia, Ba, Bari, Strada San Giorgio Martire 2D“.



class Continent
{
  public $nameContinent;

  public function __construct($continent)
  {
    $this->nameContinent = $continent;
  }
}

class Country extends Continent
{
  public $nameCountry;

  public function __construct($continent, $country)
  {
    parent::__construct($continent);
    $this->nameCountry = $country;
  }
}

class Region extends Country
{
  public $nameRegion;

  public function __construct($continent, $country, $region)
  {
    parent::__construct($continent, $country);
    $this->nameRegion = $region;
  }
}

class Province extends Region
{
  public $nameProvince;

  public function __construct($continent, $country, $region, $province)
  {
    parent::__construct($continent, $country, $region);
    $this->nameProvince = $province;
  }
}

class City extends Province
{
  public $nameCity;

  public function __construct($continent, $country, $region, $province, $city)
  {
    parent::__construct($continent, $country, $region, $province);
    $this->nameCity = $city;
  }
}

class Street extends City
{
  public $nameStreet;

  public function __construct($continent, $country, $region, $province, $city, $street)
  {
    parent::__construct($continent, $country, $region, $province, $city);
    $this->nameStreet = $street;
  }

  public function printLocation()
  {
    echo " Mi trovo nel continente $this->nameContinent, nello stato $this->nameCountry, nella regione $this->nameRegion, in provincia di ($this->nameProvince), nella città di $this->nameCity, \n in via $this->nameStreet.";
  }
}

$myLocation = new Street("Europa", "Italia", "Emilia Romagna", "BO", "Bologna", "Via Degli Asinelli 58°");
$myLocation->printLocation();



// Traccia 2:
// - Data questo semplice schema di classificazione animale:

// - crea una struttura a classi sfruttando l’ereditarietà e seguendo queste semplici regole:
//     - le classi non devono avere attributi;
//     - ogni classe avrà un metodo specifico protected per stampare la sua specializzazione; 
//     - non puoi realizzare metodi definiti public per stampare il risultato;
//     - l’unico metodo public ammesso è il costruttore.



class Animal
{
    protected function printSpecialization()
    {
        echo "\n Sono un animale";
    }
}

class Vertebrate extends Animal
{
    protected function printSpecialization()
    {
        parent::printSpecialization();
        echo " vertebrato,";
    }
}

class Cold_Blooded extends Vertebrate
{
    protected function printSpecialization()
    {
        parent::printSpecialization();
        echo " a sangue freddo";
    }
}

class Fish extends Cold_Blooded
{
    public function __construct()
    {
        parent::printSpecialization();
        echo " e sono un pesce.🐟";
    }
}

$magikarp = new Fish();



// Traccia 3:
// - Dato il seguente codice di partenza:
//     class Car {
//       private $num_telaio; 
//     }
    
//     class Fiat extends Car {
//       protected $license;
//       protected $color;
//     }


// - Completa la classe Fiat con le strutture mancanti e, utilizzando il livello di severità che ritieni più opportuno, estendi i metodi per stampare a terminale la seguente frase: “La mia macchina è Opel, con targa ND 123 OJ e numero di Telaio 1234“.

// Tips and Tricks
// Per sapere se l’esercizio e' corretto, stampa in console il var_dump dell’oggetto:

//     var_damp($car);

// L’output dovrà avere solamente 3 attributi:

//     object(MyCar)#1 (3) {
//       ["num_telaio":"Car":private]=>
//       string(6) "183784"
//     ["nome":protected]=>
//       string(4) "Opel"
//     ["targa":protected]=>
//       string(8) "19384785"
//     }

  
class Car {
    private $num_telaio; 
    
    public function __construct($num_telaio) {
      $this->num_telaio = $num_telaio;
    }
    
    public function getNumTelaio() {
      return $this->num_telaio;
    }
  }
  
  class Opel extends Car {
    protected $targa;
    
    public function __construct($num_telaio, $targa) {
      parent::__construct($num_telaio);
      $this->targa = $targa;
    }
    
    public function printCarInfo() {
      echo "\n La mia macchina è una Opel, con targa " . $this->targa . " e numero di telaio " . $this->getNumTelaio() . ". \n" ;
    }
  }
  
  $Opel = new Opel("12345", "ND 123 OJ", "Opel");
  $Opel->printCarInfo();

  var_dump($Opel);


  