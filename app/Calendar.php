<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'id', 'date_calendar', 'location', 'person', 'comment',
    ];

    /* ----- Relation One to Many whith Users table ----- */
    public function calendarUser()
    {
        return $this->belongsTo('App\Utilisateur');
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
