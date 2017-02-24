<?php

namespace app\controllers\admin;

use Yii;
use app\models\Goods;
use app\models\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends Controller
{

    public  $layout = '/background';
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
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * 商品添加
     */
    public function actionCreate()
    {
        $model = new Goods();



        if (Yii::$app->request->post()) {
           
            $post = Yii::$app->request->post();
            //加入goods表
            $post['goods']['add_time'] = time();
            $post['goods']['goods_sn'] = $post['goods']['brand_id'].$post['goods']['brand_id'].'aaaaa';
            
            try { 
                Yii::$app->db->createCommand()->insert('mb_goods',$post['goods'])->execute();
                $insertId = Yii::$app->db->getLastInsertID(); 
            } catch(Exception $e) {
                echo '添加失败';
            }


            //组合添加的数组
            $groupInsert = $post['group'];
            $groupInsert['attr_list'] = '';
            //家兔type_attr表
            foreach ($post['attr_value'] as $key => $value) 
            {
                $insertAttr['goods_id'] = $insertId;
                $attr = explode(',', $value);
                $insertAttr['attr_id'] = $attr[0];
                $insertAttr['attr_value'] = $attr[1];

            try { 
                Yii::$app->db->createCommand()->insert('mb_type_attr',$insertAttr)->execute();
                $insertAttrtypeId = Yii::$app->db->getLastInsertID(); 
                $groupInsert['attr_list'] .= ','.$insertAttrtypeId;
            } catch(Exception $e) {
                echo '添加类型失败';
            }

            }

            $groupInsert['attr_list'] = substr( $groupInsert['attr_list'],1);
            $groupInsert['group_sn'] = 'group'.time();
            $groupInsert['goods_id']  = $insertId;

            try { 
                Yii::$app->db->createCommand()->insert('mb_group',$groupInsert)->execute();
            } catch(Exception $e) {
                echo '添加类型失败';
            }

            

        } else {
            //传入其他参数
            $connection = \Yii::$app->db;
            $command = $connection->createCommand('SELECT * FROM mb_goodstype');
            $goodsType = $command->queryAll();
            $command = $connection->createCommand('SELECT brand_id,brand_name FROM mb_brand');
            $goodsBrand = $command->queryAll();
            return $this->render('create', compact('model','goodsType','goodsBrand'));
        }
    }


    //获取分类id然后查询属性
    public function actionGetType()
    {
        $get = Yii::$app->request->get();
        if($get)
        {
            $connection = \Yii::$app->db;
            $sql = 'SELECT * FROM mb_attribute where type_id = '.$get['type_id'];
            $command = $connection->createCommand($sql);
            $attribute = $command->queryAll();
            return json_encode($attribute);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->g_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
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
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
