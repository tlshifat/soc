<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmailTemplate Entity
 *
 * @property int $id
 * @property string $title
 * @property string $subject
 * @property string $content
 * @property string $code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 */
class EmailTemplate extends Entity
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
        'title' => true,
        'subject' => true,
        'content' => true,
        'code' => true,
        'created' => true,
        'modified' => true,
        'status' => true
    ];
}
