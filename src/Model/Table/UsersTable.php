<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 *
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    use UsersTableTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->buildPermissionRelationship();

        $this->hasOne('Profiles', [
            'foreignKey' => 'user_id'
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
            ->notEmpty('first_name', 'Please enter your First name');

        $validator
            ->notEmpty('last_name', 'Please enter your Last name');


        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Please enter email address');

        $validator
            ->scalar('password')
            ->maxLength('password', 30)
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'Please enter password')
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 30)
            ->notEmpty('confirm_password', 'Please enter confirmation password')
            ->add('confirm_password', [
                'custom' => [
                    'rule' => function ($value, $context) {
                            if (isset($context['data']['password']) && $value == $context['data']['password']) {
                                return true;
                            }
                            return false;
                        },
                    'message' => 'Sorry, password and confirm password does not matched'
                ]
            ]);

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
       // $rules->add($rules->confirmPassword(['confirm_password']));
        return $rules;
    }

    /**
     * Returns a user id, based on passed token
     *
     * @param string|null $token user token.
     * @return \Cake\Http\Response|null Redirects to index.
     */

    public function getUserid($token){
        $id = null;
        $response = $this->find()->select(['id'])->where(['status !=' => 3,'token' => $token,'token_status !=' => 2 ])->hydrate(false)->first();
        if(!empty($response)){
            $id = $response['id'];
        }
        return $id;
    }

    /**
     * Gets all roles of the user
     * @return RoleInterface[]
     */
    public function getAllRoles()
    {
        try {
            $roles = TableRegistry::get('Roles')->find('all')->toArray();;
    	    return $roles;
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }

    /**
     * getUserRoleId method
     *
     * @param id|null $id user id of user
     * @return comma separated roles
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getUserRoleId($id) {
        try {
            $userRole = TableRegistry::get('Users')->get($id, [
                            'contain' => ['Roles']
                        ])->toArray();

            if(!empty($userRole['roles']) && count($userRole['roles']) > 0 ){
                $assignedRoles = array();
                foreach($userRole['roles'] as $key => $role) {
                    $assignedRoles[] = $role['id'];
                }
                return $user_roles = implode(",",$assignedRoles);

            }
            $user_roles ="";
            return $user_roles;
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }

    /**
     * Finds the role by its name
     * @param string $id | role id
     * @return role name
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public static function getRoleName($id)
    {
        try {
            $query = TableRegistry::get('Roles')
                    ->find()
                    ->select('role')
                    ->where(['id' => $id]);
            $roleName = $query->first();
            return $roleName['role'];
        } catch (\PDOException $e) {
            $message = $e->getMessage();


        } catch (\Exception $e) {
            $message = $e->getMessage();

        }
    }

    /**
     * Finds the getPermissionSlug by its name
     * @param string $id | permission id
     * @return Permission slug
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public static function getPermissionSlug($id)
    {
        try {
            $query = TableRegistry::get('Permissions')
                    ->find()
                    ->select('slug')
                    ->where(['id' => $id]);
            $roleName = $query->first();
            return $roleName['slug'];
        } catch (\PDOException $e) {
            $message = $e->getMessage();
          //  $this->Flash->error($message);
           // return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
         //   $this->Flash->error($message);
           // return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }

    /**
     * Finds the permissions based on assigned role
     * @param string $id | role id
     * @return RoleInterface
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public static function getRolePermissions($id)
    {
        try {
            $response = TableRegistry::get('RolesPermissions')->find()->select(['permission_id'])->where(['role_id' => $id])->toArray();

            if(count($response) > 0 ){
                $assignedPermissions = array();
                foreach($response as $key => $permission) {
                    $permission_name = TableRegistry::get('Users')->getPermissionSlug($permission['permission_id']);
                    $assignedPermissions[] = $permission_name;
                }
                return $user_permissions = implode(",",$assignedPermissions);
            }else {
                return false;
            }
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            //$this->Flash->error($message);
            //return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            //$this->Flash->error($message);
            //return $this->redirect(['controller' => 'Users','action' => 'index']);
        }

    }


}
