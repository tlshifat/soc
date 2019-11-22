<?php
namespace App\Controller\Component;
use Cake\Core\Configure;
use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

class CommonComponent extends Component
{

    /**
     * sendEmail method
     *
     * @param string|null $emailCode Code for the email, that needs to be send.
     * @param string|null $toEmail Email address of the user.
     * @param array|null $contentArray Content parameters values, passed in the email template
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sendEmail($emailCode, $toEmail, $contentArray)
    {
        if ($emailCode != "" && $toEmail != "") {
            $email_template_obj = TableRegistry::get('EmailTemplates');
            
            try {
                $emailDetails = $email_template_obj->find('all')->where(['code' => $emailCode])->first();

                $content = "";
                $subject = "";

                if(isset($emailDetails)){
                    $subject = $emailDetails->subject;

                    $content = $emailDetails->content;

                    if (is_array($contentArray) && !empty($contentArray)) {

                        foreach ($contentArray as $key => $value) {                        
                            $content = str_replace($key, $value, $content);
                            $subject = str_replace($key, $value, $subject);
                            
                        }
                    } else {

                        $content = $contentArray;
                    }
                } else {
                    $content = $contentArray;
                }
                $email = new Email();
                $email->from(['tqminternal@gmail.com' => 'XYZ Team'])
                    ->emailFormat('html')
                    ->to($toEmail)
                    ->subject($subject)
                    ->send($content);
            
                return true;

            } catch (\PDOException $e) {
                $message = $e->getMessage();
                $this->Flash->error($message);
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            } catch (\Exception $e) {
                $message = $e->getMessage();
                $this->Flash->error($message);
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }       
               
        } else 
            return false;
            
    }

    /**
     * generateRandomString method
     *
     * @param number|null $length Length of the random string to be generated
     * @return random string generated
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString; 
    }
     
}