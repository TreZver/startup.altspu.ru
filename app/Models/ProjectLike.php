<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProjectLike extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'projects_like';
    protected $appends = ['cnt','active'];

    protected $fillable = [
        'element_id','ip','useragent','hash'
    ];


    const LIKE_RESULT_ERROR = 0;
    const LIKE_RESULT_ADDED = 1;
    const LIKE_RESULT_REMOVED = 2;
    const COOKIE_NAME = 'VSLK_HISTORY';
    
    public function getCntAttribute()
    {
        $count = self::where([
            'element_id' => $this->element_id
        ])->count();
        return $count;
    }
    public function getActiveAttribute(){
        $count = self::where([
            'element_id' => $this->element_id,
            'hash'       => $this->getHash()
        ])->count();
        
        return ($count) ? true : false;
    }
    /**
     * Поучение хэша текущего поьзователя
     * @return string
     */
    public static function getHash()
    {
        $request = request();

        return md5($request->server('HTTP_USER_AGENT') . ' ' . $request->server('HTTP_USER_AGENT'));
    }

    /**
     * Получние значения куки текущего пользователя, если куки не существует - создается
     * @return string
     */
    public static function getCookie()
    {
        global $APPLICATION;

        $request = request();
        $verifyCookie = trim($request->cookie(self::COOKIE_NAME));
        if ($verifyCookie == '') {
            $verifyCookie = self::getHash();
        }
        /**
         * @todo разобраться как поставить куку D7
         * Добавление кук на D7 работает иначе. Еси выполнение прерывается,то кука на ставится.
         * Данный метод вызывается ajax.
         */
        $request->cookie(self::COOKIE_NAME, $verifyCookie, time() + 60480000);

        return $verifyCookie;
    }
    /**
     * Получение ассива общих полей
     * @return array
     */
    public static function getFields()
    {
        global $USER;
        $arResult = [];
        $arResult['hash'] = self::getCookie();
        return $arResult;
    }
        /**
     * Устанваивает/снимает лайк для элемента ИБ с ИД переданным в качестве параметра
     * @param $ID ИД элемента инфоблока
     * @return int результат выпоненения:
     * - 0 - ошибка LikeTable::LIKE_RESULT_ERROR
     * - 1 - добавлен LikeTable::LIKE_RESULT_ADDED
     * - 2 - удален LikeTable::LIKE_RESULT_REMOVED
     */
    public static function setLike(int $id)
    {
        $response = [];
        $t = self::where([
            'element_id' => $id,
            'ip'         => $_SERVER['REMOTE_ADDR'],
            'useragent'  => request()->userAgent(),
            'hash'       => self::getHash()
        ])->first();
        
        if (isset($t)){
            $cnt = $t->cnt -1;
            $t->delete();
            $response = [
                'id'  => $id,
                'cnt' => $cnt,
                'active' => false
            ];
        }else{
            $t = self::create([
                'element_id' => $id,
                'ip'         => $_SERVER['REMOTE_ADDR'],
                'useragent'  => request()->userAgent(),
                'hash'       => self::getHash()
            ]);
            $cnt = $t->cnt;
            $response = [
                'id'     => $id,
                'cnt'    => $cnt,
                'active' => true
            ];
        }
        return $response;
    }
}
