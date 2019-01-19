<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Manufacturers extends Model
{
  protected $fillable = ['name'];

  public function getSpecificSelectData() {
    $mappedData = [];
    $result = DB::select("SELECT concat(`name`, '  - ', `created_at`) as `customValue`, `id` FROM fundatabase.manufacturers;");
    if (!empty($result)) {
      foreach($result as $key => $value) {
        $mappedData[$value->id] = $value->customValue;
      }
    }

    return $mappedData;
  }
}
