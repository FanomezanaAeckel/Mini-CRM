<?php

namespace App\Enum ;

enum OpportuniteStatut: string
{
    case NEGOCIATION = 'negociation';
    case GAGNE = 'gagne';
    case PERDU = 'perdu';
    case EN_ATTENTE = 'en_attente';
    
    public function getLabel(): string
    {
        return match($this) {
            self::NEGOCIATION => 'En négociation',
            self::GAGNE => 'Gagnée',
            self::PERDU => 'Perdue',
            self::EN_ATTENTE => 'En attente',
        };
    }
}