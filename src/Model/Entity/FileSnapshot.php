<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FileSnapshot Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $project_snapshot_id
 * @property string $filepath
 * @property string $checksum
 *
 * @property \App\Model\Entity\ProjectSnapshot $project_snapshot
 */
class FileSnapshot extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'project_snapshot_id' => true,
        'filepath' => true,
        'checksum' => true,
        'project_snapshot' => true
    ];
}
