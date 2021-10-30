<?php
declare(strict_types=1);

/*$chaine="Bonjour les amis";
$cond="/^[a-zA-Z ]*$/";
if(strlen($chaine)>6 && preg_match($cond,$chaine)){
$chaine= str_replace("les","mes",$chaine).'<br>';
$chaine= substr($chaine,3,9).'<br>';
$chaine= strtoupper($chaine);
echo $chaine;
}else{
    echo "la chaine invalide ";
}*/


/*$text="bonjour";
for($i=0;$i<strlen($text);$i++){
    echo $text[$i].'<br>';
}*/

/*$chaine="bonjour";
$chaine1="";
for($i=0;$i<strlen($chaine);$i++){
    if($i%2==0){
        $chaine1=$chaine1.strtoupper($chaine[$i]);
    }else{
        $chaine1=$chaine1.$chaine[$i];
    }
}
echo $chaine1;*/

/*$prenom = array("nom" => "khaled", "prenom" => "kk","age"=>23);
foreach ($prenom as $x => $y) {
    if ($x == "prenom") {
        echo "Key=" . $x . ", Value=" . $y;
        echo "<br>";
    }
}
foreach ($prenom as $x) {
    echo  $x;
    echo "<br>";
}*/

/*$prenom = array(["nom" => "khaled", "prenom" => "kk","age"=>23],["nom" => "jesd", "prenom" => "feqfz","age"=>66]);
foreach ($prenom as $x  ) {
    
        echo  $x["nom"].'<br>'; 
        echo  $x["prenom"].'<br>'; 
        echo  $x["age"].'<br>'; 
        echo "<br>";
}*/



//$notes =array(20,4,3,10,18,4,3);
//$coefs =array(2,1,1,2,1);

/*$tab1=[];
$tab2=[];
foreach($notes as $note){
    if($note>5){
        array_push($tab1,$note);
    }
    else{
        array_push($tab2,$note);
    }
}
print_r($tab1);
echo "<br>";
print_r($tab2);
$i=0;
$moyenne=0;
$sum=0;
while($i<count($coefs)){
$moyenne=$moyenne+($notes[$i]*$coefs[$i]);
$sum+=$coefs[$i];
$i++;
}
echo $moyenne/$sum;*/


/*$tab2=[];
for($i=0;$i<count($notes);$i++){
if(!in_array($notes[$i],$tab2)){
array_push($tab2,$notes[$i]);
}
}
print_r($notes);
echo "<br>";
print_r($tab2);*/

/*$nombre=12345;

$chaine=strval($nombre);
if(strlen($chaine)==8){
    echo "chaine valide";
}
else{
while(strlen($chaine)!=8){
$chaine="0".$chaine;

}
}

echo str_pad($chaine, 8, "0", STR_PAD_LEFT);
echo $chaine;*/


/*function multi(int $a,int $b){
    echo $a*$b;
}
multi(4,2);*/
/*namespace P\test;
{

class Personne{
    private $nom;
    public $age;
    public function __construct($nom,$age)
    {
        $this->setNom($nom);
        $this->setAge($age);
        
    }
    function setAge($age){
        if(is_int($age) && $age>1 && $age<120){
        if( 20>$age ){
            $this->age=$age*2;
        }
        elseif( 20<$age ){
            $this->age=$age*3;
        }
        else{
            $this->age=$age;
        }}
        else{
            echo "sasilr l'age correcte";
            die();
        }

    }
    function setNom($nom){
        if(is_string($nom) &&  strlen($nom)<=6){
            $this->nom=$nom;
        }
        else{
            echo "ceci est un spam";
            die();
        }
    }
    function getNom(){
        return $this->nom;
    }
    function sepresenter(){
        echo "je m'appelle $this->nom et j'ai $this->age ans <br>";
    }
    
}
 
class Employee extends Personne{
    function sepresenter(){
        echo "je m'appelle ".$this->getNom() ." et j'ai $this->age ans  et he suis un employee";
    }
}
class Patron extends Personne{
    public $voiture;
    public function __construct($nom,$age,$voiture){
        Personne::__construct($nom,$age);
        $this->voiture=$voiture;
    }
    function sepresenter(){
        echo "je m'appelle ".$this->getNom() ." et j'ai $this->age ans  et j'ai une $this->voiture";
    }

}

}

$e=new Patron('khaled',10,"porshe");
$e->sepresenter();*/




namespace P\test;
{
class Banque{
    
    public function __construct($nom_pers,$valeur=0)
    {
        $this->nom_pers=$nom_pers;
        $this->valeur=$valeur;
    }
    public function SPresenter(){
        echo "je m'appelle $this->nom_pers et j'ai $this->valeur dt<br>";
    }
    public function crediter ($val_debiter){
        if($this->valeur>$val_debiter){
            $this->valeur-=$val_debiter;
            echo "$this->nom_pers il vous reste $this->valeur dt dans votre compte <br>";
        }
        else{
            echo "desole $this->nom_pers solde insuffisant <br>";
        }
    }
    public function  debiter($val_crediter){
        $this->valeur+=$val_crediter;
        echo "merci $this->nom_pers pour votre confiance , il vous reste $this->valeur dt dans votre compte <br>";
    }
}
}
