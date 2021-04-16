<?php
class Teacher{
    protected $user_id, $nilai_tugas, $nilai_uts, $nilai_uas;
    
    function __construct($user_id,$first_name, $nilai_tugas, $nilai_uts, $nilai_uas)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->nilai_tugas = $nilai_tugas;
        $this->nilai_uts = $nilai_uts;
        $this->nilai_uas = $nilai_uas;
    }
    function getfirst_name(){
        return $this->first_name;
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