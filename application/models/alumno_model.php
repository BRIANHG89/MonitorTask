<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 5/5/2018
 * Time: 12:59
 */
class alumno_model extends  CI_Model
{
    /*
     * insertamos alumnos
     */
    function NewAlumno($alumnoInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_alumno', $alumnoInfo);

        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

    }
    public function getInfor()
    {
        //
        /*
        $this->db->select('userId', 'alumno_id', 'nombre');
        $this->db->from('tbl_alumno');
        */
    }
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     * @return id : modified
     */
    function editAlumno($alumnoInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $alumnoInfo);

        return TRUE;
    }

    function  deleteAlumno($alumnoid, $alumnoInfor)
    {
     $this->db->where('alumno_id', $alumnoid);
     $this->db->update('tbl_alumno', $alumnoInfor);

     return $this->db->affected_rows();
    }


}