<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        $post = Yii::$app->db->createCommand('select * from post')->queryOne();
        /*
        $post = Yii::$app->db->createCommand('select * from post WHERE id=:id AND status=:status')
            ->bindValue(':id', $_GET['id'])
            ->bindValue(':status', 2)
            ->queryOne();
        print_r($post);exit;
        */

        /*
        //查询一条
        $ar_post = post::find()->where(['id' => 43])->one();
        echo '<pre>';
        print_r($ar_post);exit;
        */

        //查询一条
        /*
        $ar_post = post::findOne(43);
        echo '<pre>';
        print_r($ar_post);exit;
        */

        /*
        //查询多条
        $ar_posts = post::find()->where(['status' => 2])->all();
        echo '<pre>';
        print_r($ar_posts);exit;
        */

        //查询多条
        /*
        $ar_posts = post::findAll(['status' => 2]);
        echo '<pre>';
        print_r($ar_posts);exit;
        */

        //复杂查询
        /*
        $ar_posts = post::find()->where(['AND', ['status' => 2], ['author_id' => 1], ['like', 'title', 'Yii']])
            ->orderBy('id')->all();
        echo '<pre>';
        print_r($ar_posts); exit;
        */

        /*
        $sql = 'select * from post where status = 1';
        $ar_posts = post::findBySql($sql)->all();
        echo '<pre>';
        var_dump($ar_posts); exit;
        */

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
