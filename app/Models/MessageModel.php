<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Message::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'subject', 'senderFirstName', 'senderLastName', 'message'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'email' => 'required|min_length[20]|max_length[50]',
        'senderFirstName' => 'required|min_length[3]|max_length[75]',
        'senderLastName' => 'required|min_length[3]|max_length[50]',
        'message' => 'required|min_length[10]|max_length[500]',
    ];
    protected $validationMessages   = [
        'email' => [
            'required' => 'L\'adresse email est obligatoire',
            'min_length' => '{param} caractères minimums pour le {field}',
            'max_length' => '{param} caractères maximums pour le {field}',
        ],
        'senderFirstName' => [
            'required' => 'Le(s) prénom(s) de l\'emetteur est obligatoire',
            'min_length' => '{param} caractères minimums pour le {field}',
            'max_length' => '{param} caractères maximums pour le {field}',
        ],
        'senderLastName' => [
            'required' => 'Le nom de l\'emetteur est obligatoire',
            'min_length' => '{param} caractères minimums pour le {field',
            'min_length' => '{param} caractères minimums pour le {field}',
        ],
        'message' => [
            'required' => 'Le contenu du message est obligatoire',
            'min_length' => '{param} caractères minimums pour le {field}',
            'min_length' => '{param} caractères minimums pour le {field}',
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
}
