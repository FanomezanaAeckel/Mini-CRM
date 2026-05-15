<?php
namespace App\Enum;

enum InteractionType: string
{
    case APPEL = 'appel';
    case EMAIL = 'email';
    case REUNION = 'reunion';
    case NOTE = 'note';
    case TACHE = 'tache';
    
    public function getLabel(): string
    {
        return match($this) {
            self::APPEL => 'Appel téléphonique',
            self::EMAIL => 'Email',
            self::REUNION => 'Réunion',
            self::NOTE => 'Note interne',
            self::TACHE => 'Tâche à faire',
        };
    }
}