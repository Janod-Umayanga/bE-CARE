<?php
   class M_counsellorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getCounsellorAppoinments($counsellor_id) {

        $this->db->query('SELECT counsellor_channel.*,counsellor_timeslot.*,counsellor_channel_day.* FROM counsellor_timeslot INNER JOIN counsellor_channel_day ON counsellor_timeslot.counsellor_timeslot_id = counsellor_channel_day.counsellor_timeslot_id Inner JOIN counsellor_channel ON counsellor_channel.counsellor_id = counsellor_timeslot.counsellor_id  WHERE counsellor_channel.counsellor_id = :counsellor_id');
        $this->db->bind(':counsellor_id', $counsellor_id);

        return $this->db->resultSet();
    }

    public function getCounsellorTimeslots($counsellor_id) {

      date_default_timezone_set("Asia/Kolkata");
      $currentDate = date("Y-m-d");
      $currentTime = date("H:i:s");

      $this->db->query('SELECT counsellor_timeslot.*,counsellor_channel_day.* from counsellor_timeslot INNER JOIN counsellor_channel_day ON counsellor_timeslot.counsellor_timeslot_id = counsellor_channel_day.counsellor_timeslot_id WHERE counsellor_channel_day.counsellor_id=:counsellor_id AND ( counsellor_channel_day.day > :today OR (counsellor_channel_day.day = :today AND counsellor_timeslot.starting_time >= :time)) ORDER BY counsellor_channel_day.day ASC');
      $this->db->bind(':counsellor_id', $counsellor_id);
      $this->db->bind(':today', $currentDate);
      $this->db->bind(':time', $currentTime);

      return $this->db->resultSet();
  }


  public function getCounsellorTimeslotsHistory($counsellor_id) {

    date_default_timezone_set("Asia/Kolkata");
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");

    $this->db->query('SELECT counsellor_timeslot.*,counsellor_channel_day.* from counsellor_timeslot INNER JOIN counsellor_channel_day ON counsellor_timeslot.counsellor_timeslot_id = counsellor_channel_day.counsellor_timeslot_id WHERE counsellor_channel_day.counsellor_id=:counsellor_id AND ( counsellor_channel_day.day < :today OR (counsellor_channel_day.day = :today AND counsellor_timeslot.starting_time <= :time) ) ORDER BY counsellor_channel_day.day ASC');
    $this->db->bind(':counsellor_id', $counsellor_id);
    $this->db->bind(':today', $currentDate);
    $this->db->bind(':time', $currentTime);

    return $this->db->resultSet();
}


  public function getRegisteredPatients($channel_day_id) {

    $this->db->query('SELECT * FROM counsellor_channel WHERE counsellor_channel_day_id = :counsellor_channel_day_id');
    $this->db->bind(':counsellor_channel_day_id', $channel_day_id);

    return $this->db->resultSet();
}
        

public function getRegisteredPatientsHistory($channel_day_id) {

  $this->db->query('SELECT * FROM counsellor_channel WHERE counsellor_channel_day_id = :counsellor_channel_day_id');
  $this->db->bind(':counsellor_channel_day_id', $channel_day_id);

  return $this->db->resultSet();
}
  }

      
      
?>