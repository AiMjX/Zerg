<?php
/**
 * Created by 七月
 * User: 七月
 * Date: 2017/2/15
 * Time: 13:40
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\MissException;

/**
 * Banner资源
 */
class Banner extends BaseController
{
//    protected $beforeActionList = [
//        'checkPrimaryScope' => ['only' => 'getBanner']
//    ];

    /**
     * 获取Banner信息
     * @url     /banner/:id
     * @http    get
     * @param   int $id banner id
     * @return  array of banner item , code 200
     * @throws  MissException
     */
    public function getBanner($id)
    {

        die();
       /* $arr = [1,2,3,4,5];
        var_dump($arr);
        (settype());
        var_dump($arr);*/

        /*$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        echo $orderSn;die();*/
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        $banner = BannerModel::getBannerById($id);
        if (!$banner) {
            throw new MissException([
                'msg' => '请求banner不存在',
                'errorCode' => 40000
            ]);
        }
        return $banner;
    }
}