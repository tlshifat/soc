<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BkashDeposit Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $payment_month
 * @property string $bkash_number
 * @property string $reference_number
 * @property string $amount
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class BkashDeposit extends Entity
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
        'date' => true,
        'payment_month' => true,
        'bkash_number' => true,
        'reference_number' => true,
        'amount' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true
    ];
}
