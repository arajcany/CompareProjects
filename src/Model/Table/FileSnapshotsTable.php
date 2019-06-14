<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FileSnapshots Model
 *
 * @property \App\Model\Table\ProjectSnapshotsTable|\Cake\ORM\Association\BelongsTo $ProjectSnapshots
 *
 * @method \App\Model\Entity\FileSnapshot get($primaryKey, $options = [])
 * @method \App\Model\Entity\FileSnapshot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FileSnapshot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FileSnapshot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FileSnapshot|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FileSnapshot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FileSnapshot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FileSnapshot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FileSnapshotsTable extends Table
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

        $this->setTable('file_snapshots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectSnapshots', [
            'foreignKey' => 'project_snapshot_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('filepath')
            ->maxLength('filepath', 1024)
            ->requirePresence('filepath', 'create')
            ->notEmpty('filepath');

        $validator
            ->scalar('checksum')
            ->maxLength('checksum', 50)
            ->requirePresence('checksum', 'create')
            ->notEmpty('checksum');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['project_snapshot_id'], 'ProjectSnapshots'));

        return $rules;
    }
}
