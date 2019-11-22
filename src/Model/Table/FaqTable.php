<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class FaqTable extends Table
{
    /**
     * beforeSave method
     * use the beforeSave() callback of the ORM to populate our slug
     */
	public function beforeSave($event, $entity, $options)
	{
	    if ($entity->isNew() && !$entity->slug) {
	        $sluggedTitle = Text::slug($entity->title);
	        // trim slug to maximum length defined in schema
	        $entity->slug = substr($sluggedTitle, 0, 191);
	    }
	}

    /**
     * validationDefault method
     * tells CakePHP how to validate your data when the save() method is called
     */
	public function validationDefault(Validator $validator)
	{
	    $validator
	        ->notEmpty('title')
	        ->minLength('title', 1)
	        ->maxLength('title', 255)
		->notEmpty('question')
		->notEmpty('answer')
	        ->minLength('answer', 1);

	    return $validator;
	}

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp'); //Timestamp behavior will automatically populate the created and modified columns of our table.
    }
/**
     * Gets all roles of the user
     * @return RoleInterface[]
     */
    public function getAllTitle()
    {
        try {
            $titles =  $this->find('all')->select(['title'])->toArray();
    	    return $titles;
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
}
