<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property string $present_address
 * @property string $permanent_address
 * @property string $picture
 * @property string $sgn
 * @property int $no_of_share
 * @property int $status
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Profile extends Entity
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
        'name' => true,
        'mobile' => true,
        'email' => true,
        'present_address' => true,
        'permanent_address' => true,
        'picture' => true,
        'sgn' => true,
        'no_of_share' => true,
        'status' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
