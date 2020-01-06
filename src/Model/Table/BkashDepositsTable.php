<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BkashDeposits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BkashDeposit get($primaryKey, $options = [])
 * @method \App\Model\Entity\BkashDeposit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BkashDeposit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BkashDeposit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BkashDeposit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BkashDeposit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BkashDeposit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BkashDeposit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BkashDepositsTable extends Table
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

        $this->setTable('bkash_deposits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('payment_month')
            ->maxLength('payment_month', 33)
            ->requirePresence('payment_month', 'create')
            ->notEmpty('payment_month');


        $validator
            ->scalar('reference_number')
            ->maxLength('reference_number', 33)
            ->requirePresence('reference_number', 'create')
            ->notEmpty('reference_number');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 33)
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
