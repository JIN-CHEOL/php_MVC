<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-09
 * Time: 오후 3:02
 */

class memberDTO
{
    private $id;
    private $password;
    private $name;
    private $gender;
    private $birth_day;
    private $phone_num1;
    private $phone_num2;
    private $phone_num3;
    private $join_date;
    private $retire_yn;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getGender(){
        return $this->gender;
    }
    public function setBirthDay($birth_day){
        $this->birth_day = $birth_day;
    }
    public function getBirthDay(){
        return $this->birth_day;
    }
    public function setPhoneNum1($phone_num1){
        $this->phone_num1 = $phone_num1;
    }
    public function getPhoneNum1(){
        return $this->phone_num1;
    }
    public function setPhoneNum2($phone_num2){
        $this->phone_num2 = $phone_num2;
    }
    public function getPhoneNum2(){
        return $this->phone_num2;
    }
    public function setPhoneNum3($phone_num3){
        $this->phone_num3 = $phone_num3;
    }
    public function getPhoneNum3(){
        return $this->phone_num3;
    }
    public function setJoinDate($join_date){
        $this->join_date = $join_date;
    }
    public function getJoinDate(){
        return $this->join_date;
    }
    public function setRetireYN($retire_yn){
        $this->retire_yn = $retire_yn;
    }
    public function getRetireYN(){
        return $this->retire_yn;
    }

    public function reset(){
        $this->id = null;
        $this->password = null;
    }

}

?>