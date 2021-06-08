<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
  protected $table = 'tugas';


  public function getTugas($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }

    return $this->where(['slug' => $slug])->first();
  }
}
