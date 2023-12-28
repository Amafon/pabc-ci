<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Article::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'content', 'user_id', 'category_id', 'tag', 'image'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'title'=>'required|min_length[25]|max_length[100]',
        'content'=>'required|min_length[100]|max_length[10000]',
        'user_id'=>'required|numeric',
        'category_id'=>'required|numeric',
        'tag'=>'required|min_length[3]|max_length[20]',
        'image'=>'required',

    ];
    protected $validationMessages   = [
        'title'=>[
            'required'=>'Ce champ est obligatoire',
            'min_length'=>'{param} caractères minimums pour le titre',
            'max_length'=>'{param} caractères maximums pour le titre',
        ],
        'content'=>[
            'required'=>'Le contenu est obligatoire',
            'min_length'=>'{param} caractères minimums pour le contenu',
            'max_length'=>'{param} caractères maximums pour le contenu',
        ],
        'user_id'=>[
            'required'=>'Le nom de l\'auteur est obligatoire',
        ],
        'category_id'=>[
            'required'=>'Le nom de la catégorie est obligatoire',
        ],
        'tag'=>[
            'required'=>'Le tag de l\'article est obligatoire',
            'min_length'=>'{param} caractères minimums pour le tag',
            'max_length'=>'{param} caractères maximums pour le tag',
        ],
        'image'=>[
            'required'=>'L\'image de l\'article est obligatoire',
        ],

    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //
    protected function setUserID(array $data)
    {
        $data['data']['user_id'] = auth()->user()->id;

        return $data;
    }
}
