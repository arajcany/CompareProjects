<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectSnapshots Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\FileSnapshotsTable|\Cake\ORM\Association\HasMany $FileSnapshots
 *
 * @method \App\Model\Entity\ProjectSnapshot get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSnapshot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSnapshot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSnapshot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSnapshot|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSnapshot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSnapshot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSnapshot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectSnapshotsTable extends Table
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

        $this->setTable('project_snapshots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('FileSnapshots', [
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
            ->scalar('checksum')
            ->maxLength('checksum', 50)
            ->requirePresence('checksum', 'create')
            ->notEmpty('checksum');

        $validator
            ->integer('span')
            ->requirePresence('span', 'create')
            ->notEmpty('span');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
