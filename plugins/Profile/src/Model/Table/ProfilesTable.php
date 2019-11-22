<?php
namespace Profile\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \Profile\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Profile\Model\Entity\Profile get($primaryKey, $options = [])
 * @method \Profile\Model\Entity\Profile newEntity($data = null, array $options = [])
 * @method \Profile\Model\Entity\Profile[] newEntities(array $data, array $options = [])
 * @method \Profile\Model\Entity\Profile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Profile\Model\Entity\Profile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Profile\Model\Entity\Profile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Profile\Model\Entity\Profile[] patchEntities($entities, array $data, array $options = [])
 * @method \Profile\Model\Entity\Profile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProfilesTable extends Table
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

        $this->setTable('profiles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Profile.Users'
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
            ->maxLength('name', 111)
            ->allowEmpty('name');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 111)
            ->allowEmpty('mobile');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('present_address')
            ->maxLength('present_address', 111)
            ->allowEmpty('present_address');

        $validator
            ->scalar('permanent_address')
            ->maxLength('permanent_address', 111)
            ->allowEmpty('permanent_address');

        $validator
            ->scalar('picture')
            ->maxLength('picture', 111)
            ->allowEmpty('picture');

        $validator
            ->scalar('sgn')
            ->maxLength('sgn', 111)
            ->allowEmpty('sgn');

        $validator
            ->integer('no_of_share')
            ->allowEmpty('no_of_share');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
