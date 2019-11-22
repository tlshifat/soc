<?php
/**
 * CakePHP permission handling library
 * @author Tao <taosikai@yeah.net>
 */
namespace App\Model\Table;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\ORM\Table;

trait UsersTableTrait
{
    public function buildPermissionRelationship()
    {
	//ini_set('xdebug.max_nesting_level', 2000);
        $this->belongsToMany('Roles', [
            'className' => 'Roles',
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'user_roles'
        ]);
    }
}
