<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'id', 'date_calendar', 'location', 'person', 'comment',
    ];

    /* ----- Relation One to Many whith Users table ----- */
    public function treatmentUser()
    {
        return $this->belongsTo('App\User');
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
