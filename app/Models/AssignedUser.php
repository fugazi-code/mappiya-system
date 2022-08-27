<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedUser extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'entity_id',
      'entity_type',
    ];

    public function getDetails($id)
    {
      $model = $this->query()->where('user_id', $id)->firstOrFail();

      return $model->entity_type::find($model->entity_id);
    }

    public function updateDetail($detail)
    {
      $model = $this->query()->findOrFail($detail['id']);

      $model->entity_type::updateOrCreate(['id' => $model->entity_id], $detail);

      return $model->entity_type::find($model->entity_id);
    }
}