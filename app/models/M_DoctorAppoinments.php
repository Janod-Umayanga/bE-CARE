<?php
   class M_DoctorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      
      public function getDoctorAppoinments($doctor_id) {

        $this->db->query('SELECT doctor_channel.*,doctor_timeslot.*,doctor_channel_day.* FROM doctor_timeslot INNER JOIN doctor_channel_day ON doctor_timeslot.doctor_timeslot_id = doctor_channel_day.doctor_timeslot_id Inner JOIN doctor_channel ON doctor_channel.doctor_id = doctor_timeslot.doctor_id  WHERE doctor_channel.doctor_id = :doctor_id');
        $this->db->bind(':doctor_id', $doctor_id);

        return $this->db->resultSet();
    }
        
    public function getDoctorTimeslots($doctor_id) {

      date_default_timezone_set("Asia/Kolkata");
      $currentDate = date("Y-m-d");
      $currentTime = date("H:i:s");

      $this->db->query('SELECT doctor_timeslot.*,doctor_channel_day.* from doctor_timeslot INNER JOIN doctor_channel_day ON doctor_timeslot.doctor_timeslot_id = doctor_channel_day.doctor_timeslot_id WHERE doctor_channel_day.doctor_id=:doctor_id AND (doctor_channel_day.day > :today OR (doctor_channel_day.day = :today AND doctor_timeslot.starting_time >= :time) )  ORDER BY doctor_channel_day.day ASC');
      $this->db->bind(':doctor_id', $doctor_id);
      $this->db->bind(':today', $currentDate);
      $this->db->bind(':time', $currentTime);

      return $this->db->resultSet();
  }


  public function getDoctorTimeslotsHistory($doctor_id) {

    date_default_timezone_set("Asia/Kolkata");
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");

    $this->db->query('SELECT doctor_timeslot.*,doctor_channel_day.* from doctor_timeslot INNER JOIN doctor_channel_day ON doctor_timeslot.doctor_timeslot_id = doctor_channel_day.doctor_timeslot_id WHERE doctor_channel_day.doctor_id=:doctor_id AND (doctor_channel_day.day < :today OR (doctor_channel_day.day = :today AND doctor_timeslot.starting_time <= :time)) ORDER BY doctor_channel_day.day ASC');
    $this->db->bind(':doctor_id', $doctor_id);
    $this->db->bind(':today', $currentDate);
    $this->db->bind(':time', $currentTime);

    return $this->db->resultSet();
}


  public function getRegisteredPatients($channel_day_id) {

    $this->db->query('SELECT * FROM doctor_channel WHERE doctor_channel_day_id = :doctor_channel_day_id');
    $this->db->bind(':doctor_channel_day_id', $channel_day_id);

    return $this->db->resultSet();
}
        

public function getRegisteredPatientsHistory($channel_day_id) {

  $this->db->query('SELECT * FROM doctor_channel WHERE doctor_channel_day_id = :doctor_channel_day_id');
  $this->db->bind(':doctor_channel_day_id', $channel_day_id);

  return $this->db->resultSet();
}



  }

      
      
?>