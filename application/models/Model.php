<?php


class Model extends CI_Model {
    
	public function ambil($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    public function getNameUser($id)
	{	
		return $data = $this->db->select("name")
							->from("tb_user")
							->where("id",$id)
							->get();
	}

	public function update($param_id, $id, $table, $data)
	{	
		$this->db->where($param_id, $id);
        $this->db->update($table, $data); 
        return true;
	}

	public function insert_data($table,$data){
        $this->db->insert($table,$data);
        return true;
    }

    public function list_data_all($table){
         return $query = $this->db->get($table);  
    }

}