<?php
    namespace App\Enum;
    enum ClientStatut : string {
        case LEAD  = "lead" ;
        case PROSPECT  = "prospect" ;
        case CLIENT  = "client" ;
        case INACTIF  = "inactif" ;
        public function getLabel(): string
        {
            return match($this) {
                self::LEAD => "Lead " ,
            self::PROSPECT => 'Prospect',
            self::CLIENT => 'Client actif',
            self::INACTIF => 'Inactif',
        
            };
        }
    }


?>