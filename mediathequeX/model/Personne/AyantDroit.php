<?php // Marc-Antoine
class AyantDroit extends Personne
{
    //--------------------------Constructeur---------------------------//
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
     public function hydrate(array $donnes)
     {
         foreach($donnes as $cles => $values)
         {
             $method = "set" .ucfirst($cles);
             
             if(method_exists($this,$method))
             {
                $this->$method($values);
             }
         }
     }
     
    //----------------------------Methodes-----------------------------//
    
    //----------------------Getters and Setters------------------------//

     function __toString()
     {
         $ay = "</br>Je suis un AyantDroit</br>";
         $ay .= "id = ".$this->id()."</br>";
         $ay .= "civilite = ".$this->civilite()."</br>";
         $ay .= "nom = ".$this->nom()."</br>";
         $ay .= "prenom = ".$this->prenom()."</br>";
         
         return $ay;
     }
     
}
