<?php

namespace App\Traits;
use App\Student;

trait StudentTrait {

    public function index() {
        // Fetch all the students from the 'student' table.
        $student = Student::all();
        return view('student-welcome')->with(compact('student'));
    }

    public function hello123(){
    return 'hello';
    }

    public function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if(strlen($word) >= 3) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode( ' ', $words);

        return $searchTerm;
    }
}