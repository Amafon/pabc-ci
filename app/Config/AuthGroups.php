<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'agent' => [
            'title'       => 'Agent',
            'description' => 'Agent du Projet PABC.',
        ],
        'direction' => [
            'title'       => 'Direction',
            'description' => 'Coordonnateur, Chef de Projet ou son Adjoint.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'compta' => [
            'title'       => 'Comptabilité',
            'description' => 'Agent du PABC, Agent de la Comptabilité.',
        ],
        'rh' => [
            'title'       => 'Ressources Humaines',
            'description' => 'Agent du PABC, Agent des Ressources Humaines.',
        ],
        'pm' => [
            'title'       => 'Passation des Marchés',
            'description' => 'Agent du PABC, Agent de la Passation des Marchés.',
        ],
        'rm' => [
            'title'       => 'Rédaction des Marchés',
            'description' => 'Agent du PABC, Agent du service Rédaction des Marchés.',
        ],
        'sop' => [
            'title'       => 'Suivi Opérationnel',
            'description' => 'Agent du PABC, Agent du Suivi Opérationnel.',
        ],
        'sev' => [
            'title'       => 'Suivi Evaluation',
            'description' => 'Agent du PABC, Agent du Suivi-Evaluation.',
        ],
        'senv' => [
            'title'       => 'Suivi Environnement',
            'description' => 'Agent du PABC, Agent du Suivi-Environnement.',
        ],
        'cai' => [
            'title'       => 'Contrôle et Audit Interne',
            'description' => 'Agent du PABC, Agent du Contrôle et de l\'Audit Interne.',
        ],
        'com' => [
            'title'       => 'Communication',
            'description' => 'Agent du PABC, Agent de la Communication.',
        ],
        'mg' => [
            'title'       => 'Moyens Généraux',
            'description' => 'Agent du PABC, Agent des Moyens Généraux.',
        ],
        'info' => [
            'title'       => 'Informatique',
            'description' => 'Agent du PABC, Agent du Service Informatique.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',
        'users.manage-admins' => 'Can manage other admins',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'beta.access'         => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'beta.*',
        ],
        'admin' => [
            'admin.access',
            'users.create',
            'users.edit',
            'users.delete',
            'beta.access',
        ],
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.create',
            'users.edit',
            'beta.access',
        ],
        'user' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}
