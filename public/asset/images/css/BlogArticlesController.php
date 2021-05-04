<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

/**
 * BlogArticles Controller
 *
 * @property \App\Model\Table\BlogArticlesTable $BlogArticles
 *
 * @method \App\Model\Entity\BlogArticle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogArticlesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->authentication();
        $this->set('menu', 'blog-articles'); 
        
        $this->viewBuilder()->layout('none');     
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('submenu', 'blog-articles');      
        $this->paginate = [
            'contain' => ['BlogCategories'],
            'conditions' => ['BlogArticles.status' => 1],
            'limit' => 10,
            'order' => ['BlogArticles.publish_date' => 'DESC']
        ];
        $blogArticles = $this->paginate($this->BlogArticles);

        $this->set(compact('blogArticles'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('submenu', 'blog-articles');
        $blogArticle = $this->BlogArticles->get($id, [
            'contain' => ['BlogCategories', 'BlogMedias', 'BlogRatings']
        ]);

        $this->set('blogArticle', $blogArticle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('submenu', 'blog-articles');
        $blogArticle = $this->BlogArticles->newEntity();
        if ($this->request->is('post')) {
            $time = $this->request->data['time'];
            $part = explode(" ", $time); 
            $timeExp = explode(":", $part[0]);
            $timeInSec = $timeExp[0]*3600+$timeExp[1]*60;
            if($part[1] == 'PM'):
                $timeInSec = $timeInSec + 12*3600;
            endif;
            if(isset($this->request->data['publish_date'])):
                $this->request->data['publish_date'] = strtotime($this->request->data['publish_date']) + $timeInSec- 4*3600;
            else:
                $this->request->data['publish_date'] = strtotime("now") - 4*3600;
            endif;
            $name = $this->get_Seo_Url($this->request->data['title']);
            $this->request->data['slug'] = $name;
            if(isset($_FILES['featured_image'])):
                $this->request->data['featured_image'] = $this->Image->upload($_FILES['featured_image'], uploadImagePATH.'blog/', $name);
            else:
                $this->request->data['featured_image'] = null;
            endif;
            $blogArticle = $this->BlogArticles->patchEntity($blogArticle, $this->request->getData());
            if ($this->BlogArticles->save($blogArticle)) {
                $this->Flash->success(__('The blog article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog article could not be saved. Please, try again.'));
        }
        $blogCategories = $this->BlogArticles->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blogArticle', 'blogCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('submenu', 'blog-articles');
        $blogArticle = $this->BlogArticles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $time = $this->request->data['time'];
            $part = explode(" ", $time); 
            $timeExp = explode(":", $part[0]);
            $timeInSec = $timeExp[0]*3600+$timeExp[1]*60;
            if($part[1] == 'PM'):
                $timeInSec = $timeInSec + 12*3600;
            endif;
            if(isset($this->request->data['publish_date'])):
                $this->request->data['publish_date'] = strtotime($this->request->data['publish_date']) + $timeInSec- 4*3600;
            else:
                $this->request->data['publish_date'] = strtotime("now") - 4*3600;
            endif;
            $name = $this->get_Seo_Url($this->request->data['title']);
            $this->request->data['slug'] = $name;
            if(isset($_FILES['featured_image'])):
                $this->request->data['featured_image'] = $this->Image->upload($_FILES['featured_image'], uploadImagePATH.'blog/', $name);
            else:
                $this->request->data['featured_image'] = null;
            endif;
            $blogArticle = $this->BlogArticles->patchEntity($blogArticle, $this->request->getData());
            if ($this->BlogArticles->save($blogArticle)) {
                $this->Flash->success(__('The blog article has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The blog article could not be saved. Please, try again.'));
        }
        $blogCategories = $this->BlogArticles->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blogArticle', 'blogCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogArticle = $this->BlogArticles->get($id);
        $blogArticle->status = 0;
        if ($this->BlogArticles->save($blogArticle)) {
            $this->Flash->success(__('The blog article has been deleted.'));
        } else {
            $this->Flash->error(__('The blog article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function status($id = null, $publish =null)
    {
        $this->loadModel('BlogArticles');
        $record = $this->BlogArticles->find('all')->where(['id' => $id])->first();
        $record->publish = $publish;
        if($this->BlogArticles->save($record)):
            $this->Flash->success(__('Status has been changed successfully.'));
        else:
            $this->Flash->error(__('Please try again later.'));
        endif;
        return $this->redirect($this->referer());   
    } 

    public function saverating()
    {
        $id = $this->request->data['id'];
        $rating = $this->request->data['rating'];
        $this->loadModel('BlogArticles');
        $blog = $this->BlogArticles->get($id);
        if($rating == 6):
            $blog->av_rating_update = 0;
            $val = $blog->total_rating/$blog->total_number_of_rating;        
            $whole = floor($val);
            $fraction = $val - $whole;
            if($fraction < 0.5):
                $blog->av_rating = $whole;
            else:
                $blog->av_rating = $whole+0.5;
            endif;
        else:
            $blog->av_rating = $rating;
            $blog->av_rating_update = 1;
        endif;
        if($this->BlogArticles->save($blog)):
            $response['status'] = 'success';
            $this->Flash->success(__('Rating has been updated successfully.'));
        else:
            $response['status'] = 'unsuccess';
            $this->Flash->error(__('Please try again!'));
        endif;
        echo json_encode($response); die;
    }
    public function media($blog_article_id = null)
    {        
        $this->set('submenu', 'blog-articles');
        $this->loadModel('BlogMedias');
        $this->loadModel('Languages');
        $languagesList = $this->Languages->find('list')->where(['publish' => 1])->order(['name' => 'ASC']);
        $recordlist     = $this->BlogMedias->find('all')->where(['status' => 1, 'blog_article_id' => $blog_article_id])->order(['position' => 'ASC'])->count();
        $recordfirst    = $this->BlogMedias->find('all')->where(['status' => 1, 'blog_article_id' => $blog_article_id])->order(['position' => 'ASC'])->first();
        $records = $this->BlogMedias->find('all')->where(['status' => 1, 'blog_article_id' => $blog_article_id])->order(['position' => 'ASC']);
        $this->set(compact('records', 'recordlist', 'recordfirst'));
        $this->viewBuilder()->layout('none');
        $slider = $this->BlogArticles->find('all')->where(['BlogArticles.id' => $blog_article_id])->first();
        $this->set('slider', $slider);
        $this->set('page_id', $slider->page_id);        
        if($this->request->data): //pr($this->request->data); die;
            $this->request->data['position'] = 0;
            $this->request->data['status'] = 1;
            $this->request->data['publish'] = 1;
            $savedrecord = 0;
            $this->request->data['blog_article_id'] = $blog_article_id;
            /*foreach ($this->request->data['data'] as $key => $value) {
                $this->request->data[$key] = $value['link_text'];
            }
            unset($this->request->data['data']);*/
            $video = [];
            foreach($this->request->data['video'] as $key => $value):
                    $video[$key] = $value; 
            endforeach;
            unset($this->request->data['video']);
            $image = [];
            foreach($this->request->data['image'] as $key => $value):
                    $image[$key] = $value; 
            endforeach;
            unset($this->request->data['image']);
            
                //save all images
                $imagename = [];
                foreach ($image as $key => $value) {
                    if($value['name'] != ''):
                        $resume = explode(".", $value['name']);
                        $resumeExt = $resume[1];
                        $str2 = $resume[0];
                        $str2 = preg_replace('/[^A-Za-z0-9\ ]/', '', $str2);
                        $str2 = preg_replace('/  */', '_', $str2);
                        $str2 = preg_replace('/\\s+/', '_', $str2);
                        $valuename = $str2.'_'.rand(100,999).'.'.$resumeExt;
                        $this->Image->upload($value, uploadImagePATH.'blog/', $valuename);
                        $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/thumb/'.$valuename, '334', '250');
                        $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/900/'.$valuename, '900', '458');
                        $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/650/'.$valuename, '650', '331');
                        $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/400/'.$valuename, '400', '204');
                        $imagename[$key] = $valuename;
                    else:
                        $imagename[$key] = $value['name'];
                    endif;
                    
                }   
                foreach($imagename as $key => $value):
                    $media = $this->BlogMedias->newEntity();
                    if($imagename[$key]):
                        $media->image = $imagename[$key];                    
                    else:
                        $media->image = null;
                    endif;
                    if($video[$key]):
                        $media->video = $video[$key];
                    else:
                        $media->video = null;
                    endif;
                    $media->alt = $this->request->data['alt'][$key];
                    $media->title = $this->request->data['title'][$key];
                    //$media->link_url = $this->request->data['link_url'][$key];
                    //$media->link_target = $this->request->data['link_target'][$key];
                    $media->blog_article_id = $blog_article_id;
                    /*foreach($languagesList as $lvalue ):
                        $media->$lvalue = $this->request->data[$lvalue];
                    endforeach;*/
                    if(($media->video == null) && ($media->image == null)):
                    else:
                        $this->BlogMedias->save($media);
                        $savedrecord++;
                    endif;
                    $savedrecord++;
                endforeach;
            if($savedrecord > 0):
                if($savedrecord == 1):
                    $this->Flash->success(__('Image/Video has been saved successfully.'));
                else:
                    $this->Flash->success(__("Images/Videos sliders have been saved successfully."));
                endif;                
            else:
                $this->Flash->error(__('Please select image/video!'));
            endif;
                return $this->redirect($this->referer());
        endif;
    }
    public function mediaedited()
    {
        //pr($this->request->data);die;
        $this->loadModel('BlogMedias');
        $blogMedia = $this->BlogMedias->get($this->request->getData('id'));
        if($this->request->getData('image.name') != ''):
            $resume = explode(".", $this->request->getData('image.name'));
            $resumeExt = $resume[1];
            $str2 = $resume[0];
            $str2 = preg_replace('/[^A-Za-z0-9\ ]/', '', $str2);
            $str2 = preg_replace('/  */', '_', $str2);
            $str2 = preg_replace('/\\s+/', '_', $str2);
            $valuename = $str2.'_'.rand(100,999).'.'.$resumeExt;
            $this->Image->upload($this->request->getData('image'), uploadImagePATH.'blog/', $valuename);
            $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/thumb/'.$valuename, '334', '250');
            $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/900/'.$valuename, '900', '458');
            $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/650/'.$valuename, '650', '331');
            $this->Image->resize(uploadImagePATH.'blog/'.$valuename, uploadImagePATH.'blog/400/'.$valuename, '400', '204');
            $this->request->data['image'] = $valuename;
        else:
            $this->request->data['image'] = $blogMedia->image;   
        endif;
        $blogMedia = $this->BlogMedias->patchEntity($blogMedia, $this->request->getData());
        if($this->BlogMedias->save($blogMedia)):
            $this->Flash->success(__('Data has been updated successfully.'));
        else:
            $this->Flash->error(__('Please try again!'));
        endif;
        return $this->redirect($this->referer());
    }
     
    public function reorderListSubcategory()
    { //pr($this->request->data);die;
        $this->loadModel('BlogMedias');
        if($this->request->data):
            $ids = explode(',', $this->request->data['ids']);
            foreach ($ids as $key => $id):
                $media = $this->BlogMedias->get($id);
                if($media->position != $key+1):
                    $media->position = $key+1;
                    $this->BlogMedias->save($media);
                endif;
            endforeach;
        endif;
    die;
    }
    
}
