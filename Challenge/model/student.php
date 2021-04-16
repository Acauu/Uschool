<?php
class Student{
    protected $user_id, $nilai_tugas, $nilai_uts, $nilai_uas;
    
    function __construct($user_id, $nilai_tugas, $nilai_uts, $nilai_uas)
    {
        $this->user_id = $user_id;
        $this->nilai_tugas = $nilai_tugas;
        $this->nilai_uts = $nilai_uts;
        $this->nilai_uas = $nilai_uas;
    }
    function getUser(){
        return $this->user_id;
    }
    function getNilai_tugas(){
        return $this->nilai_tugas;
    }
    function getNilai_uts(){
        return $this->nilai_uts;
    }
    function getNilai_uas(){
        return $this->nilai_uas;
    }
}
?>