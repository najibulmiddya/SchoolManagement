<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timetable_model extends CI_Model
{
    private $table = "class_timetables";
    private $subject_teacher = "subject_teacher";
    private $table_subject = "subject";
    private $table_teachers = "teachers";
    private $table_class = "class";

    public function get_sub($cid)
    {
        $this->db->select("st.subject_id,s.name");
        $this->db->from("{$this->subject_teacher} st");
        $this->db->join("{$this->table_subject} s", "s.id = st.subject_id ");
        $this->db->where("class_id", $cid);
        return $this->db->get()->result();
    }

    public function get_tea($sid)
    {
        $this->db->select("st.teacher_id,t.name");
        $this->db->from("{$this->subject_teacher} st");
        $this->db->join("{$this->table_teachers} t", "t.id = st.teacher_id");
        $this->db->where("subject_id", $sid);
        return $this->db->get()->row();
    }

    public function get($tid,$stime,$etime){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("teacher_id", $tid);
        $this->db->where("starting_time", $stime);
        $this->db->where("end_time", $etime);
        return $this->db->get()->row();
    }


    public function sub_id_get($sid)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("subject_id", $sid);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // show_update_re
    public function show_update_re($id)
    {
        $this->db->select("ctb.starting_time,ctb.end_time,ctb.id,sub.name as sub_name,cla.class as cla_name,tea.name as tea_name");
        $this->db->from("{$this->table} ctb");
        $this->db->join("{$this->table_teachers} tea", "tea.id = ctb.teacher_id");
        $this->db->join("{$this->table_class} cla", "cla.id = ctb.class_id");
        $this->db->join("{$this->table_subject} sub", "sub.id = ctb.subject_id");
        $this->db->where("ctb.id", $id);
        return $this->db->get()->row();
    }

    public function update($id,$data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }

    public function get_all($class_id)
    {
        $this->db->select("ctb.*, sub.name as sub_name, cla.class as cla_name,tea.name as tea_name");
        $this->db->from("{$this->table} ctb");
        $this->db->join("{$this->table_teachers} tea", "tea.id = ctb.teacher_id");
        $this->db->join("{$this->table_class} cla", "cla.id = ctb.class_id");
        $this->db->join("{$this->table_subject} sub", "sub.id = ctb.subject_id");
        $this->db->where("ctb.class_id", $class_id);
        return $this->db->get()->result();
    }
}
