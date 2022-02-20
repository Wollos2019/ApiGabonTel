<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    const STATUS = ['ENABLE','DISABLE'];
    use HasFactory;
    protected $fillable=['id','name','status','sessionId'];


    /**
     * objectif est de lister dans un tableau les jours fériés d'une année donnée.
     */
    function  ferie($mois,$an, $alsace = false){
        if (is_array($mois)){
            $retour = array();
            foreach ($mois as $m) {
                $r = self::ferie($m, $an);
                $retour[$m] =  self::ferie($m, $an);
            }
            return $retour;
        }

        // calcul des jours feries pour un seul mois.
        if (mktime(0,0,0,$mois, 1,$an) == -1) { return FALSE;}
        list($mois, $an) = explode("-", date("m-Y", mktime(0,0,0,$mois, 1, $an)));
        $an = intval($an);
        $mois = intval($mois);

        // une constante
        $jour = 3600*24;

        // les jours fixes
        $ferie["Jour de l'an"][1]              = 1;
        $ferie["Armistice 39-45 "][5]          = 8;
        $ferie["Toussaint"][11]                = 1;
        $ferie["Armistice 14-18"][11]          = 11;
        $ferie["Assomption"][8]                = 15;
        $ferie["Fête du travail "][5]    = 1;
        $ferie["Fête nationale"][7]      = 14;
        $ferie["Noël"][12]                = 25;
        if ($alsace)
            $ferie["Lendemain de Noël (Alsace seulement)"][12]	= 25;

        // quelques fetes mobiles
        $lundi_de_paques['mois'] = date( "n", easter_date($an)+1*$jour);
        $lundi_de_paques['jour'] = date( "j", easter_date($an)+1*$jour);
        $lundi_de_paques['nom']  = "Lundi de Pâques";

        $ascencion['mois'] = date( "n", easter_date($an)+40*$jour);
        $ascencion['jour'] = date( "j", easter_date($an)+40*$jour);
        $ascencion['nom']  = "Jeudi de l'ascenscion";

        $vendredi_saint['mois'] = date( "n", easter_date($an)-2*$jour);
        $vendredi_saint['jour'] = date( "j", easter_date($an)-2*$jour);
        $vendredi_saint['nom']  = "Vendredi Saint";

        $lundi_de_pentecote['mois'] = date( "n", easter_date($an)+50*$jour);
        $lundi_de_pentecote['jour'] = date( "j", easter_date($an)+50*$jour);
        $lundi_de_pentecote['nom']  = "Lundi de Pentecôte";

        $ferie[$lundi_de_paques['nom']][$lundi_de_paques['mois']] = $lundi_de_paques['jour'];
        $ferie[$lundi_de_pentecote['nom']][$lundi_de_pentecote['mois']] = $lundi_de_pentecote['jour'];
        $ferie[$ascencion['nom']][$ascencion['mois']] = $ascencion['jour'];
        if ($alsace)
           $ferie[$vendredi_saint['nom']." (Alsace)"][$vendredi_saint['mois']]= $vendredi_saint['jour'];

        // reponse
        $reponse = array();
        foreach ($ferie as $nom => $date) {
            if (isset($date[$mois])){

                // une fete a date calculable
                $reponse[$date[$mois]]=$nom;

            }
        }

        ksort($reponse);
        return $reponse;
    }
   public static  function tabJoursFeries($an) {
        return self::ferie(range(1,12),$an);
    }

    // /************ EXECUTION *********************/
    // $année = date("Y");
    // $fériées = tab_jours_feriés($année);

    // echo "<br>";
    // foreach ($fériées as $mois => $tab) {
    //     foreach ($tab as $jour => $fete) {
    //         echo "$jour/$mois/$année  => $fete \n<br>";
    //     }
    // }
}
