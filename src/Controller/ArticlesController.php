<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController {
    // public $paginate = [
    //     'page' => 1,
    //     'limit' => 20,
    //     'maxLimit' => 100,
    //     'fields' => [
    //         'id', 'title', 'created',
    //     ],
    //     'sortWhitelist' => [
    //         'id', 'title', 'created',
    //     ],
    // ];
    //public $theme = 'Modern';
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        // $this->tree();
    }

    public function beforeRender(\Cake\Event\Event $event) {
        //$this->viewBuilder()->theme('Modern');
    }

    /*
     * 我们需要对我们的isauthorized()方法提供更多的规则。
     * 但是不是在App做它，我们将委托提供这些额外的规则，每个控制器。
     * 应该允许作者创建的文章，防止作者编辑文章不属于自己。
     */
    public function isAuthorized($user) {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $articleId = (int) $this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index() {

        $this->paginate = array(
            'conditions' => ['column_id <>' => 4],
            'page' => $this->params['page'],
            'limit' => 20,
            'order' => array(
                'Articles.id' => 'desc'),
        );
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    public function view($id = null) {
        $articles = $this->Articles->get($id);

        if ($articles->art_cover) {
            $articles->art_cover = substr($articles->art_cover_path, 7) . '/' . $articles->art_cover;
        }

        if ($articles->art_video) {
            $articles->art_video = substr($articles->art_video_path, 7) . '/' . $articles->art_video;
        }

        $this->set('articles', $articles);
        $this->set('_serialize', ['articles']);
    }

    public function loadPages($urlAlias = null) {

        $pages = $this->Articles->find('all', array('conditions' => array('art_url_alias' => strval($urlAlias))));
        $page = $pages->first();
        // pr($page);exit;
        $this->set('title_for_layout', $page->art_title);
        if (empty($page)) {
            throw new NotFoundException('Could not find a page with that name.');
        } else {
            $this->set(compact('page'));
        }
        //RENDER THEME VIEW
        $this->render('pages');
    }

    public function lists() {
        $params = $this->request->data;
        // pr($this->request);
        $condition = [];
        if (@$params['id']) {
            $condition['column_id'] = intval(substr($params['id'], 9));
        }

        $this->paginate = array(
            'conditions' => $condition,
            'page' => $this->params['page'],
            'limit' => 3,
            'order' => array(
                'Articles.id' => 'desc'),
        );
        $articles = $this->paginate($this->Articles);
        // pr($articles);
        // $this->log($articles->toArray());
        // $where = [];
        // if ($params['id']) {
        //     $where['column_id'] = intval(substr($params['id'], 9));
        // }

        // if ($this->params['page']) {
        //     $where['page'] = intval($this->params['page']);
        // }

        // $query = $this->Articles->find('all')->where($where);
        // $articles = $this->paginate($query);
        // echo json_encode($articles, true);
        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
        $this->set('_serialize', ['pagation']);
        // $pagation = $articles->pagation();

        // exit;
    }

    public function columns() {
        error_reporting(4);
        $this->loadModel('Columns');
        $_columns = $this->Columns->find('all');

        foreach ($_columns as $key => $val) {
            $columns[$val['parent_id']]['id'] = $val['id'];
            $columns[$val['parent_id']]['name'] = $val['name'];
            $columns[$val['parent_id']]['parent_id'] = $val['parent_id'];
        }
        // pr($columns);
        foreach ($_columns as $key => $val) {
            $json[$key]['id'] = $val['id'];
            $json[$key]['name'] = $val['name'];
            if (isset($columns[$val['id']])) {
                $json[$key]['children'] = $columns[$val['id']];
            } else {
                $json[$key]['isParent'] = true;
            }
        }

        $this->set(compact('json'));
        $this->set('_serialize', ['json']);
    }

    public function tags() {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->params['pass'];

        // Use the BookmarksTable to find tagged bookmarks.
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags,
        ]);
        var_dump($articles);exit;
        // Pass variables into the view template context.
        $this->set([
            'bookmarks' => $articles,
            'tags' => $tags,
        ]);
    }
}
