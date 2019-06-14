<?php

namespace App\Model\Table;

use App\Model\Entity\ProjectSnapshot;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ProjectSnapshotsTable|\Cake\ORM\Association\HasMany $ProjectSnapshots
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ProjectSnapshots', [
            'foreignKey' => 'project_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('location')
            ->maxLength('location', 2048)
            ->allowEmpty('location');

        $validator
            ->boolean('track_project')
            ->allowEmpty('track_project');

        $validator
            ->boolean('track_files')
            ->allowEmpty('track_files');

        return $validator;
    }

    public function findTrackedProjects()
    {
        return $this->find('all')
            ->where(['track_project' => true]);
    }

    /**
     * @param $projectID
     * @return bool|null|ProjectSnapshot
     */
    public function getLastSnapshotForProject($projectID)
    {
        return $this->ProjectSnapshots
            ->find('all')
            ->where(['project_id' => $projectID])
            ->order('id')->last();
    }

}
