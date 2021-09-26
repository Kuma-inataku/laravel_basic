<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Scopes\ScopePerson;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer',
    ];

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getData()
    {
       return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
       return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age','>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age','<=', $n);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }

    public function getNameAndIdAttribute()
    {
        return $this->name.'[id='.$this->id.']';
    }

    public function getNameAndMailAttribute()
    {
        return $this->name.'('.$this->mail.')';
    }

    public function getNameAndAgeAttribute()
    {
        return $this->name.'('.$this->age.')';
    }

    public function getAllDataAttribute()
    {
        return $this->name.'('.$this->age.')'.'['.$this->mail.']';
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setAllDataAttribute(Array $value)
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }
}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}