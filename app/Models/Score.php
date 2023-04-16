<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function user() {
        return$this-> belongsTo(User::class, 'user_id');
    }

    public function suggestedRank($score = ''){
        
        if($score == '' || $score < 0 or $score > 100)
            return 'N/A';
        
        if($score > 97)
            return 'Professor 4';
        elseif($score > 93)
            return 'Professor 3';
        elseif($score > 89)
            return 'Professor 2';
        elseif($score > 85)
            return 'Professor 1';
        elseif($score > 78)
            return 'Associate Professor 3';
        elseif($score > 71)
            return 'Associate Professor 2';
        elseif($score > 63)
            return 'Associate Professor 1';
        elseif($score > 55)
            return 'Assistant Professor 3';
        elseif($score > 47)
            return 'Assistant Professor 2';
        elseif($score > 38)
            return 'Assistant Professor 1';
        elseif($score == 38)
            return 'Instructor 3';
        elseif($score > 19)
            return 'Instructor 2';
        elseif($score < 20)
            return 'Instructor 1';
           
    }
    
}
