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
        $this->db->insert('alumno', $alumnoInfo);

        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

    }
    public function getInfor()
    {
        //
    }

}