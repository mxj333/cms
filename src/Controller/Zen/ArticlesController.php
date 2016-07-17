<?php
namespace App\Controller\Zen;
use App\Controller\Zen\AppController;
use Cake\Utility\Inflector;

// use Cake\I18n\Time;

class ArticlesController extends AppController {

    // public function index() {
    //        $action = $this->Crud->action();
    //        $action->config('scaffold.fields', [
    //            'title'
    //        ]);
    //        return $this->Crud->execute();
    //    }

    // public function add() {
    //     $action = $this->Crud->action();
    //     $action->config('scaffold.fields', [
    //         'title',
    //         'body',
    //         'files' => ['type' => 'file']
    //     ]);
    //     return $this->Crud->execute();
    // }

    // public function index() {
    //     $this->set('articles', $this->Articles->find('all'));
    // }
    public function index() {
        $this->loadModel('Columns');
        $columns = $this->Columns->find('treeList');

        $condition = [];
        $column_id = $this->request->params['pass'] ? intval($this->request->params['pass'][0]) : 0;
        if ($column_id) {
            $condition['column_id'] = $column_id;
        }
        $this->paginate = array(
            'conditions' => $condition,
            'page' => $this->params['page'],
            'limit' => 20,
            'order' => array(
                'Articles.id' => 'desc'),
        );
        $articles = $this->paginate($this->Articles);

        $this->set(compact('columns', 'articles', 'column_id'));
        $this->set('_serialize', ['columns', 'articles']);

        // $action = $this->Crud->action(); // Gets the IndexAction object

        //格式化字段
        /*
        $action->config('scaffold.fields', [
        'title',
        'thread_id' => [
        'type' => 'text'
        ],
        'featured' => [
        'checked' => 'checked'
        ]
        ]);
         */
        // $action->config('scaffold.fields', [
        //     'published_time' => [
        //         'formatter' => 'element',
        //         'element' => 'search/published_time',
        //         'action' => 'index'
        //     ]
        // ]);

        //显示的字段
        //$action->config('scaffold.fields', ['title', 'category']);

        //debug($action->config()); // Show all configuration related to this action

        //例如你可能不打算将关联的信息显示在索引列表中:
        //$action->config('scaffold.relations_blacklist', ['Categories']);

        //显示关联的信息在索引列表中:
        //$action->config('scaffold.relations', ['Categories']);

        // //不显示的字段
        // $action->config('scaffold.fields_blacklist', ['body', 'created', 'modified']);

        //不显示删除按钮
        // $action->config('scaffold.actions_blacklist', ['delete']);

        //显示的操作
        //$action->config('scaffold.actions', ['view', 'add', 'edit']);

        //或者,您可以使用该插件的Crud的方法beforePaginate改变包含函数列表中的分页查询:
        /*
        $this->Crud->on('beforePaginate', function ($event) {
        $paginationQuery  = $event->subject()->query;
        $paginationQuery->contain([
        'Categories' => ['fields' => ['id', 'name']]
        ]);
        });
         */

        // return $this->Crud->execute();
    }

    public function add() {

        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if (emtpy($article->art_url_alias)) {
                $article->art_url_alias = strtolower(Inflector::slug(pinyin($article->art_title, 1)));
            }

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }

        $this->loadModel('Columns');
        $columns = $this->Columns->find('treeList');

        $article->art_cover = 'http://placehold.it/150x120?text=ZenCMS.CN';
        $user_id = $this->Auth->user()['id'];
        $this->set(compact('article', 'columns', 'user_id'));
        $this->set('_serialize', ['article']);
    }

    public function edit($id = null) {
        $article = $this->Articles->get($id);
        if ($article->art_cover) {
            $article->art_cover = substr($article->art_cover_path, 7) . '/thumbnail-' . $article->art_cover;
        } else {
            $article->art_cover = 'http://placehold.it/150x120?text=ZenCMS.CN';
        }
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->data);
            if (!$article->art_url_alias) {
                $article->art_url_alias = strtolower(Inflector::slug(pinyin($article->art_title, 1)));
            }
            // var_dump($article);exit;
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->loadModel('Columns');
        $columns = $this->Columns->find('treeList');
        $user_id = $this->Auth->user()['id'];
        $this->set(compact('article', 'columns', 'user_id'));
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function tags() {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->params['pass'];

        // Use the BookmarksTable to find tagged bookmarks.
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags,
        ]);

        // Pass variables into the view template context.
        $this->set([
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }

}