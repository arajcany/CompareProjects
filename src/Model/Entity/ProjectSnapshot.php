<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectSnapshot Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $project_id
 * @property string $checksum
 * @property int $span
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\FileSnapshot[] $file_snapshots
 */
class ProjectSnapshot extends Entity
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
        'project_id' => true,
        'checksum' => true,
        'span' => true,
        'project' => true,
        'file_snapshots' => true
    ];
}
