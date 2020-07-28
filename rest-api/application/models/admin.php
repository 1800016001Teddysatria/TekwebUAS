<?php

namespace App\Models;

use CodeIgniter\Model;

class admin extends Model
{
   protected $table = 'admin';

   public function getadmin($id = false)
   {
      if ($id === false) {
         return $this->findAll();
      } else {
         return $this->getWhere(['id' => $id])->getRowArray();
      }
   }
   public function insertadmin($data)
   {
      $query = $this->db->table($this->table)->insert($data);
      if ($query) {
         return true;
      } else {
         return false;
      }
   }
   public function updateadmin($data, $id)
   {
      return $this->db->table($this->table)->update($data, ['id' => $id]);
   }
   public function deleteadmin($id)
   {
      return $this->db->table($this->table)->delete(['id' => $id]);
   }
}